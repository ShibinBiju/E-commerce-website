<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Services\customer\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $service;

    public function __construct(OrderService $service){

        $this->service = $service;
    }

    public function index()
    {

        $orders =  $this->service->indexData();
        return view('customer.index',compact('orders'));
    }

    public function store()
    {
     
        try {
            $result = $this->service->storeData();
    
            return redirect()
                ->route('order.index')
                ->with('success', 'Orders created successfully!');
        } catch (\Exception $e) {
            \Log::error('Category Store Error: ' . $e->getMessage()); // Log the error
    
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }
}
