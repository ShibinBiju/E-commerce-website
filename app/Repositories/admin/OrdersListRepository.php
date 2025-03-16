<?php

namespace App\Repositories\admin;

use App\Models\Order;

class OrdersListRepository

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
}
