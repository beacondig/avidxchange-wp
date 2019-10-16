<!DOCTYPE html>
<html>
<head>
		<?php wp_head(); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
</head>
<body <?php body_class(); ?>>
		<?php
			$specs1 = array(
				'menu'=> 'top bar menu',
				'echo'=> true,
				'fallback_cb'=> 'false',
				'depth'=> 0
			);
			$specs2 = array(
				'menu'=> 'Main Menu New',
				'container'=>'nav',
				'echo'=> true,
				'fallback_cb'=> 'false',
				'depth'=> 0
			);
			$specs3 = array(
				'menu'=> 'Mobile Menu',
				'container'=>'',
				'echo'=> true,
				'fallback_cb'=> 'false',
				'depth'=> 0
			);
		?>
		<div class="wrapper">
			<header class="site-header-new <?php echo get_field('header_style');?>">
				<div class="container">
					<div class="top-menu">
						<?php
							wp_nav_menu($specs1);
						?>
					</div>
					<div class="logo">
						<a href="/">
							<span>
								<object data="<?php echo get_stylesheet_directory_uri();?>/img/logo.svg">
									<img src="<?php echo get_stylesheet_directory_uri();?>/img/logo.png" alt="AvidX" />
								</object>
							</span>
						</a>
					</div>
					<?php
						wp_nav_menu($specs2);
					?>
					<div class="mobile-nav">
						<a class="demo-button" href="#demoReqeust">Request a Demo</a>
						<div class="navicon"><i class="fas fa-bars"></i></div>
						<div class="m-nav-container">
							<div class="mobile-close"><img src="<?php echo get_stylesheet_directory_uri();?>/img/mobile-close.png" /></div>
							<div class="logo">
								<a href="https://www.avidxchange.com/" target="_blank">
									<span>
										<object data="<?php echo get_stylesheet_directory_uri();?>/img/logo.svg">
											<img src="<?php echo get_stylesheet_directory_uri();?>/img/logo.png" alt="AvidX" />
										</object>
									</span>
								</a>
							</div>
							<?php
								wp_nav_menu($specs3);
							?>
						</div>
					</div>
				</div>
			</header>
			<div class="header-scroll">
				<div class="container">
					<div class="top-menu">
						<?php
							wp_nav_menu($specs1);
						?>
					</div>
					<div class="logo">
						<a href="/">
							<span>
								<object data="<?php echo get_stylesheet_directory_uri();?>/img/logo.svg">
									<img src="<?php echo get_stylesheet_directory_uri();?>/img/logo.png" alt="AvidX" />
								</object>
							</span>
						</a>
					</div>
					<?php
						wp_nav_menu($specs2);
					?>
					<div class="mobile-nav">
						<a class="demo-button" href="#demoReqeust">Request a Demo</a>
						<div class="navicon"><i class="fas fa-bars"></i></div>
						<div class="m-nav-container">
							<div class="mobile-close"><img src="<?php echo get_stylesheet_directory_uri();?>/img/mobile-close.png" /></div>
							<div class="logo">
								<a href="https://www.avidxchange.com/" target="_blank">
									<span>
										<object data="<?php echo get_stylesheet_directory_uri();?>/img/logo.svg">
											<img src="<?php echo get_stylesheet_directory_uri();?>/img/logo.png" alt="AvidX" />
										</object>
									</span>
								</a>
							</div>
							<?php
								wp_nav_menu($specs3);
							?>
						</div>
					</div>
				</div>
			</div>