<?php get_header(); ?>

<section class="interna">
	<div class="content-wrap">
		<div class="top-interna">
			<div class="img" style="background-image: url('<?= get_template_directory_uri() ?>/img/header-calendario.jpg')"></div>
			<h2>Calendário</h2>
		</div>


		<div class="internas-01">

			<?php echo do_shortcode('[events-calendar-templates category="all" template="default" style="style-2" date_format="default" start_date="" end_date="" limit="" order="ASC" hide-venue="no" time="future"]'); ?>
			
			<div class="clear"></div>
		
		</div>
		
		<div class="clear"></div>
	</div>
</section>	

<?php get_footer(); ?>