<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items=[];
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldcart)
    {
        if($oldcart){
            $this->items = $oldcart->items;
            $this->totalQty = $oldcart->totalQty;
            $this->totalPrice = $oldcart->totalPrice;
        }

    }

    public function add($item, $id, $qty){
        $keys=count($this->items)+1;
        $found=0;
        // dd($keys);
        if($item->special_price!=null){
            $item->price=$item->special_price;
        }
        $storeditem = ['qty' => 0, 'price' => $item->price, 'item' => $item, 'product_id' => $id];

        if($this->items){
            foreach($this->items as $key => $item1){
                if($item1['product_id']==$id){
                    $found=1;
                    $storeditem = $item1;
                    $storeditem['qty']+=$qty;
                    $storeditem['price'] = $item->price * $storeditem['qty'];
                    $this->items[$key] = $storeditem;
                }
            }
        }
                if($found==0){
                        $storeditem['qty']+=$qty;
                        $storeditem['price'] = $item->price * $storeditem['qty'];
                        $this->items[$keys] = $storeditem;
                        $this->totalQty++;
                }
                $this->totalPrice+=$item->price;
    }
    public function addVariableItem($item, $id, $qty, $variations){
        $keys=count($this->items)+1;
        $storeditem = ['qty' => 0, 'price' => $item->price, 'item' => $item, 'variations' => $variations, 'product_id' => $id];
        if($this->items){
            // if(array_key_exists($id,$this->items)){
            //     $storeditem = $this->items[$id];
            // }
        }
        $storeditem['qty']+=$qty;
        $storeditem['price'] = $item->price * $storeditem['qty'];
        $this->items[$keys] = $storeditem;
        $this->totalQty++;
        $this->totalPrice+=$item->price;
    }

    public function reduceByOne($id) {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function increaseByOne($id) {
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['price'];

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
