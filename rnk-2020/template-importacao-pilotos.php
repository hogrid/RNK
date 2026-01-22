<?php 
/**
Template name: Importação pilotos
**/

$AtualPilotos = get_pages( array( 'post_type' => 'pilotos') );
foreach ( $AtualPilotos as $piloto ) {
	wp_delete_post( $piloto->ID, true);
} 

//get_header();

$file = get_field( 'planilha' );
$pilotos = [];
//$file = array('url'=>'pilotos.csv');
if (($handle = fopen($file['url'], "r")) !== FALSE) {
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$num = count($data);
		$row++;

		if ($data[0] == 'Piloto') continue;

		if ($data[1] != 'x') continue;

		

		//for ($c=1; $c < $num; $c++) {
		//}


			$piloto_args = array(
				'post_title'    => $data[10].' '.$data[0],
				'post_status'   => 'publish',
				'post_author'   => 1,
				'post_type' => 'pilotos'
			);
			$post_id = wp_insert_post($piloto_args);
			
			
			// update_field('data_de_nascimento', $piloto['nascimento'], $post_id);
			// update_field('cidade', $piloto['cidade'], $post_id);
			// update_field('estado', $piloto['estado'], $post_id);
			// update_field('e_mail', $piloto['email'], $post_id);
			// update_field('titulos', $piloto['titulos'], $post_id);
			
			update_field('largadas', $data[2], $post_id);
			update_field('vitorias', $data[3], $post_id);
			update_field('pole_positions', $data[4], $post_id);
			update_field('voltas_mais_rapidas', $data[5], $post_id);
			update_field('2_lugares', $data[6], $post_id);
			update_field('3_lugares', $data[7], $post_id);
			update_field('numeros', $data[8], $post_id);
			update_field('sobre', $data[9], $post_id);
			update_field('numero', $data[10], $post_id);
			update_field('equipe', $data[11], $post_id);
			update_field('safra', $data[12], $post_id);
			update_field('imagem', $data[13], $post_id);
		
			
	}
	fclose($handle);

}

// foreach ($pilotos as $piloto) {

// 	$piloto_args = array(
// 		'post_title'    => $piloto['nome'].' '.$piloto['sobrenome'],
// 		'post_status'   => 'publish',
// 		'post_author'   => 1,
// 		'post_type' => 'pilotos'
// 	);
// 	$post_id = wp_insert_post($piloto_args);
	
// 	update_field('equipe', $piloto['equipe'], $post_id);
// 	update_field('data_de_nascimento', $piloto['nascimento'], $post_id);
// 	update_field('cidade', $piloto['cidade'], $post_id);
// 	update_field('estado', $piloto['estado'], $post_id);
// 	update_field('e_mail', $piloto['email'], $post_id);
// 	update_field('sobre', $piloto['sobre'], $post_id);
// 	update_field('numeros', $piloto['numeros'], $post_id);
// 	update_field('largadas', $piloto['largadas'], $post_id);
// 	update_field('vitorias', $piloto['vitorias'], $post_id);
// 	update_field('2_lugares', $piloto['2-lugares'], $post_id);
// 	update_field('3_lugares', $piloto['3-lugares'], $post_id);
// 	update_field('voltas_mais_rapidas', $piloto['voltasRapidas'], $post_id);
// 	update_field('pole_positions', $piloto['polePositions'], $post_id);
// 	update_field('titulos', $piloto['titulos'], $post_id);
// }

echo 'Importação realizada';
//get_footer();