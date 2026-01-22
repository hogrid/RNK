<?php
date_default_timezone_set('America/Sao_Paulo');

/**
Template name: Classificação
**/
get_header();
?>
<script>
let getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
</script>
<section class="interna">
	<div class="content-wrap">
		<div class="top-interna">
			<div class="img" style="background-image: url('<?= get_template_directory_uri() ?>/img/header-classificacao.jpg')"></div>
			<h2>Classificação</h2>
		</div>

		<div class="classificacao-filtros">
			<form>
			<div class="filtro" style="width:100%; margin-bottom: 0px;">
			<h2>Selecione a informação que deseja visualizar e clique em filtrar</h2>
			</div>
				<div class="filtro">

					<label>Ano</label>
					<?php
					$options = null;
					$categorias_disponiveis = array();

					if( have_rows('planilhas') ):
						while( have_rows('planilhas') ): the_row();
							if (empty(get_sub_field('ano'))) continue;

							$ano = get_sub_field('ano');
							$cat_data = array();

							// Pilotos
							$pilotos = array();
							if (get_sub_field('planilha_pilotos_regular') != null) $pilotos[] = 'regular';
							if (get_sub_field('planilha_pilotos_1_turno') != null) $pilotos[] = '1-turno';
							if (get_sub_field('planilha_pilotos_2_turno') != null) $pilotos[] = '2-turno';
							if (get_sub_field('planilha_pilotos_superfinal') != null) $pilotos[] = 'superfinal';
							if (!empty($pilotos)) $cat_data['pilotos'] = $pilotos;

							// Equipes
							$equipes = array();
							if (get_sub_field('planilha_equipes') != null) $equipes[] = '1-turno';
							if (get_sub_field('planilha_equipes_2_turno') != null) $equipes[] = '2-turno';
							if (!empty($equipes)) $cat_data['equipes'] = $equipes;

							// ELITE 90kg
							$elite90 = array();
							if (get_sub_field('planilha_elite_90kg_1_turno') != null) $elite90[] = '1-turno';
							if (get_sub_field('planilha_elite_90kg_2_turno') != null) $elite90[] = '2-turno';
							if (get_sub_field('planilha_elite_90kg_superfinal') != null) $elite90[] = 'superfinal';
							if (!empty($elite90)) $cat_data['elite-90kg'] = $elite90;

							// ELITE 105kg
							$elite105 = array();
							if (get_sub_field('planilha_elite_105kg_1_turno') != null) $elite105[] = '1-turno';
							if (get_sub_field('planilha_elite_105kg_2_turno') != null) $elite105[] = '2-turno';
							if (get_sub_field('planilha_elite_105kg_superfinal') != null) $elite105[] = 'superfinal';
							if (!empty($elite105)) $cat_data['elite-105kg'] = $elite105;

							// LIGHT 90kg
							$light90 = array();
							if (get_sub_field('planilha_light_90kg_1_turno') != null) $light90[] = '1-turno';
							if (get_sub_field('planilha_light_90kg_2_turno') != null) $light90[] = '2-turno';
							if (get_sub_field('planilha_light_90kg_superfinal') != null) $light90[] = 'superfinal';
							if (!empty($light90)) $cat_data['light-90kg'] = $light90;

							// LIGHT 105kg
							$light105 = array();
							if (get_sub_field('planilha_light_105kg_1_turno') != null) $light105[] = '1-turno';
							if (get_sub_field('planilha_light_105kg_2_turno') != null) $light105[] = '2-turno';
							if (get_sub_field('planilha_light_105kg_superfinal') != null) $light105[] = 'superfinal';
							if (!empty($light105)) $cat_data['light-105kg'] = $light105;

							// LEGENDS
							if (get_sub_field('planilha_legends') != null) {
								$cat_data['legends'] = array('unico');
							}

							$categorias_disponiveis[$ano] = $cat_data;
							$options .='<option value="'.get_sub_field('ano').'" '.((isset($_GET['ano']) && $_GET['ano'] == get_sub_field('ano')) ? 'selected' : '').'>'.get_sub_field('ano').'</option>';

						endwhile;
					endif;
					?>
					<input type="hidden" id="categorias-data" value='<?php echo json_encode($categorias_disponiveis); ?>'>
					<select name="ano" id="ano"><?php echo $options?></select>
				</div>
				<div class="filtro" id="filtro-categoria">
					<label>Categoria</label>
					<select name="categoria" id="categoria">
						<option value="selecione" selected>Selecione a categoria</option>
						<option value="pilotos" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] === 'pilotos') ? 'selected' : ''; ?>>Pilotos</option>
						<option value="equipes" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] === 'equipes') ? 'selected' : ''; ?>>Equipes</option>
						<option value="elite-90kg" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] === 'elite-90kg') ? 'selected' : ''; ?>>ELITE 90kg</option>
						<option value="elite-105kg" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] === 'elite-105kg') ? 'selected' : ''; ?>>ELITE 105kg</option>
						<option value="light-90kg" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] === 'light-90kg') ? 'selected' : ''; ?>>LIGHT 90kg</option>
						<option value="light-105kg" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] === 'light-105kg') ? 'selected' : ''; ?>>LIGHT 105kg</option>
						<option value="legends" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] === 'legends') ? 'selected' : ''; ?>>LEGENDS</option>
					</select>
				</div>
				<div class="filtro" id="filtro-etapa">
					<label>Turno</label>
					<select name="etapa" id="etapas">
						<option value="selecione" selected>Selecione o turno</option>
						<option value="1-turno" <?php echo (isset($_GET['etapa']) && $_GET['etapa'] === '1-turno') ? 'selected' : ''; ?>>1º TURNO</option>
						<option value="2-turno" <?php echo (isset($_GET['etapa']) && $_GET['etapa'] === '2-turno') ? 'selected' : ''; ?>>2º TURNO</option>
						<option value="regular" <?php echo (isset($_GET['etapa']) && $_GET['etapa'] === 'regular') ? 'selected' : ''; ?>>Regular</option>
						<option value="superfinal" <?php echo (isset($_GET['etapa']) && $_GET['etapa'] === 'superfinal') ? 'selected' : ''; ?>>Superfinal</option>
						<option value="unico" <?php echo (isset($_GET['etapa']) && $_GET['etapa'] === 'unico') ? 'selected' : ''; ?>>Evento Único</option>
					</select>
				</div>
				<div class="btn-filtro">
					<button>Filtrar</button>
				</div>
				<div class="clear"></div>
			</form>
		</div>

		<div class="classificacao-table table-mobile">
		<?php

		$btnPrint = '<div class="btn-filtro" style="text-align: center;">
		<button onclick="window.print()">Imprimir</button><br><br>
		</div>';

		// Função auxiliar para renderizar tabela CSV
		function render_csv_table($file, $btnPrint) {
			if (!$file || !isset($file['url'])) return;

			$file_path = str_replace(
				home_url('/wp-content/uploads/'),
				ABSPATH . 'wp-content/uploads/',
				$file['url']
			);

			if (($handle = fopen($file_path, "r")) !== FALSE) {
				echo $btnPrint;
				echo '<table>';

				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$num = count($data);
					echo '<tr>';
					for ($c=0; $c < $num; $c++) {
						echo '<td>'.$data[$c].'</td>';
					}
					echo '</tr>';
				}
				fclose($handle);
				echo '</table>';

				if (isset($file['modified'])) {
					$date = date_create($file['modified']);
					echo '<br><p>Planilha atualizada no dia: '.date_format($date,"d/m/Y H:i:s").'<p>';
				}
			}
		}

		// Mapeamento de campos ACF por categoria e etapa
		$campo_map = array(
			'pilotos' => array(
				'1-turno' => 'planilha_pilotos_1_turno',
				'2-turno' => 'planilha_pilotos_2_turno',
				'regular' => 'planilha_pilotos_regular',
				'superfinal' => 'planilha_pilotos_superfinal'
			),
			'equipes' => array(
				'1-turno' => 'planilha_equipes',
				'2-turno' => 'planilha_equipes_2_turno'
			),
			'elite-90kg' => array(
				'1-turno' => 'planilha_elite_90kg_1_turno',
				'2-turno' => 'planilha_elite_90kg_2_turno',
				'superfinal' => 'planilha_elite_90kg_superfinal'
			),
			'elite-105kg' => array(
				'1-turno' => 'planilha_elite_105kg_1_turno',
				'2-turno' => 'planilha_elite_105kg_2_turno',
				'superfinal' => 'planilha_elite_105kg_superfinal'
			),
			'light-90kg' => array(
				'1-turno' => 'planilha_light_90kg_1_turno',
				'2-turno' => 'planilha_light_90kg_2_turno',
				'superfinal' => 'planilha_light_90kg_superfinal'
			),
			'light-105kg' => array(
				'1-turno' => 'planilha_light_105kg_1_turno',
				'2-turno' => 'planilha_light_105kg_2_turno',
				'superfinal' => 'planilha_light_105kg_superfinal'
			),
			'legends' => array(
				'unico' => 'planilha_legends'
			)
		);

		if( have_rows('planilhas') && isset($_GET['categoria']) && isset($_GET['etapa'])):

			while( have_rows('planilhas') ): the_row();

				if (isset($_GET['ano']) && $_GET['ano'] !== get_sub_field('ano')) continue;

				$categoria = sanitize_text_field($_GET['categoria']);
				$etapa = sanitize_text_field($_GET['etapa']);

				if (isset($campo_map[$categoria][$etapa])) {
					$acf_field = $campo_map[$categoria][$etapa];
					$file = get_sub_field($acf_field);

					if ($file) {
						render_csv_table($file, $btnPrint);
					}
				}

			endwhile;
		endif;
		?>
			</table>
		</div>


		<div class="clear"></div>
	</div>
</section>
<style>
table tr:first-child td,
table tr:nth-child(2) td{
	padding: 6px 0;
    text-align: center;
    font-size: 16px;
    color: #58595B;
    font-weight: 700;
    text-transform: uppercase;
    vertical-align: middle;
}

/* Categorias badges */
.categoria-badge {
	display: inline-block;
	background: linear-gradient(135deg, #f04e23 0%, #d63d14 100%);
	color: #fff;
	font-size: 12px;
	font-weight: 700;
	text-transform: uppercase;
	padding: 4px 12px;
	border-radius: 3px;
	margin-left: 10px;
	vertical-align: middle;
}

</style>

<?php get_footer(); ?>

<script>
	jQuery(document).ready(function() {
		var categoriasData = {};
		try {
			categoriasData = JSON.parse(jQuery('#categorias-data').val() || '{}');
		} catch(e) {
			console.error('Erro ao parsear categorias:', e);
		}

		function resetaEtapa() {
			jQuery("#etapas option").removeAttr('selected');
			jQuery("#etapas").val("selecione");
		}

		function resetaCategoria() {
			jQuery("#categoria option").removeAttr('selected');
			jQuery("#categoria").val("selecione");
		}

		function updateCategorias() {
			var ano = jQuery('#ano').val();
			var anoData = categoriasData[ano] || {};

			// Esconder todas as opções primeiro
			jQuery('#categoria option').each(function() {
				var val = jQuery(this).val();
				if (val !== 'selecione') {
					jQuery(this).hide();
				}
			});

			// Mostrar apenas categorias disponíveis para o ano
			Object.keys(anoData).forEach(function(cat) {
				jQuery('#categoria option[value="' + cat + '"]').show();
			});
		}

		function updateEtapas() {
			var ano = jQuery('#ano').val();
			var categoria = jQuery('#categoria').val();
			var anoData = categoriasData[ano] || {};
			var etapas = anoData[categoria] || [];

			// Esconder filtro de etapa se categoria é LEGENDS
			if (categoria === 'legends') {
				jQuery('#filtro-etapa').hide();
				jQuery('#etapas').val('unico');
				return;
			}

			jQuery('#filtro-etapa').show();

			// Esconder todas as opções de etapa primeiro
			jQuery('#etapas option').each(function() {
				var val = jQuery(this).val();
				if (val !== 'selecione') {
					jQuery(this).hide();
				}
			});

			// Mostrar apenas etapas disponíveis
			etapas.forEach(function(etapa) {
				jQuery('#etapas option[value="' + etapa + '"]').show();
			});
		}

		// Event listeners
		jQuery('#ano').change(function() {
			resetaCategoria();
			resetaEtapa();
			updateCategorias();
		});

		jQuery('#categoria').change(function() {
			resetaEtapa();
			updateEtapas();
		});

		// Inicialização
		updateCategorias();

		// Restaurar valores da URL
		var urlCategoria = getUrlParameter('categoria');
		var urlEtapa = getUrlParameter('etapa');

		if (urlCategoria) {
			jQuery("#categoria").val(urlCategoria);
			updateEtapas();
		}

		if (urlEtapa) {
			jQuery("#etapas").val(urlEtapa);
		}
	});
</script>
