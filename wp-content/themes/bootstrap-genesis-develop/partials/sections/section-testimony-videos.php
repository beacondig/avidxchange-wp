<?php
/**
 * Template Part: Testimony Videos
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="section testimony-videos">
	<div class="container is-full">
		<?php if ( have_rows( 'testimony_videos' ) ) : ?>
			<ul class="videos">
				<?php
				while ( have_rows( 'testimony_videos' ) ) :
					the_row();
					$video_type   = get_sub_field( 'video_type' );
					$video_key    = 'video_' . $video_type;
					$video_output = get_sub_field( $video_key );

					if ( 'internal' === $video_type && ! empty( $video_output ) && is_array( $video_output ) ) {
						$mime_type = $video_output['mime_type'];
						$video_url = $video_output['url'];

						$video_output = '
						<video controls src="' . esc_url( $video_url ) . '" type="' . $mime_type . '">
						</video>
						';
					}
					?>
					<li class="item">
						<div class="video-wrapper">
							<?php echo $video_output; ?>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
