<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentManage extends Model
{
    use HasFactory;

    protected $table = "payment_manages";

    protected $fillable = ['user_id', 'hall_manage_id', 'booking_manage_id', 'payment_type', 'status'];


    public function bookingmanage()
{
    return $this->belongsTo(BookingManage::class);
}
}
