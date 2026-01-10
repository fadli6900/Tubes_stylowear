<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status',
        'payment_method',
        'address',
    ];

    /**
     * Order punya banyak item
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Order punya satu Payment
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * Order dimiliki oleh satu User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
