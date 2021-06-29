<?php

$filename = "../media/video.mp4";
$filetype = mime_content_type($filename);
$handle = fopen($filename, "rb");
$contents = fread($handle, filesize($filename));
fclose($handle);

header("content-type: $filetype");

echo $contents;
