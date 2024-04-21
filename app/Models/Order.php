<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_type',
        'user_id',
        'payment_method',
        'payment_status',
        'sub_total',
        'status',
    ];

    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function primaryAddress() {
        return $this->hasOne(OrderAddress::class)->where('type', 'primary');
    }

    public function secondaryAddress() {
        return $this->hasOne(OrderAddress::class)->where('type', 'secondary');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

}
