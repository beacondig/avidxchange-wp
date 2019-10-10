<?php /*Template Name: Site Demo Thank You */ ?>
<?php get_header('new'); ?>
<?php
$cta_link = get_field('cta_link');
$cta_title = get_field('cta_title');
?>
<style>
	.lp-thank-you{
		background-image: url('<?php echo get_field('background_image') ?>')
	}
</style>
		<section class="lp-thank-you opening">
			<div class="container">
				<h1><?php echo get_field('banner_heading') ?></h1>
			</div>
		</section>
		<section class="lp-thank-you-cta">
			<div class="container">
            <?php echo get_field('body_copy') ?>
            <?php
if(get_field('cta_link'))
{
             echo   '<a class="btn" href="' . get_field('cta_link') . '">' . get_field('cta_title') . '</a>';
}
?>
			</div>
		</section>
<?php get_footer('new'); ?>