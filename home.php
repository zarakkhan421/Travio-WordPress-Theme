<?php get_header(); ?>


<?php 
$args=array(
	'post_type'=>'post',
);
$blog_posts=new WP_Query($args);
$count=1;
?>

			<div class="my-container">
			<?php
			while($blog_posts->have_posts()): $blog_posts->the_post();
			if ($count<3):
				$count++;
			?>
			<div class="card mb-3 mt-2 mx-auto blog-posts-page">
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
			<div class="my-container">
			<div class="row">
				<div class="col small-posts">
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

			
			<?php
			elseif ($count%2==0 && $count>2):
				$count++;
			?>
			<div class="col small-posts">
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