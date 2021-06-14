<?php include("../db_connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Veterinary Appointment</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800" rel="stylesheet">
<link rel="stylesheet" href="assets/styles/bootstrap.min.css">
<link rel="stylesheet" href="assets/styles/homeguide.new.css">
<script type="text/javascript">
		    if(/MSIE \d|Trident.*rv:/.test(navigator.userAgent))
		        document.write('<script src="https://cdn.polyfill.io/v2/polyfill.min.js"><\/script>');
		</script>
<link rel="stylesheet" href="assets/styles/master.css">
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/underscore-min.js"></script>
<script src="assets/js/async.js"></script>
<script src="assets/js/fingerprint2.min.js" defer=""></script>

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-NDBNPD5');</script>

</head>
<body>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NDBNPD5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<script>
	$(window).load(function(){
		$( ".datepicker" ).datepicker();
	});
</script>
<noscript id="deferred-styles">
  <link rel="stylesheet" href="assets/styles/backgrounds.css">
  <link rel="stylesheet" type="text/css" href="assets/styles/flaticon.css">
  <link rel="stylesheet" href="assets/styles/font-awesome.min.css">
  <link rel="stylesheet" href="assets/styles/jquery-ui.css">
</noscript>
<script>
  var loadDeferredStyles = function() {
    var addStylesNode = document.getElementById("deferred-styles");
    var replacement = document.createElement("div");
    replacement.innerHTML = addStylesNode.textContent;
    document.body.appendChild(replacement)
    addStylesNode.parentElement.removeChild(addStylesNode);
  };
  var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
      window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
  if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
  else window.addEventListener('load', loadDeferredStyles);
</script>

<script src="assets/js/protos.js"></script>
<link rel="stylesheet" href="assets/styles/photoswipe.css">
<link rel="stylesheet" href="assets/styles/default-skin.css">
<script src="assets/js/photoswipe.min.js"></script>
<script src="assets/js/photoswipe-ui-default.min.js"></script>

<div id="wrapper" class="profile-page">
<div class="w1">
<div id="header"  style="background-color:papayawhip">
<div class="condtainer-fluid wide">
<nav class="navbar">
<div class="navbar-header-fixed">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-label="Menu"><i class="fa fa-bars"></i></button>
<div class="navbar-brand">
<a href="index.php" style="font-size: 30px;">Veterinary Appointment</a>
</div>
</div>
<div class="collapse navbar-collapse" id="navbar-collapse">
<div class="dropdown">
<ul class="log-nav navbar-nav navbar-right">
<li class="dropdown"><a href="index.php" class="">Home</a></li>
<?php
 if(isset( $_SESSION['user_id']))
  {  
	$id=$_SESSION['user_id'];
   $sql="select * from tbl_user where user_id='$id' ";
   $result=$connect->query($sql);
   $row=mysqli_num_rows($result);
   if($row==1)
   {
       while($row = $result->fetch_array())
       {
               $user_name=$row['user_name'];
               
  ?>
  <li class="dropdown"><a href="Profile.php" class=""><i class="fa fa-user"></i>  My Account</a></li>
  <li class="dropdown"><a href="../controller/logout.php" class="">Logout</a></li>
  <li class="dropdown"><a href="../contact.php" class="">Contact Us</a></li>
  <?php }  } }
  else
	   {?>

<li class="dropdown"><a href="signup.php" class="">Sign Up</a></li>
<li class="dropdown"><a href="login.php" class="">Log In</a></li>
<li class="dropdown"><a href="../contact.php" class="">Contact Us</a></li>
       <?php } ?>
</ul>
</div>
</div>
</nav>
</div>
</div>
<div class="business" >
<div class="profile-background">


<a class="anchor" id="top"></a>
<div class="profile-body clearfix">
<div class="container-fluid w-1000">
<div class="row" data-sticky-container style="background-color:silver">

<?php
$id=$_GET['id'];
$sql="select * from tbl_service where id='$id'";
   $result=$connect->query($sql);
  while($row = $result->fetch_array())
       {      
        $description=$row['description'];
        $location=$row['location'];
        $service_name=$row['service_name'];
        $appointment_fee=$row['appointment_fee'];
           ?>

<div class="col-xs-12 col-sm-12 col-md-8 main-col" >
<div class="business-info white-card-profile">
<div class="media">
<div class="media-left">
<div class="main-photo get-started" >
    <img class="headshot b-lazy"style="  width:140px;height:130px;" src="../controller/serviceprovider/services/<?php echo $row['photo']; ?>" data-src="../controller/serviceprovider/services/<?php echo $row['photo']; ?>" alt="Banner">
</div>
</div>
<div class="media-body">
<h1><?php echo $row['service_name']; ?></h1>
<div class="rating-stars">
<span class="pro-rating">5.0</span>
<i class="fa fa-star review-stars active"></i>
<i class="fa fa-star review-stars active"></i>
<i class="fa fa-star review-stars active"></i>
<i class="fa fa-star review-stars active"></i>
<i class="fa fa-star review-stars active"></i>
<!-- <span class="review-count">(5)</span> -->
</div>
<?php
$sql="select * from tbl_service where id=$id";
   $result=$connect->query($sql);
  while($row = $result->fetch_array())
       {        
         $sp_id=$row['sp_id'];
         $phone=$row['phone'];
         $member=$row['member'];
       }
       $sql="select * from tbl_plan_purchase where sp_id=$id";
       $result=$connect->query($sql);
      while($row = $result->fetch_array())
           {        
             $plan_id=$row['plan_id'];
             $plan_status=$row['plan_status'];
           }   
           if(isset($plan_id)&& isset($plan_status)){
      if($plan_id=='3' and $plan_status=='Activate')     
      {
echo "<i class='fa fa-phone'></i>&nbsp;".$phone;
      }
    }
           ?>
</div>



</div>
<div class="creds">
<?php 
$sql="SELECT COUNT(service_id) FROM tbl_booking where service_id=$id";
$result=$connect->query($sql);
while($row = $result->fetch_array())
     {        
         ?>
<div class="kred"><i class="fa fa-trophy fa-fw"></i> <?php echo $row['COUNT(service_id)']; ?> hire on Veterinary Appointment</div>
     <?php } ?>
<div class="kred"><i class="fa fa-male fa-fw"></i> <span><?php echo $member; ?> doctors </span></div>
<?php
$sql="select * from tbl_service_details where service_id=$id";
   $result=$connect->query($sql);
  while($row = $result->fetch_array())
       {        
           ?>
<div class="kred"><i class="fa fa-calendar-o fa-fw"></i> <span><?php echo $row['exp']; ?>years in service</span></div>
       <?php } ?>
</div>
</div>
<div class="mobile-btn visible-xs">
<a href="#contact" class="btn btn-blue btn-xl btn-text btn-block get-started btn-bold" data-provider-services="house cleaning,apartment cleaning,commercial cleaning,deep or spring cleaning,office cleaning,post-construction cleanup,property cleanup"><i class="fa fa-comment-o fa-fw"></i> Contact this Pro</a>
</div>
<a class="anchor" id="about"></a>
<div class="business-info white-card-profile">
<div class="company-description">
<h3>About this pro</h3>
<div class="bio answers-div">
<div class="answer">
<p><?php echo $description; ?></p>
<div class="bleep"></div>
</div>
</div>
<p>
<span id="readmore" class="blue-link read-btn read-more text-bold">Read more about this pro <i class="fa fa-angle-down"></i></span>
<span id="readmore" class="blue-link read-btn read-less hidden text-bold">Hide <i class="fa fa-angle-up"></i></span>
</p>
</div>
<div class="buttons profile-cta">
<?php 
    if(!isset($_SESSION['user_id']))
    {  ?>
     

<button class="btn btn-backlead get-started btn-block btn-lg" data-toggle="modal" data-target="#login">
    <i class="fa fa-dollar fa-fw"></i> Request estimation</button>


<button class="btn btn-backlead get-started btn-block btn-lg" data-toggle="modal" data-target="#appointment">
   <i class="fa fa-comment-o fa-fw"></i>Make Appointment</button>
   <?php }
   
    else { ?>

<button class="btn btn-backlead get-started btn-block btn-lg" data-toggle="modal" data-target="#estimate">
    <i class="fa fa-dollar fa-fw"></i> Request estimation</button>


    <button class="btn btn-backlead get-started btn-block btn-lg" data-toggle="modal" data-target="#appointment">
   <i class="fa fa-comment-o fa-fw"></i>Make Appointment</button>

    <?php } ?>
</div>
</div>
<hr>
<div class="business-info white-card-profile">
<h3>Credentials</h3>
<div class="services">
<div class="creds">
<div class="kred"><i class="fa fa-map-marker fa-fw"></i> <?php echo $location; ?></div>
<div class="kred"><i class="fa fa-envelope-o fa-fw"></i> Email verified</div>
<div class="kred"><i class="fa fa-phone fa-fw"></i> Phone verified</div>
</div>
</div>
</div>
<hr>
<a class="anchor" id="reviews"></a>
<div class="white-card-profile stats-info">
<div class="stats-block rating-stars">
<h2>Reviews</h2>
</div>
</div>
<hr>
<div class="profile-summary white-card-profile ">
<div class="reviews-list ">
<?php 

$sql="select * from tbl_review where service_id=$id";
   $result=$connect->query($sql);
  while($row = $result->fetch_array())
       {        
           ?>
<ul class="review-list">
<li class="review ">
<p class="review-rating-wrap">
<span class="review-author"><?php echo $row['name'];?></span>
<span class="starFill" data-stars="5">
<i class="fa fa-star review-stars active"></i>
<i class="fa fa-star review-stars active"></i>
<i class="fa fa-star review-stars active"></i>
<i class="fa fa-star review-stars active"></i>
<i class="fa fa-star review-stars active"></i>
</span>
</p>
<p class="review-body about-txt"><?php echo $row['message'];?></p>
<p class="review-footer">
<span class="review-date-wrap" style="color:blue"><?php echo $row['date'];?></span>
</p>
</li>
</ul>
       <?php } 
       if(isset($_SESSION['user_id'])) {?>
<h1>Leave a comment</h1>
<form action="../controller/add_db.php" method="post">
<input type="hidden" name="service_id" value="<?php echo $_GET['id'] ?>">
      <input type="text" name="review" value="" class="form-control" placeholder="How would you rate your interaction with our employees? ." required>
      <center><br><input type="submit" name="btn_review" value="Submit" class="btn btn-default"></center>
       </form><?php } ?>
<br>
<span id="showreviews" class="blue-link show-reviews text-bold">Show all reviews</span>
</div>
</div>
<hr>
<a class="anchor" id="photos"></a>

<div class="white-card-profile">
<h3>Photos</h3>
<div class="pro-details-block pro-profile">
<div class="block-images">

<div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">

<?php
$sql="select * from tbl_media where service_id=$id";
   $result=$connect->query($sql);
  while($row = $result->fetch_array())
       {        
           ?>

<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
<a href="../controller/serviceprovider/services/working/<?php echo "$id" .$row['work_image1']; ?>" itemprop="contentUrl" data-size="4032x3024" class="clearfix">
<img src="../controller/serviceprovider/services/working/<?php echo "$id" .$row['work_image1']; ?>"height="150"width="200" data-src="../controller/serviceprovider/services/working/<?php echo "$id" .$row['work_image1']; ?>" itemprop="thumbnail" class="b-lazy" alt="" />
</a>
</figure>
<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
<a href="../controller/serviceprovider/services/working/<?php echo "$id" .$row['work_image2']; ?>" itemprop="contentUrl" data-size="4032x3024" class="clearfix">
<img src="../controller/serviceprovider/services/working/<?php echo "$id" .$row['work_image2']; ?>"height="150"width="200" data-src="../controller/serviceprovider/services/working/<?php echo "$id" .$row['work_image2']; ?>" itemprop="thumbnail" class="b-lazy" alt="" />
</a>
</figure>
<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
<a href="../controller/serviceprovider/services/working/<?php echo "$id" .$row['work_image3']; ?>" itemprop="contentUrl" data-size="4032x3024" class="clearfix">
<img src="../controller/serviceprovider/services/working/<?php echo "$id" .$row['work_image3']; ?>"height="150"width="200" data-src="../controller/serviceprovider/services/working/<?php echo "$id" .$row['work_image3']; ?>"data-size="4032x3024" itemprop="thumbnail" class="b-lazy" alt="" />
</a>
</figure>
       <?php } ?>
</div>
</div>
</div>
      
</div>
<hr>
<a class="anchor" id="video"></a>
<div class="question-info white-card-profile with-reviews">
<h3>Video</h3>
<?php
$sql="select * from tbl_media where service_id=$id";
   $result=$connect->query($sql);
  while($row = $result->fetch_array())
       {        
           ?>
<video width="300" height="200" controls>
    <source src="../controller/serviceprovider/videos/<?php echo $row['video']; ?>"alt="video">
</video>
<?php } ?>
</div>
<hr>

<a class="anchor" id="qa"></a>
<div class="question-info white-card-profile with-reviews">
<h3>FAQs</h3>

<div class="services">
<hr>
<div class="info">
    <span class="subtitle">1. Do you have a standard pricing system for your services? If so, please share the details here.</span>
    <?php
$sql="select * from tbl_faq where service_id=$id";
   $result=$connect->query($sql);
   $row=mysqli_num_rows($result); 
   if($row=='1'){     
  while($row = $result->fetch_array())
       {  
        
           ?>
    <p><?php
     echo $row['faq1']; }}
    else
    {
      echo "<b> - </b>"; 
    } ?></p>
</div>
<div class="info">
    <span class="subtitle">2. What is your typical process for working with a new customer?</span>
    <?php
$sql="select * from tbl_faq where service_id=$id";
   $result=$connect->query($sql);
   $row=mysqli_num_rows($result); 
   if($row=='1'){     
  while($row = $result->fetch_array())
       {        
           ?>
    <p><?php echo $row['faq2'];}
    }
    else
    {
      echo "<b> - </b>"; 
    }  ?></p>
</div>
</div>
       <?php ?>
</div>
<hr>


       <?php }  ?>
       
</div>
<div class="profile-side col-xs-12 col-sm-12 col-md-4 hidden-xs hidden-sm">
<div class="profile-contactbox" data-sticky data-margin-top="75" data-sticky-for="990" >
<h3>What to expect next?</h3><hr>
<p><div ><b>Answer some questions</b></div><div class="weight-300">Tell this pro about your needs</div></p>
<p><div><b>Get a free quote</b></div><div class="weight-300">Know your total cost before hiring</div></p>
<p><div><b>Hire when ready</b></div><div class="weight-300">Review the details, and securely hire on Veterinary Appointment</div></p>
<hr>
<!-- <a href="#contact" class="btn btn-blue btn-xl btn-bold btn-text btn-block get-started">Contact this Pro</a>
<div class="btn-subtitle">It's free, with no obligation to hire.</div> -->
</div>
</div>

</div>
</div>
</div>
</div>

</div>

<footer id="footer"  style="background-color:papayawhip">
<div class="container-fluid">
<div class="footer-box">
<div class="footer-col">
<div class="logo-footer"><h1> Veterinary Appointment</h1></div>

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
<div class="container-fluid"><div class="term-links pull-right"><font color="black">&copy; <b>2021 Veterinary Appointment</b></font> </div></div>
</div>
</footer>
</div>
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

</div>
<script src="assets/js/profile_page.js"></script>
<script>
	$('#social').on('click', function() {
		ga('send', 'event', 'button', 'click', 'social');
	});
</script>
<script type="text/javascript">
	$(function(){ /* to make sure the script runs after page load */

	$('.services-txt').each(function(event){ /* select all divs with the item class */
	
		var max_length = 120; /* set the max content length before a read more link will be added */
		
		if($(this).html().length > max_length){ /* check for content length */
			
			var short_content 	= $(this).html().substr(0,max_length); /* split the content in two parts */
			var long_content	= $(this).html().substr(max_length);
			
			$(this).html(short_content+
						 '<a href="#" class="read_more"> (show all)</a>'+
						 '<span class="more_text" style="display:none;">'+long_content+'</span>'); /* Alter the html to allow the read more functionality */
						 
			$(this).find('a.read_more').click(function(event){ /* find the a.read_more element within the new html and bind the following code to it */
 
				event.preventDefault(); /* prevent the a from changing the url */
				$(this).hide(); /* hide the read more button */
				$(this).parents('.services-txt').find('.more_text').show(); /* show the .more_text span */
		 
			});
			
		}
		
	});
 
 
});
</script>

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

<div class="pswp__bg"></div>

<div class="pswp__scroll-wrap">

<div class="pswp__container">
<div class="pswp__item"></div>
<div class="pswp__item"></div>
<div class="pswp__item"></div>
</div>

<div class="pswp__ui pswp__ui--hidden">
<div class="pswp__top-bar">

<div class="pswp__counter"></div>
<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>



<div class="pswp__preloader">
<div class="pswp__preloader__icn">
<div class="pswp__preloader__cut">
<div class="pswp__preloader__donut"></div>
</div>
</div>
</div>
</div>
<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
<div class="pswp__share-tooltip"></div>
</div>
<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
</button>
<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
</button>
<div class="pswp__caption">
<div class="pswp__caption__center"></div>
</div>
</div>
</div>
</div>
<script>
var initPhotoSwipeFromDOM = function(gallerySelector) {

    // parse slide data (url, title, size ...) from DOM elements 
    // (children of gallerySelector)
    var parseThumbnailElements = function(el) {
        var thumbElements = el.childNodes,
            numNodes = thumbElements.length,
            items = [],
            figureEl,
            linkEl,
            size,
            item;

        for(var i = 0; i < numNodes; i++) {

            figureEl = thumbElements[i]; // <figure> element

            // include only element nodes 
            if(figureEl.nodeType !== 1) {
                continue;
            }

            linkEl = figureEl.children[0]; // <a> element

            size = linkEl.getAttribute('data-size').split('x');

            // create slide object
            item = {
                src: linkEl.getAttribute('href'),
                w: parseInt(size[0], 10),
                h: parseInt(size[1], 10)
            };



            if(figureEl.children.length > 1) {
                // <figcaption> content
                item.title = figureEl.children[1].innerHTML; 
            }

            if(linkEl.children.length > 0) {
                // <img> thumbnail element, retrieving thumbnail url
                item.msrc = linkEl.children[0].getAttribute('src');
            } 

            item.el = figureEl; // save link to element for getThumbBoundsFn
            items.push(item);
        }

        return items;
    };

    // find nearest parent element
    var closest = function closest(el, fn) {
        return el && ( fn(el) ? el : closest(el.parentNode, fn) );
    };

    // triggers when user clicks on thumbnail
    var onThumbnailsClick = function(e) {
        e = e || window.event;
        e.preventDefault ? e.preventDefault() : e.returnValue = false;

        var eTarget = e.target || e.srcElement;

        // find root element of slide
        var clickedListItem = closest(eTarget, function(el) {
            return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
        });

        if(!clickedListItem) {
            return;
        }

        // find index of clicked item by looping through all child nodes
        // alternatively, you may define index via data- attribute
        var clickedGallery = clickedListItem.parentNode,
            childNodes = clickedListItem.parentNode.childNodes,
            numChildNodes = childNodes.length,
            nodeIndex = 0,
            index;

        for (var i = 0; i < numChildNodes; i++) {
            if(childNodes[i].nodeType !== 1) { 
                continue; 
            }

            if(childNodes[i] === clickedListItem) {
                index = nodeIndex;
                break;
            }
            nodeIndex++;
        }



        if(index >= 0) {
            // open PhotoSwipe if valid index found
            openPhotoSwipe( index, clickedGallery );
        }
        return false;
    };

    // parse picture index and gallery index from URL (#&pid=1&gid=2)
    var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
        params = {};

        if(hash.length < 5) {
            return params;
        }

        var vars = hash.split('&');
        for (var i = 0; i < vars.length; i++) {
            if(!vars[i]) {
                continue;
            }
            var pair = vars[i].split('=');  
            if(pair.length < 2) {
                continue;
            }           
            params[pair[0]] = pair[1];
        }

        if(params.gid) {
            params.gid = parseInt(params.gid, 10);
        }

        return params;
    };

    var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
        var pswpElement = document.querySelectorAll('.pswp')[0],
            gallery,
            options,
            items;

        items = parseThumbnailElements(galleryElement);

        // define options (if needed)
        options = {

            // define gallery index (for URL)
            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

            getThumbBoundsFn: function(index) {
                // See Options -> getThumbBoundsFn section of documentation for more info
                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                    rect = thumbnail.getBoundingClientRect(); 

                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
            }

        };

        // PhotoSwipe opened from URL
        if(fromURL) {
            if(options.galleryPIDs) {
                // parse real index when custom PIDs are used 
                // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                for(var j = 0; j < items.length; j++) {
                    if(items[j].pid == index) {
                        options.index = j;
                        break;
                    }
                }
            } else {
                // in URL indexes start from 1
                options.index = parseInt(index, 10) - 1;
            }
        } else {
            options.index = parseInt(index, 10);
        }

        // exit if index not found
        if( isNaN(options.index) ) {
            return;
        }

        if(disableAnimation) {
            options.showAnimationDuration = 0;
        }

        // Pass data to PhotoSwipe and initialize it
        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
    };

    // loop through all gallery elements and bind events
    var galleryElements = document.querySelectorAll( gallerySelector );

    for(var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i+1);
        galleryElements[i].onclick = onThumbnailsClick;
    }

    // Parse URL and open gallery if it contains #&pid=3&gid=1
    var hashData = photoswipeParseHash();
    if(hashData.pid && hashData.gid) {
        openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
    }
};

// execute above function
initPhotoSwipeFromDOM('.my-gallery');

</script>
<script>
$( ".read-btn" ).click(function() {
  $( ".answers-box" ).toggleClass( "big-answer" );
  $( ".answer" ).toggleClass( "big-answer" );
});
</script>
<script>
$( ".read-more" ).click(function() {
  $( ".read-less" ).toggleClass( "hidden" );
  $( ".read-more" ).toggleClass( "hidden" );
  $( ".bleep" ).toggleClass( "hidden" );
});
</script>
<script>
$( ".read-less" ).click(function() {
  $( ".read-less" ).toggleClass( "hidden" );
  $( ".read-more" ).toggleClass( "hidden" );
  $( ".bleep" ).toggleClass( "hidden" );
});
</script>
<script>
$( ".show-reviews" ).click(function() {
  $( ".review.hidden" ).toggleClass( "hidden" );
  $( ".show-reviews" ).addClass( "hidden" );
});
</script>
<script>
$( ".show-all" ).click(function() {
  $( ".service-bubble.hidden" ).toggleClass( "hidden" );
  $( ".show-all" ).addClass( "hidden" );
});
</script>
<script type="text/javascript">
	$(function(){ /* to make sure the script runs after page load */

	$('.about-txt').each(function(event){ /* select all divs with the item class */
	
		var max_length = 500; /* set the max content length before a read more link will be added */
		
		if($(this).html().length > max_length){ /* check for content length */
			
			var short_content 	= $(this).html().substr(0,max_length); /* split the content in two parts */
			var long_content	= $(this).html().substr(max_length);
			
			$(this).html(short_content+
						 '<span class="elli">... </span><span class="read_more"> (show more)</span>'+
						 '<span class="more_text" style="display:none;">'+long_content+'</span>'); /* Alter the html to allow the read more functionality */
						 
			$(this).find('.read_more').click(function(event){ /* find the a.read_more element within the new html and bind the following code to it */
 
				event.preventDefault(); /* prevent the a from changing the url */
				$(this).hide(); /* hide the read more button */
				$(this).parents('.about-txt').find('.more_text').show(); /* show the .more_text span */
				$(this).parents('.about-txt').find('.elli').hide();
		 
			});
			
		}
		
	});
 
 
});
</script>
<script src="assets/js/sticky.min.js"></script>
<script>
	var sticky = new Sticky('[data-sticky]', {});
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

  <!-- Estimate  Modal -->
  <div class="modal fade" id="estimate" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <center> <h3 class="modal-title" style="color:blueviolet">Request For Estimation Form</h3></center>
        </div>
        <div class="modal-body">
        <form action="../controller/add_db.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="service_id" value="<?php echo $_GET['id']; ?>">
            <div class="form-group">
                <label for="email">1. On Which Date do you need the Service?<sup style="font-size:16px;color:red">*</sup></label><br>
                <label class="radio-inline"><input type="radio" name="date" value="As Soon as Possible" checked>As Soon as possible</label>
                <label class="radio-inline"><input type="radio" name="date" value="Next 1-2 week">Next 1-2 week</label>
            </div>
            <div class="form-group">
                <label for="email">2. Specify your requirement if any?<sup style="font-size:16px;color:red">*</sup></label><br>
                <textarea class="form-control" rows="3" name="requirement1" required autofocus></textarea>
            </div>
            <div class="form-group">
                <label for="email">3. Specify your requirement if any?(optional)</label><br>
                <textarea class="form-control" rows="3" name="requirement2" autofocus></textarea>
            </div>
            <div class="form-group">
                <label for="email">4.Upload pet's photo with issue<sup style="font-size:16px;color:red">*</sup></label><br>
                 <input type="file" name="issue" class="form-control"accept="image/*"  value="" required autofocus/>
            </div>
                <div class="form-group">
                <label for="email">5. Share Contact Details</label><br>
                <div class="form-inline">
                <?php   
              
                if(isset( $_SESSION['user_id']))
                 {  
                 $id=$_SESSION['user_id'];
                $sql="select * from tbl_user where user_id='$id' ";
                $result=$connect->query($sql);
                $row=mysqli_num_rows($result);
                  while($row = $result->fetch_array())
                    {
       
      ?>
                    <label for="name">Name:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['user_name']; ?>" id="name" name="name" type="text" onkeypress="return onlyAlphabets(event,this);" class="form-control" placeholder="Name"  required>
        
                    <label for="email">Email-Id:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['email']; ?>" id="email"   name="email" type="email" class="form-control" placeholder="Email" required>
                            
                    <label for="name">Mobile No:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['mobile']; ?>" id="contact" data-max=10 onkeypress="return isNumberKey1(this);"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  name="contact" type="text" class="form-control" placeholder="Contact" minlength="10"maxlength="10" required>
                       
                    <p align="center" id="error" style="color:red"></p>

       <?php } } ?>
                </div>
            </div>
            <center>  <font color="red"><b> Note :</b></font> Within 24 hrs you will be get response regarding your estimation.<br>
        <br>
           <button type="submit"name="estimate" class="btn btn-blue">Submit</button></center>
        </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--Login Modal -->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <center> <h3 class="modal-title" style="color:blueviolet">You Must Login First</h3>
        <br>here - <a href="login.php">Login</a></center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
   <!-- Appointment Modal -->
   <div class="modal fade" id="appointment" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <center> <h3 class="modal-title" style="color:blueviolet">Make Appointment With Service Provider</h3></center>
        </div>
        <div class="modal-body">
        <form action="../controller/add_db.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="service_id" value="<?php echo $_GET['id']; ?>">
         <?php 
    if(!isset($_SESSION['user_id']))
    {  ?>
            <div class="form-group">
                    <label for="name">Name:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="" id="name" name="name" type="text"  class="form-control" placeholder="Enter Name (First Letter must be capital)"  required>
            </div>
            <div class="form-group">
                    <label for="email">Email-Id:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="" id="email"   name="email" type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">        
                    <label for="name">Mobile No:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="" id="contact" data-max=10 onkeypress="return isNumberKey1(this);"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  name="contact" type="text" class="form-control" placeholder="Contact" minlength="10"maxlength="10" required>
            </div>
            <div class="form-group">
                    <label for="email"> Address:<sup style="font-size:16px;color:red">*</sup></label><br>
                    <textarea class="form-control" rows="3" name="address" autofocus required></textarea>
            </div>

    <?php }
    else
    { 
       $id=$_SESSION['user_id'];
      $sql="select * from tbl_user where user_id='$id' ";
      $result=$connect->query($sql);
      $row=mysqli_num_rows($result);
        while($row = $result->fetch_array())
          {

?>
     <div class="form-group">
                    <label for="name">Name:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['user_name']; ?>" id="name" name="name" type="text" onkeypress="return onlyAlphabets(event,this);" class="form-control" placeholder="Name"  required>
            </div>
            <div class="form-group">
                    <label for="email">Email-Id:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['email']; ?>" id="email"   name="email" type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">        
                    <label for="name">Mobile No:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['mobile']; ?>" id="contact" data-max=10 onkeypress="return isNumberKey1(this);"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  name="contact" type="text" class="form-control" placeholder="Contact" minlength="10"maxlength="10" required>
            </div>
		<div class="form-group">
                    <label for="email">Pet's Name:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['pet_name']; ?>" id="pet_name"   name="pet_name" type="text" class="form-control" placeholder="Pet's Name" required>
            </div>
            <div class="form-group">
                    <label for="email">Pet's Age:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['pet_age']; ?>" id="pet_age"   name="pet_age" type="number" class="form-control" placeholder="Pet's Age" required>
            </div>
			<div class="form-group">
                    <label for="email">Pet's Breed:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['pet_breed']; ?>" id="pet_breed"   name="pet_breed" type="text" class="form-control" placeholder="Pet's Breed" required>
            </div>
			<div class="form-group">
                    <label for="email">Pet's Gender:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['pet_gender']; ?>" id="pet_gender"   name="pet_gender" type="text" class="form-control" placeholder="Pet's Gender" required>
            </div>
			<div class="form-group">
                    <label for="email">Pet's Species:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['pet_species']; ?>" id="pet_species"   name="pet_species" type="text" class="form-control" placeholder="Pet's Species" required>
            </div>
            <div class="form-group">
                    <label for="email"> Address:<sup style="font-size:16px;color:red">*</sup></label><br>
                    <textarea  class="form-control" rows="3" name="address" placeholder="Enter Your Address" autofocus required> <?php echo $row['address']; ?> </textarea>
            </div>
   <?php }  } ?>
            <div class="form-group">
                    <label for="appointment">Appointment Date:<sup style="font-size:16px;color:red">*</sup></label><br>
                    <input value="" id="date" name="a_date" type="date" class="form-control" autofocus required>
            </div>
            <div class="form-group">
                <label for="time">Time:<sup style="font-size:16px;color:red">*</sup></label><br>
                <label class="radio-inline">&nbsp;&nbsp;<input type="radio" name="time" value="10.00am-11.00am" checked>10.00 AM - 11.00 AM</label>
                <label class="radio-inline"><input type="radio" name="time" value="11.00am-12.00am">11.00 AM - 12.00 AM</label>
                <label class="radio-inline"><input type="radio" name="time" value="12.00pm-01.00pm">12.00 PM - 01.00 PM</label>
                <label class="radio-inline"><input type="radio" name="time" value="01.00pm-02.00pm">01.00 PM - 02.00 PM</label>&nbsp;
                <label class="radio-inline"><input type="radio" name="time" value="02.00pm-03.00pm">02.00 PM - 03.00 PM</label>
                <label class="radio-inline"><input type="radio" name="time" value="03.00pm-04.00pm">03.00 PM - 04.00 PM</label>&nbsp;
                <label class="radio-inline"><input type="radio" name="time" value="04.00pm-05.00pm">04.00 PM - 05.00 PM</label>
            </div><hr>
                 <center>
                 <div class="form-group">
                      <b style="font-size:16px;color:red"><u>Note </u> :</b>
                       Appointment fee for <b> <?php echo $service_name; ?></b> is RM<b><?php echo $appointment_fee; ?></b> service fee.<br>
					   Please wait for the service provider's response to the appointment via <b>message</b>
                 </div>
                 <br><button type="submit" name="appoint" class="btn btn-blue">Submit</button></center>
          
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
   <!--Booking Modal -->
   <div class="modal fade" id="book" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <center> <h3 class="modal-title" style="color:blueviolet">Hired Your Service Provider</h3></center>
        </div>
        <div class="modal-body">
        <form action="../controller/add_db.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="service_id" value="<?php echo $_GET['id']; ?>">
          <?php 
          $sid=$_GET['id'];
          $sql="select * from tbl_service where id='$sid'";
          $result=$connect->query($sql);
          $row=mysqli_num_rows($result);
          while($row = $result->fetch_array())
              {
                $sname=$row['service_name'];
              }  ?>
       
       <div class="form-group">
                    <label for="name">Service Name:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $sname; ?>" id="name" name="service_name" type="text"class="form-control" readonly>
            </div>
            <div class="form-group">
                    <label for="appointment">Hired Date:<sup style="font-size:16px;color:red">*</sup></label><br>
                    <input value="" id="date" name="b_date" type="date" class="form-control" autofocus required>
            </div>   
            <div class="form-group">
                <label for="email">3. Specify your requirement if any?<sup style="font-size:16px;color:red">*</sup></label><br>
                <textarea class="form-control" rows="3" name="requirement" required autofocus></textarea>
            </div>
            <div class="form-group">
                <label for="email">4.Tell us about your issue?<sup style="font-size:16px;color:red">*</sup></label><br>
                 <input type="file" name="issue" class="form-control"accept="image/*"  value="" required autofocus/>
            </div>       
 <?php   if(!isset($_SESSION['user_id']))
    {  ?>
            <div class="form-group">
                    <label for="name">Name:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="" id="name" name="name" type="text" onkeypress="return onlyAlphabets(event,this);" class="form-control" placeholder="Name"  required>
            </div>
            <div class="form-group">
                    <label for="email">Email-Id:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="" id="email"   name="email" type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">        
                    <label for="name">Mobile No:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="" id="contact" data-max=10 onkeypress="return isNumberKey1(this);"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  name="contact" type="text" class="form-control" placeholder="Contact" minlength="10"maxlength="10" required>
            </div>
            <div class="form-group">
                    <label for="email"> Address:<sup style="font-size:16px;color:red">*</sup></label><br>
                    <textarea class="form-control" rows="3" name="address" autofocus required></textarea>
            </div>

    <?php }
    else
    { 
               $id=$_SESSION['user_id'];
              $sql="select * from tbl_user where user_id='$id' ";
              $result=$connect->query($sql);
              $row=mysqli_num_rows($result);
                while($row = $result->fetch_array())
                  {
     
    ?>
     <div class="form-group">
                    <label for="name">Name:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['user_name']; ?>" id="name" name="name" type="text" onkeypress="return onlyAlphabets(event,this);" class="form-control" placeholder="Name"  required>
            </div>
            <div class="form-group">
                    <label for="email">Email-Id:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['email']; ?>" id="email"   name="email" type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">        
                    <label for="name">Mobile No:<sup style="font-size:16px;color:red">*</sup></label>
                    <input value="<?php echo $row['mobile']; ?>" id="contact" data-max=10 onkeypress="return isNumberKey1(this);"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  name="contact" type="text" class="form-control" placeholder="Contact" minlength="10"maxlength="10" required>
            </div>
            <div class="form-group">
                    <label for="email"> Address:<sup style="font-size:16px;color:red">*</sup></label><br>
                    <textarea  class="form-control" rows="3" name="address" placeholder="Enter Your Address" autofocus required> <?php echo $row['address']; ?> </textarea>
            </div>
   <?php }  } ?>
           
          <br>
         <font color="red"><b> Note :</b></font> Within 24 hrs you will be get response regarding your service.<br><p align="center">You must paid the advance booking price..!</p>
        <br>   <center> <button type="submit" name="book" class="btn btn-blue">Submit</button></center>
          
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</body>
</html>
<script>
		function onlyAlphabets(e,t)
		  {
            try {
                if (window.event) { var charCode = window.event.keyCode; }
                else if (e)
					      { var charCode = e.which;}
                else {document.getElementById('error').innerHTML=''; return true;  }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||(charCode ==32))
			    	    {  document.getElementById('error').innerHTML='';return true;}		
                else
                 document.getElementById('error').innerHTML='This is required only Alphabets!!';
					        return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
     
	function isNumberKey1(evt)
        {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         {    
            document.getElementById('error').innerHTML="This is required only numbers!!";
			    return false;
         }
         document.getElementById('error').innerHTML='';
		   return true;
      }
    
        function validate()
        {
            var textBox = document.getElementById("contact");
            var textLength = textBox.value.length;
                if(textBox.value=='' || textLength<10)
                {
                  document.getElementById('error').innerHTML='Please entered 10 numbers';
                }
        }
        
        $(function () 
        {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    