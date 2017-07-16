<a href="<?php echo $permalink ?>">
	<?php $this->render_episode_prefix( $post ); ?><?php echo get_the_title( $post_id ); ?>
</a>
<?php if ( $this->has_parent( $post ) ) : ?>
<br/>
<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" class="uhlist--parent">
	<?php printf( '%s: %s', __( 'Lab', 'user_history' ), esc_html( get_the_title( $post->post_parent ) ) ); ?>
</a>
<?php elseif ( isset( $record ) && $record->video_title ) : ?>
<br/>
<a href="<?php echo esc_url( $this->get_record_url( $permalink, $record ) ); ?>" class="uhlist--parent">
	<?php esc_html_e( stripslashes( $record->video_title ) ); ?>
</a>
<?php endif; ?>