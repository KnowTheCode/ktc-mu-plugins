<div class="playbook-breadcrumbs">
    <div class="wrap">
        <?php genesis_do_breadcrumbs(); ?>
    </div>
</div>

<header class="playbook-header">
    <div class="playbook-icon-background"><?php include 'playbook-icon.svg'; ?></div>
    <div class="wrap">
        <?php include 'playbook-icon.svg'; ?>
        <div class="playbook-header-content">
        <?php if ( isset( $is_archive ) && $is_archive ) : ?>
            <h1 class="playbook-title">Playbooks - Grab and Go Code Solutions</h1>
            <p>These playbooks give you fast grab and go code solutions that you can use and/or customize in your projects or products.</p>
        <?php else: ?>
            <h2 class="playbook-intro">Playbook - Grab and Go Code Solution:</h2>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php endif; ?>
        </div>
    </div>
</header>
