<?php get_header(); ?>
<style>
	body{background:#fff;}
	#whatsapp{background-image:url(<?php bloginfo('template_url'); ?>/images/bg-whatsapp-branco.png);}
</style>
<div id="barra-titulo" style="background:url(<?php bloginfo('template_url'); ?>/images/bg-page.jpg) center top no-repeat ">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="titulo" style="color: #fbd133"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</div>


<section id="pagina">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="novidades">
					<div class="col-xs-12"><h1 class="titulo">Resultados da pesquisa</h1>
					<h3><?php if( $_GET['marca'] ): ?>Marca: <?php echo $_GET['marca'] ?></h3><?php endif; ?>
					<h4><?php if( $_GET['modelo'] ): ?>Modelo: <?php echo $_GET['modelo'] ?></h4><?php endif; ?>
					</div>
					<?php
					// Get data from URL into variables
					$_marca = $_GET['marca'] != '' ? $_GET['marca'] : '';
					$_modelo = $_GET['modelo'] != '' ? $_GET['modelo'] : '';
					// Start the Query
					$course_args = array(
						'post_type'     =>  'post', // your CPT
						's'             =>  $_user, // looks into everything with the keyword from your 'user field'
						'meta_query'    =>  array(
							'relation'=> 'AND',
										array(
											'key'     => 'marca', // assumed your meta_key is 'level'
											'value'   => $_marca,
											'compare' => 'LIKE', // finds levels that matches 'level' from the select field
										),
											array(
											'key'     => 'modelo', // assumed your meta_key is 'level'
											'value'   => $_modelo,
											'compare' => 'LIKE', // finds levels that matches 'level' from the select field
										),
									)
							);
					$courseSearchQuery = new WP_Query( $course_args );
					// Open this line to Debug what's query WP has just run
					// Show the results
					if( $courseSearchQuery->have_posts() ) :
						while( $courseSearchQuery->have_posts() ) : $courseSearchQuery->the_post(); ?>
							<div class="col-md-3 col-sm-4 col-xs-6 anuncio">
								<?php $images = get_field('galeria'); if( $images ): $image_1 = $images[0]; ?>   
								<a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
									<img src="<?php echo $images[0]['sizes']['thumbnail']; ?>" alt="<?php the_title(); ?>" />
								</a>
						<?php else: ?>
						<a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
							<img src="<?php bloginfo('template_url'); ?>/images/no-image.jpg" alt="<?php the_title(); ?>" />
						</a>
								<?php endif; ?>
								<h4><?php the_title(); ?></h4>
								<div class="info-car">
									<?php if( get_field('ano') ): ?><div class="col-xs-4 info-ano"><?php the_field('ano'); ?></div><?php endif; ?>
									<?php if( get_field('kilometragem') ): ?><div class="col-xs-4 info-km"><?php the_field('kilometragem'); ?></div><?php endif; ?>
									<?php if( get_field('combustivel') ): ?><div class="col-xs-3 info-combustivel"><?php the_field('combustivel'); ?></div><?php endif; ?>
								</div>
								<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><div class="btn-oferta">VER OFERTA</div></a>
							</div>
						<?php endwhile; ?>
						<br clear="all" />
						<div id="pagination" class="text-center">
						<?php
							if ( function_exists('vb_pagination') ) {
							  vb_pagination();
							}
						?>
						</div>
						<?php else: ?>
						<center><br><br><br><br><br><br><br><br>
							<h2>Nenhum veículo encontrado com estas especificações</h2>
							<p>Mas fique ligado em nosso site, sempre temos novidades :)</p>
						</center>
						<?php endif; ?>
						<?php wp_reset_postdata(); ?>

				</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'section', 'destaques' ); ?>

<?php get_footer(); ?>