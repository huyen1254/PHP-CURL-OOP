<?php

namespace Controllers;

use core\Controller;
use Site\PagesFactory;

class FactoryController extends Controller
{
    public function getFactory($dataPage, PagesFactory $page)
    {
        $keyPage = array(
            'vnexpress', 'vietnamnet', 'dantri'
        );
       
        foreach ($keyPage as $param) {
            // Searches if dataPage  for a match to the regular expression given in param
            if (preg_match("/$param/", $dataPage['host'])) {
                $page->html = $dataPage['html'];
                $website = $page->makeWebsite($param);
                $title = $website->getTitle();
                $date = $website->getDate();
                $content = $website->getContent();
            }
        }
        //echo du lieu
        echo '<h2> ' . $title . '</h2> ' . $date  . $content;

    }
    //do addPage() in model/model.php
    public function addToTheDatabase($data)
    {
        $this->model->addPage($data['path'], $data['host'], $data['title'], $data['content'], $data['date']);
    }
}
