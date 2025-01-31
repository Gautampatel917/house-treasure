<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit Agent
                        <a href="agent.php" class="btn btn-danger float-end">Back</a>
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
                        $agent = getById('agent', checkParamId('id'));
                        if ($agent['status'] == 200) {
                        ?>

                            <input type="hidden" name="agentId" value="<?= $agent['data']['id']; ?>">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?php echo $agent['data']['name']; ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Profile</label>
                                        <input type="file" id="profile_picture" name="profile_picture" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Experience:</label>
                                        <select id="experience" name="experience" class="form-control" required>
                                            <option value="">Select an option</option>
                                            <option value="0-2">0-2 years</option>
                                            <option value="2-5">2-5 years</option>
                                            <option value="5-10">5-10 years</option>
                                            <option value="10+">10+ years</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Small Description:</label>
                                        <textarea id="small_description" name="short_description" rows="3" class="form-control" required><?= ($row['short_description']); ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Long Description:</label>
                                        <textarea id="long_description" name="long_description" rows="5" class="form-control" required><?= ($row['long_description']); ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?php echo $agent['data']['email']; ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="password" name="password" value="<?php echo $agent['data']['password']; ?>" class="form-control">
                                        <!-- <input type="password" name="password" value="<?= $agent['data']['password']; ?>" class="form-control"> -->
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Phone no:</label>
                                        <input type="text" name="phone" value="<?php echo $agent['data']['phone']; ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>status</label>
                                        <br>
                                        <input type="checkbox" name="is_ban" <?php $agent['data']['status'] == true ? 'checked' : ''; ?> style="width: 30px;height:30px;">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <button name="updateAgent" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                            echo '<h5>' . $agent['message'] . '</h5>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>