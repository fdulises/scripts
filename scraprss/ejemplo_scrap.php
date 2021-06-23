<?php
	require 'HttpConnection.php';
	require 'webscrap.php';
	
	$result = new webscrap("https://medium.com/@limedaring/design-for-non-designers-part-1-6559ed93ff91#.76pehqczp");
	
	echo "<h1>{$result->title}</h1>";
	echo "<p><img src='{$result->cover}'></p>";
	echo "<hr>";
	echo $result->html;
