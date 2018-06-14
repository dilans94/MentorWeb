<? php
$mysqli = new mysqli("localhost", "root", " ", "mentorfinder");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT fname, contact FROM mentor ORDER by mentorID LIMIT 3";
$result = $mysqli->query($query);

while($row = $result->fetch_array())
{
$rows[] = $row;
}

foreach($rows as $row)
{
echo $row['contact'];
}

/* free result set */
$result->close();

/* close connection */
$mysqli->close();
?>


