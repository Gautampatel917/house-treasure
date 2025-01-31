<?php include('config/function.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/account.css">
    <title>Agent Account</title>
</head>

<body>
    <div class="sidebar">
        <h2>Agent Panel</h2>
        <a href="index.php">Dashboard</a>
        <a href="inquiries.php">Inquiries</a>
        <a href="account.php">Account</a>
        <a href="logout.php">Logout</a>
    </div>

    <?php
    $name = $_SESSION['loggedInUser']['name'];
    $data = "SELECT * FROM agent WHERE name ='$name' AND status='0' LIMIT 1";
    $result = mysqli_query($conn, $data);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        error_log("Query Error: " . mysqli_error($conn), 3, "error_log.txt");
        exit; // or display an error message
    }

    ?>

    <div class="content">
        <h2>Update Your Account</h2>
        <div class="account-info">
            <h3>Account Information</h3>
            <p>Name: <span id="name-info"><?= $row['name']; ?></span></p>
            <p>Email: <span id="email-info"><?= htmlspecialchars($row['email']); ?></span></p>
            <p>Phone: <span id="phone-info"><?= htmlspecialchars($row['phone']); ?></span></p>
            <p>Address: <span id="address-info"><?= htmlspecialchars($row['address']); ?></span></p>
            <a href="delete-account.php?id=<?= $row['id'] ?>"></a>
        </div>
        <form action="code.php" method="POST" enctype="multipart/form-data" class="form">

            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="form-control">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= ($row['name']); ?>" required>
            </div>

            <div class="form-control">
                <label for="profile_picture">Profile Picture:</label>
                <input type="file" id="profile_picture" name="profile_picture" required>
            </div>

            <div class="form-control">
                <label for="experience">Experience:</label>
                <select id="experience" name="experience" required>
                    <option value="">Select an option</option>
                    <option value="0-2">0-2 years</option>
                    <option value="2-5">2-5 years</option>
                    <option value="5-10">5-10 years</option>
                    <option value="10+">10+ years</option>
                </select>
            </div>

            <div class="form-control">
                <label for="small_description">Small Description:</label>
                <textarea id="small_description" name="short_description" rows="3" required><?= ($row['short_description']); ?></textarea>
            </div>

            <div class="form-control">
                <label for="long_description">Long Description:</label>
                <textarea id="long_description" name="long_description" rows="5" required><?= ($row['long_description']); ?></textarea>
            </div>

            <div class="form-control">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= ($row['email']); ?>" required>
            </div>

            <div class="form-control">
                <label for="password">Password:</label>
                <input type="password" id="password" value="<?= ($row['password']); ?>" name="password" required>
            </div>

            <div class="form-control">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" value="<?= ($row['phone']); ?>" required>
            </div>

            <div class="form-control">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?= ($row['address']); ?>" required>
            </div>

            <button type="submit" name="update-account">Update Information</button>
        </form>
    </div>

    <div class="footer">
        <p>&copy; 2024 Your Real Estate Website. All Rights Reserved.</p>
    </div>
</body>

</html>