<?php

namespace App\Repositories\guest;

use App\Models\Product;

class ControllerRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function categories()
    {

        return $this->product->all();
    }
    public function all()
    {

        return $this->product->all();
    }

    public function create($data)
    {

        return $this->product->create($data);  // Create if no ID is provided
    }

    public function find($id)
    {

        return $this->product->find($id);
    }

    public function update($data, $id)
    {


        return $this->product->findOrFail($id)->update($data);
    }

    public function delete($id)
    {


        return $this->product->findOrFail($id)->delete($id);
    }
}