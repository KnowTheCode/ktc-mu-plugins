<section id="topic_group-<?php esc_attr_e( $topic_group['term_slug'] ); ?>" class="help-center__topic" data-termid="<?php esc_attr_e( $term_id ); ?>">
	<h4><?php esc_html_e( $topic_group['term_name'] ); ?></h4>
	<ul>
		<?php UpTechLabs\HelpCenter\Template\render_topic( $term_id, $topics ); ?>
	</ul>
</section>