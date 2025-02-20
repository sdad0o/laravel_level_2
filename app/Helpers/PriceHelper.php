<?php
function convertPriceToUSD($price)
{
    return $price/0.7;
}

function priceCurrency($currency)
{
    return "<span style='color:green'>" .strtoupper($currency)."</span>";
}