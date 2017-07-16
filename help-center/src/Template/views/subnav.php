<nav class="nav-secondary" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<div class="wrap">
		<ul id="menu-secondary-nav" class="menu genesis-nav-menu menu-secondary">
			<li class="menu-item menu__topics<?php if ( is_post_type_archive( 'help-center' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo home_url( 'help-center' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-question-circle" aria-hidden="true"></i> I need help with...</span></a>
			</li>
			<?php if ( is_user_logged_in() ) : ?>
				<li class="menu-item menu__proforums">
					<a href="<?php echo home_url( 'forums' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-life-ring" aria-hidden="true"></i> Pro Forums</span></a>
				</li>
			<?php endif; ?>
			<li class="menu-item menu__glossary<?php if ( is_post_type_archive( 'glossary' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo home_url( 'glossary' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-list-ul" aria-hidden="true"></i> Glossary</span></a>
			</li>
			<li class="menu-item menu__whatsnew<?php if ( is_page( 'whats-new' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo home_url( 'whats-new' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-plus-circle" aria-hidden="true"></i> Policies</span></a>
			</li>
			<li class="menu-item menu__contactus<?php if ( is_page( 'contact-us' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo home_url( 'contact' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-envelope" aria-hidden="true"></i> Contact Us</span></a>
			</li>
		</ul>
	</div>
</nav>