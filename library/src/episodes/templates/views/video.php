<section class="episode__video <?php esc_attr_e( $access_lowercase ); ?>" itemprop="content">
	<div class="wrap">
		<?php echo do_shortcode( '[vimeo id="' . esc_attr( $metadata['vimeo_id'] ) . '" show_footer="0"]' ); ?>

        <div class="episode__buttons">
            <?php
            /**
             * Fires the 'render_episode_buttons' event.  User History
             * will then build and render out the user history buttons.
             *
             * @since 1.1.2
             *
             * @param string $html empty and not needed here
             * @param string $video_id ID for this particular video
             * @param string $post_id Episode's post ID
             * @param boolean $return Sending a `false` as we can it to echo out.
             */
            do_action( 'render_episode_buttons', '', $metadata['vimeo_id'], $post_id, false );
            ?>
        </div>
    </div>
</section>