			<footer>
				<div class="container">
					<?php
						$specsf = array(
							'menu'=> 'Footer Nav (2019 brand launch)',
							'echo'=> true,
							'fallback_cb'=> 'false',
							'depth'=> 0
						);
						wp_nav_menu($specsf);
					?>
					<div class="info">
						<div class="address">AvidXchange HQ, 1210 AvidXchange Lane, Charlotte, NC, 28206        |        <a href="tel:+18005609305">800.560.9305</a></div>
						<ul class="social">
							<li>
								<a href="https://www.facebook.com/pages/AvidXchange-Inc/60903098932" target="_blank">
									<span>
										<object data="<?php echo get_stylesheet_directory_uri();?>/img/fb.svg">
											<img src="<?php echo get_stylesheet_directory_uri();?>/img/fb.png" alt="AvidX Facebook" />
										</object>
									</span>
								</a>
							</li>
							<li>
								<a href="https://twitter.com/AvidXchange" target="_blank">
									<span>
										<object data="<?php echo get_stylesheet_directory_uri();?>/img/twitter.svg">
											<img src="<?php echo get_stylesheet_directory_uri();?>/img/twitter.png" alt="AvidX Twitter" />
										</object>
									</span>
								</a>
							</li>
							<li>
								<a href="https://www.linkedin.com/company/54461?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A54461%2Cidx%3A2-1-4%2CtarId%3A1458050635964%2Ctas%3Aavidxchange" target="_blank">
									<span>
										<object data="<?php echo get_stylesheet_directory_uri();?>/img/linkedin.svg">
											<img src="<?php echo get_stylesheet_directory_uri();?>/img/linkedin.png" alt="AvidX Linkedin" />
										</object>
									</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="policy"><a href="/privacy-policy">Privacy Policy</a> | <a href="/notice-to-customers/">Customer Notice</a> | NMSL ID #: 1494826</div>
					<div class="copy">&copy; 2019 AvidXchange. All rights reserved.</div>
				</div>
			</footer>
		</div> <!-- End of Wrapper Div -->
		<?php wp_footer();?>
		<script>
			jQuery(function() {
				jQuery('.m-nav-container ul li.menu-item-has-children').on('click',function(e) {
					if(jQuery(e.target).is(jQuery(this))){
						jQuery(this).toggleClass('tap');
					}
				});
				
				jQuery('.m-nav-container ul li ul li.menu-item-has-children').on('click', function() {
					jQuery(this).toggleClass('tapped');
				});
			});
		</script>
	</body>
</html>