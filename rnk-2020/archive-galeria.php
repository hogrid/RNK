<?php get_header(); ?>

<section class="interna">
	<div class="content-wrap">
		<div class="top-interna">
			<div class="img" style="background-image: url('<?= get_template_directory_uri() ?>/img/header-galeria.jpg')"></div>
			<h2>Galeria</h2>
		</div>


		<div class="internas-01">
			<ul class="galeria-lista">
				<?php 

				$args = array(
					'post_type'=> 'galeria',
					'order'    => 'ASC',
					'posts_per_page'=>-1,
				);              

				$the_query = new WP_Query( $args );
				if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );

				?>
				
				<li>
					<?php if (get_field('galeria-link')): ?>
						<a href="<?php the_field('galeria-link'); ?>" class="thumb" target="_blank">
					<?  else : ?>
						<a href="<?php the_permalink() ?>" class="thumb">
					<? endif; ?>
					
						<div class="img">
							<?php if ( has_post_thumbnail() ) { ?>
									<img src="<?php echo $thumb[0]; ?>" class="img-100">
							<? }	else { ?>
									<img src="<?= get_template_directory_uri() ?>/img/no-photo-300x200.jpg" class="img-100">
							<? } ?>
						</div>
						<div class="txt"><p><?php the_title(); ?></p></div>
					</a>
				</li>
				
				<?php endwhile; else: ?>

				 <p>Não foi encontrado nenhum álbum.</p>

				<?php endif; wp_reset_postdata(); ?>
			</ul>		

		</div>
		<div class="clear"></div>		

	
		<div class="clear"></div>
	</div>
</section>	

<?php get_footer(); ?>