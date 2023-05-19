<?php
// Include config file
require_once "config.php";

if (isset($_POST["read"])) {
// Attempt select query execution
    $sql = "SELECT * FROM employees";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo '<table>';
            echo "<thead>";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Name</th>";
            echo "<th>Department</th>";
            echo "<th>Salary</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['department'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
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
} elseif (isset($_POST['create'])) {

// Define variables
    $name = "Jyoti";
    $department = "HR";
    $salary = 575000;

    $sql = "INSERT INTO employees (name, department, salary) VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_department, $param_salary);

        // Set parameters
        $param_name = $name;
        $param_department = $department;
        $param_salary = $salary;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records created successfully. Redirect to reading page
            header("location: read.php");
            // echo "Hello";
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

} elseif (isset($_POST['update'])) {

    // Define variables
    $u_salary = 630000;

    $sql = "UPDATE employees SET salary=? WHERE id=?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ii", $param_salary, $param_id);

        // Set parameters
        $param_salary = $u_salary;
        $param_id = 5;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records updated successfully. Redirect to reading page
            header("location: read.php");
            // echo "Hello";
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

} 
// write code for delete action -- assignment
// Close connection
mysqli_close($link);
