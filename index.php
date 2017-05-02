<?php 
//include "dbconnect.php";
// include "oauthconnect.php";
 include "index2.php";
?>

<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eco tweet</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    <!-- Bootstrap and Font Awesome css-->
    <!-- we use cdn but you can also include local files located in css directory-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome-animation.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Google fonts - Montserrat for headings, Cardo for copy-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700|Cardo:400,400italic,700">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 
     <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
     <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

	  <link rel="stylesheet" type="text/css" href="css/hover.css">

    <!-- onepage scroll stylesheet-->
    <link rel="stylesheet" href="css/onepage-scroll.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="wrapper">
      <div class="main"> 
        <!-- page 1-->
        <section id="page1">
          <div class="overlay"></div>
          <div class="content">
            <div class="container clearfix">
            <div class="row"><img src="img/eco_logo_1.png" style="width: 260px; height: 260px;"></div>
              <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                  

                  <script type="text/javascript" src="js/custom.js"></script>
                  <h1>
                    <a href="" class="typewrite" style="color:#fff; text-decoration: none; " data-period="2000" data-type='[ "welcome to eco tweet","tweet to donate", "save the environment." ]'>
                      <span class="wrap"></span>
                    </a>
                  </h1>
                  <h3>#eco_tweet</h3>
                  <p>“ Look deep into nature from the earth book and  plant more tree as it never charge a fee. ”</p>
                  <p>Your contribution: An immediate difference.</p>
                  <p>~ An initiative by INNORAFT ~</p>
                </div>
              </div>
            </div>
          </div>
          <div class="icon faa-float animated"><i class="fa fa-angle-double-down"></i></div>
        </section>
        <!-- page 2-->
<!-- <script type="text/javascript">
  $(document).ready(
function update() 
{
    $.get("index.php", function(data){
            $("#fill-color").html(data);
            window.setTimeout(update, 10000);
        });
});
</script> -->

        <section id="page2">
          <div class="content" id="page2-cont">
            <div class="container clearfix">
              <div class="row">
                <div class="col-sm-7 col-md-6"> 
                  <h2 class="heading">Trees For The Future.</h2>
                  <p class="lead">TWEET TO UNLOCK</p>
                  <p class="p-tags">We control the growth of every other species except our own</p>
                  <p class="p-tags">Cast your tweet and we will donate a tree on your behalf. Your each tweet is valuable for the environment.</p>
                  <div id="tweet-button-div">
						<a class="hvr-bounce-to-top twitter-btn" target="_blank" 
			 			href="https://twitter.com/intent/tweet?text=spread%20the%20words%20%23eco_tweet%20@ecotweet.sites.innoraft.com"
			  			><i class="fa fa-twitter twitter-icon" aria-hidden="true"></i>Click To Tweet</a>
  					</div>
                </div>
                <div class="col-sm-5 col-md-5 col-md-offset-1 tree-col">
                  <div class="tree-wrapper">
                  <div class="color-fill tree-col" id="fill-color" style="height:<?php echo $total_trees_to_donate_remainder * 20;?>%;"></div>
			             <img src="img/plant-a-tree.png" class="tree-img img-responsive">
                   </div>
                </div>
                 </div>
                 <div class="tweet-rem" style="text-align: center;"><h4><?php echo (5-$total_trees_to_donate_remainder);?> more tweets to unlock</h4></div>
              </div>

              
          </div>
        </section>
        <!-- page 3 - class section-gray adds gray background-->
        <section id="page3" class="section-gray">
        <!-- <div class="overlay"></div> -->
          <div class="content">
            <div class="container clearfix">
              <div class="row services">
                <div class="col-md-12">
                  <h2 class="heading">A bundle of Green</h2>
                    <div class="responsive">
                        <?php 
                            $donated_value_array=mysql_query("SELECT * FROM trees");
                              while($donated_row = mysql_fetch_array($donated_value_array)){
                                    ?>
                                    <div><h5><?php echo $donated_row['name'];?></h5><img src="<?php echo $donated_row['image'];?>" class="img-responsive"><h4>Donated: <?php echo $donated_row['donated'];?></h4></div>
                                   <?php  
                                  }
                              ?>
                    </div>

                      <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                      <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                      <script type="text/javascript" src="slick/slick.min.js"></script>

                      <script type="text/javascript">
                          $('.responsive').slick({
                              dots: true,
                              infinite: false,
                              speed: 300,
                              slidesToShow: 3,
                              slidesToScroll: 3,
                              arrows: true,
                              responsive: [
                                {
                                  breakpoint: 1024,
                                  settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: true
                                  }
                                },
                                {
                                  breakpoint: 600,
                                  settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                  }
                                },
                                {
                                  breakpoint: 480,
                                  settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                  }
                                }
                                // You can unslick at a given breakpoint now by adding:
                                // settings: "unslick"
                                // instead of a settings object
                              ]
                            });
                                                                          
                      </script>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section id="page4">
          <div class="content">
            <div class="container clearfix">
              <div class="row">
                <div>
                 
                  <h2 class="heading">We have reached</h2>
                  
                  <div class="col-md-3 col-sm-6 col-xs-6 hvr-grow" id="counter-div-right">
			<div class="counter-div">
				<div class="span-div">
					<span class="fa fa-twitter"></span>
				</div>
				<div class="span-number">
        <!--  <script>
                       jQuery(document).ready(function( $ ) {
                        $('.counter').counterUp({
                            delay: 10,
                            time: 1000
                        });
                    });
                  </script> -->
				<span class="counter count-num"><?php echo $total_tweet_sum;?></span></div>
				<div class="span-text">
				<span>Tweets</span>
       <!--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
   <!--  <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script> -->
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-6 hvr-grow" id="counter-div-left">
					<div class="counter-div">
						<div class="span-div">
							<span class="fa fa-user"></span>
						</div>
						<div class="span-number">
						<span class="counter count-num3"><?php echo $total_users;?></span></div>
						<div class="span-text">
						<span>Users</span>
						</div>
					</div>
				</div>

		<div class="col-md-3 col-sm-6 col-xs-6 hvr-grow" id="counter-div-right">
			<div class="counter-div">
				<div class="span-div">
					<span class="fa fa-envira"></span>
				</div>
				<div class="span-number">
				<span class="counter count-num2"><?php echo floor($total_trees_to_donate_quotient);?></span></div>
				<div class="span-text">
				<span>Donated</span>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-6 hvr-grow" id="counter-div-left">
			<div class="counter-div">
				<div class="span-div">
					<span class="fa fa-recycle"></span>
				</div>
				<div class="span-number countup">
				<span class="counter count-num4" id="days">6</span>
        </div>
				<div class="span-text">
				<span>Days</span>
				</div>
			</div>
		</div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- page 5-->
        <section id="page5" class="section-gray">
          <div class="content">
            <div class="container clearfix">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="heading">share the words</h2>
                    <div class="row" style="padding-bottom: 30px;">
                    <div class="col-sm-6" id="share-fb">
                      <a class="hvr-sweep-to-right facebook-btn" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fecotweet.sites.innoraft.com%2F&amp;src=sdkpreparse"><i class="fa fa-facebook" aria-hidden="true"></i>Share On Facebook</a>
                    </div>
                    <div class="col-sm-6" id="share-in">
                      <a class="hvr-sweep-to-left linkedin-btn" target="_blank" href="https://www.linkedin.com/cws/share?url=http%3A%2F%2Fecotweet.sites.innoraft.com"><i class="fa fa-linkedin" aria-hidden="true"></i>Share On LinkedIn</a>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                   <h2 class="heading footer-head">follow us</h2>
                   <div style="text-align: center;"><img src="img/320-132-B.png" class="img-responsive"></div>
                   <div class="social">
                    <p style="text-align: center;"><a href="http://www.innoraft.com/" target="_blank">www.innoraft.com</p>
                   <ul>
                      <li><a href="https://twitter.com/innoraft" target="_blank"><i class="fa fa-twitter fa-2x"></i></a></li>
                      <li><a href="https://www.linkedin.com/company/innoraft" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a></li>
                      <li><a href="https://www.facebook.com/Innoraft/" target="_blank"><i class="fa fa-facebook fa-2x"></i></a></li>
                      <li><a href="https://www.drupal.org/innoraft" target="_blank"><i class="fa fa-dribbble fa-2x"></i></a></li>
                      <li><a href="https://github.com/innoraft" target="_blank"><i class="fa fa-github-square fa-2x"></i></a></li>
                      </ul>
                    </div>
                <div class="copyright cr" style="text-align: center;"><p>Copyright 2017. All Right Reserved.</p></div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        </div>
    </div>
    <!-- Javascript files-->
    
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/jquery.onepage-scroll.js"></script>
    <script src="js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>


