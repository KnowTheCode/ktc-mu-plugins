<a href="<?php echo $permalink ?>">
	<?php $this->render_episode_prefix( $post ); ?><?php echo get_the_title( $post_id ); ?>
</a>
<br/>
<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" class="uhlist--parent">
	<?php printf( '%s: %s', __( 'Lab', 'user_history' ), esc_html( get_the_title( $post->post_parent ) ) ); ?>
</a>