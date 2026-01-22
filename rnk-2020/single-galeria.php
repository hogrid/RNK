<?php get_header(); ?>

<section class="interna">
	<div class="content-wrap">
		<div class="top-interna">
			<div class="img" style="background-image: url('<?= get_template_directory_uri() ?>/img/header-galeria.jpg')"></div>
			<h2>Galeria</h2>
		</div>


		<div class="internas-01">
		
		<?php 

		$images = get_field('galeria-imagens');

		if( $images ): ?>
			<ul class="galeria-lista galeria-single">
				
				<h2><?php the_title(); ?></h2>
				
				<?php foreach( $images as $image ): ?>
					<li>
						<a href="<?php echo esc_url($image['sizes']['galeria-g']); ?>" data-fancybox="gallery">
							<div class="img"><img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" class="img-100" /></div>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		
		</div>
		<div class="clear"></div>		

	
		<div class="clear"></div>
	</div>
</section>	

<?php get_footer(); ?>