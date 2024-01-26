<div class="top_menu">
<div class="abc">
Авторы по фамилии:
<?php
$abc = "А Б В Г Д Е Ё Ж З И Й К Л М Н О П Р С Т У Ф Х Ц Ч Ш Щ Ъ Ы Ь Э Ю Я";
$abc_ar = explode(" ", $abc);
//$authors = db::getInstance()->fetchAll('authors');
$authors = $db->query('select * from authors')->findAll();

foreach($abc_ar as $let){
	$is_let = 0;
	foreach($authors as $author){
		if($author['author_let']==$let){
			$is_let = 1;
		}
	}
	if($is_let == 1){
		echo "<a class='abc_hr' href='/index.php?letter=" . $let . "'> " . $let . "  </a>";
	}
	if($is_let == 0){
		echo " ".$let." ";
	}
}

?>
</div>
</div>
<div class='clearer'></div>	