<?php if ( is_active_sidebar( 'main-sidebar' ) ) { ?>
    <aside class="sidebar cf">
        <div class="sidebar_container">
            <?php dynamic_sidebar( 'main-sidebar' ); ?>
        </div>
    </aside>
<?php } ?>