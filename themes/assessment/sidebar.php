<div id="sidebar" class="widgets-area sidebar">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <ul id="sidebar">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </ul>
    <?php endif; ?>
</div>
