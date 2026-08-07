<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents=[
            [
                'page_name' => 'contact-us',
                'title' => 'Heading One',
                'value' => "HEADING ONE IS TEST",
                
            ],
            [
                'page_name' => 'contact-us',
                'title' => 'Heading Two',
                'value' => "HEADING Two",
                
            ],
            [
                'page_name' => 'contact-us',
                'title' => 'Our Location',
                'value' => "HEADING three IS TEST",
                
            ],
            [
                'page_name' => 'contact-us',
                'title' => 'Phone',
                'value' => "HEADING Four IS TEST",
                
            ],
            [
                'page_name' => 'contact-us',
                'title' => 'Email',
                'value' => "test@domain.com",
                
            ],



//HOME PAGE CONTENT
            [
                'page_name' => 'Home',
                'title' => 'Heading 1',
                'value' => "THINKING OF SELLING OR BUYING BUSINESS?",
                'type'=>'Heading',
                
            ],
            [
                'page_name' => 'Home',
                'title' => 'Para one',
                'value' => "we specialize in helping entrepreneurs navigate the complex world of buying and selling businesses. With expert guidance, personalized support, and a deep understanding of the market, we ensure a seamless experience for both buyers and sellers. Whether you’re looking to evaluate your business, explore new ventures, or access visa and franchise opportunities, we are dedicated to your success.",
                'type'=>'Para',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Heading Two',
                'value' => "The Selling Process",
                'type'=>'Heading',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Para 2',
                'value' => "Our team of highly trained brokers have the same digital backgrounds as our clients do. So, they understand what business owners need when looking to professionals to help them sell their company. When you work with our team, you work with the World’s Best and can expect nothing less than world class service and performance. Selling a company isn’t like selling a house or other asset; a lot can happen during the Merger & Acquisition process and working with the wrong brokerage team can leave your business unsold, or worse, millions left on the table. Our process is 100% Success Based. This means that we run the entire sales process from beginning to end, never taking a fee until we have Closed your Transaction. With an over 90% close rate, we’re confident in our ability to close, so we see no reason for upfront fees.",
                'type'=>'Para',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Title One',
                'value' => "Own A Franchise",
                'type'=>'Heading',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Para 3',
                'value' => "There are many opportunities to own and operate a franchise . We have dozens of existing franchise units listed for sale: restaurants, sub sandwich, health club, janitorial, automotive and many other categories",
                'type'=>'Para',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Title 2',
                'value' => "Business Evaluation",
                'type'=>'Heading',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Para 4',
                'value' => "Are you familiar with every factor that should be considered when determining a list price? Our experienced brokers can help you set a fair market price that reflects the complete worth of your assets",
                'type'=>'Para',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Title 3',
                'value' => "Visa Services",
                'type'=>'Heading',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Para 5',
                'value' => "We are affiliated with some local immigration attorneys to acquire U.S. immigration status regardless of where you are from.We have helped many foreign nationals to immigrate to the U.S by purchasing a U.S business.",
                'type'=>'Para',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Title 4',
                'value' => "Buy or Sell A Business",
                'type'=>'Heading',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Para 6',
                'value' => "We provide guidance for the buying or selling of a business. We save our clients time and money by providing substantive consulting all in one place.",
                'type'=>'Para',
            ],

            [
                'page_name' => 'Home',
                'title' => 'Title 5',
                'value' => "Business Acquisition",
                'type'=>'Heading',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Para 7',
                'value' => "Our advisors will help you get the best possible price for your business while taking the lead on getting your business sold.",
                'type'=>'Para',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Heading 4',
                'value' => "WE MAXIMIZE VALUE",
                'type'=>'Heading',
            ],
            [
                'page_name' => 'Home',
                'title' => 'Para 8',
                'value' => "If your retirement plans include selling the company, then Infinity Business Brokers Process for maximizing value is designed to achieve the best price, terms, and tax treatment while minimizing your risks. In addition to business valuation, we develop a comprehensive marketing package for your company so we can present it confidentially and in the best possible light to potential buyers",
                'type'=>'Para',
            ],

            //Social ICONS
            [
                'page_name' => 'Social',
                'title' => 'facebook',
                'value' => "https://facebook.com/people/Infinity-Business-Brokers/100057664291082/",
                
            ],
            [
                'page_name' => 'Social',
                'title' => 'twitter',
                'value' => "https://twitter.com",
                
            ],
            [
                'page_name' => 'Social',
                'title' => 'google',
                'value' => "https://google.com",
                
            ],
            [
                'page_name' => 'Social',
                'title' => 'linkedin',
                'value' => "https://linkedin.com",
                
            ],


            
        ];

        foreach ($contents as $content) {
            $content = Content::create($content);
        }
    }
}
