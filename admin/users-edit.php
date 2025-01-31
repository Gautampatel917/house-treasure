<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit User
                        <a href="users.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">


                    <form action="code.php" method="POST">
                        <?php
                        $paramResult = checkParamId('id');
                        $id = $_GET['id'];

                        if (!is_numeric($paramResult)) {
                            echo '<h5>' . $paramResult . '</h5>';
                            return false;
                        }
                        $user = getById('users', checkParamId('id'));
                        if ($user['status'] == 200) {
                        ?>

                            <input type="hidden" name="userId" value="<?= $user['data']['id']; ?>">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?php echo $user['data']['name']; ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Phone no:</label>
                                        <input type="text" name="phone" value="<?php echo $user['data']['phone']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?php echo $user['data']['email']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="password" name="password" value="<?php echo $user['data']['password']; ?>" class="form-control">
                                        <!-- <input type="password" name="password" value="<?= $user['data']['password']; ?>" class="form-control"> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Select role</label>
                                        <select name="role" class="form-select">
                                            <option value="">Select Role</option>
                                            <option value="admin" <?= $user['data']['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                            <option value="user" <?= $user['data']['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Is Ban</label>
                                        <br>
                                        <input type="checkbox" name="is_ban" <?php $user['data']['is_ban'] == true ? 'checked' : ''; ?> style="width: 30px;height:30px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <button name="updateUser" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                            echo '<h5>' . $user['message'] . '</h5>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>