<li <?php echo genesis_attr( 'entry' ); ?>>
	<a href="<?php the_permalink(); ?>" class="button <?php echo $term; ?>" rel="bookmark"><?php echo $title; ?>
		<?php if ( genesis_get_custom_field( '_ktc_coming_soon' ) ) : ?>
		<sup>*</sup>
		<?php endif; ?>
	</a>
</li>