<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // tạo quan hệ CSDL giữa bảng sản phẩn và danh mục
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
