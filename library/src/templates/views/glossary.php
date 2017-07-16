<div class="entry">
	<div class="content-wrap">
		<dl class="glossary__list">
		<?php while ( have_posts() ) :
			the_post();
			$post = get_post(); ?>

			<dt id="<?php esc_attr_e( $post->post_name ); ?>" class="glossary__term post-<?php the_ID(); ?>"><?php the_title(); ?></dt>
			<dd class="glossary__definition"><?php the_content(); ?></dd>

		<?php endwhile; ?>
		</dl>
	</div>
</div>
