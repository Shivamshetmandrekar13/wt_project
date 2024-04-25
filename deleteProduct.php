<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shutterspace";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["productId"];
    $deleteQuery = "DELETE FROM products WHERE id='$productId'";

    if (mysqli_query($conn, $deleteQuery)) {
        $successMessage = "Product Deleted successfully";
    } else {
        $successMessage = "Error deleting product: " . mysqli_error($conn);
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shutterspace-Delete a product</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <span class="brandName">Shutter Space</span>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="profile.html">Profile</a></li>
            <li><a href="seller-page.html">Seller</a></li>
        </ul>
    </nav>
    <a href="seller.php" class="back-button">Back</a>
    <section class="add-product">
        <h2>Delete a Product</h2>
        <form action="" method="post">
            <label for="productId">Product Id:</label>
            <input type="number" id="productId" name="productId" required>
            <button type="submit">Delete Product</button>

            <?php if (!empty($successMessage)) : ?>
                <div class="centered-message">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>
        </form>
    </section>
    <footer class="footer">
        <div class="footer-cta">
            <h2>Keep the Inspiration Going</h2>
            <p>Don’t miss out - stay connected with Nikon to receive the latest news, events, and promotions to fuel
                your creative vision.</p>
            <div class="signup-buttons">
                <a class="cta-link" href="Signup.php" style="margin-right:6%">Sign Up</a>
                <a class="cta-link" href="Login.php">Login</a>
            </div>
        </div>
        <p>&copy; 2023 Shutterspace. All rights reserved.</p>
    </footer>
</body>

</html>
