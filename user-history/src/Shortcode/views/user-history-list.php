<li class="uhlist--item uhlist--<?php esc_attr_e( $post->post_type ); ?>">
	<span class="fa fa-<?php esc_attr_e( $font_icon ); ?>"></span>
	<?php include( $this->get_item_view_file( $post ) ); ?>
</li>