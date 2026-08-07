
<?php

use Carbon\Carbon;
use App\Models\Content;
use App\Models\Intro;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;
use Illuminate\Http\Request;

if (!function_exists('timeElapsedString')) {
    /**
     * Calculate the time elapsed from a given date to now.
     *
     * @param  \Carbon\Carbon|string  $createdAt
     * @return string
     */
    function timeElapsedString($createdAt)
    {
        // Ensure $createdAt is a Carbon instance
        $createdAt = Carbon::parse($createdAt);
        
        // Debug: Print the created at time and the current time
        // \Log::info('Created At: ' . $createdAt);
        // \Log::info('Current Time: ' . Carbon::now($createdAt->timezone));

        // Get the current time in the same time zone
        $now = Carbon::now($createdAt->timezone);

        // Calculate difference in seconds
        $diffInSeconds = $now->diffInSeconds($createdAt);

        if ($diffInSeconds < 60) {
            return $diffInSeconds . ' seconds ago';
        }

        $diffInMinutes = $now->diffInMinutes($createdAt);
        if ($diffInMinutes < 60) {
            return $diffInMinutes . ' minutes ago';
        }

        $diffInHours = $now->diffInHours($createdAt);
        if ($diffInHours < 24) {
            return $diffInHours . ' hours ago';
        }

        $diffInDays = $now->diffInDays($createdAt);
        if ($diffInDays < 7) {
            return $diffInDays . ' days ago';
        }

        $diffInWeeks = $now->diffInWeeks($createdAt);
        if ($diffInWeeks < 4) {
            return $diffInWeeks . ' weeks ago';
        }

        $diffInMonths = $now->diffInMonths($createdAt);
        if ($diffInMonths < 12) {
            return $diffInMonths . ' months ago';
        }

        $diffInYears = $now->diffInYears($createdAt);
        return $diffInYears . ' years ago';
    }
}
function get_social_links($icon)
{
    // Fetch URL based on 'value' which could be the icon name
    $url = Content::where('title', $icon)->pluck('value')->first();

    // If no URL is found, return an empty string or fallback URL
    return $url ? $url : '#';
}

function get_service_intro($service_name){
    $intro=Intro::where('service_name',$service_name)->first();
    return $intro->intro;
}


