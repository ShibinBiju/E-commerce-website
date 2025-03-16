<?php

namespace App\Repositories\customer;

use App\Models\CartItem;
use Illuminate\Support\Facades\DB;

class CartListRepository

{
    protected $cartItem;

    public function __construct(CartItem $cartItem)
    {
        $this->cartItem = $cartItem;
    }

    public function categories()
    {

        return $this->cartItem->all();
    }
    public function all()
    {

        return $this->cartItem->all();
    }

    public function create($data)
    {

        return $this->cartItem->create($data);  // Create if no ID is provided
    }

    public function find($id)
    {

        return $this->cartItem->find($id);
    }

    public function update($data, $id)
    {

        return $this->cartItem->findOrFail($id)->update($data);
    }

    public function delete($id)
    {

        return $this->cartItem->findOrFail($id)->delete($id);
    }


    public function coustomerAll(){

        return $this->cartItem->where('user_id', auth()->id())->get();
    
    }

    public function total(){

        return $this->cartItem->sum(DB::raw('price * quantity'));   
     }
}