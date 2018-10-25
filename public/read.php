<?php

/**
 * Function to query information based on 
 * a parameter: in this case, Lot#.
 *
 */

if (isset($_POST['submit'])) {
	try {	
		require "../config.php";
		require "../common.php";

		$connection = new PDO($dsn, $username, $password, $options);

		$sql = "SELECT * 
						FROM 6826
						WHERE LotNum = :LotNum";

		$LotNum = $_POST['LotNum'];

		$statement = $connection->prepare($sql);
		$statement->bindParam(':LotNum', $LotNum, PDO::PARAM_STR);
		$statement->execute();

		$result = $statement->fetchAll();
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}
}
?>
<?php require "templates/header.php"; ?>
		
<?php  
if (isset($_POST['submit'])) {
	if ($result && $statement->rowCount() > 0) { ?>
		<h2>Results</h2>

		<table>
			<thead>
				<tr>
					<th>Lot Number</th>
					<th>Keyance Date</th>
					<th>A1 Top</th>
					<th>A1 Center</th>
					<th>A1 Bottom</th>
					<th>A2 Top</th>
					<th>A2 Center</th>
					<th>A2 Bottom</th>
					<th>B1 Top</th>
					<th>B1 Center</th>
					<th>B1 Bottom</th>
					<th>B2 Top</th>
					<th>B2 Center</th>
					<th>B2 Bottom</th>
					<th>Job Number</th>
					<th>Coating Lot Number</th>
					<th>Solids</th>
					<th>PH</th>
					<th>Gun Settings</th>
					<th>Air Flow</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
	<?php foreach ($result as $row) { ?>
			<tr>
				<td><?php echo escape($row["LotNum"]); ?></td>
				<td><?php echo escape($row["KeyanceDate"]); ?></td>
				<td><?php echo escape($row["A1Top"]); ?></td>
				<td><?php echo escape($row["A1Center"]); ?></td>
				<td><?php echo escape($row["A1Bottom"]); ?></td>
				<td><?php echo escape($row["A2Top"]); ?></td>
				<td><?php echo escape($row["A2Center"]); ?></td>
				<td><?php echo escape($row["A2Bottom"]); ?></td>
				<td><?php echo escape($row["B1Top"]); ?></td>
				<td><?php echo escape($row["B1Center"]); ?></td>
				<td><?php echo escape($row["B1Bottom"]); ?></td>
				<td><?php echo escape($row["B2Top"]); ?></td>
				<td><?php echo escape($row["B2Center"]); ?></td>
				<td><?php echo escape($row["B2Bottom"]); ?></td>
				<td><?php echo escape($row["JobNum"]); ?></td>
				<td><?php echo escape($row["CoatingLotNum"]); ?></td>
				<td><?php echo escape($row["Solids"]); ?></td>
				<td><?php echo escape($row["PH"]); ?></td>
				<td><?php echo escape($row["GunSettings"]); ?></td>
				<td><?php echo escape($row["AirFlow"]); ?></td>
				<td><?php echo escape($row["date"]); ?> </td>
			</tr>
		<?php } ?> 
			</tbody>
	</table>
	<?php } else { ?>
		<blockquote>No results found for <?php echo escape($_POST['LotNum']); ?>.</blockquote>
	<?php } 
} ?> 

<h2>Find record based on Lot Number</h2>

<form method="post">
	<label for="LotNum">Lot Number</label>
	<input type="text" id="LotNum" name="LotNum">
	<input type="submit" name="submit" value="View Results">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>