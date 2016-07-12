<?php


use Crawler\WebCrawler;

require 'vendor/autoload.php';


$url = "https://www.python.org/";

$crawler = new WebCrawler($url);
$crawler->setLimit(20);
$crawler->crawl();
