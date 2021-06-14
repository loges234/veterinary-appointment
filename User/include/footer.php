</div>
</div>
<footer id="footer"  style="background-color:papayawhip">
<div class="container-fluid">
<div class="footer-box">
<div class="footer-col">
<div class="logo-footer"><a href="index.php" style="font-size: 30px;">Veterinary Appointment</a></div>
 </div>

<div class="footer-col">
<div class="service">Customers</div>
<ul>
<li><a href="howwork.php">How it works</a></li>
<li><a href="safety.php">Safety</a></li>
</ul>
</div>

<div class="footer-col">
<div class="service">Support</div>
<ul>
<li><a href="contact.php">Contact us</a></li>
</ul>
</div>
</div>
</div>
<div class="footer-legal">
<div class="container-fluid"><div class="term-links pull-right"><font color="black">&copy; <b>2021 All Rights Reserved</b></font> </div></div>
</div>
</footer>
</div>
<script type="application/ld+json">
{
	"@context": "http:\/\/schema.org",
	"@type": "BreadcrumbList",
	"itemListElement": [{
	"@type": "ListItem",
	"position": 1,
	"item": {
		"@id": "https:\/\/homeguide.com\/",
		"name": "HomeGuide"
	}
	},{
	"@type": "ListItem",
	"position": 2,
	"item": {
		"@id": "https:\/\/homeguide.com\/cleaning\/",
		"name": "Cleaning"
	}
	}]
}
</script>
<script src="/js/lead/app.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($){
	$('.service-box').hover(
		 function(){ $(this).addClass('visible') },
		 function(){ $(this).removeClass('visible') }
	)
});
</script>
<script type="text/javascript">
		var menu = document.querySelector('.sticky-cta')
		var menuPosition = menu.getBoundingClientRect().top;
		window.addEventListener('scroll', function() {
			if (window.pageYOffset >= menuPosition) {
				$('.sticky-cta').addClass('visible');
			} else {
				$('.sticky-cta').removeClass('visible');
			}
		});

	</script>
<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/moment-with-locales.min.js"></script>
<script src="assets/js/blazy.min.js"></script>
<script>

	$(window).load(function(){
			  // Initialize
	  var bLazy = new Blazy({
		breakpoints: [{
			width: 320, // max-width
			src: 'data-src-small'
		  }]
		, success: function(element){
		  setTimeout(function(){
			var parent = element.parentNode;
			parent.className = parent.className.replace(/\bloading\b/,'');
		  }, 200);
		}
	  });
		  });
	  </script>
</body>
</html>