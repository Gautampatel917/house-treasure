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
                                <th>Enquiry ID</th>
                                <th>Customer Name</th>
                                <th>Service Name</th>
                                <th>Advance Amount</th>
                                <th>Payment Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // SQL query
                            $sql = "SELECT service_enquires.id, service_enquires.name, service_enquires.service_name, 
                                    payment.advance_amount, payment.p_status, payment.payment_date
                                    FROM service_enquires
                                    JOIN payment ON service_enquires.id = payment.service_id";

                            $result = $conn->query($sql);

                            if (!$result) {
                                echo "Error: " . $conn->error; // Show error message if query fails
                            } else {
                                if ($result->num_rows > 0) {
                                    // Output data for each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>" . $row['id'] . "</td>
                                                <td>" . $row['name'] . "</td>
                                                <td>" . $row['service_name'] . "</td>
                                                <td>" . $row['advance_amount'] . "</td>
                                                <td>" . $row['p_status'] . "</td>
                                                <td>" . $row['payment_date'] . "</td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
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