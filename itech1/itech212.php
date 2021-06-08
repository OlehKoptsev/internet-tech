<?php

	require 'db_connect.php';
	
	$author = $_GET['author'];
	$author2 = $dbh->prepare("select literature.name, literature.isbn, literature.year, literature.quantity, literature.publisher, resourcse.title from literature left join resourcse on literature.fid_resourse=resourcse.id_resourse join book_authors on book_authors.fid_book = literature.id_book join authors on authors.id_authors = book_authors.fid_authors WHERE authors.name = :author");
	$author2->bindParam(':author', $author, PDO::PARAM_STR);
	
	$author2->execute();
	$result=$author2->fetchAll();	

?>

<table border = 1>

	<tr>
		<td>Author</td>
		<td>Name</td>
		<td>ISBN</td>
		<td>Year</td>
		<td>Number of pages</td>
		<td>Publisher</td>
		<td>Resource</td>
		
	</tr>
	
	<?php foreach ($result as $row){?>
		<tr>
			<td><?php echo $author; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['isbn']; ?></td>
			<td><?php echo $row['year']; ?></td>
			<td><?php echo $row['quantity']; ?></td>		
			<td><?php echo $row['publisher']; ?></td>
			<td><?php echo $row['title']; ?></td>
	
		</tr>
	<?php } ?>
	
</table>