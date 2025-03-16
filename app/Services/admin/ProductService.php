<?php

namespace App\Services\admin;

use App\Repositories\admin\CategoryRepository;
use App\Repositories\admin\ProductRepository;

class ProductService
{
    protected $repository;
    protected $categoryRepository;

    public function __construct(ProductRepository $repository, CategoryRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    public function indexData()
    {

        return $this->repository->all();
    }
    public function categoryData()
    {

        return $this->categoryRepository->all();
    }

    public function storeData($data)
    {
        // Check if image exists in the data array
        if (isset($data['image']) && $data['image']) {
            // Generate a random name for the image
            $imageName = rand(100000, 999999) . '.' . $data['image']->getClientOriginalExtension();
            // Store the image in the 'products' folder within the storage
            $path = $data['image']->storeAs('products', $imageName, 'public');
            // Append the image path to the data array
            $data['image'] = $path;
        }


        return $this->repository->create($data); // Save the data to the repository
    }

    public function editData($id)
    {

        return $this->repository->find($id);
    }

    public function updateData($data, $id)
    {

        // Check if image exists in the data array
        if (isset($data['image']) && $data['image']) {
            // Generate a random name for the image
            $imageName = rand(100000, 999999) . '.' . $data['image']->getClientOriginalExtension();
            // Store the image in the 'products' folder within the storage
            $path = $data['image']->storeAs('products', $imageName, 'public');
            // Append the image path to the data array
            $data['image'] = $path;
        }

        return $this->categoryRepository->update($data, $id);
    }
}
