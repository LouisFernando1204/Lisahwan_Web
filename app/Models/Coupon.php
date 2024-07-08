<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function usercoupon()
    {
        return $this->hasMany(UserCoupon::class, 'coupon_id', 'id');
    }
}
