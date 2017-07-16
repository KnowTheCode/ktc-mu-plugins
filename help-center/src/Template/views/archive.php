<header class="help-center__header page-header">
	<h1 class="entry-title" itemprop="headline">Welcome to the Help Center<br>
		I need help with....</h1>
	<p class="intro">Click one of the general help buttons. Or simply scroll down <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>.  The Help Center documentation and questions/answers are listed below.</p>
</header>
<?php UpTechLabs\HelpCenter\Template\render_group_boxes(); ?>
<div class="help-center__qa" itemprop="text">
	<h2>Help Center Documentation (Q&A)</h2>
	<div class="help-center___group-container">
		<?php UpTechLabs\HelpCenter\Template\render_topics(); ?>
	</div>
</div>