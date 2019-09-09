<!DOCTYPE html>
<html>
<head>
		<?php wp_head(); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body class="lp">
		<div class="wrapper">
			<header>
				<div class="container">
					<div class="logo">
						<a href="https://www.avidxchange.com/" target="_blank">
							<span>
								<object data="<?php echo get_stylesheet_directory_uri();?>/img/logo.svg">
									<img src="<?php echo get_stylesheet_directory_uri();?>/img/logo.png" alt="AvidX" />
								</object>
							</span>
						</a>
					</div>
					<?php if(is_page_template('template-landing-page.php')) { ?>
						<a href="#demoRequest" class="demo-button">Request A Demo</a>
					<?php } ?>
				</div>
			</header>