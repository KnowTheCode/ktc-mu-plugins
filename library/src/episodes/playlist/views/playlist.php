<section id="episode-playlist" class="episode-list__directory">
	<h2><?php _e( 'Episodes', 'library' ); ?></h2>
	<p><span class="fa fa-video-camera"></span> <?php _e( 'Total Lab Runtime:', 'library' ); ?> <?php esc_html_e( $lab_stats['runtime'] ); ?></p>
	<p>
		<ul class="episode-list episode-list--numbered">
			<?php Library\Episodes\Playlist\render_episode_list(); ?>
		</ul>
	</p>
</section>