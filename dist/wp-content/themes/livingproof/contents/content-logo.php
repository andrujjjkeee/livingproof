<!-- logo -->
<?php if(is_front_page()){ ?>
    <!-- logo -->
    <h1 class="logo">
		<?php add_logo(); ?>
        <span>NUTRITION</span>
        <span>STRENGTH</span>
        <span>PILATES</span>
    </h1>
    <!-- /logo -->
<?php } else {?>
    <!-- logo -->
    <a href="<?= get_home_url();  ?>" class="logo">
		<?php add_logo(); ?>
        <span>NUTRITION</span>
        <span>STRENGTH</span>
        <span>PILATES</span>
    </a>
    <!-- /logo -->
<?php } ?>
<!-- /logo -->