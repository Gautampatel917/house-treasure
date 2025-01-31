<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Agent
                        <a href="agent-create.php" class="btn btn-primary float-end">Add Agent</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?= alertMessage(); ?>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>is_ban</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $agent = getAll('agent');
                            if (mysqli_num_rows($agent) > 0) {
                                foreach ($agent as $userItems) {
                            ?>
                                    <tr>
                                        <td><?= $userItems['id']; ?></td>
                                        <td><?= $userItems['name']; ?></td>
                                        <td><?= $userItems['email']; ?></td>
                                        <td><?= $userItems['phone']; ?></td>
                                        <td><?= $userItems['status'] == 1 ?  'Disable' : 'Active'; ?></td>
                                        <td>
                                            <a href="agent-edit.php?id=<?= $userItems['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <a href="agent-delete.php?id=<?= $userItems['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                        </td>
                                    <tr>
                                    <?php
                                }
                            } else {
                                    ?>
                                    <tr>
                                        <td colspan='7'>No Record Found</td>
                                    </tr>
                                <?php
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