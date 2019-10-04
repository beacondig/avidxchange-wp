<?php /* Template Name: Industry Detail */?>
<?php get_header( 'new' ); ?>
		<section class="industry-detail-opening opening">
			<div class="container">
				<div class="type"><?php echo get_field('industry_type');?></div>
				<h1><?php echo get_field('industry_h1_title');?></h1>
			</div>
		</section>
		<section class="industry-detail-benefit-values">
			<div class="container">
				<h2><?php the_field( 'benefit_title' ); ?></h2>
				<p><?php the_field( 'benefit_description' ); ?></p>
				<?php if ( have_rows( 'benefit_values' ) ) : ?>
					<ul>
						<?php
						while ( have_rows( 'benefit_values' ) ) :
							the_row();
							?>
							<li>
								<div class="benefit">
									<img src="<?php the_sub_field( 'icon' ); ?>" alt="Icon" class="icon">
									<h3 class="item-title"><?php the_sub_field( 'title' ); ?></h3>
									<?php the_sub_field( 'description' ); ?>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
		<section class="industry-detail-logos">
			<div class="container">	
				<h2><?php echo get_field('accounting_system_title');?></h2>
				<?php if(have_rows('accounting_system_logos')): ?>
					<ul>
						<?php while(have_rows('accounting_system_logos')): the_row();?>	
							<li><img src="<?php echo the_sub_field('logo');?>" /></li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
				<a class="btn" href="<?php echo get_field('accounting_system_link_custom_url');?>"><?php echo get_field('accounting_system_link_text');?></a>
			</div>
		</section>
		<section class="industry-detail-solutions solutions-streamline">
			<div class="container">
				<?php get_template_part('partials/content', 'tabs-module'); ?>
			</div>
		</section>
		<section class="industry-detail-testimony-videos">
			<div class="container">
				<?php if ( have_rows( 'testimony_videos' ) ) : ?>
					<ul class="videos">
						<?php while ( have_rows( 'testimony_videos' ) ) : the_row(); ?>
							<li class="item">
								<iframe src="<?php echo the_sub_field('video_url');?>" title="AvidXchange" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%" ></iframe>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
		<section class="industry-detail-customer-logos">
			<div class="container">
				<h2 class="section-title is-white"><?php the_field( 'customers_title' ); ?></h2>
				<?php if ( have_rows( 'customers' ) ) : ?>
					<ul class="row customers">
						<?php
						while ( have_rows( 'customers' ) ) :
							the_row();
							$logo = get_sub_field( 'logo' );
							$logo = isset( $logo['sizes'] ) && isset( $logo['sizes']['medium'] ) ? $logo['sizes']['medium'] : '';
							?>
							<li>
								<div class="customer">
									<img alt="" src="<?php echo esc_url( $logo ); ?>" class="logo">
									<h3 class="item-title is-white"><?php the_sub_field( 'name' ); ?></h3>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
		<?php get_template_part( 'partials/sections/section', 'request-demo' ); ?>
<?php get_footer( 'new' );?>