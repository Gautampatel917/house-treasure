<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Enquiries Lists
                    </h4>
                </div>
                <div class="card-body">

                    <?= alertMessage(); ?>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>phone</th>
                            <th>Services</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $enquires = mysqli_query($conn, "SELECT * FROM service_enquires ORDER BY id DESC");
                            if ($enquires) {
                                if (mysqli_num_rows($enquires) > 0) {
                                    foreach ($enquires as $enquires) {
                            ?>
                                        <tr>
                                            <td><?= $enquires['id']; ?></td>
                                            <td><?= $enquires['name']; ?></td>
                                            <td><?= $enquires['phone']; ?></td>
                                            <td><?= $enquires['service_name']; ?></td>
                                            <td><?= $enquires['status']; ?></td>
                                            <td>
                                                <a href="enquiries-view.php?id=<?= $enquires['id']; ?>" class="btn btn-info btn-sm">view</a>
                                                <a href="enquiries-delete.php?id=<?= $enquires['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td>No such data found</td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo mysqli_error($conn);
                            }
                            ?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>