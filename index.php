<?php
header('charset=utf-8');

$mysqli = new mysqli('localhost', 'agetman', 'neto1792', 'agetman');
$query = "SELECT * FROM books";
$result = $mysqli->query($query);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<div style="text-align: center">
	<h1>Библиотека</h1>
	<form action="index.php" method="POST" accept-charset="UTF-8">
		<div>
			<input type="text" name="name" id="book" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>" placeholder="Название книги">
			<input type="text" name="author" id="author" value="<?php if(isset($_POST['author'])) echo $_POST['author'];?>" placeholder="Автор">
			<input type="text" name="isbn" id="isbn" value="<?php if (isset($_POST['isbn'])) echo $_POST['isbn'];?>" placeholder="ISBN">
			<input type="submit" value="Поиск" />
		</div>
	</form>
</div>
<br>
	<div>
		<table align="center">
		    <thead>
		        <th>Название</th>
		        <th>Автор</th>
		        <th>Год выпуска</th>
		        <th>Жанр</th>
		        <th>ISBN</th>
		    </thead>
		    <tbody>
			    <?php foreach($result as $row): ?>
				<tr>
				  <td><?=htmlspecialchars($row['name'])?></td>
				  <td><?=htmlspecialchars($row['author'])?></td>
				  <td><?=htmlspecialchars($row['year'])?></td>
				  <td><?=htmlspecialchars($row['genre'])?></td>
				  <td><?=htmlspecialchars($row['isbn'])?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</body>
</html>
