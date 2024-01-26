<?php
session_start();

require("database.php");

$config = require "config.php";
$db = new Database($config['database']);

$url = $_SERVER['REQUEST_URI'];

$url_data = explode("/", $url);

echo $url . "<br>";
//echo "letter: ".$_GET["letter"];


$books = $db->query('select * from books')->findAll();
$ganres = $db->query('select * from ganres')->findAll();

if($url_data[1]!="" && $url_data[1]!="index.php"){

		foreach($ganres as $ganre){

			if($url_data[1]==$ganre['alias']){

				$ganre_id = $ganre['id'];
				$ganre_alias = $ganre['alias'];
				//echo "ganre id:" . $ganre_id . "<br>";
				$_SESSION['ganre']=$ganre['ganre'];
			}
		}


}else{
	$_SESSION['ganre'] = "";
}
require("templates/head.php");
require("templates/top_menu.php");
?>
<body class='main'>

	<div class='side_bar'>
		<?php
		foreach($ganres as $ganre){
			echo "<a class='castom_hr' href='/" . $ganre['alias'] . "'>" . $ganre['ganre'] . "</a><br>";
		}?>
	</div>
    <?php
if($url_data[1]=="index.php" or $url_data[1]==""){

	echo "<div class='greetings'><div class='greet_ins'><h2>Добро пожаловать в библиотеку!</h2>";
	echo "<h3>(убедительная просьба: не шуметь!)</h3></div></div>";
}

$let = " ";
if(isset($_GET["letter"])){//вывод списка авторов
	$let = $_GET["letter"];?>
	<div class='middle'>
	<?php
	echo "<h2 class='auth_list'>Список авторов на букву " . $let . ":</h2><br>";
	//$authors = db::getInstance()->fetchAll('authors', '', 'author');
    $authors = $db->query('select * from authors')->findAll();
	//$ganres = db::getInstance()->fetchAll('ganres');
    //$author_ganre = db::getInstance()->fetchAll('author_ganre');
    $author_ganre = $db->query('select * from author_ganre')->findAll();

	foreach($authors as $author){
		if($author['author_let'] == $let){
			$a_id = $author['id'];
			foreach($author_ganre as $ag){
				if($ag['author_id'] == $a_id){
					$ganre_id = $ag['ganre_id'];
					foreach($ganres as $ganre){
						if($ganre_id == $ganre['id']){
							$ganre_alias = $ganre['alias'];
						}
					}
				}
			}

			echo "<a class='castom_hr' href='/" . $ganre_alias . "/" . $author['alias'] . "'>" . $author['author'] . "</a><br>";
		}
	}
}
if($_SESSION['ganre']!="" && count($url_data)==2 && $let==" "){//страница жанра
?>

	<div class='middle'>
	<?php
	echo "<h1>" . $_SESSION['ganre'] . "</h1><br>";
	//$auth_ganres = db::getInstance()->fetchAll('author_ganre');
	$auth_ganres = $db->query('select * from author_ganre')->findAll();
	//$authors = db::getInstance()->fetchAll('authors');
  $authors = $db->query('select * from authors')->findAll();
	foreach($auth_ganres as $ag){
		if($ag['ganre_id']==$ganre_id){
			foreach($authors as $auth){
				if($ag['author_id']==$auth['id']){
					echo "<a class='castom_hr' href='/" . $ganre_alias . "/" . $auth['alias'] . "'>" . $auth['author'] . "</a><br>";
				}
			}
		}
	}

}?>


<?php
if(count($url_data)==3){//3-й частью урла может быть только автор. выведем список книг данного автора
    ?>
	<div class='middle'>
	<?php

		$authors = $db->query('select * from authors')->findAll();
	foreach($authors as $a){
		if($url_data[2]==$a['alias']){
			echo "<h1>" . $a['author'] . "</h1>";
		}
	}

	foreach($books as $book){
		if($url_data[2]==$book['author_alias']){
			echo "<a class='castom_hr' href='/books/" . $book['file'] . "'>" . $book['title'] . "</a><br>";
		}

	}?>
	</div>
  
<?php
}
?>
</div>
 </div> <?php //end of main?>
 <div class='clearer'></div>

 <div class="footer">Авторские права: если я нарушил авторские права, пожалуйста, сообщите мне на e-mail: gacdav@mail.ru и эти книги будут удалены с сайта в ближайшее время.</div>
</body>

</html>
<?php
// require("/templates/footer.php");
?>
