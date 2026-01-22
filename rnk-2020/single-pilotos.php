<?php get_header(); ?>

<?php while (have_posts()): the_post()?>

<section class="interna single-pilotos">
	<div class="content-wrap">
		<h2 class="piloto-nome"><?php the_title() ?></h2>

		<div class="piloto-info">
			<ul>
				<?php
				
				$image = get_field('imagem');
				if (!empty($image)) :
				?>
					<li>
						<div class="item"><h3>Foto de perfil</h3></div>
						<div class="conteudo">
							<div class="img"><img src="<?php echo $image; ?>" class="img-100"></div>
						</div>
						<div class="clear"></div>
					</li>
				<?php
				endif;
				?>
				<li>
					<div class="item"><h3>Nome</h3></div>
					<div class="conteudo">
						<div class="txt"><p><?php the_title() ?></p></div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="item"><h3>Safra</h3></div>
					<div class="conteudo">
						<div class="txt"><p><?php echo get_field( 'safra' )?></p></div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="item"><h3>Histórico</h3></div>
					<div class="conteudo">
						<div class="txt"><p><?php echo get_field( 'sobre' )?></p></div>
					</div>
					<div class="clear"></div>
				</li>
			</ul>
		</div>
		
		<div class="piloto-info piloto-num">
			<h2>Números</h2>
			<ul>
				<li>
					<div class="item"><h3>Largadas:</h3></div>
					<div class="conteudo">
						<div class="txt"><p><?php echo get_field( 'largadas' )?></p></div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="item"><h3>Vitórias:</h3></div>
					<div class="conteudo">
						<div class="txt"><p><?php echo get_field( 'vitorias' )?></p></div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="item"><h3>2º. Lugares:</h3></div>
					<div class="conteudo">
						<div class="txt"><p><?php echo get_field( '2_lugares' )?></p></div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="item"><h3>3º. Lugares:</h3></div>
					<div class="conteudo">
						<div class="txt"><p><?php echo get_field( '3_lugares' )?></p></div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="item"><h3>Fast laps:</h3></div>
					<div class="conteudo">
						<div class="txt"><p><?php echo get_field( 'voltas_mais_rapidas' )?></p></div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="item"><h3>Pole Positions:</h3></div>
					<div class="conteudo">
						<div class="txt"><p><?php echo get_field( 'pole_positions' )?></p></div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="item"><h3>Pódios:</h3></div>
					<div class="conteudo">
						<div class="txt"><p><?php echo get_field( 'numeros' )?></p></div>
					</div>
					<div class="clear"></div>
				</li>
			</ul>
		</div>		
	
		<div class="clear"></div>	
	</div>	
</section>	

<?php endwhile; ?>

<?php get_footer(); ?>