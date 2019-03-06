<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

include_once base_path('app/Services/simple_html_dom.php');

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $html = file_get_html('https://www.amazon.com/Apple-iPhone-Plus-Unlocked-32GB/dp/B01N6ZAR0D/ref=br_asw_pdt-2?pf_rd_m=ATVPDKIKX0DER&pf_rd_s=&pf_rd_r=QKDATQ2D0BDSP178NWFK&pf_rd_t=36701&pf_rd_p=74c2af8b-5acb-4bf8-b252-8b1584c94b14&pf_rd_i=desktop');
//        $html = file_get_html('https://www.amazon.com/Love-Lemons-Womens-Temecula-Dress/dp/B01BCA0C68/ref=lp_18665827011_1_1?srs=18665827011&ie=UTF8&qid=1550071047&sr=8-1');
        $html = file_get_html('https://www.amazon.com/gp/site-directory?ref_=nav_shopall_btn');
//        dd($html);
//        $title = $html->find('#offer-titlebox')[0]->plaintext;
//        dd($title);
        $title = $html->find('#productTitle')[0]->plaintext ?? 'not title';
        $title_menu = $html->find('#fullStoreHeading')[0]->plaintext ?? 'not title_menu';

        $links = $html->find('.fsdFullWidthImage a.a-link-normal');
        foreach ($links as $link) {
//            if (empty($link->attr['title'])) {
//                dd($link->getAllAttributes());
//            }
            $title = $link->attr['title'] ?? 'empty';
            echo "<a href='https://www.amazon.com{$link->attr['href']}' target='_blank'>{$title}</a><br>";
        }
//        $divs = [];
//        for ($i = 1; $i <count($html->find('div.fsdDeptBox')); $i++) {
//            $divs[] = $html->find('div.fsdDeptBox')[$i]->plaintext ?? 'not div';
//        }
//        foreach ($divs as $div ){
//            echo $div . '<br><br>';
//        }

        $image = $html->find('#imgTagWrapperId > img')[0]->src ?? 'not image';
//        $image = $html->find('#fleft > img')[0]->src;
        $description = $html->find('#renewedProgramDescriptionAtf_feature_div')[0]->plaintext ?? 'not description ';
        echo $title . '<br/>';
        echo $title_menu . '<br/>';
//        echo $div. '<br/><br/>';
        echo "<img src='{$image}'/><br/>";
        echo $description . '<br/>';
        exit;
        return view('home');
    }
}
