
<?php
// Include config file
require_once "database.php";

// Attempt select query execution
$sql = "SELECT * FROM material";
if ($result = mysqli_query($con, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>File Name</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
           echo "<td>" . $row['Name'] . "</td>";
           echo "<td>" . $row['Date'] . "</td>";
            echo "<td>" . $row['file'] . "</td>";
            echo "<td>";
           echo "<a href='mat.php?id=" .$row['id'] ."path=" . $row['directory'] . "'>view file </a>";
             echo "<a href='mdownload.php?id=" .$row['id'] ."path=" . $row['directory'] . "'>Download</a>";
            echo "&nbsp;";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo '<em>No records were found.</em>';
    }
} else {
    echo "Oops! Something went wrong. Please try again later.";
}

// Close connection
mysqli_close($con);
         


