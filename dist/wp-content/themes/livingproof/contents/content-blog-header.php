<!-- hero-inside -->
<div class="hero-inside <?php  if ( is_single() ){ ?> hero-inside_bigger <?php } ?> js-resize-section">

    <?php  if ( is_home() ){ ?>

        <div class="hero-inside__layout">
            <h1 class="hero-inside__title">Our Blog</h1>
            <div class="hero-inside__text">
                <p>News and information on nutrition, high intensity strength training, Pilates and more</p>
            </div>
        </div>

    <?php } else if ( is_search() ) { ?>

        <div class="hero-inside__layout">
            <h1 class="hero-inside__title">Search</h1>
            <div class="hero-inside__text">
                <p>results for: <?= get_search_query() ?></p>
            </div>
        </div>

    <?php } else if ( is_category() ) { ?>

        <div class="hero-inside__layout">
            <h1 class="hero-inside__title">Our Blog</h1>
            <div class="hero-inside__text">
                <p><?= single_tag_title() ?></p>
            </div>
        </div>

    <?php } ?>

    <div class="hero-inside__background">
        <img src="<?= get_template_directory_uri() ?>/assets/img/hero-blog.jpg" alt="img"/>
        <svg viewBox="0 0 1440 864">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(0.000000, -252.000000)" fill="#FFFFFF">
                    <g transform="translate(0.000000, 30.000000)">
                        <path d="M0,1085.84228 L1440,1085.84228 L1440,222.652844 C1353.69121,333.298813 1217.92013,388.621797 1032.68676,388.621797 C754.83671,388.621797 501.511999,304.788944 311.242088,304.788944 C184.395481,304.788944 80.6481181,348.214363 0,435.065201 L0,1085.84228 Z"></path>
                    </g>
                </g>
            </g>
        </svg>
    </div>

</div>
<!-- /hero-inside -->