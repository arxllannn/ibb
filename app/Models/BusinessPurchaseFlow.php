<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessPurchaseFlow extends Model
{
    use HasFactory;
    protected $table='business_purchase_flow';
    protected $fillable = [
        'content',
        'step_name',
        'video_url',
    ];
}
