<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Services Lists
                        <a href="services-create.php" class="btn btn-primary float-end">Add Services</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?= alertMessage(); ?>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>id</th>
                            <th>name</th>
                            <th>status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $service = getAll('services');
                            if (mysqli_num_rows($service) > 0) {
                                foreach ($service as $service) {
                            ?>
                                    <tr>
                                        <td><?= $service['id']; ?></td>
                                        <td><?= $service['name']; ?></td>
                                        <td><?= $service['status'] == 1 ? 'hidden' : 'shown'; ?></td>
                                        <td>
                                            <a href="services-edit.php?id=<?= $service['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <a href="services-delete.php?id=<?= $service['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
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
                            ?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>