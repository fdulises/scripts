<?php
	require 'basicache.php';
	
	$cachedir = 'cache';
	basicache::delete($cachedir, 151);
	echo "Cache vaciado par el id 151";