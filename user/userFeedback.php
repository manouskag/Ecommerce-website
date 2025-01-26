<?php
// Start the session
session_start();
?>

<?php
include 'Config.php';  // Include your database connection file
// Initialize variables to hold error messages or form values
$errors = [];
$username = '';
$email = '';
$feedback = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate user input
    $username = isset($_POST['username']) ? mysqli_real_escape_string($con, $_POST['username']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($con, $_POST['email']) : '';
    $feedback = isset($_POST['feedback']) ? mysqli_real_escape_string($con, $_POST['feedback']) : '';

    if (empty($username)) {
        $errors['username'] = "Username is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "A valid email address is required.";
    }

    if (empty($feedback)) {
        $errors['feedback'] = "Please provide your feedback.";
    }

    // If there are no errors, insert feedback into the database and redirect
    if (empty($errors)) {
        $query = "INSERT INTO userfeedback (username, email, feedback) VALUES ('$username', '$email', '$feedback')";
        if (mysqli_query($con, $query)) {
            header("Location: thanks.php"); // Redirect to thanks.php
            exit();
        } else {
            $errors['db_error'] = "Failed to submit your feedback. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        include 'header1.php';
    ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">We Value Your Feedback</h2>

        <!-- Feedback form -->
        <form action="userFeedback.php" method="POST" class="shadow p-4" style="background-color: #d3d3d3; border-radius: 10px;">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                <?php if (isset($errors['username'])): ?>
                    <div class="text-danger"><?php echo $errors['username']; ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                <?php if (isset($errors['email'])): ?>
                    <div class="text-danger"><?php echo $errors['email']; ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="feedback" class="form-label">Feedback:</label>
                <textarea class="form-control" id="feedback" name="feedback" rows="4" required><?php echo htmlspecialchars($feedback); ?></textarea>
                <?php if (isset($errors['feedback'])): ?>
                    <div class="text-danger"><?php echo $errors['feedback']; ?></div>
                <?php endif; ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" style="width: 50%;">Send Feedback</button>
            </div>
            <?php if (isset($errors['db_error'])): ?>
                <div class="text-danger mt-3"><?php echo $errors['db_error']; ?></div>
            <?php endif; ?>
        </form>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>
