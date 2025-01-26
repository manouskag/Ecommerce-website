<?php
include 'Config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userInput = mysqli_real_escape_string($con, $_POST['message']);

    $query = "SELECT bot_response FROM responses WHERE user_input = '$userInput' LIMIT 1";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['bot_response'];
    } else {
        echo "I'm sorry, your request is not understandable.";
    }
}
?>
