<?php

include('mysql_setting.php');
include('subscription.php');

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>displayer Chrome Extension</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

	<header>
		<div class="wrapper">
			<h1><a href="#video">disp<span>layer.</span></a></h1>
			<nav>
				<ul id="top-menu">
					<li>
						<a href="#features">features</a>
					</li>
					<li>
						<a href="#setup">setup</a>
					</li>
					<li>
						<a href="#download">download</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<section id="video">
		<video preload="auto" autoplay="autoplay" loop="loop">
		  <source src="video.mp4" type="video/mp4">
		</video>
	</section>

	<section id="intro">
		<div class="wrapper">
			<div class="threecol">
				<img src="img/png.png" alt="" width="88" height="88">
				<h3>Create your mockup</h3>
				<p>Create your mockup and export it as jpeg or png.</p>
			</div>
			<div class="threecol">
				<img src="img/chrome.png" alt="" width="88" height="88">
				<h3>Use displayer.</h3>
				<p>Upload your mockup and superimpose it inside your HTML page with displayer. chrome extension.</p>
			</div>
			<div class="threecol">
				<img src="img/smile.png" alt="" width="88" height="88">
				<h3>Be happy</h3>
				<p>Get your website as you planned through your mockup.</p>
			</div>
		</div>
	</section>

	<section id="features">
		<div class="wrapper">
			<div class="twocol">
				<h2>Opacity</h2>
				<img src="img/opacity.png" alt="" width="360" height="180">
				<p>Change the opacity of your mockup for comparing if you are using the right line height or letter spacing...</p>
			</div>

			<div class="twocol">
				<h2>Move it</h2>
				<img src="img/move.png" alt="" width="360" height="180">
				<p>Upload a piece of your mockup and move it where you want and lock it.</p>
			</div>

		</div>
	</section>

	<section id="setup">
		<div class="wrapper">
			<h2>How to install the extension manually?</h2>
			<div id="tabs">
				<ul class="nav nav-tabs">
					<li><a href="#stepone" class="actived">Step 01</a></li>
					<li><a href="#steptwo">Step 02</a></li>
					<li><a href="#stepthree">Step 03</a></li>
				</ul>
			</div>
		
			<div id="stepone"  class="tab-content active">
				<p>1. Download the displayer's crx file</p>
				<img src="img/step-one.png" alt="" width="760" height="513">
			</div>

			<div id="steptwo" class="tab-content hide">
				<p>2. Drag and drop displayer_1.0.1.crx inside extensions's chrome page.</p>
				<img src="img/step-two.png" alt="" width="760" height="513">
			</div>

			<div id="stepthree" class="tab-content hide">
				<p>3. Accept permissions and let's play!</p>
				<img src="img/step-three.png" alt="" width="760" height="513">
			</div>
		</div>
	</section>

	<section id="download">
		<div class="wrapper">
			<p>Come back here from your laptop<br> and download our chrome extension.<br> Everything will be explained for installing it manually.</p>
			<a href="http://remibenault.fr/tfe/juin/displayer/download/displayer_1.0.1.crx" class="dl button">download .crx</a>
			<span>versinon 1.0.1</span>
		</div>
	</section>

	<section id="update">
		<div class="wrapper">
			<h2>Next update, new feature.</h2>
			<img src="img/update.jpg" alt="" width="300" height="232">
		</div>
	</section>
	
	<section id="newsletter">
		<div class="wrapper">
			<h2>Stay tuned for the next upgrades</h2>
			<form action="index.php#newsletter" method='POST'>
				<label for="email">email</label>
				<input type="email" name="mail" placeholder="youraddress@email.com"/>
				<input type="submit" value="send" name="submit"/>
			</form>
			<span id="errors"><?php echo($thank_you); ?><?php echo($error_no_email); ?><?php echo($error_wrong_email); ?><?php echo($error_email_used); ?></span>
		</div>
	</section>

	<section id="about">
		<div class="wrapper">
			<p>I realized displayer for helping people to respect their mockup and it was a kind of challenge for me to start with nothing and learn quietly Javascript and Jquery for building this google extension.</p>
			<p>disp<span>layer.</span> is a Chrome extension created through graduation work in Web Design & Multimedia<br> at l'Ecole Supérieure d'Infographie Albert Jacquard.</p>
		</div>
	</section>

	<footer>
		<div class="wrapper">
			<p>disp<span>layer.</span> is developed by <a href="https://twitter.com/remibenault">Rémi Benault&nbsp;&copy;</a> - 2014</p>
		</div>
	</footer>
  
</body>
<script src="js/jquery-1.11.1.min.js" ></script>
<script src="js/scroll.js" ></script>
<script>
	$('li a').click(function(e) {
	    e.preventDefault();
	    $('a').removeClass('current');
	    $(this).addClass('current');
	});

	$('h1 a').click(function(e) {
	    e.preventDefault();
	    $('nav ul li a').removeClass('current');
	});

</script>
<script>
$(document).ready(function() {
	$('.nav-tabs > li > a').click(function(event){
		event.preventDefault();//stop browser to take action for clicked anchor

		//get displaying tab content jQuery selector
		var active_tab_selector = $('.nav-tabs > li > a.actived').attr('href');					

		//find actived navigation and remove 'active' css
		var actived_nav = $('.nav-tabs > li > a.actived');
		actived_nav.removeClass('actived');

		//add 'active' css into clicked navigation
		$(this).addClass('actived');

		//hide displaying tab content
		$(active_tab_selector).removeClass('active');
		$(active_tab_selector).addClass('hide');

		//show target tab content
		var target_tab_selector = $(this).attr('href');
		$(target_tab_selector).removeClass('hide');
		$(target_tab_selector).addClass('active');
		return false;
    });

    $("#tabs li a").click(function (e) {
        var t = e.target;
        if (t.href.indexOf("#") != -1) {
            var hash = t.href.substr(t.href.indexOf("#"));
            selectPersonalTab(hash);
            return false;
        }
    });
 });
</script>
<script type="text/javascript">
	var scrolling = function(){
	    var speed = 500;
	    jQuery('a[href^="#"]').bind('click',function(){
	        var id = jQuery(this).attr('href');
	        if(id == '#')
	            goTo('body');
	        else
	            goTo(id);
	        return(false);
         void(0);
	    });
	    function goTo(ancre){jQuery('html,body').animate({scrollTop:jQuery(ancre).offset().top - 69},speed,'swing',function(){
	          if(ancre != 'body')
	                window.location.hash = ancre;
	          else
	              window.location.hash = '#';
	          jQuery(ancre).attr('tabindex','-1');
	          jQuery(ancre).focus();
	          jQuery(ancre).removeAttr('tabindex');
	      });
	    }
	};
	jQuery(function(){
		scrolling();
	});
</script>
</html>