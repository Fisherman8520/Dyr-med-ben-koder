<?php include('server.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$dyr = $n['dyr'];
			$ben = $n['ben'];
            $id = $n['id'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dyr med ben</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
            <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>    
    
    
    <table>
    
        <thead>
            <tr>
                <th>Dyr</th>
                <th>Ben</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
                    <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
			<td><?php echo $row['dyr']; ?></td>
			<td><?php echo $row['ben']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
        <?php } ?>

        </tbody>
    </table>
    
    	<form method="post" action="server.php" >
            <input type="hidden" name="id" value="<?php echo $id; ?>">
		
        <div class="input-group">
			<label>Dyr</label>
			<input type="text" name="dyr" value="<?php echo $dyr; ?>">
		</div>
		<div class="input-group">
			<label>Ben</label>
			<input type="text" name="ben" value="<?php echo $ben; ?>">
		</div>
            <div class="input-group">
            <?php if ($update == true): ?>
            <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
            <?php else: ?>
            <button class="btn" type="submit" name="gem" >Gem</button>
            <?php endif ?>
                
            </div>
	</form>
    
</body>
</html>