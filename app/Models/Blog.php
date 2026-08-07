<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BlogCategories;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Specify the fillable columns
    protected $fillable = [
        'title',
        'banner',
        'content',
        'category_id',
        'created_by',
        'is_archived',
        'is_deleted',
    ];

    // Specify the dates to handle 'deleted_at' as a date column
    protected $dates = ['deleted_at'];
    
    public function category()
    {
        return $this->belongsTo(BlogCategories::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
