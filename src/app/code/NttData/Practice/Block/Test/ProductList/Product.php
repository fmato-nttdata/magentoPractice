<?php
namespace NttData\Practice\Block\Test\ProductList;
class Product extends \NttData\Practice\Block\Test\ProductList{
    public function getInfoClass(){
        $dato = get_class($this);
        return $dato;
    }
}