<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;
class Product extends Model
{
    use HasFactory, SoftDeletes;

        protected $fillable = [
            'name',
            'category_id',
            'photo',
            'quantity'
        ];

        public function category()
        {
            return $this->belongsTo(Category::class);
        }
        public function order(){
            return $this->hasMany(Order::class);
        }

}
