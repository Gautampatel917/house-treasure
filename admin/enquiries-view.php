<?php include('includes/header.php'); ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        View Enquiries
                        <a href="enquiries.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <?php
                    $confirmation = checkParamId('id');
                    if (!is_numeric($confirmation)) {
                        redirect('enquiries.php', $confirmation);
                    } else {
                        $enquiries = getById('service_enquires', $confirmation);

                        if ($enquiries['status'] == 200) {
                    ?>

                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr style="width: 30%;">
                                        <td>Enquiry Id</td>
                                        <td><?= $enquiries['data']['id'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Client Name</td>
                                        <td><?= $enquiries['data']['name'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Enquiry Email</td>
                                        <td><?= $enquiries['data']['email'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Enquiry Phone</td>
                                        <td><?= $enquiries['data']['phone'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Enquiry Service</td>
                                        <td><?= $enquiries['data']['service_name'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Enquiry Message</td>
                                        <td><?= $enquiries['data']['message'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Enquiry Status</td>
                                        <td><?= $enquiries['data']['status'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Created At (Enquiry Date)</td>
                                        <td><?= $enquiries['data']['created_at'] ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="mt-3">
                                <div class="card card-body">
                                    <form action="code.php" method="post">

                                        <input type="hidden" name="enquiryId" value="<?= $enquiries['data']['id'] ?>">
                                        <input type="hidden" name="c_name" value="<?= $enquiries['data']['name'] ?>">
                                        <input type="hidden" name="c_email" value="<?= $enquiries['data']['email'] ?>">
                                        <input type="hidden" name="phone" value="<?= $enquiries['data']['phone'] ?>">
                                        <input type="hidden" name="s_name" value="<?= $enquiries['data']['service_name'] ?>">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>
                                                    Status
                                                </label>
                                                <select class="form-control" name="status">
                                                    <option value="pending">Pending</option>
                                                    <option value="completed">Completed</option>
                                                    <option value="cancelled">Cancelled</option>
                                                </select>
                                                <textarea name="response" id="response" required class="form-control"></textarea>
                                            </div>

                                            <div class="col-md-8">
                                                <br>
                                                <button type="submit" class="btn btn-primary" name="enquiriesUpdateStatus">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    <?php
                        } else {
                            redirect('enquiries.php', $enquiries['message']);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>