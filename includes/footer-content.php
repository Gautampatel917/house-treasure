<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="footer-heading"><?= webSetting('title') ?? 'Meta Desc' ?></h4>
                <hr>
                <p>
                    <?= webSetting('small_description') ?? 'Meta Desc' ?>
                </p>
                <br>
            </div>

            <div class="col-md-6">
                <h4 class="footer-heading">Follow us</h4>
                <hr>
                <ul>
                    <?php
                    $socialMedia = getAll('social_medias');
                    if ($socialMedia) {
                        if (mysqli_num_rows($socialMedia) > 0) {
                            foreach ($socialMedia as $socialItem) {
                    ?> <!-- important point -->
                                <li>
                                    <a href="<?= $socialItem['url']; ?>"><?= $socialItem['name']; ?></a>
                                </li>
                    <?php
                            }
                        } else {
                            echo "No such record found";
                        }
                    } else {
                        echo "Something Went wrong";
                    }
                    ?>
                </ul>
                <div>
                </div>
            </div>
        </div>