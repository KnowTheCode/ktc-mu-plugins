<?php

if ( is_user_logged_in() ) {
    $link = 'https://wpengine.com/agency-partner-program/?utm_medium=affiliate&utm_source=Knowthecode&utm_campaign=members&utm_content=free_for_members';
    $button_text = 'Get Free Staging';

} else {
    $link = 'https://wpengine.com/offer/know-the-code/';
    $button_text = 'Signup today and get 20% off';
}

?>
<div class="partner partner__gold siteground">
    <div class="partner__badge">Partner</div>
    <a class="partner__graphic" href="<?php echo $link; ?>">
        <img src="<?php echo $images_url; ?>wpengine/wpengine-800x500.jpg" alt="WP Engine is the world’s leading WordPress digital experience platform">
    </a>
    <div class="partner__badge_content">Partner</div>
    <div class="partner__content">
        <div class="partner__summary">
            <p>WP Engine is the world’s leading WordPress digital experience platform that gives customers the agility, performance, intelligence, and integrations they need to drive their business forward faster. Our award-winning team of WordPress experts are trusted by over 70,000 companies across 130 countries to provide support, helping brands create world-class digital experiences.</p>
        </div>
        <a class="partner__button" href="<?php echo $link; ?>"><?php echo $button_text; ?></a>
    </div>
</div>