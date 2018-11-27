<?php

namespace App\Controllers;
use App\Models\Quote;
use App\Models\QuoteProduct;

use \Core\View;


class QuoteController
{

    /**
     * Show the quote index page
     *
     * @return void
     */
    public function view($quote_id)
    {
        /*Get user info*/
        $quoteObj = new Quote();
        $user = $quoteObj->getQuoteUser($quote_id)->fetch_assoc();

        /*Get quote info*/
        $total_price = $quoteObj->getQuoteTotalPrice($quote_id)->fetch_assoc()['total_price'];


        $quoteProductObj = new QuoteProduct();
        $products = $quoteProductObj->getAllProductsOfQuote($quote_id);

        $array = [];
        while($row = $products->fetch_assoc()) {
            $array[] = $row;
        }

        return View::render('Quote/index.php',
            [
                'quote_id' => $quote_id,
                'quote_product' => $array,
                'total_price' => $total_price,
                'user' => $user,
            ]);

    }
}
