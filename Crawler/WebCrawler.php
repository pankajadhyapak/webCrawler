<?php

namespace Crawler;


use Exception;

class WebCrawler
{

    protected $url;
    /*
     * Number of times the
     * crawler must recurse
    */
    protected $depth = -1;

    /*
     * Number of times the
     * crawler must recurse
     */
    protected $linksLimit = -1;

    /*
     * variable storing each crawler/Request object
     *
     * @access private
     */
    private $webPages = array();

    /**
     * WebCrawler constructor.
     * @param $url
     */
    public function __construct($url)
    {
        if(substr($url, -1) == "/"){
            $this->url = rtrim($url, "/");
        }else{
            $this->url = $url;
        }
    }

    public function setLimit($limit){
        if(!is_numeric($limit))
            throw new Exception("Links Allowed needs to be Numeric");
        $this->linksLimit = $limit;
    }

    public function crawl()
    {

        $parser = new ParseWebPage($this->url);

        foreach ($parser->getLinks() as $url) {


            $parsedUrl = explode("/#", $url)[0];

            if(substr($parsedUrl, -1) == "/"){
                $parsedUrl = rtrim($parsedUrl, "/");
            }
            $webPage = new WebPage($parsedUrl);

            $explodedArray = explode("/", $parsedUrl);
            if($this->checkLimit() && $parsedUrl != $this->url
                && !in_array($parsedUrl, $this->getWebPages())
                && end($explodedArray) != "javascript:;"
            ){
                $this->setWebPages($webPage->getUrl());
                echo ($parsedUrl)."<br/>";
            }
        }
    }

    /*
    * @return webPage
    */
    public function getWebPages(){
        return $this->webPages;
    }

    protected function setWebPages($WebPage){
        $this->webPages[$WebPage] = $WebPage;
    }

    private function checkLimit()
    {
        return $this->linksLimit == -1 ? true : sizeof($this->webPages) < $this->linksLimit;
    }

}