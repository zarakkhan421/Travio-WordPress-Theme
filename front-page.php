<?php
get_header();
?>

        <?php
        $args = array(
            'post_type' => 'featuredherocarousel',
            'order' => 'ASC',
        );
        $heros = new WP_Query( $args );?>
        

<div class="owl-carousel owl-theme my-container">
    <?php while($heros->have_posts()): $heros->the_post(); ?>
    <div class="item">
    <img src="<?php the_field('hero_image');?>" alt="">
    <div class="carousel-overlay">
        <h3><?php echo the_field('title'); ?></h3>
        <p><?php echo the_field('subtitle'); ?></p>
    </div>
    </div>
<?php wp_reset_postdata(); endwhile;?>
</div>

<?php
        $args = array(
            'post_type' => 'destination',
            'order' => 'ASC',
            'posts_per_page' =>3,
        );
        $top_dest = new WP_Query( $args );?>

    <div class="my-container top-destinations pt-2">
        <h5>Top Destinations</h5>
        <div class="row">
        <?php while($top_dest->have_posts()): $top_dest->the_post(); ?>
            <div class="col-md-12 col-lg pb-3">
                <a href="<?php the_permalink(); ?>"><div class="card text-white "><?php the_post_thumbnail('square'); ?>
                            <div class="card-img-overlay d-flex">
                              <h5 class="card-title text-center my-auto mx-auto"><?php the_title(); ?> </h5>
                            </div></a>
                    </div>
            </div>
    <?php  endwhile; wp_reset_postdata(); ?>
        </div>
    </div>

    <div class="my-container end-line my-4"></div>

    <div class="my-container destinations">
        <h5 id="destinations">Destinations</h5>
        <div class="row">
        <?php for($i=1; $i<=4; $i++): ?>
        <div class="col-lg-3 col-md-6 col-12">
            <?php
            $post_objects = get_field('posts_' . $i);
            if( $post_objects ): ?>
                <li><h3><?php the_field('region_name_' . $i); ?></h3></li>
                <ul>
                <?php foreach( $post_objects as $post):?>
                    <?php setup_postdata($post); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
                <?php wp_reset_postdata();?>
            <?php endif; ?>
        </div>
        <?php endfor; ?>
        </div>
    </div>






    <div class="my-container end-line my-4"></div>
    <?php
    $args=array(
        'post_type'=>'post',
        'posts_per_page'=>4,
    );
    $front_post=new WP_Query($args);
    ?>
    <div class="my-container blog-posts">
        <h5>Blog Posts</h5>
        <div class="row">
            <?php while($front_post->have_posts()): $front_post->the_post();?>
        <div class="col-12 col-lg col-md-6">
            <div class="card mb-3">
                <a href="<?php the_permalink();  ?>">
                    <?php the_post_thumbnail('square'); ?>
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted"><?php echo get_the_date('d M, Y'); ?></small></p>
                        <h5 class="card-title"><?php the_title(); ?></h5>
                    </div>
                </a>
            </div>
        </div>
        
    <?php endwhile; wp_reset_postdata();?>
        </div>
        
    </div>

    <div class="my-container end-line my-4"></div>

<?php
get_footer();
?>