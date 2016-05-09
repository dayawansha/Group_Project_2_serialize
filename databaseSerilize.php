<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$arrays =array("10","20","30","40");
$serialized_data = serialize($arrays);
//    echo "$serialized_data";

$sql = "INSERT INTO serializecolumn(text) VALUES ('$serialized_data')";

?>

    <script>alert(" Thanks for your feedback...:) ");</script>

<?php
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully\n" ."<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql2 = "select text from serializecolumn where id = '1' ";
$result = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
    //  echo "text: " .unserialize($row["text"]). "<br>";
    echo $row["text"]. "<br>";

    $unserializeVariable = unserialize($row["text"]);
    var_dump ($unserializeVariable);

    $unserializeVariable[4] =  199;

    for($x = 0; $x < sizeof($unserializeVariable); $x++) {
        echo $unserializeVariable[$x];
        echo "<br>";
    }


} else {

    echo "0 results";
}

$conn->close();

?>