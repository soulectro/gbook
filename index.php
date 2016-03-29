<?php 
	require_once 'db.php';
	require_once 'func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Гостевая книга</title>
</head>
<body>
	<form action="" method="post">
		<label for="name">Имя:</label>
		<input type="text" id="name" name="name"><br>
		<label for="message">Сообщение: </label>
		<textarea name="message" id="message" cols="30" rows="10"></textarea>
		<input type="submit" value="Написать" name="doAdd">
	</form>
	<hr>
<?php 
	$stmt = $pdo->query("SELECT * FROM messages ORDER BY id DESC");
	if ($stmt->rowCount() < 1) {
		echo "записей нет...";
	} else {
		while ($row = $stmt->fetch()) {
			echo $row['name']." // ".$row['date']."<br>";
			echo $row['message']."<hr>";
		}
	}

	if(isset($_REQUEST['doAdd'])) {
		echo "Запись типа добавлена ;)";
	}
?>
</body>
</html>
