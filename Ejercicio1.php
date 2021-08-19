<?php

$sellerId = 179571326;

define( "API_SELLER" , "https://api.mercadolibre.com/sites/MLA/search?seller_id=");
define( "API_CATEGORY" , "https://api.mercadolibre.com/categories/");

$json = file_get_contents(API_SELLER . $sellerId);
$res = json_decode($json);

$articulos = $res -> results;

foreach ($articulos as $data ) {
    $category = API_CATEGORY . $data->category_id;
    $jsonCategory = file_get_contents(API_CATEGORY . $data-> category_id);
    $catResults = json_decode($jsonCategory);

    $item = 'ID: "' . trim($data->id) . '" - Title: "' . trim($data-> title) . '"- Category: "' . trim($data->category_id) . '" - Name:"' . trim($catResults->name). '"' . PHP_EOL;

    file_put_contents('./log_' .date("j-n-Y"). '.log', $item, FILE_APPEND);
}
?>