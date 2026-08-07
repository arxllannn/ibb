<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->unsignedInteger('position')->nullable()->after('photo');
        });

        // Backfill position from current display order, moving Eric Camehl to last.
        $teams = DB::table('teams')->orderBy('id')->get();
        $rest = $teams->reject(fn ($t) => trim(strtolower($t->name)) === 'eric camehl')->values();
        $last = $teams->first(fn ($t) => trim(strtolower($t->name)) === 'eric camehl');

        $position = 1;
        foreach ($rest as $team) {
            DB::table('teams')->where('id', $team->id)->update(['position' => $position++]);
        }
        if ($last) {
            DB::table('teams')->where('id', $last->id)->update(['position' => $position]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('position');
        });
    }
};
