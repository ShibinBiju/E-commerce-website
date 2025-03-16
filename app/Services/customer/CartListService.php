<?php

namespace App\Services\customer;

use App\Models\CartItem;
use App\Repositories\customer\CartListRepository;

class CartListService

{

    protected $repository;


    public function __construct(CartListRepository $repository)
    {
        $this->repository = $repository;
    }
    public function totalAmount()
    {
        return $this->repository->total();
    }

    public function indexData()
    {
        return $this->repository->coustomerAll();
    }

    public function storeData($data)
    {
        if(auth()->check()){
            return $this->repository->create($data->input()); // Save the data to the repository

        }else{
            return false;
        } 
    }

    public function deleteData($id){

        return $this->repository->delete($id);
    }
}
