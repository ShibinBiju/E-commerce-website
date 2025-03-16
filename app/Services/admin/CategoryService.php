<?php

namespace App\Services\admin;

use App\Repositories\admin\CategoryRepository;

class CategoryService
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    
    public function indexData(){

        return $this->categoryRepository->all();
    }

    public function storeData($data){

        return $this->categoryRepository->create($data);
    }

    public function editData($id){

        return $this->categoryRepository->find($id);
    }

    public function updateData($data , $id)  {
        
         return $this->categoryRepository->update($data, $id);
    }

    public function deleteData($id){

        return $this->categoryRepository->delete($id);
    }
}