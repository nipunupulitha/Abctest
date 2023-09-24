<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'category_id' ,
    ];
    
    public function getProductByCategory($category_id)
    {
        return $this->where('category_id' , $category_id)->get();
    }
}
