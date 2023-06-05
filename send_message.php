send_message.php  <?php
// send_message.php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $receiverEmails = $_POST['receiver_email']; // An array of selected receiver emails
    $message = $_POST['message'];

    // Validate the form data
    if (empty($receiverEmails) || empty($message)) {
        echo "Please select at least one receiver and enter a message.";
        exit();
    }

    // Start the session
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['email'])) {
        echo "You are not logged in.";
        exit();
    }

    // Get the sender's email
    $senderEmail = $_SESSION['email'];

    // Fetch all logged-in user emails
    require_once "database.php";

    // If 'All' is selected, fetch all user emails
    if (in_array('all', $receiverEmails)) {
        $query = "SELECT email FROM user";
        $result = mysqli_query($con, $query);
        $userEmails = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Extract the email values from the result
        $receiverEmails = array_column($userEmails, 'email');
    }

    // Insert the chat message for each receiver email
    foreach ($receiverEmails as $receiverEmail) {
        $query = "INSERT INTO chat_messages (sender_email, receiver_email, message) VALUES ('$senderEmail', '$receiverEmail', '$message')";
        mysqli_query($con, $query);
    }

    // Redirect back to the chat.php page
    header("Location: chat.php");
    exit();
} else {
    echo "Invalid request.";
    exit();
}
?>