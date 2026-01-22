<?php 
/**
Template name: Etapas
**/

get_header();
?>
<section class="interna">
	<div class="content-wrap">
		<div class="top-interna">
			<div class="img" style="background-image: url('<?= get_template_directory_uri() ?>/img/header-classificacao.jpg')"></div>
			<h2><?php the_title(); ?></h2>
		</div>

		<div class="classificacao-filtros">
			<form>
				<div class="filtro">
					<h2>Selecione a informação que deseja visualizar e clique em filtrar</h2>
					<label>Ano</label>
					<?php
					$options = null;
					$anos = [];
					if( have_rows('planilhas') ):
						while( have_rows('planilhas') ): the_row();
							if (!empty(get_sub_field('ano')) && !in_array(get_sub_field('ano'), $anos))
								$options .='<option value="'.get_sub_field('ano').'"  '.((isset($_GET['ano']) && $_GET['ano'] == get_sub_field('ano')) ? 'selected' : '').'>'.get_sub_field('ano').'</option>';

								$anos[] = get_sub_field('ano');
						endwhile;
					endif;
					?>
					<select name="ano" id="ano">
						<option>Selecione o ano</option>
						<?php echo $options?>
					</select>
				</div>	
				<div class="filtro">
					<h2>&nbsp;</h2>
					<label>Etapa</label>
					<?php
					$options = null;
					if( have_rows('planilhas') ):
						while( have_rows('planilhas') ): the_row();
							if (!empty(get_sub_field('cidade')))
								$options .='<option value="'.get_sub_field('cidade').'"  class="resuts resut-'.get_sub_field('ano').'" '.((isset($_GET['cidade']) && $_GET['cidade'] == get_sub_field('cidade')) ? 'selected' : '').'>'.get_sub_field('cidade').'</option>';
						endwhile;
					endif;
					?>
					<select name="cidade" id="cidade">
						<option value="selecione">Selecione a etapa</option>
						<?php echo $options?>
					</select>
				</div>
				<div class="filtro">
					<h2>&nbsp;</h2>
					<label>&nbsp;</label>
					<div class="btn-filtro">
						<button>Filtrar</button>
					</div>
				</div>

				<div class="clear"></div>
			</form>
		</div>

		<div class="classificacao-table">
				<?php
					if( have_rows('planilhas') && isset($_GET['ano']) && isset($_GET['cidade'])):
						while( have_rows('planilhas') ): the_row();
							
							if ($_GET['ano'] != get_sub_field('ano')) continue;

							if ($_GET['cidade'] != get_sub_field('cidade')) continue;

							if( have_rows('arquivos') ):
								while( have_rows('arquivos') ): the_row();
									$titulo = get_sub_field('titulo');
									$descricao = get_sub_field('descricao');
									$file = get_sub_field('arquivo');
									
									echo '<h2 style="font-size: 2rem;">'.$titulo.'</h2>';
									if (($handle = fopen($file['url'], "r")) !== FALSE) {
										echo '<table>
										<tr>
											<th>COL.</th>
											<th>Nº</th>
											<th>PILOTO</th>
											<th>VOLTAS</th>
											<th>TEMPO</th>
											<th>+ RÁP</th>
											<th>GRID</th>
										</tr>';
			
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
			
										echo '</table>';
									}
									echo '<br><p>'.$descricao.'</p>';
									if ($file['modified']) {
										$date = date_create($file['modified']);
										echo '<br><p>Planilha atualizada no dia: '.date_format($date,"d/m/Y H:i:s").'<p><br><br><br>';
									}
								endwhile;
							endif;
						endwhile;
					endif;
				?>
		</div>

	
		<div class="clear"></div>
	</div>
</section>	

<?php get_footer(); ?>

<script>

jQuery(document).ready(function() {
	jQuery('#ano').change(function() {
	
		let ano = jQuery(this).val();
		jQuery("#cidade").val('selecione');
		jQuery(".resuts").hide();
		jQuery(".resut-"+ano).removeAttr('style').show();
		
	});

	jQuery('#ano').trigger('change');
});
</script>