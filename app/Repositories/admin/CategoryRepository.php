<?php

namespace App\Repositories\admin;

use App\Models\Category;

class CategoryRepository
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function all()
    {

        return $this->category->all();
    }

    public function create($data)
    {

        return $this->category->create($data);  // Create if no ID is provided
    }

    public function find($id)
    {

        return $this->category->find($id);
    }

    public function update($data, $id){


        return $this->category->findOrFail($id)->update($data);
    }

    public function delete($id){

 
        return $this->category->findOrFail($id)->delete($id);
    }
}
