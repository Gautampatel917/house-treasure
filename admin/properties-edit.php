<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Update Property
                        <a href="properties.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <?php
                        $confirmation = checkParamId('id');
                        if (!is_numeric($confirmation)) {
                            redirect('properties.php', $confirmation);
                        } else {
                            $property = getById('properties', $confirmation);

                            if ($property['status'] == 200) {
                        ?>

                                <input type="hidden" name="propertyId" value="<?= $property['data']['id']; ?>">

                                <div class="mb-3">
                                    <label>Property Title</label>
                                    <input type="text" name="title" class="form-control" value="<?= $property['data']['title']; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label>Landmark</label>
                                    <input type="text" name="landmark" value="<?= $property['data']['landmark']; ?>" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Short info</label>
                                    <textarea name="short_info" class="form-control" rows="2" required><?= $property['data']['short_info']; ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="3" required><?= $property['data']['description']; ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Price</label>
                                    <input type="text" name="price" value="<?= $property['data']['price']; ?>" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>City</label>
                                    <input type="text" name="price" value="<?= $property['data']['city']; ?>" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Postcode</label>
                                    <input type="text" name="postcode" value="<?= $property['data']['postcode']; ?>" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" rows="3" required><?= $property['data']['address']; ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Property Type</label>
                                    <select name="property_type">
                                        <option value="House">House</option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Villa">Villa</option>
                                        <option value="Office">Office</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Number of bedrooms</label>
                                    <input type="number" name="bedrooms" value="<?= $property['data']['bedrooms']; ?>" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Number of rooms</label>
                                    <input type="number" name="rooms" value="<?= $property['data']['rooms']; ?>" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Area of Property</label>
                                    <input type="number" name="area" value="<?= $property['data']['area']; ?>" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Year Of Building</label>
                                    <input type="date" name="buildingYear" value="<?= $property['data']['buildingYear']; ?>" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Total flor</label>
                                    <input type="number" min="1" name="total_flor" class="form-control" placeholder="Live blank if there is no flor or ground flor">
                                </div>

                                <div class="mb-3">
                                    <label>Upload property Image</label>
                                    <input type="file" name="image" value="<?= $property['data']['image']; ?>" class="form-control">
                                    <img src="<?= '../' . $property['data']['image'] ?>" alt="img" style="width: 100px; hight : 100px">
                                </div>

                                <div class="mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" <?php $property['data']['status'] == true ? 'checked' : ''; ?> style="width: 30px; height:30px;">
                                </div>

                                <button type="submit" name="updateProperty" class="btn btn-primary">Update</button>

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