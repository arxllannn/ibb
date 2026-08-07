<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogCategories;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Become a Business Owner',
            'Business Broker Why & How',
            'Buyers Articles',
            'Listings',
            'Sellers Articles',
            'Uncategorized',
            'Videos',
            'Visa/Immigration',
        ];

        foreach ($categories as $category) {
            BlogCategories::create(['name' => $category]);
        }



        $data = $this->importExcel();

        
        DB::table('blogs')->insert($data);



    }


    private function importExcel()
    {
        // For simplicity, using hardcoded path here. In practice, this would be dynamically fetched from the request.
        $path = storage_path('app/public/blogs.xlsx'); // Replace with your file path
    
        // Load the uploaded Excel file
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();
    
        // Initialize an array to store the data
        $data = [];
        $rowIndex = 0;
    
        // Loop through the rows of the sheet
        foreach ($sheet->getRowIterator() as $row) {
            if ($rowIndex == 0) {
                // Skip the header row (first row)
                $rowIndex++;
                continue;
            }
    
            $rowData = [];
            foreach ($row->getCellIterator() as $cell) {
                $rowData[] = $cell->getValue();
            }
    
            // Handle date conversion with validation
            $publishedDate = null;
            $dateString = $rowData[1]; // Assuming the date is the 2nd column
    
            // Check for "No Date Found" or invalid date values
            if (strtolower($dateString) !== 'no date found' && !empty($dateString)) {
                try {
                    // Try parsing the valid date string
                    $publishedDate = Carbon::parse($dateString)->format('Y-m-d H:i:s');
                } catch (\Exception $e) {
                    // If date parsing fails, set to current date in the required format
                    $publishedDate = Carbon::now()->format('Y-m-d H:i:s');
                }
            } else {
                // If "No Date Found" or empty, set default date to current date in required format
                $publishedDate = Carbon::now()->format('Y-m-d H:i:s');
            }
    
            // Map the row data to the required structure
            $data[] = [
                'title' => $rowData[0],           // Assuming title is the first column
                'content' => $rowData[2],         // Content is the 3rd column
                'category_id' => (int) $rowData[3], // Cast category_id to integer (4th column)
                'created_by' => 1,                // Set created_by to 1
                'is_archived' => 0,               // Default is_archived value
                'created_at' => $publishedDate,   // Set formatted published date
                'updated_at' => $publishedDate,   // Set updated_at to the same value
            ];
        }
    
        return $data; // Return the data for insertion
    }
}
