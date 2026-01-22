<?php get_header(); ?>

<section class="interna">
	<div class="content-wrap">
		<div class="top-interna">
			<div class="img" style="background-image: url('<?= get_template_directory_uri() ?>/img/header-contato.jpg')"></div>
			<h2>Contato</h2>
		</div>

		<div class="box-black">
			<h2>Mande sua mensagem</h2>
			
			<div class="contato-form">
				<div class="form-wrap">
					<?php echo do_shortcode('[contact-form-7 id="5" title="Contato"]') ?>
				</div>	
			</div>
		</div>

	
		<div class="clear"></div>
	</div>
</section>	

<?php get_footer(); ?>