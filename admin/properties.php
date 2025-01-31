<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Property List
                        <a href="properties-create.php" class="btn btn-primary float-end">Add Property</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?= alertMessage(); ?>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>id</th>
                            <th>title</th>
                            <th>Price</th>
                            <th>Property Type</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $property = getAll('properties');
                            if (mysqli_num_rows($property) > 0) {
                                foreach ($property as $property) {
                            ?>
                                    <tr>
                                        <td><?= $property['id']; ?></td>
                                        <td><?= $property['title']; ?></td>
                                        <td><?= $property['property_type']; ?></td>
                                        <td><?= $property['status'] == 1 ? 'hidden' : 'shown'; ?></td>
                                        <td>
                                            <a href="properties-edit.php?id=<?= $property['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <a href="properties-delete.php?id=<?= $property['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td class="text-center">No such data found</td>
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