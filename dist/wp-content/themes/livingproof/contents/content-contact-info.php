<?php
$contactPhone = get_field( 'phone', 'options' );
$phone = format_phone('us', $contactPhone);
?>

<a href="tel:<?= $contactPhone ?>" class="header__phone"><?= $phone ?></a>
<a href="mailto:<?php the_field( 'email', 'options' ) ?>" class="header__main"><?php the_field( 'email', 'options' ) ?></a>