<?php

namespace App\Controllers;

use App\Manager\ProductManager;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Quote;
use App\Models\QuoteProduct;
use App\Models\QuoteProductService;
use App\Models\User;
use \Core\View;

class ProductController
{

    public function getProductType()
    {


        $productTypeObj = new ProductType();
        $types = $productTypeObj->getAll();

        $array = array();
        while($row = $types->fetch_assoc()) {
            $array[] = $row;
        }
        $data = array_column($array, 'name', 'id');

        return json_encode($data);

    }

    public function getProductByType()
    {
        $product_type_id = $_REQUEST['product_type_id'];

        $productObj = new Product();
        $products = $productObj->getAllProductByProductTypeID($product_type_id);

        $array = array();
        while($row = $products->fetch_assoc()) {
            $array[] = $row;
        }
        $data = array_column($array, 'name', 'id');

        return json_encode($data);

    }

    public function step1(){

        if(isset($_POST) && !empty($_POST)) {

            $data= array();
            foreach($_POST as $key => $value){
                if(empty($value)){
                    $data[$key] = null;
                }
                else{
                    $data[$key] = $value;
                }

            }
            session_start();
            $_SESSION['step1'] = $data;

            View::render('Product/Steps/step2.php');
        }
        else{

            View::render('Product/Steps/step1.php');

        }


    }

    public function step2(){

        if(isset($_POST) && !empty($_POST)) {

            $data= array();
            foreach($_POST as $key => $value){
                if(empty($value)){
                    $data[$key] = null;
                }
                else{
                    $data[$key] = $value;
                }

            }
            session_start();
            $_SESSION['step2']['products'][] = $data;

            View::render('Product/Steps/step3.php');


        }else {
            View::render('Product/Steps/step2.php');

        }


    }

    public function step3(){

        if(isset($_POST) && !empty($_POST)) {

            $data= array();
            foreach($_POST as $key => $value){
                if(empty($value)){
                    $data[$key] = null;
                }
                else{
                    $data[$key] = $value;
                }

            }
            session_start();
            $_SESSION['step3'] = $data;




            $input = $_SESSION;
            $step1_data = $input['step1'];
            $step2_data = $input['step2']['products'];
            $step3_data = $input['step3'];



            /**************** STEP 1 *****************/

            //Create user - Step1
            $userObj = new User();
            $user_id = $userObj->save($step1_data['name'], password_hash($step1_data['password'], PASSWORD_BCRYPT), $step1_data['email'], $step1_data['phone']);


            /**************** STEP 2 *****************/

            //Generate quote
            $quoteObj = new Quote();
            $quote_id = $quoteObj->save($user_id, '0');

            $total_price = 0;
            foreach ($step2_data as $product) {

                $hours = ($product['to_time'] - $product['from_time']) * $product['num_of_weeks'];

                //Get price type
                $productTypeObj = new ProductType();
                $res = $productTypeObj->getPriceType($product['product_type_id']);
                $price_type = $res->fetch_assoc()['price_type'];


                //Calculate each product price
                $manager = new ProductManager();
                $result = $manager->calculatePrice($product['product_type_id'], $product['product_id'], $price_type,
                    $product['start_date'], $product['end_date'],
                    $product['quantity'],
                    $hours);

                $total_price =  $total_price + $result['price'];


                $start_date_d = date_format(date_create($product['start_date']), 'Y-m-d');
                $end_date_d = date_format(date_create($product['end_date']), 'Y-m-d');

                //Generate Quote with product
                $quoteProductObj = new QuoteProduct();

                switch ($price_type) {
                    case 'per_day':
                        $quoteProductObj->savePerDay($quote_id, $product['product_id'], $start_date_d, $end_date_d, $result['price']);
                        break;

                    case 'per_hour':
                        $quote_product_id = $quoteProductObj->savePerHour($quote_id, $product['product_id'], $hours, $result['price']);

                        //Service Product
                        $quoteProductServiceObj = new QuoteProductService();
                        $quoteProductServiceObj
                            ->save($quote_product_id, $product['day_of_the_week'], $product['from_time'], $product['to_time'], $product['num_of_weeks'], $product['recurring'] );
                        break;

                    case 'per_quantity':
                        $quoteProductObj->savePerQuantity($quote_id, $product['product_id'], $product['quantity'], $result['price']);
                        break;
                }

                $quoteObj->update($total_price, $quote_id);

            }

            echo '<a href="/quote/'. $quote_id. '">View Quote</a>';
            session_destroy();

        }else {
            View::render('Product/Steps/step2.php');

        }


    }
}
