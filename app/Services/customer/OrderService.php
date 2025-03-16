<?php

namespace App\Services\customer;

use App\Repositories\customer\CartListRepository;
use App\Repositories\customer\OrderRepository;
use LDAP\Result;

class OrderService
{
    protected $repository;
    protected $cartLListRepository;


    public function __construct(OrderRepository $repository, CartListRepository $cartLListRepository)
    {
        $this->repository = $repository;
        $this->cartLListRepository = $cartLListRepository;
    }

    public function indexData()
    {
        return $this->repository->coustomerAll();
    }

    public function storeData()
    {

        if (auth()->check()) {
        
            $datas = $this->cartLListRepository->coustomerAll(); 

            // dd($datas);
    
            foreach ($datas as $item) {
                // Create an order from cart data
              $result =  $this->repository->create([
                    'user_id' => $item->user_id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price * $item->quantity, // Calculate total price
                    'payment_status' => 'paid'
                ]);

                // dd($result);
    
                // Delete the item from the cart after order creation
                $this->cartLListRepository->delete($item->id);
            }
    
            return true; // Success
        } else {
            return false;
        }
    }
    
}