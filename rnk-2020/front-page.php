<?php get_header(); ?>

<section class="intro intro-home">
	<?php
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => -1,
		'meta_query' => array(
			array(
				'key' => 'news-destaque',
				'value' => '1',
				'compare' => '=='
			)
		)
	);
	$the_query = new WP_Query($args); ?>
	<?php if ( $the_query->have_posts() ) : ?>
		<ul>
			<?php while ($the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php $vitrine = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'galeria-g' ); ?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<div class="txt">
									<div class="content-wrap">
										<h2><?php the_title(); ?></h2>
										<p><?php the_excerpt(375); ?></p>

										<div class="clear"></div>
									</div>	
								</div>	
								<div class="img" style="background-image: url('<?php echo $vitrine[0]; ?>')"></div>
								<div class="shadow"></div>
							</a>
						</li>
			<?php endwhile; ?>  
		</ul>
	<?php else: ?>	
	
		<ul>
			<li>
				<div class="txt">
					<div class="content-wrap">
						<h2>EM BREVE NOVIDADES</h2>
						<p>Fique por dentro dos próximos eventos.</p>

						<div class="clear"></div>
					</div>	
				</div>	
				<div class="img" style="background-image: url('<?= get_template_directory_uri() ?>/img/vitrine-01.jpg')"></div>
				<div class="shadow"></div>
			</li>	
		</ul>	
	<?php endif; wp_reset_postdata(); ?>	
</section>

<section class="bloco-01">
	<div class="content-wrap">
		<div class="bloco-duo">
			<h2 class="h2-01">Próximo evento</h2>
			<div class="prox-evento">

			
				
				<div class="top">
				<?php

				// Ensure the global $post variable is in scope
				global $post;

				// Retrieve the next 5 upcoming events
				$events = tribe_get_events( [ 'posts_per_page' => 1 ] );

				// Loop through the events: set up each one as
				// the current post then use template tags to
				// display the title and content
				foreach ( $events as $post ) {
				 setup_postdata( $post );
				 $event_id=$post->ID;

				 echo '<h2>' . $post->post_title . '</h2>';
				 echo '<p>' . tribe_get_start_date( $post, true, 'd/m/Y') . '</p>';
				 echo '<p>' . tribe_get_start_date( $post, true, 'H:i' ) . '</p>';	
				}	

				?>	
				</div>
				<div class="timers">
					
					<?php 
					foreach ( $events as $post ) {
						setup_postdata( $post );
						$event_id=$post->ID;			
						
						#Informamos as datas e horários de início e fim no formato Y-m-d H:i:s e os convertemos para o formato timestamp
						$dia_hora_atual = strtotime(date("Y-m-d H:i:s"));
						$dia_hora_evento = strtotime(date(tribe_get_start_date( $post, true, 'Y-m-d H:i:s')));
						#Achamos a diferença entre as datas...
						$diferenca = $dia_hora_evento - $dia_hora_atual;
						#Fazemos a contagem...
						$dias = intval($diferenca / 86400);
						$marcador = $diferenca % 86400;
						$hora = intval($marcador / 3600);
						$marcador = $marcador % 3600;
						$minuto = intval($marcador / 60);
						$segundos = $marcador % 60;				
					?>
					
					<div class="timer">
						<div class="circle">
							<p>
								<?php if ($dias >= 0) { ?> <?php echo $dias ?> <? }	else { ?> 0 <? } ?>								
							</p>
						</div>
						<h3>Dias</h3>
					</div>
					<div class="timer">
						<div class="circle">
							<p>
								<?php if ($hora >= 0) { ?> <?php echo $hora ?> <? }	else { ?> 0 <? } ?>										
							</p>
						</div>
						<h3>Horas</h3>
					</div>
					<div class="timer">
						<div class="circle">
							<p>
								<?php if ($minuto >= 0) { ?> <?php echo $minuto ?> <? }	else { ?> 0 <? } ?>		
							</p>
						</div>
						<h3>Minutos</h3>
					</div>		
					
					<?php } ?>
					
					<?php

					foreach ( $events as $post ) {
						 setup_postdata( $post );
						$event_id=$post->ID;

						 // This time, let's throw in an event-specific
						 // template tag to show the date after the title!
						 echo '<a href="' .get_field('link-externo', $event_id). '" class="cta" title="Informações">Informações</a>';
					}	

					?>					
				</div>
			</div>
		</div>
		
		<div class="bloco-duo">
			<div class="classific-header">
				<h2 class="h2-01">Classificação</h2>
				<span class="classific-category-badge" id="classific-badge">Pilotos</span>
			</div>
			<div class="classific-carousel-wrapper">
				<div class="classific-carousel" id="classific-carousel">
					<?php
					// Buscar dinamicamente a página que usa o template de classificação
					$classificacao_page = get_pages(array(
						'meta_key' => '_wp_page_template',
						'meta_value' => 'template-classificacao.php',
						'number' => 1
					));
					$classificacao_page_id = !empty($classificacao_page) ? $classificacao_page[0]->ID : 0;

					// Definir todas as categorias disponíveis
					$categorias = array(
						array(
							'nome' => 'Pilotos',
							'campo' => 'planilha_pilotos_home',
							'fallback' => array('planilha_pilotos_superfinal', 'planilha_pilotos_regular')
						),
						array(
							'nome' => 'ELITE 90kg',
							'campo' => 'planilha_elite_90kg_superfinal',
							'fallback' => array('planilha_elite_90kg_2_turno', 'planilha_elite_90kg_1_turno')
						),
						array(
							'nome' => 'ELITE 105kg',
							'campo' => 'planilha_elite_105kg_superfinal',
							'fallback' => array('planilha_elite_105kg_2_turno', 'planilha_elite_105kg_1_turno')
						),
						array(
							'nome' => 'LIGHT 90kg',
							'campo' => 'planilha_light_90kg_superfinal',
							'fallback' => array('planilha_light_90kg_2_turno', 'planilha_light_90kg_1_turno')
						),
						array(
							'nome' => 'LIGHT 105kg',
							'campo' => 'planilha_light_105kg_superfinal',
							'fallback' => array('planilha_light_105kg_2_turno', 'planilha_light_105kg_1_turno')
						),
						array(
							'nome' => 'LEGENDS',
							'campo' => 'planilha_legends',
							'fallback' => array()
						),
						array(
							'nome' => 'Equipes',
							'campo' => 'planilha_equipes_2_turno',
							'fallback' => array('planilha_equipes')
						)
					);

					$slides_output = array();

					if( $classificacao_page_id && have_rows('planilhas', $classificacao_page_id) ):
						while( have_rows('planilhas', $classificacao_page_id) ): the_row();

							// Verificar se deve exibir na home
							$check = get_sub_field('exibir_classificacao_na_home');
							if (is_array($check) && in_array("nao", $check)) continue;

							$ano = get_sub_field('ano');

							// Iterar por cada categoria
							foreach ($categorias as $categoria) {
								$file = get_sub_field($categoria['campo']);

								// Tentar fallbacks se campo principal não existe
								if (!$file && !empty($categoria['fallback'])) {
									foreach ($categoria['fallback'] as $fallback_campo) {
										$file = get_sub_field($fallback_campo);
										if ($file) break;
									}
								}

								if (!$file) continue;

								// Converter URL para caminho local
								$file_path = str_replace(
									home_url('/wp-content/uploads/'),
									ABSPATH . 'wp-content/uploads/',
									$file['url']
								);

								if (($handle = fopen($file_path, "r")) !== FALSE) {
									$slide_content = '<div class="classific-slide" data-categoria="' . esc_attr($categoria['nome']) . '">';
									$slide_content .= '<div class="classific-home classificacao-table">';
									$slide_content .= '<table><tr><th></th><th>Piloto</th><th>PTS</th></tr>';

									$row = 0;
									$has_data = false;
									while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
										$row++;
										if ($row >= 15) break;
										if ($row <= 2) continue;

										if (count($data) >= 3) {
											$has_data = true;
											// Pegar posição, nome e última coluna (pontos)
											$pts_col = count($data) - 1;
											// Tentar encontrar coluna de pontos (geralmente TOTAL ou última numérica)
											$pts = isset($data[10]) ? $data[10] : (isset($data[$pts_col]) ? $data[$pts_col] : '');
											$slide_content .= '<tr>';
											$slide_content .= '<td>' . esc_html($data[0]) . '</td>';
											$slide_content .= '<td>' . esc_html($data[1]) . '</td>';
											$slide_content .= '<td>' . esc_html($pts) . '</td>';
											$slide_content .= '</tr>';
										}
									}
									fclose($handle);

									$slide_content .= '</table></div></div>';

									if ($has_data) {
										$slides_output[] = $slide_content;
									}
								}
							}

							// Só processar o primeiro ano com dados válidos
							if (!empty($slides_output)) break;

						endwhile;
					endif;

					// Output dos slides
					if (!empty($slides_output)) {
						foreach ($slides_output as $slide) {
							echo $slide;
						}
					} else {
						echo '<div class="classific-slide">';
						echo '<div class="classific-home classificacao-table">';
						echo '<table><tr><td colspan="3" style="text-align: center; padding: 40px 0;">Classificação não disponível</td></tr></table>';
						echo '</div></div>';
					}
					?>
				</div>
				<div class="classific-carousel-nav">
					<button class="classific-prev" aria-label="Anterior">
						<svg width="12" height="20" viewBox="0 0 12 20" fill="none">
							<path d="M10 2L2 10L10 18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
					<div class="classific-dots" id="classific-dots"></div>
					<button class="classific-next" aria-label="Próximo">
						<svg width="12" height="20" viewBox="0 0 12 20" fill="none">
							<path d="M2 2L10 10L2 18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
				</div>
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div class="banner-full">
			
			<?php

			foreach ( $events as $post ) {
				 setup_postdata( $post );
				$event_id=$post->ID;

				 // This time, let's throw in an event-specific
				 // template tag to show the date after the title!
				 echo '<a href="' .get_field('link-externo', $event_id). '"><img src="' .get_template_directory_uri(). '/img/banner-inscrevase.jpg" class="img-100"></a>';
			}	

			?>
			
			
		</div>
	</div>	
</section>

<section class="bloco-01">
	<div class="content-wrap">
		<h2 class="h2-01 left15">Notícias</h2>
		<div class="news-lista">
			
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
										<img src="<?= get_template_directory_uri() ?>/img/no-photo.jpg" class="img-100">
								<? } ?>
								
								</a></div>
							<div class="txt">
								<a href="<?php the_permalink() ?>"><h2><?php the_title() ?></h2></a>
								<a href="<?php the_permalink() ?>"><h3><?php echo excerpt(8); ?></h3></a>
							</div>
						</li>
				<?php endwhile; ?>  
				<div class="clear"></div>	
			</ul>
		<?php endif; wp_reset_postdata(); ?>			

		</div>
		<div class="clear"></div>
		
		<div class="banner-full">
			<a href="<?php echo esc_url( home_url() ); ?>/sobre"><img src="<?= get_template_directory_uri() ?>/img/banner-historia.jpg" class="img-100"></a>
		</div>
	</div>
</section>

<section class="bloco-01">
	<div class="content-wrap">
		<?php if (have_rows('home-apoio')) { ?>

		<h2 class="h2-01 left15">Patrocínios e Apoios</h2>
		<div class="logos-carrossel">
			<ul id="slider-logos">
				<?php while (have_rows('home-apoio')) : the_row(); ?>

					<?php $apoio_thumb = get_sub_field('apoio-logo'); ?>

					<li>
						<?php if (get_sub_field('apoio-link')): ?>
							<a href="<?php the_sub_field('apoio-link'); ?>" target="_blank"><img src="<?php echo $apoio_thumb['sizes']['medium']; ?>" class="img-100"></a>
						<?php else: ?>
							<img src="<?php echo $apoio_thumb['sizes']['medium']; ?>" class="img-100">
						<?php endif; ?>
					</li>

				<?php endwhile; ?>
			</ul>
		</div>

		<?php } ?>	
		
		<div class="bloco-duo">
			<a href="https://www.colab55.com/@coparnk#" target="_blank"><img src="<?= get_template_directory_uri() ?>/img/banner-loja.jpg" class="img-100"></a>
		</div>
		
		<div class="bloco-duo">
			<h2 class="h2-01 left15">Instagram</h2>
			
			<div class="instagram-home">
				<?php echo do_shortcode('[instagram-feed]'); ?>
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div class="banner-full">
			<a href="<?php echo esc_url( home_url() ); ?>/galeria"><img src="<?= get_template_directory_uri() ?>/img/banner-galeria.jpg" class="img-100"></a>
		</div>
	</div>
</section>

<script>
// Carousel de Classificação
(function() {
	document.addEventListener('DOMContentLoaded', function() {
		const carousel = document.getElementById('classific-carousel');
		const dotsContainer = document.getElementById('classific-dots');
		const prevBtn = document.querySelector('.classific-prev');
		const nextBtn = document.querySelector('.classific-next');
		const badge = document.getElementById('classific-badge');

		if (!carousel) return;

		const slides = carousel.querySelectorAll('.classific-slide');
		const totalSlides = slides.length;
		let currentSlide = 0;
		let autoplayInterval;

		// Criar dots
		for (let i = 0; i < totalSlides; i++) {
			const dot = document.createElement('div');
			dot.className = 'classific-dot' + (i === 0 ? ' active' : '');
			dot.addEventListener('click', function() {
				goToSlide(i);
				resetAutoplay();
			});
			dotsContainer.appendChild(dot);
		}

		const dots = dotsContainer.querySelectorAll('.classific-dot');

		function updateCarousel() {
			carousel.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';

			// Atualizar dots
			dots.forEach(function(dot, index) {
				dot.classList.toggle('active', index === currentSlide);
			});

			// Atualizar badge com nome da categoria
			if (badge && slides[currentSlide]) {
				const categoria = slides[currentSlide].getAttribute('data-categoria');
				if (categoria) badge.textContent = categoria;
			}
		}

		function goToSlide(index) {
			currentSlide = index;
			if (currentSlide >= totalSlides) currentSlide = 0;
			if (currentSlide < 0) currentSlide = totalSlides - 1;
			updateCarousel();
		}

		function nextSlide() {
			goToSlide(currentSlide + 1);
		}

		function prevSlide() {
			goToSlide(currentSlide - 1);
		}

		function startAutoplay() {
			autoplayInterval = setInterval(nextSlide, 5000);
		}

		function resetAutoplay() {
			clearInterval(autoplayInterval);
			startAutoplay();
		}

		// Event listeners
		if (prevBtn) {
			prevBtn.addEventListener('click', function() {
				prevSlide();
				resetAutoplay();
			});
		}

		if (nextBtn) {
			nextBtn.addEventListener('click', function() {
				nextSlide();
				resetAutoplay();
			});
		}

		// Touch/Swipe support
		let touchStartX = 0;
		let touchEndX = 0;

		carousel.addEventListener('touchstart', function(e) {
			touchStartX = e.changedTouches[0].screenX;
		}, { passive: true });

		carousel.addEventListener('touchend', function(e) {
			touchEndX = e.changedTouches[0].screenX;
			const diff = touchStartX - touchEndX;
			if (Math.abs(diff) > 50) {
				if (diff > 0) {
					nextSlide();
				} else {
					prevSlide();
				}
				resetAutoplay();
			}
		}, { passive: true });

		// Pausar autoplay no hover
		carousel.parentElement.addEventListener('mouseenter', function() {
			clearInterval(autoplayInterval);
		});

		carousel.parentElement.addEventListener('mouseleave', function() {
			startAutoplay();
		});

		// Iniciar autoplay
		if (totalSlides > 1) {
			startAutoplay();
		}
	});
})();
</script>

<?php get_footer(); ?>