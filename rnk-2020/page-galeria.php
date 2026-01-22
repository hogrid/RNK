<?php get_header(); ?>

<section class="interna">
	<div class="content-wrap">
		<div class="top-interna">
			<div class="img" style="background-image: url('<?= get_template_directory_uri() ?>/img/header-galeria.jpg')"></div>
			<h2>Galeria</h2>
		</div>


		<div class="internas-01">
			
			<div class="galeria-wrap">
				<?php echo do_shortcode("[gallery type='google' view='photos' album_id='AKMhXYx3r1wLaa9Ue8T15uCMb4NZJaNkUTOSVyjH2VWPo61DWStYMzbC3GpCD51Znkb-eARpSlW7' count=100 thumb_size='104']"); ?>
			</div>
	

		</div>
		
		<div class="clear"></div>
	</div>
</section>	

<?php get_footer(); ?>