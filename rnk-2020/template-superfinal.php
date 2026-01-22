<?php 
/**
Template name: Super final
**/
get_header();
?>

<section class="interna">
	<div class="content-wrap">
		<div class="top-interna">
			<div class="img" style="background-image: url('<?= get_template_directory_uri() ?>/img/header-classificacao.jpg')"></div>
			<h2><?php the_title(); ?></h2>
		</div>

		<div class="classificacao-table">
			<table>
				<tr>
					<th rowspan="2">Piloto</th>
					<th colspan="2">1º turno</th>
					<th colspan="2">2º turno</th>
					<th colspan="2">Soma</th>
				</tr>
				<tr>
					<th>Pontos</th>
					<th>Bônus</th>

					<th>Pontos</th>
					<th>Bônus</th>

					<th>Pontos</th>
					<th>Bônus</th>
				</tr>
				<?php
				$file = get_field( 'planilha' );
				if (($handle = fopen($file['url'], "r")) !== FALSE) {
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						$num = count($data);
						$row++;
						if ($row <= 2) continue;
				
						echo '<tr>';
							for ($c=0; $c < $num; $c++) {
								echo '<td>'.$data[$c].'</td>';
							} 
						echo '</tr>';
					}
					fclose($handle);
				}
				?>
			</table>
		</div>

	
		<div class="clear"></div>
	</div>
</section>	

<?php get_footer(); ?>