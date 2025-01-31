<?php include('config/function.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/inquiries.css">
    <title>Agent Inquiries</title>
</head>

<body>
    <div class="sidebar">
        <h2>Agent Panel</h2>
        <a href="index.php">Dashboard</a>
        <a href="inquiries.php">Inquiries</a>
        <a href="account.php">Account</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content">
        <h2>Inquiries</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Property Name</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Response</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $name = $_SESSION['loggedInUser']['name'];
                $enquires = mysqli_query($conn, "SELECT * FROM property_enquires WHERE agent_name='$name' ORDER BY id DESC");
                if ($enquires) {
                    if (mysqli_num_rows($enquires) > 0) {
                        foreach ($enquires as $enquires) {
                ?>
                            <tr class="data-row">
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="property-enquiry-id" value="<?= $enquires['id'] ?>">
                                    <input type="hidden" name="property-id" value="<?= $enquires['p_id'] ?>">
                                    <input type="hidden" name="c_name" value="<?= $enquires['name'] ?>">
                                    <input type="hidden" name="c_email" value="<?= $enquires['email'] ?>">
                                    <input type="hidden" name="p_name" value="<?= $enquires['property_name'] ?>">
                                    <input type="hidden" name="agent_name" value="<?= $enquires['agent_name'] ?>">
                                    <td><?= $enquires['name']; ?></td>
                                    <td><?= $enquires['email']; ?></td>
                                    <td><?= $enquires['phone']; ?></td>
                                    <td><?= $enquires['property_name']; ?></td>
                                    <td><?= $enquires['p_address']; ?></td>
                                    <td><?= $enquires['message']; ?></td>
                                    <td>
                                        <select class="status-select" name="status">
                                            <option value="pending" <?= $enquires['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="completed" <?= $enquires['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea class="response-textarea" name="response" placeholder="Your response" required></textarea>
                                    </td>
                                    <td>
                                        <button type="submit" class="response-btn" name="response-btn">Submit</button>
                                    </td>
                                </form>
                            </tr>
                        <?php
                        }
                    } else { ?>
                        <tr>
                            <td colspan="9" style="text-align: center;">No Data Available</td>
                        </tr>
                <?php
                    }
                } else {
                    echo "Error: " . $conn->error;
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>&copy; 2024 Your Real Estate Website. All Rights Reserved.</p>
    </div>
</body>

</html>