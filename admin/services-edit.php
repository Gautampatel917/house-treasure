<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Update Services
                        <a href="services.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <?php
                        $confirmation = checkParamId('id');
                        if (!is_numeric($confirmation)) {
                            redirect('services.php', $confirmation);
                        } else {
                            $service = getById('services', $confirmation);

                            if ($service['status'] == 200) {
                        ?>

                                <input type="hidden" name="serviceId" value="<?= $service['data']['id']; ?>">

                                <div class="mb-3">
                                    <label>Service Name</label>
                                    <input type="text" name="serviceName" class="form-control" value="<?= $service['data']['name']; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label>Small Description</label>
                                    <textarea name="small_description" class="form-control" rows="3" required><?= $service['data']['small_description']; ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Long Description</label>
                                    <textarea name="long_description" class="form-control" rows="3" required><?= $service['data']['long_description']; ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Upload Service Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="<?= '../' . $service['data']['image'] ?>" alt="img" style="width: 100px; hight : 100px">
                                </div>

                                <h5>SEO Tags</h5>

                                <div class="mb-3">
                                    <label>1BHK</label>
                                    <input type="text" name="1bhk" class="form-control" value="<?= $service['data']['1bhk']; ?>">
                                </div>

                                <div class="mb-3">
                                    <label>2BHK</label>
                                    <input type="text" name="2bhk" class="form-control" value="<?= $service['data']['2bhk']; ?>">
                                </div>

                                <div class="mb-3">
                                    <label>3BHK</label>
                                    <input type="text" name="3bhk" class="form-control" value="<?= $service['data']['3bhk']; ?>">
                                </div>

                                <div class="mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" <?php $service['data']['status'] == true ? 'checked' : ''; ?> style="width: 30px; height:30px;">
                                </div>

                                <button type="submit" name="updateService" class="btn btn-primary">Update</button>

                        <?php
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>