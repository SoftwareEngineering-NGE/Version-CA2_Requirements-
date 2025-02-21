<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Center</title>
    <style>
        /* Styling */
        ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        li {
            text-align: center;
        }
        img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            display: block;
            margin: 0 auto;
        }
        .dog-name {
            font-size: 18px;
            font-weight: bold;
            margin-top: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .favourite-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: gray;
            margin-left: 5px;
        }
        .favourite-btn:hover {
            color: red;
        }
        .register-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .register-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h1><a href="index.php" style="text-decoration: none; color: inherit;">Welcome to the Adoption Center</a></h1>


<!-- Search Bar -->
<div class="search-bar">
    <form method="POST">
        <input type="text" name="search_breed" placeholder="Search dogs by breed...">
        <button type="submit">Search</button>
    </form>
</div>

<!-- Registration Button -->
<a href="registration.php" class="register-btn">Register</a>

<h2>Available Dogs for Adoption:</h2>

<?php
// Dog details stored in dog_description.php format
$dog_details = [
    "Rex" => ["age" => "6yo", "breed" => "German Shepherd", "description" => "A loyal and protective dog."],
    "Bella" => ["age" => "1yo", "breed" => "Pug", "description" => "Friendly and playful."],
    "Max" => ["age" => "9mth", "breed" => "Jack Russell", "description" => "Young and active."],
    "Lucy" => ["age" => "6yo", "breed" => "Lab", "description" => "Intelligent and calm."],
    "Ralph" => ["age" => "5mth", "breed" => "Doberman", "description" => "Curious and cheerful."]
];

// Check if a search has been performed
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search_breed'])) {
    $search_breed = strtolower(trim($_POST['search_breed']));
    $filtered_dogs = [];

    // Find dogs that match the breed
    foreach ($dog_details as $name => $details) {
        if (strtolower($details["breed"]) === $search_breed) {
            $filtered_dogs[] = $name;
        }
    }

    // Display results
    if (empty($filtered_dogs)) {
        echo "<p>No dogs available for the breed '$search_breed'.</p>";
    } else {
        echo "<ul>";
        foreach ($filtered_dogs as $dog) {
            echo "<li>";
            echo "<img src='images/$dog.jpg' alt='$dog'>";
            echo "<a href='dog_description.php?dog=" . urlencode($dog) . "'><span class='dog-name'>$dog</span></a>";
            echo "<button class='favourite-btn' title='Add to Favourites'>&#9829;</button>";
            echo "</li>";
        }
        echo "</ul>";
    }
} else {
    // Default: Show all dogs
    echo "<ul>";
    foreach ($dog_details as $name => $details) {
        echo "<li>";
        echo "<img src='images/$name.jpg' alt='$name'>";
        echo "<a href='dog_description.php?dog=" . urlencode($name) . "'><span class='dog-name'>$name</span></a>";
        echo "<button class='favourite-btn' title='Add to Favourites'>&#9829;</button>";
        echo "</li>";
    }
    echo "</ul>";
}
?>
</body>
</html>
