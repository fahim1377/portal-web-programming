<?php
/**
 * Created by PhpStorm.
 * User: Fahim
 * Date: 6/29/2020
 * Time: 10:13 AM
 */

namespace App\Providers;


use Illuminate\Support\Facades\Config;
use phpDocumentor\Reflection\Types\Null_;

class Cart
{
    public $items = null;
    public $total_unit = 0;
    public $total_number = 0;

    public function __construct($cart)
    {
        if($cart){
            $this->items = $cart->items;
            $this->total_unit = $cart->total_unit;
            $this->total_number = $cart->total_number;
        }
    }

    public function add($item,$id){
        $stored_item = ['unit' => $item->unit_no, 'number' => 0,'item' => $item];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                return 'already exists';
            }
        }
        $stored_item['number']++;
        if($this->total_unit + $stored_item['unit'] <= Config::get('constants.max_units')) {
            $this->items[$id] = $stored_item;
            $this->total_unit = $this->total_unit + $stored_item['unit'];
            $this->total_number++;
            return 'ok';
        }
        return 'total_units_err';
    }

}