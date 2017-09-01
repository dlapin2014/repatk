<?php
if (isset($_POST['submit']))
{
	$table = "webchat_users";
	$servername = "localhost";
        $username = "root";
        $password = "KhpgVFb9Jqy5";
        $bd = "Webchat";
	$link = new mysqli($servername, $username, $password,$bd); 
	$username = $_POST['login'];
	$password = md5($_POST['pass']);
		$msg = "SELECT `gravatar` FROM `".$table."` WHERE `name` = '".$username."'";
	$user = mysqli_query($link, $msg);
    $pw_user = mysqli_fetch_array($user);
	if (!empty($pw_user['gravatar'])) 
        {
			if($pw_user['gravatar'] == $password)
			{
$text = $_POST['login'];
$fp = fopen("filan.html", "a");		
fwrite($fp, $text);
		fwrite($fp, "<br>");
$text = $_POST['field1'];
fwrite($fp, $text);
fwrite($fp, "<br>");
fwrite($fp, "<br>");
fclose($fp);
echo "мы обязательно прочитаем ваше письмо ";
echo "<br>";
echo "<a href='./FAQ.html'> Вернитесь к сайту </a>"."<br>";
}
            else
			{
				 echo "Введенный пароль не подходит для данной учетной записи";
			}
        }
		else
		{
			echo "В системе не зарегестрирован пользователь с таким никнеймом";
		}


}
else
{
	echo "Вернитесь на предыдущую страницу, что-то пошло не по плану...";
}
mysqli_close($link);
?>