<li class="episode-list__item<?php echo $current_episode_class_attribute; ?>" data-postid="<?php esc_attr_e( $post_id ); ?>">
	<span class="episode-list__index"><?php esc_attr_e( $episode_metadata['episode_number'] ); ?></span>
	<span class="episode-list__watch-status<?php echo $watch_status; ?>"><i class="fa fa-check-square" aria-hidden="true"></i></span>
	<span class="episode-list__title">
		<a href="<?php echo esc_url( $episode_metadata['link'] ); ?>"><?php esc_html_e( $episode_metadata['title'] ); ?><span class="episode-list__<?php echo $access_level; ?>"><?php echo $access_level; ?></span></a>
	</span>
	<span class="episode-list__duration"><?php esc_attr_e( $episode_metadata['runtime'] ); ?></span>
</li>