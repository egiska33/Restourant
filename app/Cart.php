<?php

namespace App;



class Cart
{

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function  __construct($oldCart)
    {
        if($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id) {
        $storeItem = ['qty'=> 0, 'price'=>$item->price, 'item'=>$item];
        if($this->items) {
            if(array_key_exists($id, $this->items)) {
                $storeItem = $this->items[$item->id];
            }
        }
        $storeItem['qty']++;
        $storeItem['price'] = $item->price * $storeItem['qty'];
        $this->items[$item->id] = $storeItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;

    }
    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price']-= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
    }

}