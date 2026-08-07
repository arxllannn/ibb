<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessEvaluation extends Model
{
    use HasFactory;
    protected $table="evalute_business";
    protected $fillable = [
        'heading',
        'content',
    ];

}
