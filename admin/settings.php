<?php include('includes/header.php') ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-11 mb-4">
            <div class="card">
                <?= alertMessage() ?>
                <div class="card-header">
                    <h4>Website settings</h4>
                </div>
                
                <div class="card-body">

                    <form action="code.php" method="POST">
                    <?php
                        $setting = getById('settings',1)
                    ?>
                    <input type="hidden" name="settingId" value="<?= $setting['data']['id']??'insert'?>">

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" value="<?= $setting['data']['title'] ?? ""?>" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>URL / Domain</label>
                        <input type="text" name="slug" value="<?= $setting['data']['slug'] ?? ""?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Small Description</label>
                        <input type="text" name="small_description" value="<?= $setting['data']['small_description'] ?? ""?>" class="form-control">
                    </div>

                    <h4 class="my-3">SEO Settings</h4>
                    <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3"><?= $setting['data']['meta_description'] ?? ""?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" rows="3"><?= $setting['data']['meta_keyword'] ?? ""?></textarea>
                    </div>
                    
                    <h4 class="my-3">Contact Information</h4>
                    <div class="mb-3">
                        <label>Email 1</label>
                        <input type="text" name="email1" value="<?= $setting['data']['email1'] ?? ""?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Email 2</label>
                        <input type="text" name="email2" value="<?= $setting['data']['email2'] ?? ""?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Phone 1</label>
                        <input type="text" name="phone1" value="<?= $setting['data']['phone1'] ?? ""?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Phone 2</label>
                        <input type="text" name="phone2" value="<?= $setting['data']['phone2'] ?? ""?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="3"><?= $setting['data']['address'] ?? ""?></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="saveSetting" class="btn btn-primary">Save Setting</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>