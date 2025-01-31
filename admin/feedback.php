<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Feedback
                    </h4>
                </div>
                <div class="card-body">

                    <?= alertMessage(); ?>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Message</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $feedback = mysqli_query($conn, "SELECT * FROM feedback ORDER BY id DESC");
                            if ($feedback) {
                                if (mysqli_num_rows($feedback) > 0) {
                                    foreach ($feedback as $feedback) {
                            ?>
                                        <tr>
                                            <td><?= $feedback['id']; ?></td>
                                            <td><?= $feedback['name']; ?></td>
                                            <td><?= $feedback['message']; ?></td>
                                            <td><?= $feedback['time']; ?></td>
                                            <td><?= $feedback['status']; ?></td>
                                            <td>
                                                <a href="feedback-delete.php?id=<?= $feedback['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
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