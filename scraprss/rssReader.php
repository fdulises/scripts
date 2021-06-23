<?php
namespace wecor;
class rssReader {
	private $xml;
	private $data;
	public function __construct($url){
		$http = new HttpConnection();
		$http->setCookiePath("/cookies");
		$http->init();
		$this->xml = $http->get($url);
		$http->close();
	}
	public function get_items(){
		preg_match_all("/<item .*>.*<\/item>/xsmUi", $this->xml, $matches);
		$items = array();
		foreach($matches[0] as $match){
			$items[] = new RssItem ($match);
		}
		return $items;
	}
}
class RssItem {
	private $data;
	public function __construct($xml){
		$this->populate ($xml);
	}
	public function populate ($xml){
		preg_match ("/<title> (.*) <\/title>/xsmUi", $xml, $matches);
		$this->data['title'] = $matches[1];
		preg_match ("/<link> (.*) <\/link>/xsmUi", $xml, $matches);
		$this->data['url'] = $matches[1];
		preg_match ("/<description> (.*) <\/description>/xsmUi", $xml, $matches);
		$this->data['description'] = $matches[1];
		preg_match ("/<(updated|pubdate|lastBuildDate)>(.*?)<\/(updated|pubdate|lastBuildDate)>/is", $xml, $matches);
		$this->data['pupdate'] = $matches[2];
	}
	public function __get($name){
		if( isset($this->data[$name]) ) return $this->data[$name];
		return null;
	}
}