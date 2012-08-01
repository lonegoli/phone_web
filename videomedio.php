<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<?php
$videoname=$_GET['videoname'];
echo '
<video width="340" height="240" controls="controls" poster="image/'.$videoname.'.jpg"  autoplay="autoplay">
<source src="video/'.$videoname.'.mp4" type="video/mp4">
<source src="video/'.$videoname.'.webm" type="video/webm">
<source src="video/'.$videoname.'.ogg" type="video/ogg">
sorry!Your browser does not support the video tag.
</video>';
?>
</body>