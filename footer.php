<footer class="my-container">
        <div class="row">
            <div class="col-md-3 col-12 pl-md-5 pt-5 pl-5">

            <?php
            if(is_active_sidebar('travio_widgets_footer')):
                dynamic_sidebar('travio_widgets_footer');
            endif;
            ?>

            </div>
            <div class="col-md-3 col-12 pt-md-5 pt-4 pl-5">
                
                <h3>Destinations</h3>
                
<?php
$args= wp_list_categories(array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 1,
        'echo'                => 1,
        'exclude'             => '',
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 0,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'name',
        'separator'           => '<br />',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories' ),
        'style'               => 'list',
        'taxonomy'            => 'category',
        'title_li'            => __( '' ),
        'use_desc_for_title'  => 1,
));
echo $args;
?>
            </div>
            <div class="col-md-6 col-12 pr-4 pt-md-5 pt-4 pl-5">
                
                <?php $query = new WP_Query( array( 'pagename' => 'about' ) );
                while ( $query->have_posts() ) {
                $query->the_post();
                ?>
                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <?php
                the_excerpt();
                }
                wp_reset_postdata();
                echo $html;
                ?>
            </div>
        </div>
    </footer>
    
    <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap.bundle.min.js"></script>
    <?php wp_footer(); ?>
</body>
</html>