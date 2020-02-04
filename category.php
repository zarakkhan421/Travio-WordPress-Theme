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

<?php 
$args=array(
    'post_type'=>'post',
    'category_name'=>$term->slug,
);
$blog_posts=new WP_Query($args);
$count=1;
?>
		<div class="my-container">
			<ol class="breadcrumb my-breadcrumb mb-0">
				<li class="breadcrumb-item">
					Category
				</li>
				<li class="breadcrumb-item"><a href="<?php echo esc_url(get_category_link($current_cat[0]->cat_ID)); ?>"><?php echo $current_cat[0]->name; ?></a></li>
				<?php
				if($term->parent!=0):
					?>
					<li class="breadcrumb-item"><a href="<?php echo esc_url(get_category_link($current_cat[1]->cat_ID)); ?>"><?php echo $current_cat[1]->name; ?></a></li>
					<?php
				endif;
				?>
			</ol>
		</div>

			<div class="my-container">
			<?php
			while($blog_posts->have_posts()): $blog_posts->the_post();
			if ($count<3):
				$count++;
			?>
			<div class="card mb-3 mx-auto blog-posts-page">
				<div class="row no-gutters">
					<div class="col-xl-4">
					<a href="<?php the_permalink(); ?>">
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
							</a>
						</div>
					</div>
				</div>
			</div>

			<?php
			elseif ($count%2!==0 && $count>2):
				$count++;
			?>
			
			<div class="row">
				<div class="col small-posts my-col">
					<div class="card mb-3 mt-2 mx-auto blog-posts-page">
						<div class="row no-gutters">
							<div class="col-xl-4">
							<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('square');  ?>
							</div>
							<div class="col-xl-8">
								<div class="card-body pl-2 pt-0 pb-0 pr-0">
									<p class="card-text m-0">
											<small class="text-muted"><?php echo get_the_date('d M, Y'); ?></small>
										</p>
										<h5 class="card-title">
											<?php the_title(); ?>
										</h5>
									<p class="excerpt">
									<?php the_excerpt(); ?>
									</p>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			
			<?php
			elseif ($count%2==0 && $count>2):
				$count++;
			?>
			<div class="col small-posts my-col">
					<div class="card mb-3 mt-2 mx-auto blog-posts-page">
						<div class="row no-gutters">
							<div class="col-xl-4">
							<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('square');  ?>
							</div>
							<div class="col-xl-8">
								<div class="card-body pl-2 pt-0 pb-0 pr-0">
									<p class="card-text m-0">
											<small class="text-muted"><?php echo get_the_date('d M, Y'); ?></small>
										</p>
										<h5 class="card-title">
											<?php the_title(); ?>
										</h5>
									<p class="card-text">
									<?php the_excerpt(); ?>
									</p>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			endif;
			endwhile;
			?>
</div>

<?php get_footer(); ?>