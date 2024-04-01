<!-- search -->
<form class="search" method="get" action="<?php echo esc_url( home_url() ); ?>">
    <div role="search">
        <button class="search-submit" type="submit"><i class="fa fa-search"></i></button>
        <input class="search-input" type="search" name="s" aria-label="search..."
            placeholder="<?php esc_html_e( 'search...', 'html5blank' ); ?>">
        <a href="#" class="close-search js-close-search"><i class="fa fa-times"></i></a>
        <?php if(isset($_GET['s']) && strlen($_GET['s'])) : ?>
        <a href="<?php echo get_site_url() . '/works/' ?>" class="reset-filters">Reset Filters</a>
        <?php endif; ?>
    </div>

</form>
<!-- /search -->