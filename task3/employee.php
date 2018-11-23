<!DOCTYPE html>
<html>
<head>
	<title>Employee Storage</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
// Change values of these 4 variables according to yuors
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "employee";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Change character set to utf8
mysqli_set_charset($conn,"utf8");

$sql = "SELECT u.*, a.*,ui.`introduction`, ui.`work_experience`,ui.`education`, l.language as language_name FROM `tbl_users` u INNER JOIN `tbl_user_infos` ui ON u.`user_id` = ui.`user_id` INNER JOIN `tbl_languages` l ON ui.`language_id` = l.`language_id` INNER JOIN `tbl_logs` a ON u.`user_id` = a.`user_id` ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["user_id"]. " - Name: " . $row["name"]. " - DOB: " . $row["dob"]. " - ID/SSN: " . $row["ssn"]. " - Current Employee: " . $row["is_curr_emp"]. " - Email: " . $row["email"]. "- Phone: " . $row["phone"]. "- Address: " . $row["address"]. " - Intro: " . $row["introduction"]. "- Work: " . $row["work_experience"]. "- Education: " . $row["education"]. "- Created: " . $row["created"]. "- Modified: " . $row["modified"]. " <br><br>";
    }
} else {
    echo "No Results";
}
$conn->close();
?>
</body>
</html>