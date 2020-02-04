<?php get_header(); ?>
<?php   
$term = get_queried_object();

$current_cat=get_the_category();

if($current_cat[0]->parent!=0):
    $temp_1=$current_cat[0];
    $temp_2=$current_cat[1];
    $current_cat[1]=$temp_1;
    $current_cat[0]=$temp_2;
endif;
?>
		<div class="my-container">
			<ol class="breadcrumb my-breadcrumb mb-0">
				<li class="breadcrumb-item">Category</li>
				<li class="breadcrumb-item"><a href="<?php echo esc_url(get_category_link($current_cat[0]->cat_ID)); ?>"><?php echo $current_cat[0]->name; ?></a></li>
				<li class="breadcrumb-item"><a href="<?php echo esc_url(get_category_link($current_cat[1]->cat_ID)); ?>"><?php echo $current_cat[1]->name; ?></a></li>
			</ol>
		</div>

<div class="my-container author-profile">
			<div class="row">
				<div class="col ">
					<?php the_post_thumbnail('square'); ?>
				</div>
				<div class="col ml-5 pl-5 mt-4">
					<div class="profile">
						<div class="profile-img">
							<?php 
								if ( is_user_logged_in() ) {
    							$current_user = wp_get_current_user();
    							if ( ($current_user instanceof WP_User) ) {
        						echo get_avatar( $current_user->ID, 750 );
    							}
							}?>
						</div>
						
						<h5>Author: <?php the_author_meta( 'user_nicename', $post->post_author ); ?></h5>
						<span><?php echo get_the_date('d M, Y'); ?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="my-container mt-4 mb-4 post-text">
			<h5>
				<?php the_title(); ?>
			</h5>
			<div>
            <?php
            while(have_posts()): the_post();
            the_content();
            endwhile;
            ?>
            </div>
		</div>

<?php get_footer(); ?>