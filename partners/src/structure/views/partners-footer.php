<section id="partners-footer" class="partners__footer">
	<div class="wrap">
		<header class="partners__footer_intro">
			<h2>We <i class="fa fa-heart" aria-hidden="true"></i> <span class="intro_break">Gold</span> <span class="intro_break">Partners</span></h2>
		</header>
		<div class="partners__footer_logos">
            <a href="http://ninjaforms.com" class="partners__footer_image">
                <img src="<?php echo $images['wpninjas']; ?>" alt="Ninja Forms" width="175" height="175"/>
            </a>
            <a href="<?php echo is_user_logged_in() ? 'https://wpengine.com/agency-partner-program/?utm_medium=affiliate&utm_source=Knowthecode&utm_campaign=members&utm_content=free_for_members' : 'https://wpengine.com/offer/know-the-code/'; ?>"
               class="partners__footer_image">
                <img src="<?php echo $images['wpengine']; ?>" alt="WP Engine" width="175" height="175"/>
            </a>
			<a href="<?php echo is_user_logged_in() ? 'https://www.siteground.com/go/knowthecode' : 'https://www.siteground.com/wordpress-hosting.htm?mktafcode=79a5913acbbf61fb5859345f0e3c13e4'; ?>"
			   class="partners__footer_image">
				<img src="<?php echo $images['siteground']; ?>" alt="SiteGround" width="175" height="175"/>
			</a>
		</div>
	</div>
</section>