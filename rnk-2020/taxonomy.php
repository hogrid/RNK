<?php get_header(); ?>

<section class="internas bg-amarelo">
	<div class="content-wrap">
		<div class="top-center">
			<h2><?php single_term_title(); ?></h2>
		</div>
		<div class="namidia-lista">
			<?php
			$query = new WP_Query(array(
					'orderby' => 'published',
					'posts_per_page' => '-1'
					));
			?>
			<?php if ( $query->have_posts() ) : ?>
				<ul>
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-midia' ); ?>

						<li>
							<a href="<?php the_permalink() ?>" class="thumb" style="background-image: url('<?php echo $image[0]; ?>')"></a>
							<div class="categ">
								<?php $terms = get_the_terms( $post->ID , 'categ_na_midia' );
									if ( is_array( $terms ) && ! is_wp_error( $terms ) ) {
										foreach ($terms as $term) {
											$term_link = get_term_link($term, 'categ_na_midia');
											if (is_wp_error($term_link))
												continue;
											echo '<a href="' . $term_link . '">' . $term->name . '</a> ';
										}
									}
								?>
							</div>
							<div class="txt">
								<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
								<div class="breve"><?php echo excerpt(20); ?></div>
							</div>
							<div class="clear"></div>
						</li>
					<?php endwhile; ?>            
				</ul>
			<?php endif; wp_reset_postdata(); ?>							
		</div>
		<div class="clear"></div>
	</div>
</section>	

<?php get_footer(); ?>