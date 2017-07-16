<div class="search__bar">
	<form role="search" method="get" class="search-form" action="/">
		<label><span class="screen-reader-text">Search for</span></label>
		<input type="search" class="search__field" placeholder="What would you like to learn?" value="<?php echo get_search_query(); ?>" name="s" />
		<i class="fa fa-search" aria-hidden="true"></i>
	</form>
</div>
<nav class="utility-bar-member-nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<ul class="menu menu-utility-bar-member-nav">
		<li class="hello-member">&lt;/ Hello, <?php echo $current_user->first_name; ?> &gt;</li>
		<li class="menu-item">
			<span class="fa fa-sign-out"></span><a href="<?php echo wp_logout_url( home_url() ); ?>" itemprop="url"><?php _e( 'Sign Out', 'fulcrum_site') ?></a>
		</li>
	</ul>
</nav>