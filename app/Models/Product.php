<?php

namespace App\Models;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, ElasticquentTrait; // add SoftDeletes & add ElasticquentTrait vào model Product với mục đích sử dụng các hàm dc hỗ trong SoftDeletes và ElasticquentTrait

    public $fillable = ['name','description'];

    // tạo quan hệ CSDL giữa bảng sản phẩn và danh mục
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
