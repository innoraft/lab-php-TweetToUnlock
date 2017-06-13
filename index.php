<?php
//include "dbconnect.php";
// include "oauthconnect.php";
 include "index2.php";
 include "variable_credentials.php"
 // include "ajaxcall.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://ogp.me/ns/fb#" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eco tweet</title>
    <meta name="description" content="Lets make the world a better place, help us to donate a tree by giving your valuable tweet. Your contribution will make an immediate difference.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    <!-- Bootstrap and Font Awesome css-->
    <!-- we use cdn but you can also include local files located in css directory-->
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

    <meta property="og:type" content="website" />
<meta property="og:title" content="WELCOME TO ECOTWEET" />
<meta property="og:description" content="Lets make the world a better place, help us to donate a tree by giving your valuable tweet. Your contribution will make an immediate difference." />
<meta property="og:url" content="http://ecotweet.sites.innoraft.com" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image" content="http://ecotweet.sites.innoraft.com/img/thumbnail.jpeg" />
<meta property="og:site_name" content="ECO_TWEET" />

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
                  <h3>#<?php echo $hashtag; ?></h3>
                  <p>“ Look deep into nature from the earth book and  plant more tree as it never charge a fee. ”</p>
                  <p>Your contribution: An immediate difference.</p>
                  <p>~ An initiative by INNORAFT ~</p>
                </div>
              </div>
            </div>
          </div>
         
          <!-- <div class="icon faa-float animated"><i class="fa fa-angle-double-down" id="downbtn"></i></div> -->
        </section>
        <!-- page 2-->

        <section id="page2">
          <div class="content" id="page2-cont">
            <div class="container clearfix">
              <div class="row">
                <div class="col-sm-7 col-md-6">
                  <h2 class="heading">Trees For The Future.</h2>
                  <p class="lead">TWEET TO UNLOCK</p>
                  <p class="p-tags">We control the growth of every other species except our own</p>
                  <p class="p-tags">Cast your tweet and we will donate a tree on your behalf. Your each tweet is valuable for the environment.</p>


<!-- random message generator -->
                  <script>
                        var quote = new Array()
    quote[0] = 'Save Trees, Save Environment'
    quote[1] = 'Save the Earth, start planting'
    quote[2] = 'The key to a greener planet is in your hands'
    quote[3] = 'It is our duty to save environment\'s beauty'
    quote[4] = 'The best time to plant tree was 20 years ago. The next best time is now'
    quote[5] = 'Your contribution will make an immediate difference'
    quote[6] = 'Lets go green to make our globe green'
    quote[7] = 'Better environment,better tomorrow'

  function tweet(message) {
  window.open('https://twitter.com/intent/tweet?hashtags=<?php echo $hashtag; ?>&text='+ encodeURIComponent(message));
}

var msg;

$(document).ready(function() {
  $("#tweet-button-div").on("click", function(){
    // console.log("working");
    var randomquote = Math.floor(Math.random()*(quote.length-1));
    msg = quote[randomquote];
    // $(".message").html(msg);
    console.log(msg);
    tweet(msg);
  });
});
                  </script>

                  <div id="tweet-button-div">
            <a class="hvr-bounce-to-top twitter-btn"><i class="fa fa-twitter twitter-icon" aria-hidden="true" id="tweet_button"></i>Click To Tweet</a>
            </div>

                </div>
                <div class="col-sm-5 col-md-5 col-md-offset-1 tree-col">
                  <div class="tree-wrapper">
                  <div class="color-fill tree-col" id="fill-color"></div>
			             <img src="img/plant-a-tree.png" class="tree-img img-responsive">
                   </div>
                </div>
                 </div>
                 <div class="tweet-rem" style="text-align: center;"><h4>
                 <?php echo ($tweet_req_to_unlock-$total_trees_to_donate_remainder);
$current_tree_sql= mysql_query("SELECT image FROM donated_items WHERE donated < (SELECT max(donated) FROM donated_items) ORDER BY item_id ASC LIMIT 1");
  $row_return= mysql_num_rows($current_tree_sql);
  
  if($row_return== 0)
  {
    $current_tree_sql= mysql_query("SELECT image FROM donated_items ORDER BY item_id ASC LIMIT 1");
  }
  
  $current_tree= mysql_fetch_array($current_tree_sql);
  $current_tree_val= $current_tree['image'];
  ?> more tweet to unlock <img src="<?php echo $current_tree_val;?>" width="110" height="110" style="border-radius:50%; border: 2px solid lightgrey;"></h4></div>
              </div>


          </div>
        </section>
        <!-- page 3 - class section-gray adds gray background-->
        <section id="page3" class="section-gray">
          <div class="content">
            <div class="container clearfix">
              <div class="row services">
                <div class="col-md-12">
                  <h2 class="heading">A bundle of Green</h2>
                    <div class="responsive" id="tree-stack">
                        <?php
                        $count_tree=0;
                            $donated_value_array=mysql_query("SELECT * FROM donated_items");
                              while($donated_row = mysql_fetch_array($donated_value_array)){
                                $count_tree++;
                                      // $donation_array_UI[]= $donated_row['donated'];
                                    ?>
                                    <div class="donated_trees"><h5><?php echo $donated_row['name'];?></h5><img src="<?php echo $donated_row['image'];?>" class="img-responsive"><h4>Donated: <span class="tree_no_<?php echo $count_tree;?>"><?php echo $donated_row['donated'];?></span></h4></div>
                                   <?php
                                  }
                              ?>
                    </div>

                     <!--  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
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
              <div class="row" id="count">
                <div class="reached_out">

                  <h2 class="heading">We have reached</h2>

                  <div class="col-md-3 col-sm-6 col-xs-6 hvr-grow" id="counter-div-right">
			<div class="counter-div">
				<div class="span-div">
					<span class="fa fa-twitter"></span>
				</div>
				<div class="span-number">

				<span class="counter count-num"><?php echo $total_tweet_sum;?></span></div>
				<div class="span-text">
				<span>Tweets</span>

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
                      <li><a href="https://www.drupal.org/innoraft" target="_blank"><i class="fa fa-drupal fa-2x"></i></a></li>
                      <li><a href="https://github.com/innoraft" target="_blank"><i class="fa fa-github-square fa-2x"></i></a></li>
                      </ul>
                    </div>
                <div class="copyright cr" style="text-align: center;"><p>Copyright 2017. All Right Reserved.</p></div>
                <p id="admin-portal"><a href="login.php" id="admin"><i class="fa fa-cog" aria-hidden="true"></i> ADMIN PORTAL</a></p>
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
	<script>
  setInterval(function(){
	$.post("ajaxcall.php?moreTweetLeft=yes",function(callback){
		$('.tweet-rem').html('<h4>'+(5-callback[0])+' more tweet to unlock <img src="'+callback[4]+'" width="110" height="110" style="border-radius:50%; border: 2px solid lightgrey;"></h4>');
		var hper = callback[0] * 20;
		$('#fill-color').css('height',hper+'%');
    $('.count-num').html(callback[3]);
    $('.count-num3').html(callback[1]);
    $('.count-num2').html(callback[2]);
	},"json");
	}, 3000);
	</script>

<!-- tree stack automation -->
  <script>
  setInterval(function(){
  $.post("ajaxcall2.php?DonationUpdate=yes",function(donation_callback){
  var i;
  for(i=1;i<=donation_callback.length;i++)
  {
    $('.tree_no_'+i).html(donation_callback[i-1]);
  }
  },"json");
  }, 3000);
  </script>



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
