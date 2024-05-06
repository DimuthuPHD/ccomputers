<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewPoint extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'product_id', 'review_id', 'value', 'notes', 'is_used'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
