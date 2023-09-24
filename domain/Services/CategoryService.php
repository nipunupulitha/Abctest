<?php
namespace domain\Services;

use App\Models\Category;
use App\Models\Product;

class CategoryService{
    protected $category, $product;

    public  function __construct()
    {
        $this->category = new Category();
        $this->product = new Product();
    }
    
    public function get($category_id)
    {
       return $this->category->find($category_id);
    }

    public function all()
    {
        return $this->category->all();
    }

    public function store($data)
    {
        $this->category->create($data);
    }

    public function delete($category_id)
    {
     $category = $this->category->find($category_id);
     $category->products()->delete();
     $category->delete();

    }

    public function getProductByCategory($category_id)
    {
        return $this->product->getProductByCategory($category_id);
    }
}