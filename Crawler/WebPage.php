<?php
/**
 * Created by PhpStorm.
 * User: pankaj
 * Date: 07/07/16
 * Time: 3:42 PM
 */

namespace Crawler;


class WebPage
{
    private $url;

    public function __construct($url){
        $this->setUrl($url);
    }

    /*
     * @param string $link
     */
    public function getUrl(){
        return $this->url;
    }

    /*
     * Validate the URl and sets the
     * property of it.
     *
     * @param bool
     */
    private function setUrl($url){
        if(filter_var($url, FILTER_VALIDATE_URL)
            && preg_match("/https?:\/\/\w+/", $url)
            && $url != null){
            $this->url = $url;
            return true;
        }
        else{
            return false;
        }
    }
}