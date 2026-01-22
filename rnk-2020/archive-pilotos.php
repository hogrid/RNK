<?php get_header(); ?>

<section class="interna">
	<div class="content-wrap">
		<div class="top-interna">
			<div class="img" style="background-image: url('<?= get_template_directory_uri() ?>/img/header-pilotos.jpg')"></div>
			<h2>Pilotos</h2>
		</div>

		<?php
		$equipes = [];

		$query = new WP_Query(array( 
				'post_type' => 'pilotos',
				'orderby' => array( 'title' => 'ASC' ),
				'posts_per_page' => '-1'
				));
		?>
		<?php if ( $query->have_posts() ) :
		
			while ( $query->have_posts() ) : $query->the_post();
				//$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'small' );
				$nomeEquipe = trim(get_field('equipe')) ? trim(get_field('equipe')) : 'Sem equipe';
				$equipes[$nomeEquipe]['pilotos'][] = [
					'imagem' => get_field('imagem'),
					'nome' => get_the_title(),
					'equipe' => $nomeEquipe,
					'link' =>  get_the_permalink(),
					'numero' => get_field('numero')
				];
			endwhile;

		?>
		<ul class="pilotos-lista">
			<?php
			ksort($equipes);
			foreach ($equipes as $key => $equipe) { 
				
				if ($key == 'Sem equipe') continue;

				echo '<li class="nomeEquipe">'.$key.'</li>';

				foreach ($equipe['pilotos'] as $piloto) { ?>
				<li>
					<?php
					if (!empty($piloto['imagem'])) :
					?>
						<div class="thumb">
							<a href="<?php echo $piloto['link'] ?>">
							<img src="<?php echo $piloto['imagem']; ?>" class="img-100">
							</a>
						</div>
					<?php
					endif;
					?>
					<h2 class="tit">
						<a href="<?php echo $piloto['link'] ?>"><?php echo $piloto['nome'] ?></a>
					</h2>
					<div class="info">
						<p class="time"><?php echo $piloto['equipe'] ?></p>
					</div>
				</li>
			<?php
				}
			}

			foreach ($equipes as $key => $equipe) { 
				
				if ($key != 'Sem equipe') continue;
				
				echo '<li class="nomeEquipe">'.$key.'</li>';

				foreach ($equipe['pilotos'] as $piloto) { ?>
				<li>
					<?php
					if (!empty($piloto['imagem'])) :
					?>
						<div class="thumb">
							<a href="<?php echo $piloto['link'] ?>">
							<img src="<?php echo $piloto['imagem']; ?>" class="img-100">
							</a>
						</div>
					<?php
					endif;
					?>
					<h2 class="tit">
						<a href="<?php echo $piloto['link'] ?>"><?php echo $piloto['nome'] ?></a>
					</h2>
					<div class="info">
						<p class="time"><?php echo $piloto['equipe'] ?></p>
					</div>
				</li>
			<?php
				}
			}
			?>	
			<div class="clear"></div>
		</ul>
		<?php endif; wp_reset_postdata(); ?>	
		<div class="clear"></div>
	</div>
</section>	

<?php get_footer(); ?>