<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSaleFlow extends Model
{
    use HasFactory;
    protected $table='business_sale_flow';
    protected $fillable = [
        'content',
        'step_name',
        'video_url',
    ];
}
