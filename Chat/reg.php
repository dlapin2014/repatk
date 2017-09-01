<?php 


if (isset($_POST['submit']))
{
	$table = "webchat_users";
	$servername = "localhost";
        $username = "root";
        $password = "KhpgVFb9Jqy5";
        $bd = "Webchat";
        $link = new mysqli($servername, $username, $password,$bd);
        if ($link -> connect_error) die("Упс...при подключении к базе данных произошла следующая ошибка: " . $link->connect_error );
echo "Подключение с базой данных установлено!"."<br>";

	



	
	$username = $_POST['username'];
	
	
	$msg = "SELECT `id` FROM `".$table."` WHERE `name` = '".$username."'";
	
	$user = mysqli_query($link, $msg);
    $id_user = mysqli_fetch_array($user);
	if (!empty($id_user['id'])) 
        {
            echo "Нам очень жаль, но данный логин уже занят, попробуйте подобрать другой, вернувшись на предыдущую страницу..."."<br>";
			exit("<a href='./reg.html'> Предыдущая страница </a>");
        }


	$password = md5($_POST['password']);
	
	$msg = "insert into ".$table." (name,gravatar) value ('".$username."','".$password."')";
	
	$rez = mysqli_query($link,$msg);
	
	if($rez == 1) 
	{
	echo "Регистрация прошла успешно"."<br>";
	echo "Ваш логин: ".$username."<br>";
	echo "<a href='./index.html'> Чатик </a>"."<br>";
	echo "<a href='http://repa.tk/FAQ.html'> FAQ </a>"."<br>";
	}
	else echo "При регистрации возникла ошибка, советуем попробовать еще раз..."."<br>";

	
}
else
{
	echo "Вернитесь на предыдущую страницу, что-то пошло не по плану...";
}
mysqli_close($link);
?>