<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Add Services
                        <a href="properties.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">



                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <!-- <div class="mb-3">
                            <label>URL / Link</label>
                            <input type="text" name="slug" class="form-control" required>
                        </div> -->

                        <div class="mb-3">
                            <label>Landmark</label>
                            <input type="text" name="landmark" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Short info</label>
                            <textarea name="short_info" class="form-control" placeholder="Add slogan or short info" rows="2" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Postcode</label>
                            <input type="text" name="postcode" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control" rows="3" required></textarea>
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
                            <input type="number" name="bedrooms" placeholder="For houses, villa or apartment" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Number of Rooms</label>
                            <input type="number" name="rooms" placeholder="Number of office rooms" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Area of Property</label>
                            <input type="number" name="area" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Year Of Building</label>
                            <input type="date" name="buildingYear" id="buildingYear" class="form-control" format="mm/yyyy" required>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#buildingYear').datepicker({
                                    format: 'mm-yyyy',
                                    endDate: new Date() // This will disable future dates
                                });
                            });
                        </script>

                        <div class="mb-3">
                            <label>Total flor</label>
                            <input type="number" min="1" name="total_flor" class="form-control" placeholder="Live blank if there is no flor or ground flor">
                        </div>

                        <div class="mb-3">
                            <label>Upload Service Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" style="width: 30px; height:30px;">
                        </div>

                        <button type="submit" name="saveProperty" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>