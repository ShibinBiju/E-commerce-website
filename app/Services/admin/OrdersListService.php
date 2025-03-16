<?php

namespace App\Services\admin;

use App\Repositories\admin\ProductRepository;

class OrdersListService
{
    protected $repository;


    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;

    }

    public function indexData()
    {
        return $this->repository->all();
    }
}