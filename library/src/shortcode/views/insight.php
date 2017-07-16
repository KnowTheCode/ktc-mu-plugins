<article class="insight__entry post-<?php echo get_the_ID(); ?> one-half<?php echo $last_class; ?>" itemscope="" itemtype="http://schema.org/CreativeWork">
	<header class="insight__header">
		<h3 class="insight__title" itemprop="headline">
			<a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php echo get_the_title(); ?></a>
		</h3>
	</header>
	<div class="insight__content" itemprop="text"><p><?php echo get_the_excerpt(); ?></p></div>
	<footer class="insight__footer">
		<a href="<?php echo get_permalink(); ?>" rel="bookmark">Learn more</a>
	</footer>
</article>