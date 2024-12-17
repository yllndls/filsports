<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\Rider;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'product_id',
        'rider_id',
        'status',
        'quantity',
        'total_amount'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'completed_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if ($order->product && $order->quantity) {
                $order->total_amount = $order->product->category->price * $order->quantity;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function rider()
    {
        return $this->belongsTo(Rider::class);
    }
}
