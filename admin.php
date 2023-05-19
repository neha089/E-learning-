<?php
    include_once 'database.php';
    if(isset($_POST['reply']) && isset($_POST['email'])) {
        $reply = $_POST['reply'];
        $email = $_POST['email'];
        
        // update the doubt with the admin's reply
        $sql = "UPDATE doubt SET reply='$reply' WHERE email='$email'";
        if(mysqli_query($con, $sql)) {
            echo "Reply submitted successfully";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
    
    $result = mysqli_query($con, "SELECT * FROM doubt");
?>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Query</th>
        <th>Admin Reply</th>
        <th>Action</th>
    </tr>
    
    <?php while($row = mysqli_fetch_array($result)) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['subject']; ?></td>
        <td><?php echo $row['query']; ?></td>
        <td><?php echo $row['reply']; ?></td>
        <td>
            <form method='post'>
                <input type='text' name='reply' placeholder='Enter reply'>
                <input type='hidden' name='email' value='<?php echo $row['email']; ?>'>
                <button type='submit'>Submit</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
