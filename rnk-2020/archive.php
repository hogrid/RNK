<?php get_header(); ?>

<section class="interna">
	<div class="content-wrap">
		<div class="top-interna">
			<div class="img" style="background-image: url('<?= get_template_directory_uri() ?>/img/header-contato.jpg')"></div>
			<h2>Notícias</h2>
		</div>


		<div class="internas-01 news-lista">
			
		<?php
		$query = new WP_Query(array( 
				'post_type' => 'post',
				'orderby' => 'published',
				'posts_per_page' => '6'
				));
		?>
		<?php if ( $query->have_posts() ) : ?>
			<ul>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-news' ); ?>

					<li>
							<div class="img"><a href="<?php the_permalink() ?>">
								<?php if ( has_post_thumbnail() ) { ?>
										<img src="<?php echo $thumb[0]; ?>" class="img-100">
								<? }	else { ?>
										<img src="<?= get_template_directory_uri() ?>/img/thumb-01.jpg" class="img-100">
								<? } ?>
								<img src="<?php echo $thumb[0]; ?>" class="img-100">
								</a></div>
							<div class="txt">
								<a href="<?php the_permalink() ?>"><h2><?php the_title() ?></h2></a>
								<a href="<?php the_permalink() ?>"><h3><?php echo excerpt(8); ?></h3></a>
							</div>
						</li>
				<?php endwhile; ?>  
			</ul>
		<?php endif; wp_reset_postdata(); ?>			

		</div>
		<div class="clear"></div>		

	
		<div class="clear"></div>
	</div>
</section>	

<?php get_footer(); ?>