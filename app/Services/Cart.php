<?php

namespace App\Services;

use App\Models\Product;

class Cart
{
    public $items, $totalQty, $totalPrice;

   public function __construct($cart = null){
       if($cart){
           $this->items = $cart->items;
           $this->totalQty = $cart->totalQty;
           $this->totalPrice = $cart->totalPrice;
       }else{
           $this->items = [];
           $this->totalQty = 0;
           $this->totalPrice = 0;
       }
   }

   // ======> add new product   <===============
   public function addProduct(Product $product){
        $item = $this->initialItem($product);
        $this->addItem($product,$item);

   }


   // =======>   establish item <=====================
   private function initialItem($product): array{
      return[
           'price' => $product->price,
           'qty'   =>0,
           'properties' => [
               'image'=>$product->image,
               'title'=>$product->title
           ],
       ];

   }

   // ========> check for item exists or not and added it <=========
    private function addItem($product,$item){

       if(!key_exists($product->id,$this->items)){
           $this->items[$product->id] = $item;
           $this->totalQty +=1;
           $this->totalPrice += $product->price;
       }else{
           $this->totalQty +=1;
           $this->totalPrice += $product->price;
       }
       $this->items[$product->id]['qty'] +=1;
   }

}
