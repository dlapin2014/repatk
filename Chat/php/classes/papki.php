<?php
$dir    = 'путь к папке';
$files = scandir($dir);
echo '<ol>';
foreach ($files as $value)
{
if ($value !='.' and $value !='..' ) 
{echo '<li><a href="путь к папке'. $value.'">'.$value.'</a></li><br>';}
else{}
}
echo '</ol>';
?>