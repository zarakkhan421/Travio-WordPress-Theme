
<?php
get_header();
?>

<?php
echo get_author_name();
echo the_author();
echo get_the_author_meta('display_name', $author_id);

$args=array(
	'post_type'=>'post',
	'category_name' =>$post->post_name,
	'post_per_page'=>4
	
);
$dest_post=new WP_Query($args);

		$term=wp_get_post_terms($post->ID,'dest');
		
		$parent=$term[0];
		$child=$term[1];

		$parent_id=$parent->parent;
		$parent_name=$parent->name;
		$parent_term_id=$parent->term_id;
		
		$child_id=$child->parent;
		$child_name=$child->name;
		$child_term_id=$child->term_id;

		if($parent_id):
			$parent_id=$child->parent;
			$parent_name=$child->name;
			$parent_term_id=$child->term_id;

			$child_id=$parent->parent;
			$child_name=$parent->name;
			$child_term_id=$parent->term_id;
		endif;

?>

		<div class="my-container">
			<ol class="breadcrumb my-breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="<?php echo home_url('#destinations'); ?>">Destinations</a>
				</li>
				<li class="breadcrumb-item"><a href=""><?php echo $parent_name; ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
			</ol>
		</div>

		<div class="gallery my-container">
			<div class="row">
				<div class="col-12 col-md-6 mb-2" style="z-index: -100;">
					<img src="<?php the_field('image_1'); ?>" class="" style="max-width: 100%; " alt="" />
				</div>
				<div class="col-12 col-md-6">
					<div class="row mb-2">
						<div class="col " style="z-index: -100;">
							<img src="<?php the_field('image_2'); ?>" style="max-width: 100%;" alt="" />
						</div>
						<div class="col " style="z-index: -100;">
							<img src="<?php the_field('image_3'); ?>" style="max-width: 100%;" alt="" />
						</div>
					</div>
					<div class="row mt-md-4">
						<div class="col ">
							<img src="<?php the_field('image_4'); ?>" style="max-width: 100%;" alt="" />
						</div>
						<div class="col ">
							<img src="<?php the_field('image_5'); ?>" style="max-width: 100%;" alt="" />
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-6 col-md-3 pb-2">
					<img src="<?php the_field('image_6'); ?>" style="max-width: 100%;" alt="" />
				</div>
				<div class="col-6 col-md-3 pb-2">
					<img src="<?php the_field('image_7'); ?>" style="max-width: 100%;" alt="" />
				</div>
				<div class="col-6 col-md-3">
					<img src="<?php the_field('image_8'); ?>" style="max-width: 100%;" alt="" />
				</div>
				<div class="col-6 col-md-3">
					<img src="<?php the_field('image_9'); ?>" style="max-width: 100%;" alt="" />
				</div>
			</div>
		</div>

		<div class="my-container destination-page-blog-posts mt-3">
			<h5>Blog Posts related to <?php the_title(); ?></h5>
			<?php while ($dest_post->have_posts()):$dest_post->the_post();  ?>
			
			<div class="card mb-3" >
			<a href="<?php the_permalink(); ?>">
				<div class="row no-gutters dest-post">
					<div class="col-xl-4">
						<?php the_post_thumbnail('square');  ?>
					</div>
					<div class="col-xl-8">
						<div class="card-body pl-2 pt-0">
							<p class="card-text m-0">
								<small class="text-muted"><?php echo get_the_date('d M, Y'); ?></small>
							</p>
							<h5 class="card-title">
								<?php the_title(); ?>
							</h5>
							<p class="card-text">
							<?php the_excerpt(); ?>
							</p>
						</div>
					</div>
				</div>
			</a>
			</div>
<?php endwhile; wp_reset_postdata(); ?>
		</div>

		<div class="my-container end-line my-4"></div>

		<div class="my-container review">
			<h5>Review of <?php the_title(); ?></h5>
			<?php the_field('review'); ?>
		</div>
		<div class="my-container end-line my-4"></div>
<?php
get_footer();
?>