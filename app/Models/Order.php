<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'price',
    ];

    protected $primaryKey = 'order_id';

    public $timestamps = false;

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function items(){
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }
}
