<?php

namespace App\Repositories\customer;

use App\Models\Order;

class OrderRepository
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function categories()
    {

        return $this->order->all();
    }
    public function all()
    {

        return $this->order->all();
    }

    public function create($data)
    {

        return $this->order->create($data);  // Create if no ID is provided
    }

    public function find($id)
    {

        return $this->order->find($id);
    }

    public function update($data, $id)
    {

        return $this->order->findOrFail($id)->update($data);
    }

    public function delete($id)
    {

        return $this->order->findOrFail($id)->delete($id);
    }


    public function coustomerAll()
    {

        return $this->order->where('user_id', auth()->id())->get();
    }

    public function total()
    {

        return $this->order->sum(DB::raw('price * quantity'));
    }
}
