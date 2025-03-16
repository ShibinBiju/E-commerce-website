<?php

namespace App\Services\guest;

use App\Repositories\admin\ProductRepository;
use Illuminate\Support\Facades\Auth;

class ControllerService
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

    public function dashboardView(){
        
        return view((Auth::user()->role == 'admin') ? 'admin.index' : 'customer.index');
    }
    
    
}