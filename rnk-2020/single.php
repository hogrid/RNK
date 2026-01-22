<?php get_header(); ?>

<?php while (have_posts()): the_post()?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

	<section class="intro intro-single">
		<ul>
			<li>
				<div class="img" style="background-image: url('<?php echo $image[0]; ?>')"></div>
				<div class="shadow"></div>
			</li>	
		</ul>	
	</section>

	<section class="internas-01 post-single">

		<div id="post" class="post-simples">

			<h2 class="post-tit"><?php the_title(); ?></h2>

			<?php	the_content(); ?>

			<div class="clear"></div>
		</div>
	
		<div class="clear"></div>

	</section>

<?php endwhile; ?>

<?php get_footer(); ?>