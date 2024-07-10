<section>
    <div class="container">
        <div class="mt-4 text-center">
            <h3 class="text-danger  text-uppercase"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></h3>
            <!-- ba hình thoi và đường kẻ ngang -->
            <div class="square-area">
                <div class="rotated-square">
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="row share">
            <b><?= chiase ?>:</b>
            <div class="social-plugin w-clear">
                <div class="website_share d-flex align-items-center pr-2">
                    <div class="zalo-share-button" data-href="<?= $func->getCurrentPageURL() ?>" data-oaid="<?= ($optsetting['oaidzalo'] != '') ? $optsetting['oaidzalo'] : '579745863508352884' ?>" data-layout="1" data-color="blue" data-customize=true>
                        <img width="20" height="20" src="../../assets/images/zalo1.png">
                        <span style="color: #fff; font-size: 11px; font-weight: 500;letter-spacing: 0.5px">Share</span>
                    </div>
                </div>
                <div class="sharethis-inline-share-buttons"></div>
            </div>
        </div>
    </div>
</section>