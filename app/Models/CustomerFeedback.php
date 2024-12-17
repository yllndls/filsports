<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerFeedback extends Model
{
    protected $table = 'customer_feedbacks';

    protected $fillable = ['user_id', 'feedback', 'rating', 'is_approved'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
