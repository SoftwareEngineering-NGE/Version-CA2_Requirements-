<?php
// Check if 'dog' is passed via the URL
if (isset($_GET['dog'])) {
    // Get the dog name from the URL
    $dog_name = $_GET['dog'];

    // Array of dogs with details
    $dogs = [
        "Rex" => ["age" => "6yo", "breed" => "German Shepherd", "description" => "A loyal and protective dog."],
        "Bella" => ["age" => "1yo", "breed" => "Pug", "description" => "Friendly and playful."],
        "Max" => ["age" => "9mth", "breed" => "Jack Russell", "description" => "Young and active."],
        "Lucy" => ["age" => "6yo", "breed" => "Lab", "description" => "Intelligent and calm."],
        "Ralph" => ["age" => "5mth", "breed" => "Doberman", "description" => "Curious and cheerful."]
    ];

    // Check if the dog exists in the array
    if (array_key_exists($dog_name, $dogs)) {
        $dog_details = $dogs[$dog_name];
    } else {
        $dog_details = null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Description</title>
</head>
<body>
<h1>Dog Description</h1>

<?php if ($dog_details): ?>
    <h2><?php echo $dog_name; ?></h2>
    <p><strong>Age:</strong> <?php echo $dog_details['age']; ?></p>
    <p><strong>Breed:</strong> <?php echo $dog_details['breed']; ?></p>
    <p><strong>Description:</strong> <?php echo $dog_details['description']; ?></p>

<?php else: ?>
    <p>Sorry, no details available for this dog.</p>
<?php endif; ?>

<!-- Button to request this pet -->
<form action="request_form.php" method="get">
    <input type="hidden" name="dog" value="<?php echo urlencode($dog_name); ?>">
    <button type="submit">Send adoption request</button>
</form>

<a href="index.php">Back to Adoption Center</a>
</body>
</html>
