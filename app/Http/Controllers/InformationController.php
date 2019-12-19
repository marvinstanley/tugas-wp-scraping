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
    public function getXML() {
        $fileHandle = fopen(public_path("links.csv"), "r");
        $newsData = array();
        while (($file = fgetcsv($fileHandle, 0, ",")) !== FALSE) {
            $newsData[] = $file;
        }

        $flag = true;
        foreach($newsData as $value) {
            if($flag) {$flag=false; continue;}
            $url = $value[1];
            $contents = array();
            $xml = simplexml_load_file($url);
            for($i = 0; $i < 8; $i++) {
                $content = $xml->channel->item[$i];
                $data = new Information;
                $data->title = $content->title;
                $data->thumbnail = substr($content->description, 10 , strpos($content->description, "\" align=\"left\" hspace=\"7\" width=\"100\" />") - 10 );
                $data->description = substr($content->description, strpos($content->description, "/>")+2 , strlen($content->description)-strpos($content->description,"/>") );
                $data->links = $content->link;
                $data->save();
            }
        }

    }
}
