<?php

$login;

$dsn = 'mysql:dbname=chat;host=127.0.0.1';
$user = 'root';
$pw = 'H@chiouji1';
$sql = 'Select * From login';

$dbh = new PDO($dsn, $user, $pw);
$sth = $dbh->prepare($sql);
$sth->execute();
while(($data = $sth->fetch()) !== false)
{
	$login[] = $data;
}

if($_GET['loginid'] == false || $_GET['password'] == false)
{
	require("error.php");
}
else
{ 
	for($i = 0; $i < count($login); $i++)
	{
		$db_data = $login[$i];
		if($_GET['loginid'] == $db_data['loginid'] &&
		   $_GET['password'] == $db_data['password'])
		{			
				require("chat.php");	
		}
	}
}
?>
