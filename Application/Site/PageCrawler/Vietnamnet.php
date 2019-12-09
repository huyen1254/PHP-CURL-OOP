<?php

namespace Site\PageCrawler;

use Site\Functions\MatchesData;
use Site\InterfaceGetData;

class Vietnamnet extends MatchesData implements InterfaceGetData
{
    private $html;

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
        return $this->matchesDate("/<p class=\"time-zone\">(.*?)+(\n|\r)?\s+<\/p>/", 0, $this->html);
    }
   
    function getContent()
    {
        return $this->matchesContent("/<div id=\"ArticleContent\" class=\"ArticleContent\">(.*?)<div class=\"inner-article\">/s", "/<p>(.*?)<\/p>/s", $this->html);
    }
}
