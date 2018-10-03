<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>

	<article class="single-post">
		<section id="stage" class="row">
			<div class="container">
				<div class="twelve columns">
					<header class="post-header">
						<?php echo get_the_term_list($post->ID, 'publisher', '', ', ', ''); ?>
						<h1 class="title"><?php the_title(); ?></h1>
					</header>
					<?php 
					$thumbnail = ekuatorial_get_thumbnail();
					if($thumbnail) : ?>
						<div class="center image" style="width: 1200px;">
							<img width="1180" src="<?php echo $thumbnail; ?>" />
						</div>
						<div class="container single-article img-desc">
							<div class="twelve columns">
							<?php 
								$description = get_post_meta($post->ID, 'newsroom_img_desc', true);
								echo '<div class="image-caption">' . apply_filters('the_content', $description) . '</div>';
							?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<section id="content">
			<div class="container row">
				<div class="post-content">
					<div class="post-description">
						<p class="date"><strong><?php echo get_the_date(); ?></strong></p>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<div class="container row">
				<div class="thumbnail share">
					<p class="buttons">
						<a class="button" href="<?php echo get_post_meta($post->ID, 'url', true); ?>" target="_blank"><?php _e('Go to homepage', 'ekuatorial'); ?></a>
					</p>
				</div>
			</div>
		</section>
	</article>
<?php endif; ?>

<?php get_footer(); ?>
