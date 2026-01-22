<?php if ( is_front_page() ) : ?>
<footer>
<?php else : ?>
<footer class="footer-interna">
<?php endif; ?>	

	<div class="content-wrap">
		<div class="menu">
			<ul>
				<li><a href="<?php echo esc_url( home_url() ); ?>/sobre">Sobre</a></li>
				<li><a href="<?php echo esc_url( home_url() ); ?>/sobre">A Copa RNK</a></li>
				<li><a href="<?php echo esc_url( home_url() ); ?>/regulamento">Regulamento</a></li>
				<li><a href="<?php echo esc_url( home_url() ); ?>/contato">Contato</a></li>
			</ul>
			<ul>
				<li><a href="<?php echo esc_url( home_url() ); ?>/noticias">Multimídia</a></li>
				<li><a href="<?php echo esc_url( home_url() ); ?>/noticias">Notícias</a></li>
				<li><a href="<?php echo esc_url( home_url() ); ?>/galeria">Galeria de fotos</a></li>
			</ul>
			<ul>
				<li><a href="<?php echo esc_url( home_url() ); ?>/classificacao">Campeonato</a></li>
				<li><a href="<?php echo esc_url( home_url() ); ?>/classificacao">Classificação</a></li>
				<li><a href="<?php echo esc_url( home_url() ); ?>/pilotos">Pilotos</a></li>
				<li><a href="<?php echo esc_url( home_url() ); ?>/calendario">Calendário</a></li>
				<li><a href="<?php echo esc_url( home_url() ); ?>/endurance-team">Endurance Team</a></li>
			</ul>
		</div>
		<div class="info">
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>"><img src="<?= get_template_directory_uri() ?>/img/rnk-logo-rdp-vr2.png" alt="<?php echo get_bloginfo( 'name' ); ?>" class="img-100"></a>
			</div>
			<div class="social">
				<a href="http://www.facebook.com/coparnk" target="_blank"><img src="<?= get_template_directory_uri() ?>/img/social-fbook.png" class="img-100"></a>
				<a href="https://www.youtube.com/channel/UClyksWNe-0Na2m2lLyHMGXw" target="_blank"><img src="<?= get_template_directory_uri() ?>/img/social-youtube.png" class="img-100"></a>
				<a href="https://www.instagram.com/copa_rnk/" target="_blank"><img src="<?= get_template_directory_uri() ?>/img/social-insta.png" class="img-100"></a>
			</div>
		</div>
		<div class="clear"></div>
		<div class="bottom">
			<p class="copyright">Todos os direitos reservados RNK @ 2023.</p>
			<a href="#header" class="link-top"><img src="<?= get_template_directory_uri() ?>/img/ico-top.png" class="img-100"></a>
			<div class="clear"></div>
		</div>
	</div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link  href="<?= get_template_directory_uri() ?>/js/fancybox/jquery.fancybox.min.css" rel="stylesheet">
<script src="<?= get_template_directory_uri() ?>/js/fancybox/jquery.fancybox.min.js"></script>

<link  href="<?= get_template_directory_uri() ?>/js/slick/slick.css" rel="stylesheet">
<script src="<?= get_template_directory_uri() ?>/js/slick/slick.min.js"></script>

<script src="<?= get_template_directory_uri() ?>/js/jquery.mask.js"></script>



<script type="text/javascript">
	
// show mobile menu
$( function() {
	$(".header-mobile").on( "click", function() {
		$(".btn-mobile").toggleClass("bnt-mobile-h", 100);
		$("header .nav ul").toggleClass("menu-sliding", 400);
		
	});
});
	
// scroll on click
$(document).ready(function() {
  $('a[href*="#"]').each(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    && location.hostname == this.hostname
    && this.hash.replace(/#/,'') ) {
      var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) +']');
      var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
       if ($target) {
        var targetOffset = $target.offset().top;

				// JQUERY CLICK FUNCTION REMOVE AND ADD CLASS "ACTIVE" + SCROLL TO THE #DIV
				$(this).click(function() {
					$("header .menu ul li a").removeClass("active");
					$(this).addClass('active');
					$('html, body').animate({scrollTop: targetOffset}, 1000);
					return false;
				});
      }
    }
  });
});

</script>

<script>
var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$('.phone-input').mask(SPMaskBehavior, spOptions);
</script>

<script>
	 $('#slider-logos').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		dots: false,
		arrows: true,
		prevArrow: '<button type="button" class="slick-prev"></button>',
		nextArrow: '<button type="button" class="slick-next"></button>', 
	  variableWidth: false,
		infinite: true,
		swipe: false,
		draggable: false, 
		responsive: [
    {
      breakpoint: 880,
      settings: {
        slidesToShow: 1,
				slidesToScroll: 1,
				variableWidth: false,
      }
    }
  ] 
	});
</script>

<script>	
	$('.intro-home ul').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
		arrows: false,
		prevArrow: '<button type="button" class="intro-prev"></button>',
		nextArrow: '<button type="button" class="intro-next"></button>', 
		centerMode: true,
		fade: true,
		focusOnSelect: true,
		swipe: false,
		draggable: false
	});
</script>

<script type="text/javascript">
	
$(function(){
	$('.subarea').find('.tit').click(function(e){
			$(this).parent().children('.info').toggle(200);
	});
});	

</script>



<?php wp_footer(); ?>

</body>
</html>
