<?php

namespace App\Services\admin;

use App\Repositories\admin\OrdersListRepository;
use App\Repositories\admin\ProductRepository;

class OrdersListService
{
    protected $repository;


    public function __construct(OrdersListRepository $repository)
    {
        $this->repository = $repository;

    }

    public function indexData()
    {
        return $this->repository->all();
    }

    public function editData($id)
    {

        return $this->repository->find($id);
    }

    public function updateData($data, $id)
    {
        return $this->repository->update($data, $id);
    }

}