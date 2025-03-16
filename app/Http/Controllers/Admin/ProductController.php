<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Product\StoreRequest;
use App\Http\Requests\admin\Product\UpdateRequest;
use App\Services\admin\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service){

        $this->service = $service;
    }

    public function index()
    {
        $products = $this->service->indexData();
        return view('admin.product.index', compact('products'));
    }

    public function create(){

        $categories = $this->service->categoryData();
        return view('admin.product.create', compact('categories'));   
     }

     public function store(StoreRequest $request)
     {
         try {
             $this->service->storeData($request->validated());
     
             return redirect()
                 ->route('product.index')
                 ->with('success', 'Category created successfully!');
         } catch (\Exception $e) {
             \Log::error('Category Store Error: ' . $e->getMessage()); // Log the error
     
             return redirect()->back()->with('error', 'Something went wrong! Please try again.');
         }
     }

     public function edit($id){

        $product = $this->service->editData($id);
        $categories = $this->service->categoryData();
        return view('admin.product.edit', compact('product','categories'));
        
    }

    public function update(UpdateRequest $updateRequest, $id){

        try {
            $result = $this->service->updateData($updateRequest->validated(), $id);
    
            if ($result) {
                return redirect()->route('product.index')->with('success', 'Product updated successfully');
            } else {
                return redirect()->back()->with('error', 'Error occurred while updating!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $result = $this->service->deleteData($id);
    
            return $result
                ? redirect()->route('product.index')->with('success', 'Category deleted successfully!')
                : redirect()->back()->with('error', 'Failed to delete the category.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }




}
