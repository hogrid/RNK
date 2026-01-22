<?php get_header(); ?>
	
	<?php while (have_posts()): the_post()?>
	
	<section class="interna">
		<div class="content-wrap">
			<div class="top-interna">
				<div class="img" style="background-image: url('<?= get_template_directory_uri() ?>/img/header-default.jpg')"></div>
				<h2><?php the_title(); ?></h2>
			</div>


			<div class="internas-01 ">

				<div id="post" class="post-simples">

					<?php	the_content(); ?>

				</div>

			</div>
		</div>	
	</section>	
	
	<?php endwhile; ?>

<?php get_footer(); ?>