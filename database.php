<html lang="en">
<head>
</head>
<body><div style="text-align:center;"><h1>Import Page</h1>
<form class="form-horizontal" action="" method="post" name="uploadCSV"
    enctype="multipart/form-data">
    <label>Database Name:</label>&nbsp;<input type="text" name="db" placeholder="dbname" >&nbsp;&nbsp;

    <label>Table Name:</label>&nbsp;<input type="text" name="table" placeholder="tablename" \><br><br>

    <div class="input-row" style="">
        <label class="col-md-4 control-label">Choose CSV File</label> <input
            type="file" name="file" id="file" accept=".csv">
        <button type="submit" id="submit" name="import"
            class="btn-submit">Import</button>
        <br />

    </div>
    <div id="labelError"></div>
    </div>
</form>
<script type="text/javascript">
	$(document).ready(
	function() {
		$("#frmCSVImport").on(
		"submit",
		function() {

			$("#response").attr("class", "");
			$("#response").html("");
			var fileType = ".csv";
			var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+("
					+ fileType + ")$");
			if (!regex.test($("#file").val().toLowerCase())) {
				$("#response").addClass("error");
				$("#response").addClass("display-block");
				$("#response").html(
						"Invalid File. Upload : <b>" + fileType
								+ "</b> Files.");
				return false;
			}
			return true;
		});
	});
</script>
<?php
// if(!isset($_POST["db"]) && !isset($_POST["table"]))
// {
// $abc = $_POST["db"];


$servername = "localhost";
$username = "root";
$password = "";
if(!empty($_POST["db"]))
{
$dbname = $_POST["db"];
}
// Create connection
$conn = mysqli_connect("localhost", "root", "", "hcurve");

if (isset($_POST["import"])) {
    // echo $abc.$tablename;
    $tablename = $_POST["table"];
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into $tablename (date,BU,revenue,flipkart_budget,hcrevenue,bal_budget,run_rate,current_avg,budget_usage_percentage)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7]. "','" . $column[8]. "')";
            $result = mysqli_query($conn, $sqlInsert);
            
            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
        echo $message;
    }
}
?>

</body>
</html>
