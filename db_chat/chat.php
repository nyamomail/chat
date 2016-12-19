<html>
<head>
	<title>Chat</title>
</head>
<body>
<h1>Chat</h1>
<br>
<?php 
	$dispname;
	$login; 
?>	

<?php 

if(empty($disname))
{

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


	for($i = 0; $i < count($login); $i++)
	{
		$db_data = $login[$i];
		if($_GET['loginid'] == $db_data['loginid'])
		{			
			$dispname = $db_data['dispname'];	
		}
	}
}

?>

<?php print $dispname ?>


<form action="comment.php">
<input type="text" name="comment">
<input type="submit" value="Write">
<input type="hidden" name="dispname" value="<?php echo $dispname; ?>" >


<hr>
</form>

<form action="chat.php">
<input type="submit" value="refresh">
</form>

<?php
	$sql = 'Select * From chatlog';

	$dbh = new PDO($dsn, $user, $pw);
	$sth = $dbh->prepare($sql);
	$sth->execute();
	while(($data = $sth->fetch()) !== false)
	{
		$chatlog[] = $data;
	}


	for($i = 0; $i < count($chatlog) && $i < 15; $i++)
	{
		$db_data = $chatlog[$i];
		print $db_data['dispname'] .' ';
		print $db_data['comment'] .' ';
		print '('. $db_data['comment_date'] .')';
		?>
		<hr>
		<?php
		
	}
?>

<form action="login.php">
<input type="submit" value="Logout">
<hr>


</body>
</html>
