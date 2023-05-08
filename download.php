<?php
// Include config file
require_once "fileConfig.php";

// Attempt select query execution
$sql = "SELECT * FROM files";
if ($result = mysqli_query($link, $sql)) {
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
            echo "<td>" . $row['file_path'] . "</td>";
            echo "<td>";
            echo "<a href='download.php?path=" . $row['file_path'] . "'>Download 1</a>";
            echo "&nbsp;";
           echo "<a href='download2.php?path=" . $row['file_path'] . "'>Download 2</a>";
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
mysqli_close($link);
