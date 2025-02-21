<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $age = (int)$_POST['age'];
    $house_type = isset($_POST['house_type']) ? htmlspecialchars($_POST['house_type']) : '';

    // Check if all conditions are agreed to
    $conditions_accepted = isset($_POST['conditions']) && count($_POST['conditions']) === 4;

    // Check if age is 18 or older and all conditions are accepted
    if ($age >= 18 && $conditions_accepted) {
        $confirmation_message = "Thank you for your adoption request, $name! 
        We will contact you shortly via phone to schedule a meeting and assess your suitability for adoption.";
    } else {
        $confirmation_message = "Sorry, you must be at least 18 years old and agree to all adoption conditions to proceed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Request</title>
</head>
<body>

<h1>Adoption Request Form</h1>

<?php if (isset($confirmation_message)): ?>
    <p><strong><?php echo nl2br($confirmation_message); ?></strong></p>
    <a href="index.php">Back to Adoption Center</a>
<?php else: ?>
    <form action="request_form.php" method="POST">
        <label for="name">Full Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" required><br><br>

        <label>What kind of house do you have?</label><br>
        <input type="radio" id="apartment" name="house_type" value="Apartment" required>
        <label for="apartment">Apartment</label><br>
        <input type="radio" id="house" name="house_type" value="House" required>
        <label for="house">House</label><br><br>

        <h3>Adoption Conditions</h3>
        <p>Please agree to the following conditions:</p>

        <input type="checkbox" id="condition1" name="conditions[]" value="responsibility" required>
        <label for="condition1">I will provide proper food, water, and shelter for the pet.</label><br>

        <input type="checkbox" id="condition2" name="conditions[]" value="vet-care" required>
        <label for="condition2">I will ensure regular veterinary care, including vaccinations.</label><br>

        <input type="checkbox" id="condition3" name="conditions[]" value="safe-home" required>
        <label for="condition3">I have a safe living environment suitable for the pet.</label><br>

        <input type="checkbox" id="condition4" name="conditions[]" value="commitment" required>
        <label for="condition4">I understand that adopting a pet is a long-term commitment.</label><br><br>

        <button type="submit">Submit Request</button>
    </form>
<?php endif; ?>

</body>
</html>
