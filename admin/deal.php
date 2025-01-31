<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <?= alertMessage(); ?>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>deals ID</th>
                                <th>Property Name</th>
                                <th>Location</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // SQL query
                            $sql = "SELECT deals.id, deals.status, properties.title AS propertyName, properties.address AS location, properties.price 
                                    FROM deals
                                    JOIN properties ON deals.property_id = properties.id";

                            // Execute query
                            $result = $conn->query($sql);

                            // Check for query execution errors
                            if (!$result) {
                                echo "Error: " . $conn->error; // Debug: Show error message if query fails
                            } else {
                                if ($result->num_rows > 0) {
                                    // Output data for each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>" . $row['id'] . "</td>
                                                <td>" . $row['propertyName'] . "</td>
                                                <td>" . $row['location'] . "</td>
                                                <td>" . $row['price'] . "</td>
                                                <td>" . $row['status'] . "</td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>No such data found</td></tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>