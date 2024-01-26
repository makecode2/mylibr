<?php

if($_SESSION['ganre']!="" && count($url_data)==2){
	$title = $_SESSION['ganre'];
}
if($url_data[1]=="" || $url_data[1]=="index______.php"){
	$title = "Библиотека";
	//echo "title: " . $url_data[1] . "<br>";
}
if(count($url_data)==3){//3-й частью урла может быть только автор. выведем список книг данного автора

	//$authors = db::getInstance()->fetchAll('authors');
	$authors = $db->query('select * from authors')->findAll();
	foreach($authors as $a){
		if($url_data[2]==$a['alias']){
			$title = $a['author'] ;
		}
	}
}
?>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/style.css">
<title><?php echo $title;?></title>
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>
<body>
<a href="../index.php" class="logo_text"><div class="logo_pic"><img src="/logo.gif"></div><h1 class="logo">Библиотека</h1></a>
