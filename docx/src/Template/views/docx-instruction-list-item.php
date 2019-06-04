<li <?php echo genesis_attr( 'entry' ); ?> style="margin-left: 0">
	<a href="<?php the_permalink(); ?>" class="button <?php echo esc_html( $term ); ?>" rel="bookmark" style="width: 98%"><?php echo $title; ?>
		<?php if ( genesis_get_custom_field( '_ktc_coming_soon' ) ) : ?>
		<sup>*</sup>
		<?php endif; ?>
	</a>
</li>
