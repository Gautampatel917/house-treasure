<?php include('includes/header.php') ?>
<div class="heroSection" style="margin-left:300px">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card card-body p-3">
                <div class="card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Enquiries</p>
                    <h5 class="font-weight-bolder mb-0">
                        <?= getCount('service_enquires') ?>
                        <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card card-body p-3">
                <div class="card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Services</p>
                    <h5 class="font-weight-bolder mb-0">
                        <?= getCount('services') ?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card card-body p-3">
                <div class="card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Properties</p>
                    <h5 class="font-weight-bolder mb-0">
                        <?= getCount('properties') ?>
                    </h5>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-3 mb-4">
            <div class="card card-body p-3">
                <div class="card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Social Medias</p>
                    <h5 class="font-weight-bolder mb-0">
                        <//?= getCount('social_medias') ?>
                    </h5>
                </div>
            </div>
        </div> -->
        <div class="col-md-3 mb-4">
            <div class="card card-body p-3">
                <div class="card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Users</p>
                    <h5 class="font-weight-bolder mb-0">
                        <?= getCount('users') ?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card card-body p-3">
                <div class="card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Agent</p>
                    <h5 class="font-weight-bolder mb-0">
                        <?= getCount('agent') ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>