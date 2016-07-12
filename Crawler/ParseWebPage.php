<?php

namespace Crawler;


class ParseWebPage
{
    private $content;

    private $url;

    /**
     * WebPageContents constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getWebContent()
    {
        $ctx = stream_context_create(
            array(
                'http'=>array(
                    'header'=>"Content-type: application/x-www-form-urlencoded",
                )
            )
        );

        $HTML = file_get_contents($this->url,0,$ctx);
        $doc = new \DOMDocument();
        @$doc->loadHTML($HTML);
        return $doc;
    }

    public function getLinks()
    {
        $doc = $this->getWebContent();

        $links = array();
        foreach ($doc->getElementsByTagName('a') as $element) {
            if ($element->hasAttribute('href')) {
                $link = $element->getAttribute('href');

                if(substr($link, -1) == "/"){
                    $link = rtrim($link, "/");
                }
                if(substr($link, 0,1) == "/"){
                    $link = substr($link, 1);
                }

                //var_dump(substr($link, 0,1));

                if(strpos($link, 'http') === false){
                    $link = $this->url.'/'.$link;
                }else{
                    $link = $link;
                }

                $links[] = $link;
            }
        }
        return $links;
    }
}