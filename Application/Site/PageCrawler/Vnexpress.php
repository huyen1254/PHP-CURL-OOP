<?php

namespace Site\PageCrawler;

use Site\Functions\MatchesData;
//use Site\InterfaceGetData;

class Vnexpress extends MatchesData //implements InterfaceGetData
{
    protected $html;

    public function __construct($html)
    {
        $this->html = $html;
    }

    public function getTitle()
    {
        preg_match("/<title>(.*?)<\/title>/", $this->html, $title);
        return $title[1];
    }
    public function getDate()
    {
        return $this->matchesDate("/<span+\s+class=\"time\sleft\">(.*?)<\/span>/", 1, $this->html);
    }
    public function getContent()
    {
        preg_match_all("/<p class=\"Normal\">\n?(.*?)<\/p>/", $this->html, $content, PREG_SET_ORDER, 0);
        $output = '';
        foreach ($content as $para) {
            $output .= $para[1];
        }
        return $output;
    }

    
}
