<?php
namespace App\Services;
class PriceService{
    public function convertPriceToUSD($price)
    {
        return $price/0.7;
    }
}