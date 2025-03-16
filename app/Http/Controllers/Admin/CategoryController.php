<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\category\StoreRequest;
use App\Http\Requests\admin\category\UpdateRequest;
use App\Services\admin\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService){

        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('admin.category.index', ['categories' => $this->categoryService->indexData()]);
    }
    

    public function create(){

        return view('admin.category.create');
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->categoryService->storeData($request->validated());
    
            return redirect()
                ->route('category.index')
                ->with('success', 'Category created successfully!');
        } catch (\Exception $e) {
            \Log::error('Category Store Error: ' . $e->getMessage()); // Log the error
    
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }
    

    public function edit($id){

        $category = $this->categoryService->editData($id);
        return view('admin.category.edit', compact('category'));
        
    }

    public function update(UpdateRequest $updateRequest, $id){


        try {
            $result = $this->categoryService->updateData($updateRequest->validated(), $id);
    
            if ($result) {
                return redirect()->route('category.index')->with('success', 'Category updated successfully');
            } else {
                return redirect()->back()->with('error', 'Error occurred while updating!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $result = $this->categoryService->deleteData($id);
    
            return $result
                ? redirect()->route('category.index')->with('success', 'Category deleted successfully!')
                : redirect()->back()->with('error', 'Failed to delete the category.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }


}
