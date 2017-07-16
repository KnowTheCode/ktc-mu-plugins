<nav class="help-center__groups">
	<ul>
		<?php foreach ( $topic_groups as $term_id => $topic_group ) : ?>
		<li>
			<a href="#topic_group-<?php esc_attr_e( $topic_group['term_slug'] ); ?>"><?php esc_html_e( $topic_group['term_name'] ); ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
</nav>