<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;

class InformationController extends Controller
{
    public function index() {
        // $html = "";
        // $url = "http://rss.detik.com/index.php/detikcom_nasional";
        // $contents = array();
        // $xml = simplexml_load_file($url);
        // for($i = 0; $i < 8; $i++) {
        //     $contents[] = $xml->channel->item[$i];
        // }

        $data = Information::orderBy('created_at', 'desc')->paginate(8);
        return view('welcome', [
            'contents' => $data,
        ]);
    }
}
