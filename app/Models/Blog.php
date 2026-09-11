<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\BlogCategories;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Specify the fillable columns
    protected $fillable = [
        'title',
        'slug',
        'banner',
        'content',
        'category_id',
        'created_by',
        'is_archived',
        'is_deleted',
    ];

    // Specify the dates to handle 'deleted_at' as a date column
    protected $dates = ['deleted_at'];

    // Use the slug for route generation (e.g. route('blog-single', $blog))
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Build a unique slug from $source, ignoring $ignoreId (the record being updated), including trashed posts
    public static function generateUniqueSlug(string $source, ?int $ignoreId = null): string
    {
        $base = Str::slug($source) ?: 'post';
        $slug = $base;
        $i = 2;

        while (
            static::withTrashed()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }

    public function category()
    {
        return $this->belongsTo(BlogCategories::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
