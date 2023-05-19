<?php
// database connection code
include_once"database.php";

if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// query to fetch data from the material table
$query = "SELECT * FROM files";
$result = mysqli_query($con, $query);

// check if there are any results
if (mysqli_num_rows($result) > 0) {
    // display data in a table
    echo "<table>";
    echo "<tr><th>Title</th><th>Date</th><th>File</th><th>Download</th><th>View</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['file_name'] . "</td>";
        echo "<td>" . $row['file_type'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "<td><a href='" . $row['file_path'] . "' download>Download</a></td>";
        echo "<td><a href='" . $row['file_path'] . "' target='_blank'>View</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}

mysqli_close($con);
?>
