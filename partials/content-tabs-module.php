				<div class="tabs-module">
					<div class="desktop">
						<?php if(have_rows('solution_items')): ?>
							<ul class="headers">
								<?php $h = 1; ?>
								<?php while(have_rows('solution_items')): the_row();?>
									<?php if($h == 1) { ?>
										<li data-item="solution<?php echo $h;?>" class="active"><?php echo the_sub_field('solution_tab_text');?></li>
									<?php }else{ ?>
										<li data-item="solution<?php echo $h;?>"><?php echo the_sub_field('solution_tab_text');?></li>
									<?php } ?>
									<?php $h++; ?>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
						<?php if(have_rows('solution_items')): ?>
							<ul class="info">
								<?php $i = 1; ?>
								<?php while(have_rows('solution_items')): the_row();?>
									<?php if($i == 1) { ?>
										<li class="solution<?php echo $h;?> active">
											<div class="img-container">
												<img src="<?php echo the_sub_field('solution_image');?>" />
											</div>
											<div class="text">
												<div class="text-spacer">
													<div class="title"><?php echo the_sub_field('solution_title');?></div>
													<?php if(have_rows('solutions_bullets')): ?>
														<ul>
															<?php while(have_rows('solutions_bullets')): the_row();?>
																<li><?php echo the_sub_field('bullet');?></li>
															<?php endwhile; ?>
														</ul>
													<?php endif; ?>
													<a class="btn" href="<?php echo the_sub_field('solution_link_url');?>"><?php echo the_sub_field('solution_link_button_text');?></a>
												</div>
											</div>
										</li>
									<?php }else{ ?>
										<li class="solution<?php echo $h;?>">
											<div class="img-container">
												<img src="<?php echo the_sub_field('solution_image');?>" />
											</div>
											<div class="text">
												<div class="text-spacer">
													<div class="title"><?php echo the_sub_field('solution_title');?></div>
													<?php if(have_rows('solutions_bullets')): ?>
														<ul>
															<?php while(have_rows('solutions_bullets')): the_row();?>
																<li><?php echo the_sub_field('bullet');?></li>
															<?php endwhile; ?>
														</ul>
													<?php endif; ?>
													<a class="btn" href="<?php echo the_sub_field('solution_link_url');?>"><?php echo the_sub_field('solution_link_button_text');?></a>
												</div>
											</div>
										</li>
									<?php } ?>
									<?php $i++; ?>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
					<div class="mobile">
						<div class="next"><img src="<?php echo get_stylesheet_directory_uri();?>/img/solutions/solutions-right-arrow.png" /></div>
						<div class="prev"><img src="<?php echo get_stylesheet_directory_uri();?>/img/solutions/solutions-left-arrow.png" /></div>
						<?php if(have_rows('solution_items')): ?>
							<ul>
								<?php while(have_rows('solution_items')): the_row();?>	
									<li>
										<div class="img-container">
												<img src="<?php echo the_sub_field('solution_image');?>" />
											</div>
											<div class="text">
												<div class="text-spacer">
													<div class="title"><?php echo the_sub_field('solution_title');?></div>
													<?php if(have_rows('solutions_bullets')): ?>
														<ul>
															<?php while(have_rows('solutions_bullets')): the_row();?>
																<li><?php echo the_sub_field('bullet');?></li>
															<?php endwhile; ?>
														</ul>
													<?php endif; ?>
													<a class="btn" href="<?php echo the_sub_field('solution_link_url');?>"><?php echo the_sub_field('solution_link_button_text');?></a>
												</div>
											</div>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>