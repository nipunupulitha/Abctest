<?php
namespace domain\Services;

use App\Models\Product;

class ProductService{
    protected $product;

    public  function __construct()
    {
        $this->product = new Product();
    }
    
    public function get($product_id)
    {
       return $this->product->find($product_id);
    }

    public function all()
    {
        return $this->product->all();
    }

    public function store($data)
    {
        $this->product->create($data);
    }

    public function delete($product_id)
    {
     $product = $this->product->find($product_id);
     $product->delete();

    }
    public function update(array $data, $product_id)
    {
        $product = $this->product->find($product_id);

        if ($product) {
            $product->update($data);
        }
    }
    public function edit( $product_id)
    {   
       return  $this->product->find($product_id);
    }
}