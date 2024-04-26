<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStasus extends Model
{
    use HasFactory;

    protected $table = 'order_statuses';
    protected $fillble = ['status'];
}
