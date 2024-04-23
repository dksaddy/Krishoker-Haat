


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        /* Add your CSS styles for the chat interface here */
    </style>
</head>
<body>
    <div id="chat-container">
        <div id="user-list">
            <!-- List of users to select for chatting -->
            <ul>
                <li>User 1</li>
                <li>User 2</li>
                <li>User 3</li>
                <!-- Add more users dynamically from your database -->
            </ul>
        </div>

        <div>

        <?php
session_start();

// Check if the user is logged in
if (empty($_SESSION['user_id'])) {
   header("Location: HomePage.php"); 
   exit();
}

include("template/db_connect.php");

// Retrieve messages from the database
$query = "SELECT * FROM message ORDER BY timestamp ASC"; // Assuming your table name is `chat_messages`
$result = mysqli_query($conn, $query);

if (!$result) {
    // Handle query error
    die('Query failed: ' . mysqli_error($conn));
}

// Fetch and display messages
while ($row = mysqli_fetch_assoc($result)) {
    $sender_id = $row['sender_id'];
    $receiver_id = $row['receiver_id'];
    $message = $row['message'];
    $timestamp = $row['timestamp'];

   

    // Display message
    echo "<div>";
    echo "<p>Sender: " . $row['sender_id'] . "</p>";
    echo "<p>Receiver: " . $row['receiver_id'] . "</p>";
    echo "<p>Message: " . $row['message'] . "</p>";
    echo "<p>Time: " . formatTimeDifference($row['timestamp']) . "</p>";
    echo "</div>";
}



//function for showing time
// Function to calculate time difference and format it
function formatTimeDifference($timestamp) {
    $currentTime = time(); // Current timestamp
    $messageTime = strtotime($timestamp); // Convert stored timestamp to Unix timestamp

    $timeDifference = $currentTime - $messageTime;
    if ($timeDifference <60) { // Less than 1 min
        return "Just Now" ;
    }elseif ($timeDifference < 3600) { // Less than 1 hour
        $minutes = floor($timeDifference / 60);
        return $minutes . " minutes ago";
    } elseif ($timeDifference < 86400) { // Less than 24 hours
        $hours = floor($timeDifference / 3600);
        return $hours . " hours ago";
    } else {
        $days = floor($timeDifference / 86400);
        return $days . " days ago";
    }
}
// Free result set
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>
        </div>
        <div id="chat-window">
            <!-- Chat history will be displayed here -->
            <div id="chat-messages">
                <!-- Chat messages will be appended here dynamically -->
            </div>
            <!-- Form to send messages -->
            <form id="message-form" action="functions/send_message.php" method="post">
                <input type="hidden" id="receiver_id" name="receiver_id" value="">
                <input type="text" id="message" name="message" placeholder="Type your message">
                <button type="submit" name="send">Send</button>
            </form>
        </div>
    </div>

    <script>
        // Add your JavaScript code for real-time updates here
    </script>
</body>
</html>
