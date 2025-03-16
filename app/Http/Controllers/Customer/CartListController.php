<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Services\customer\CartListService;
use Illuminate\Http\Request;

class CartListController extends Controller
{
    protected $service;

    public function __construct(CartListService $service){

        $this->service = $service;
    }

    public function index()
    {
        $cartList = $this->service->indexData();
        $totalAmount = $this->service->totalAmount();
        return view('customer.cart-list.index', compact('cartList','totalAmount'));
    }

    public function store(Request $request)
    {
        try {
            $result = $this->service->storeData($request);
    
            if ($result) {
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('cartList.index')
                ]);
            } else {
                return response()->json([
                    'success' => false,  
                    'message' => 'User not registered.',
                    'redirect_url' => route('register')
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Store Error: ' . $e->getMessage()); 
    
            return response()->json([
                'success' => false, 
                'message' => 'Something went wrong! Please try again.',
            ], 500); 
        }

        
    }

    public function delete($id) {
        try {
            $result = $this->service->deleteData($id);
    
            return $result
                ? redirect()->route('cartList.index')->with('success', 'Category deleted successfully!')
                : redirect()->back()->with('error', 'Failed to delete the category.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }

    
}
