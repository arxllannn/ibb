<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title');
        });

        $usedSlugs = [];

        DB::table('blogs')->orderBy('id')->select('id', 'title')->each(function ($blog) use (&$usedSlugs) {
            $base = Str::slug($blog->title) ?: 'post';
            $slug = $base;
            $i = 2;

            while (in_array($slug, $usedSlugs) || DB::table('blogs')->where('slug', $slug)->exists()) {
                $slug = $base . '-' . $i;
                $i++;
            }

            $usedSlugs[] = $slug;

            DB::table('blogs')->where('id', $blog->id)->update(['slug' => $slug]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
