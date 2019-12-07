<?php get_header(); ?>

<section id="stage">
	<div class="container">
		<?php
        // by mohjak 2019-11-25 tag Issue#84
        $post_id = get_the_ID();
		$content_post = get_post($post_id);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		echo $content;
		global $wp_query;
		$wp_query = new WP_Query( array(
			'post_type' => 'post',
			'orderby' => 'date',
			'order'   => 'DESC',
            'posts_per_page' => 16,
            // by mohjak: 2019-11-21 tag bug fix #118 - excel line 11 issue#120
			'paged' => isset($wp_query->query['paged']) ? $wp_query->query['paged'] : 1,
		) );
		?>
	</div>
</section>

<section id="content">

	<?php
	/*
	 * Side content (get data, share map, contribute)
	 */
	if(is_front_page() && !is_paged())
		get_template_part('section', 'actions');
	?>

	<?php get_template_part('section', 'publisher-description'); ?>

	<?php if(have_posts()) :?>

		<section id="last-stories" class="loop-section">
			<div class="container">
				<?php
				if(get_query_var('ekuatorial_advanced_nav'))
					get_template_part('loop', 'explore');
				else
					get_template_part('loop');
				?>
			</div>
		</section>

	<?php else : ?>

		<?php
            /* by mohjak 2019-11-21 issue#120 */
            query_posts('posts_per_page=-1'); if(have_posts()) : ?>

			<section id="last-stories" class="loop-section">
				<div class="section-title">
					<div class="container">
						<div class="twelve columns">
							<h3><?php _e('Nothing found. Viewing all posts', 'ekuatorial'); ?></h3>
						</div>
					</div>
				</div>
				<div class="container">
					<?php
					if(get_query_var('ekuatorial_advanced_nav'))
						get_template_part('loop',' explore');
					else
						get_template_part('loop');
					?>
				</div>
			</section>

		<?php endif; wp_reset_query(); ?>

	<?php endif; ?>

	<?php // get_template_part('section', 'submit-call'); ?>

	<?php
	/*
	 * Side content (get data, share map, contribute)
	 */
	if(is_front_page() && is_paged())
		get_template_part('section', 'actions');
	?>

</section>

<?php get_footer(); ?>
