<?php 
/**
Template name: Equipe
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
					<th></th>
					<th>EQUIPE</th>
					<th>1</th>
					<th>2</th>
					<th>3</th>
					<th>4</th>
					<th>5</th>
					<th>6</th>
					<th>TOTAL</th>
					<th>N-1</th>
					<th>N-2</th>
					<th>TOTAL</th>
				</tr>
				<?php
				$file = get_field( 'planilha' );
				if (($handle = fopen($file['url'], "r")) !== FALSE) {
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						$num = count($data);
						$row++;
						if ($row <= 1) continue;
				
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