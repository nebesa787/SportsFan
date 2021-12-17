<?php get_header(); ?>
<?php if ( in_category( 'news' ) ) {?>
	<?php get_template_part( 'single', 'news' ); ?>
<?php } elseif ( in_category( 'blog' ) ) {?>
	<?php get_template_part( 'single', 'news' ); ?>
<?php } else {?>
	<?php get_template_part( 'single', 'logo' ); ?>
<?php } ?>
<?php get_footer(); ?>