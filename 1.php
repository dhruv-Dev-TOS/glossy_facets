<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
</head>
<body>

<?php
// Initialize variables to store form data
$name = $email = $message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $message = test_input($_POST["message"]);

    // Perform any validation or processing as needed

    // Display a success message
    echo "<p>Form submitted successfully!</p>";
}

// Function to sanitize and validate input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $name; ?>">
    <br>

    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <br>

    <label for="message">Message:</label>
    <textarea name="message"><?php echo $message; ?></textarea>
    <br>

    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
