<?php

namespace wecor;

date_default_timezone_set( 'America/Mexico_City' );

require 'HttpConnection.php';
require 'rssReader.php';
require 'webscrap.php';

if( isset($_GET['url']) ){
	$result = new webscrap($_GET['url']);
		
	echo "<h1>{$result->title}</h1>";
	echo "<p><img src='{$result->cover}'></p>";
	echo "<hr>";
	echo $result->html;
}else{
	$rss = new rssReader ("http://jkanime.net/feed/");
	//$rss = new rssReader ("https://www.taringa.net/rss/home/ultimos-posts/");
	//$rss = new rssReader ("http://cdemo.debred.com/rss");
	foreach($rss->get_items() as $item){
		echo($item->title."<br />");
		echo(date('d/m/Y H:i:s', strtotime($item->pupdate))."<br />");
		echo($item->url."<br />");
		
		echo "<a href='?url=".rawurlencode($item->url)."'>Ver</a><br />";
		echo("<hr><br />");
	}
}