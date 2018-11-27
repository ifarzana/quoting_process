<?php

namespace App\Manager;

use App\Models\Product;

class ProductManager
{
    public function calculatePrice($product_type_id, $product_id, $price_type,
                                   $start_date, $end_date,
                                   $quantity,
                                   $hours)
    {
        $productObj = new Product();
        $res = $productObj->getPrice($product_id);
        $product_price = $res->fetch_assoc()['price'];

        if ($price_type == 'per_day') {

            $start_date_d = new \DateTime($start_date);
            $end_date_d = new \DateTime($end_date);

            if ($end_date_d > $start_date_d){
                $difference = date_diff($start_date_d,$end_date_d)->format('%a');
                $result['price'] = intval($difference) * floatval($product_price);

            }
            else {
                $result['error'][] = 'Error: The end date cannot be before the start date.';
                die('Error: The end date cannot be before the start date.');
            }

        } elseif ($price_type == 'per_hour'){

            $result['price'] = intval($hours) * floatval($product_price);


        } elseif ($price_type == 'per_quantity'){

            $result['price'] = intval($quantity) * floatval($product_price);


        }


        return $result;
    }

}