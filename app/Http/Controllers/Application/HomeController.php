<?php

namespace App\Http\Controllers\Application;

use App\Article;
use App\Base\Controllers\ApplicationController;
use App\Setting;
use SimpleXMLElement;
use Illuminate\Support\Facades\Config;

class HomeController extends ApplicationController
{
    /**
     * Show the application homepage to the user.
     *
     * @return Response
     */
    public function index()
    {
        $articles = $this->language->articles()->published()->orderBy('published_at', 'desc')->paginate(5);
        return view('application.home.index', compact('articles'));
    }

    public function login(){
        return view('application.home.login');
    }

    public function games(){
        $url = Config::get('components.xml');
        return view('application.home.games', compact('url'));
    }

    public function xml($string)
    {
        if ($string) {
            $xml = @simplexml_load_string($string, 'SimpleXMLElement', LIBXML_NOCDATA);
            if (!$xml)
                throw new ParserException('Failed To Parse XML');
            return json_decode(json_encode((array)$xml), 1);   // Work arround to accept xml input
        }
        return array();
    }

    public function Parse($url) {

        $fileContents= file_get_contents($url);

        $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);

        $fileContents = trim(str_replace('"', "'", $fileContents));

        $simpleXml = simplexml_load_string($fileContents);

        $json = json_encode($simpleXml);

        return $json;

    }

}
