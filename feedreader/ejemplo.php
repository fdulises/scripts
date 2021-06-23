<?php

namespace wecor;

date_default_timezone_set( 'America/Mexico_City' );

require 'HttpConnection.php';
require 'rssReader.php';

//$rss = new rssReader ("http://jkanime.net/feed/");
$rss = new rssReader ("https://www.taringa.net/rss/home/ultimos-posts/");
//$rss = new rssReader ("http://cdemo.debred.com/rss");
foreach($rss->get_items() as $item){
	echo($item->title."<br />");
	echo(date('d/m/Y H:i:s', strtotime($item->pupdate))."<br />");
	echo($item->url."<br />");
	echo("<hr><br />");
}