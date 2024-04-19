<?php
include('../template/db_connect.php'); // Ensure you have a connection to the database

if (isset($_GET['search'])) {
    $search_term = $_GET['search'];

    // SQL query with a prepared statement
    $stmt = $conn->prepare("SELECT * FROM `product` WHERE p_name LIKE CONCAT('%', ?, '%')");
    $stmt->bind_param("s", $search_term);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display each product found
        while ($row = $result->fetch_assoc()) {
            echo "<p>";
            echo "Product Name: " . htmlspecialchars($row['p_name']) . "<br>";
            echo "Description: " . htmlspecialchars($row['description']) . "<br>";
            echo "Price: $" . htmlspecialchars($row['price']);
            echo "</p>";
        }
    } else {
        echo "<p>No products found that match your search criteria.</p>";
    }

    $stmt->close();
}
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Search</title>
</head>
<body>
    <h1>Search for a Product</h1>
    <form action="test.php" method="GET">
        <input type="text" name="search" placeholder="Search products..." required>
        <button type="submit">Search</button>
    </form>
</body>
</html>
