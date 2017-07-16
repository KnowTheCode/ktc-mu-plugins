<div class="last-viewed">
<?php if ( $post ) : ?>
	<span class="fa fa-<?php esc_attr_e( get_content_font_icon( $post->post_type ) ); ?>"></span>
	<?php
    include( $this->get_item_view_file( $post ) );
    ?>
<?php else: ?>
<p><?php _e( "Well, shucks, we don't have a record of what you last watched. Bummer.", 'user_history' ); ?></p>
<?php endif; ?>
</div>
