if (isset($_POST['submit'])) {
	require "../config.php";
	require "../common.php";

	try {
		$connection = new PDO($dsn, $username, $password, $options);
		$connection = new PDO($dsn, $username, $password, $options);

$6826_Submission = array(
	"LotNum" => $_POST['Lot#'],
	"KeyanceDate"  => $_POST['KeyanceDate'],
	"JobNum"     => $_POST['Job#'],
	"A1Top"       => $_POST['A1Top'],
	"A1Center"       => $_POST['A1Center'],
	"A1Bottom"       => $_POST['A1Bottom'],
	"A2Top"       => $_POST['A2Top'],
	"A2Center"       => $_POST['A2Center'],
	"A2Bottom"       => $_POST['A2Bottom'],
	"B1Top"       => $_POST['B1Top'],
	"B1Center"       => $_POST['B1Center'],
	"B1Bottom"       => $_POST['B1Bottom'],
	"B2Top"       => $_POST['B2Top'],
	"B2Center"       => $_POST['B2Center'],
	"B2Bottom"       => $_POST['B2Bottom'],
	"CoatingLotNum"  => $_POST['CoatingLot#'],
	"Solids"  => $_POST['Solids'],
	"PH"  => $_POST['PH'],
	"GunSetting"  => $_POST['GunSetting'],
	"AirFlow"  => $_POST['AirFlow']
);

$sql = sprintf(
		"INSERT INTO %s (%s) values (%s)",
		"6826",
		implode(", ", array_keys($6826_Submission)),
		":" . implode(", :", array_keys($6826_Submission))
);

$statement = $connection->prepare($sql);
$statement->execute($new_user);

	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}
	
}


<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
	<blockquote><?php echo escape($_POST['Lot#']); ?> successfully added.</blockquote>
<?php } ?>

<h2>6826 Submit Form</h2>

<form method="post">
	<label for="LotNum">Lot Number</label>
		<input type="text" name="LotNum" id="LotNum" pattern="[0-9][0-9][0-9][0-9][0-9][0-9]+-[0-9]">
	<label for="KeyanceDate">Date</label>
		<input type="Date" name="KeyanceDate" id="KeyanceDate">
     <label for="JobNum">Job Number</label>
	<input type="text" name="JobNum" id="JobNum"> <br />
			<label for="A1Top">A1Top</label>
				<input type="Number" name="A1Top" id="A1Top">
			<label for="A1Center">A1Center</label>
				<input type="Number" name="A1Center" id="A1Center">
			<label for="A1Bottom">A1Bottom</label>
				<input type="Number" name="A1Bottom" id="A1Bottom"><br />
			<label for="A2Top">A2Top</label>
				<input type="Number" name="A2Top" id="A2Top">
			<label for="A2Center">A2Center</label>
				<input type="Number" name="A2Center" id="A2Center">
			<label for="A2Bottom">A2Bottom</label>
				<input type="Number" name="A2Bottom" id="A2Bottom"><br />
			<label for="B1Top">B1Top</label>
				<input type="Number" name="B1Top" id="B1Top">
			<label for="B1Center">B1Center</label>
				<input type="Number" name="B1Center" id="B1Center">
			<label for="B1Bottom">B1Bottom</label>
				<input type="Number" name="B1Bottom" id="B1Bottom"><br />
			<label for="B2Top">B2Top</label>
				<input type="Number" name="B2Top" id="B2Top">
			<label for="B2Center">B2Center</label>
				<input type="Number" name="B2Center" id="B2Center">
			<label for="B2Bottom">B2Bottom</label>
				<input type="Number" name="B2Bottom" id="B2Bottom"><br />
	<label for="CoatingLotNum">Coating Lot Number</label>
		<input type="text" name="CoatingLotNum" id="CoatingLotNum" pattern="[0-9][0-9][0-9][0-9][0-9][0-9]+-[0-9]">
	<label for="Solids">Solids</label>
	<input type="Number" name="Solids" id="Solids">
	<label for="PH">PH</label>
	<input type="Number" name="PH" id="PH"><br />
	<label for="GunSetting">GunSetting</label>
	<input type="Number" name="GunSetting" id="GunSetting">
	<label for="AirFlow">AirFlow</label>
	<input type="Number" name="AirFlow" id="AirFlow"><br />
	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>