<?php

$dispname = $_GET['dispname'];
$comment = $_GET['comment'];
$date = date('Y-m-d H:i:s');

//print $dispname;
//print $comment;
//print $date;

$dsn = 'mysql:dbname=chat;host=127.0.0.1';
$user = 'root';
$pw = 'H@chiouji1';



$sql = "INSERT INTO chatlog(dispname, comment, del_flag, comment_date) 
		 VALUES('$dispname', '$comment', false, '$date')"; 


$dbh = new PDO($dsn, $user, $pw);
$sth = $dbh->prepare($sql);				 
$sth->execute();

require("chat.php");	

 ?>
