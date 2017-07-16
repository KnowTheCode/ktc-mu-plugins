<a href="<?php echo $permalink ?>">
	<?php $this->render_episode_prefix( $post ); ?><?php esc_html_e( $record->video_title ); ?>
</a>
<br/>
<a href="<?php echo esc_url( $this->get_record_url( $permalink, $record ) ); ?>" class="uhlist--parent">
	<?php echo get_the_title( $post_id ); ?>
</a>