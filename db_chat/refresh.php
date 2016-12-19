<html>
<body>
<?php

$dispname = $_GET['dispname'];
$comment = $_GET['comment'];
$date = date('Y-m-d H:i:s');
$login;


$dsn = 'mysql:dbname=chat;host=127.0.0.1';
$user = 'root';
$pw = 'H@chiouji1';



$sql = "select * from chatlog"; 
$dbh = new PDO($dsn, $user, $pw);
$sth = $dbh->prepare($sql);				 
$sth->execute();
while(($data = $sth->fetch()) !== false)
{
	$login[] = $data;
}

?>

<input type="hidden" name="chatlog" value="<?php echo $login; ?>" >

<?php

require("chat.php");	

 ?>
 
 </body>
 </html>
