<section class="whats-new__content">
	<ul>
		<?php while ( $query->have_posts() ) :
			$query->the_post(); ?>

		<li data-postid="<?php echo get_the_ID(); ?>">
			<i class="fa fa-<?php echo get_content_font_icon(); ?>" aria-hidden="true"></i>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</li>
		<?php endwhile; ?>
	</ul>
</section>