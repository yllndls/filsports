<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;
class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'cover_photo',
        'price'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
