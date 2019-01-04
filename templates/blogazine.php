<?php
/**
 * Page "Blogazine" template file.
 *
 * Template Name: Page_Blogazine_Template
 *
 * @package Smashing Magazine/Templates
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head profile="http://gmpg.org/xfn/11">
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <title><?php wp_title( '' ); ?> | <?php bloginfo( 'name' ); ?></title>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" />
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/appletouchicon.png" />
        <?php wp_head(); ?>
        <script type="text/javascript">var clicky_advanced_disable = 1;</script>
		<style type="text/css">
		<!--
		/* RESET & OVERRIDES */
		h1,
		h2,
		h3,
		h4,
		blockquote {
		  background: none;
		  border: none;
		}
		.ad {
		  display: none;
		}
		#footer {
		background-color:#F4F4F4;
		border-top:15px solid white;
		clear:both;
		left:0;
		margin-top:0;
		padding-top:0;
		position:absolute;
		width:100%;
		background-image: none;
		}
		.commentlist li .children li.depth-2 {
			border-right: none;
		}
		/* /RESET & OVERRIDES */
		body {
		  margin:0 auto;
		  width: 100%;
		  max-width: 100%;
		  min-width:870px;
		  background-color: #000;
		}
		#header
		{
			max-width: 95em;
		}
		div.comment-outer {
		  background-color: #fff;
		  width: 100%;
		}
		div.commentwrapper
		{
		  margin-top:-15px;
		  width: 102em;
		}
		div.commentwrapper #comment-tabs,
		div.commentwrapper #discussion,
		div.commentwrapper #respond
		{
		  width: 750px;
		  margin: 0 auto;
		}
		div.blogazine img {
		  margin: 0 0 0 0;
		  border: none;
		  display: block
		}
		div.blogazine .postmetadata {
		  clear:both;
		  font-size:11px !important;
		  font-weight:bold;
		  margin:0 0 20px;
		  font-weight: bold;
		  font-family:Helvetica,Arial,Geneva,Helvetica,sans-serif;
		}
		div.blogazine .postmetadata a:link, div.blogazine .postmetadata a:visited {
		  color:#F3713C;
		}
		div.blogazine.outer {
		  width:100%;
		  overflow: hidden;
		  margin: 0 auto;
		  padding:100px 0 0;
		  border-bottom: 1px solid #C52A00;

		  font: 12px/1.6em Helvetica, Arial, Geneva, Helvetica, sans-serif;
		  color:#1e1e1e;
		  background: #000 url(http://media.smashingmagazine.com/uploads/page/blogazine/img/background.gif) repeat 0 0;
		}
		/* BLOGAZINE */
		div.blogazine.inner {
		  width:960px;
		  margin:0 auto;
		}
		div.blogazine .highlight_light {
		  color:#ffffff;
		}
		div.blogazine.inner h1 {
		  color:#F3713C;
		  float:left;
		  font-size:47px;
		  width:550px;
		  -x-system-font:none;
		  font-family:Helvetica,Arial,sans-serif;
		  font-size-adjust:none;
		  font-stretch:normal;
		  font-style:normal;
		  font-variant:normal;
		  font-weight:normal;
		  line-height:normal;
		  margin:100px 0 0 0;
		}
		div.blogazine.inner h1.title {
		  margin-bottom: 215px;
		}
		div.blogazine.inner h1.title .title_large {
		  margin-left: 45px;
		  margin-top: 5px;
		  display:block;
		  font-size:64px;
		}
		div.blogazine.inner p {
		  color: #333 !important;
		  font-size:16px;
		  line-height:1.72;
		}
		div.blogazine .intro_image {
		  margin: 0 150px 0 0;
		  float:right;
		}
		div.blogazine.inner h2 {
		  clear:both;
		  color:#e08059;
		  font-size:33px;
		  font-family:Trebuchet MS,Arial,Helvetica,sans-serif;
		  font-weight:normal;
		  margin:0;
		  padding: 0 0 0 0;
		}
		div.blogazine .bz_right {
		  float:right;
		}
		div.blogazine .bz_left {
		  float:left;
		}
		div.blogazine .white {
		  color:#FFFFFF;
		}
		div.blogazine .half_left {
		  width:480px;
		  float:left;
		  margin:0 0 15px 0;
		}
		div.blogazine .half_right {
		  width:480px;
		  float:right;
		}
		div.blogazine #bz_microblogging {
		  background-image:url(http://media.smashingmagazine.com/uploads/page/blogazine/img/micro_bg.png);
		  background-repeat:no-repeat;
		  width: 960px;
		  margin: 0 auto;
		  padding-top:50px;
		  clear:both;
		  color:#e6e6e6;
		  line-height: 1.5;
		  font-size:16px;
		}
		div.blogazine #bz_microblogging a:link, div.blogazine #bz_microblogging a:visited {
		  color: #f26522;
		  text-decoration: underline;
		}
		div.blogazine #bz_microblogging a:hover {
		  color:#448ccb;
		  text-decoration:underline;
		}
		div.blogazine .micro_highlight {
		  color:#448ccb;
		}
		#bz_foryou .foryou_highlight {
		  color:#448ccb;
		}
		#bz_foryou h2 {
		  margin-top: -20px;
		}
		#bz_foryou a:link, #bz_foryou a:visited {
		  text-decoration: underline;
		  color: #f26522;
		}
		#bz_foryou a:hover {
		  color:#448ccb;
		  text-decoration:underline;
		}
		#bz_comments {
		  width:100%;
		  background-color:#000000;
		  min-height:600px;
		  border-top:2px solid #C52A00;
		}
		#bz_microblogging h2 {
		  clear:both;
		  color:#448ccb;
		  font-size:33px;
		  font-family:Trebuchet MS,Arial,Helvetica,sans-serif;
		  font-weight:normal;
		  margin:0;
		}
		div.blogazine #end_adv_dis {
		  background-image:url(http://media.smashingmagazine.com/uploads/page/blogazine/img/end_adv_dis.png);
		  background-repeat:no-repeat;
		  background-position:top center;
		  min-height:387px;
		}
		div.blogazine .end_adv {
		  padding:260px 20px 0 20px;
		  width:440px;
		  float:left;
		}
		div.blogazine #end_adv_dis p {
		  margin: 0 0 30px 0;
		}
		div.blogazine .end_adv h3 {
		  color:#00A800;
		  font-size:21px;
		  margin-bottom:0;
		}
		div.blogazine .end_dis {
		  padding: 390px 20px 0 20px;
		  width:440px;
		  float:right;
		}
		div.blogazine .end_dis h3 {
		  color:#e60000;
		  font-size:21px;
		  margin-bottom:0;
		}
		div.blogazine #bz_foryou {
		  clear:both;
		  background-image:url(http://media.smashingmagazine.com/uploads/page/blogazine/img/foryou_bg.png);
		  background-repeat:repeat-x;
		  width:100%;
		  background-position:0 110px;
		  color:#e6e6e6;
		  font-size:16px;
		}
		div.blogazine #bz_foryou p {
		  line-height:1.5;
		}
		div.blogazine #bz_foryou .foryou_portfolios p {
		  margin-top:-20px;
		}
		div.blogazine #bz_foryou h3 {
		  color:#E6E6E6;
		  font-size:26px;
		  font-family:Arial, Helvetica, sans-serif;
		  line-height:1.5;
		  width:650px;
		  font-weight:normal;
		}
		div.blogazine .shop_black {
		  padding:20px;
		  margin-right:20px;
		  float:left;
		  width:170px;
		  height:170px;
		  background-color:#171717;
		}
		div.blogazine .shop_white {
		  padding:20px;
		  float:left;
		  width:170px;
		  height:170px;
		  background-color:#fff;
		  color:#111111;
		  margin-bottom:100px;
		}
		div.blogazine #bz_foryou h2 {
		  font-family:Arial, Helvetica, sans-serif;
		  font-size:56px;
		  color:#448ccb;
		}
		div.blogazine .foryou_portfolios {
		  background:transparent url(http://media.smashingmagazine.com/uploads/page/blogazine/img/elliot.png) 0 50px no-repeat;
		  min-height: 485px;
		  width:850px;
		  margin-top:130px;
		  margin-bottom:5.5em;
		}
		div.blogazine .foryou_galleries {
		  clear:both;
		  background: transparent url(http://media.smashingmagazine.com/uploads/page/blogazine/img/css_galleries.png) no-repeat scroll 0 50px;
		  min-height: 975px;
		  width:900px;
		}
		div.blogazine .foryou_quiet {
		  clear:both;
		  background-image:url(http://media.smashingmagazine.com/uploads/page/blogazine/img/quiet_bg.png);
		  background-repeat:no-repeat;
		  min-height: 300px;
		  margin-top:100px;
		  width:885px;
		}
		div.blogazine .foryou_galleries p {
		  float:right;
		  clear:right;
		  width:300px;
		  padding-bottom: 1em;
		}
		div.blogazine .bz_foryou_content {
		  width: 960px;
		  margin: 0 auto;
		}
		div.blogazine .bz_conclusion_content {
		  width: 960px;
		  margin: 0 auto;
		}
		#bz_conclusion {
		  clear:both;
		  background-image:url(http://media.smashingmagazine.com/uploads/page/blogazine/img/conclusion_bg.png);
		  background-repeat:repeat-x;
		  width:100%;
		  color:#e6e6e6;
		  font-size:22px;
		  line-height:1.5;
		}
		#bz_pioneers {
		  background-color:#f7f4ed;
		  margin: 100px 0 0 0;
		  clear:both;
		  font-family:Georgia, "Times New Roman", Times, serif;
		  color:#967558;
		  line-height: 1.5;
		  font-size:20px;
		}
		#bz_pioneers * {
		  font-family:Georgia, "Times New Roman", Times, serif;
		}
		#bz_pioneers a:link, #bz_pioneers a:visited {
		  text-decoration: underline;
		  color: #422912;
		}
		#bz_pioneers a:hover {
		  color:#000000;
		  text-decoration:underline;
		}
		div.blogazine .bz_pioneers_content {
		  width: 960px;
		  margin: 0 auto;
		  color: #000;
		}
		div.blogazine .pioneers_look {
		  height:41px;
		  width:100%;
		  background-image:url(http://media.smashingmagazine.com/uploads/page/blogazine/img/pioneers_look_bg.png);
		  background-repeat:repeat-x;
		  color: #895845;
		  font-family:Georgia, "Times New Roman", Times, serif;
		  font-size:24px;
		  text-align:center;
		  margin: 100px 0 0 0;
		  padding: 25px 0 0 0;
		}
		div.blogazine .pioneers_look h4
		{
		  margin:1.33em 0;
		  color:#895845;
		  font-size: 24px;
		  font-family:Georgia,"Times New Roman",Times,serif;
		  position: relative;
		  top: -7px;
		}
		div.blogazine .blogazine.footer {
		  border-top: 530px solid black;
		  height:41px;
		  background-color: white;
		  color: #444444;
		  font-size:24px;
		  text-align:left;
		  padding: 25px 0 25px 25px;
		}
		div.blogazine .blogazine.footer a {
		  text-decoration: underline;
		}
		div.blogazine.inner a {
		  color:#0040b6;
		  text-decoration:none;
		}
		div.blogazine.inner a img {border: none !important;}
		div.blogazine .white {
		  color:#FFFFFF;
		}
		div.blogazine #end_adv_dis {
		  background-image:url(http://media.smashingmagazine.com/uploads/page/blogazine/img/end_adv_dis.png);
		  background-repeat:no-repeat;
		  background-position:top center;
		  min-height:387px;
		}
		div.blogazine .end_adv {
		  padding:260px 20px 0 20px;
		  width:440px;
		  float:left;
		}
		div.blogazine #end_adv_dis p {
		  margin: 0 0 30px 0;
		}
		div.blogazine .end_adv h3 {
		  color:#007a00;
		  font-size:21px;
		  margin-bottom:0;
		}
		div.blogazine .end_dis {
		  padding: 390px 20px 0 20px;
		  width:440px;
		  float:right;
		}
		div.blogazine .end_dis h3 {
		  color:#ad0000;
		  font-size:21px;
		  margin-bottom:0;
		}
		div.blogazine .adv_dis {
		  clear:both;
		  background-image:url(http://media.smashingmagazine.com/uploads/page/blogazine/img/adv_dis.png);
		  width:900px;
		  height:596px;
		  margin:100px 0 0 20px;
		}
		div.blogazine .adv_dis h5 {
		  text-align:center;
		  font-size:30px;
		  font-weight:normal;
		  color:#422912;
		}
		div.blogazine .adv_dis p {
		  margin:20px 0 5px;
		  padding:0 0 0 50px;
		  font-size:16px;
		}
		div.blogazine .adv_dis2 {
		  clear:both;
		  background-image:url(http://media.smashingmagazine.com/uploads/page/blogazine/img/adv_dis2.png);
		  background-repeat:no-repeat;
		  width:900px;
		  margin:100px 0 0 20px;
		  height:577px;
		}
		div.blogazine .adv_dis2 h5 {
		  text-align:center;
		  font-size:30px;
		  font-weight:normal;
		  color:#422912;
		}
		div.blogazine .adv_dis2 p {
		  margin:60px 20px 5px 0;
		  width:380px;
		  padding:0 0 0 50px;
		  font-size:16px;
		}
		#bz_pioneers h2 {
		  margin: 80px 0 0 0;
		  color:#422912; text-transform:uppercase; font-size:25px;
		  font-weight:normal;
		}
		div.blogazine .pi_highlight {
		  color: #422912;
		}
		div.blogazine .pi_half_left {
		  width:460px;
		  float:left;
		  margin:30px 0 0 0;
		}
		div.blogazine .pi_half_right {
		  width:460px;
		  float:right;
		  margin:30px 0 0 0;
		}
		div.blogazine .pi_half_left_450 {
		  width:400px;
		  clear:left;
		  float:left;
		  margin:30px 0 0 0;
		}
		div.blogazine .pi_half_right_450 {
		  clear:right;
		  width:400px;
		  float:right;
		  margin:30px 0 0 0;
		}
		div.blogazine .divider {
		  background-color: #fff;
		  border-top: 1px solid #d5cec4;
		  border-bottom: 1px solid #d5cec4;
		  min-height: 185px;
		  margin: 50px 0 20px 0;
		  width: 100%;
		}
		div.blogazine .divider p {
		  width: 800px;
		  margin:20px auto 0;
		}
		div.blogazine .divider h3 {
		  text-align:center;
		  width: 900px;
		  margin:0 auto;
		  font-weight:normal;
		  color: #422912;
		  font-size:50px;
		}
		div.blogazine .interview {
		  width:870px;
		  margin: 0 auto;
		  padding:50px 0 0px 10px;
		  font-size:16px;
		}
		div.blogazine .interview p {
		  margin-bottom: 50px;
		}
		div.blogazine .interview h5 {
		  color:#422912;
		  font-size:18px;
		  font-weight:normal;
		  margin:0 0 10px 0;
		}
		div.blogazine .dustin_interview {
		  width:411px;
		  background-image:url(http://media.smashingmagazine.com/uploads/page/blogazine/img/d_quote1.png);
		  background-repeat:no-repeat;
		  background-position: 0 200px;
		}
		div.blogazine .quote_dustin {
		  margin:108px 0 100px 30px;
		  width:290px;
		}
		div.blogazine .greg_interview {
		  width:410px;
		  float:right;
		  background-image:url(http://media.smashingmagazine.com/uploads/page/blogazine/img/g_quote1.png);
		  background-repeat:no-repeat;
		  background-position: 0 600px;
		  min-height:1300px;
		}
		div.blogazine .quote_greg {
		  margin:70px 20px 100px 25px;
		  width:265px;
		}
		div.blogazine .adv_dis {
		  clear:both;
		  background-image:url(<?php echo WP_CONTENT_URL; ?>/uploads/page/blogazine/img/adv_dis.png);
		  width:900px;
		  height:596px;
		  margin:100px 0 0 20px;
		}
		div.blogazine .adv_dis h5 {
		  text-align:center;
		  font-size:30px;
		  font-weight:normal;
		  color:#422912;
		}
		div.blogazine .adv_dis p {
		  margin:20px 0 5px;
		  padding:0 0 0 50px;
		  font-size:16px;
		}
		div.blogazine .adv_dis2 {
		  clear:both;
		  background-image:url(<?php echo WP_CONTENT_URL; ?>/uploads/page/blogazine/img/adv_dis2.png);
		  background-repeat:no-repeat;
		  width:900px;
		  margin:100px 0 0 20px;
		  height:577px;
		}
		div.blogazine .adv_dis2 h5 {
		  text-align:center;
		  font-size:30px;
		  font-weight:normal;
		  color:#422912;
		}
		div.blogazine .adv_dis2 p {
		  margin:60px 20px 5px 0;
		  width:380px;
		  padding:0 0 0 50px;
		  font-size:16px;
		}
		div.blogazine #further_reading {
		  background-image:url(<?php echo WP_CONTENT_URL; ?>/uploads/page/blogazine/img/further_bg.png);
		  width:650px;
		  height:340px;
		  margin: 100px auto 20px auto;
		  padding-top:60px;
		  font-size:16px;
		}
		div.blogazine #further_reading ul li {
		  color:#ae6125;
		  list-style:none;
		  margin: 10px 0 0 0;
		  padding-left:0;
		}
		div.blogazine .further {
		  list-style:none;
		  margin:0 0 0 22px;
		  padding:0;
		}
		div.blogazine #further_reading a:link, #further_reading a:visited {
		  text-decoration: underline;
		  color:#ae6125;
		}
		div.blogazine #further_reading a:hover {
		  text-decoration:underline;
		  color:#051414;
		}
		div.blogazine #author {
		  background-image:url(<?php echo WP_CONTENT_URL; ?>/uploads/page/blogazine/img/author_bg.png);
		  width:480px;
		  height:117px;
		  margin: 10px auto 100px auto;
		  padding:60px 150px 0 20px;;
		  font-size:16px;
		  color:#145280;
		}
		div.blogazine #author a:link, #author a:visited {
		  text-decoration: underline;
		  font-weight:bold;
		  color:#07243a;
		}
		div.blogazine #author a:hover {
		  color:#000000;
		  text-decoration:underline;
		}
		.side,
		#footer,
		#smashnav,
		.backtotop,
		#wpsidebar {
			display: none;
		}
		.commentlist .comment {
			background-color: rgba(255, 255, 255, 0.5);
		}
		/* /BLOGAZINE */
		-->
		</style>
    </head>
    <body <?php body_class(); ?>>
<?php get_template_part( 'parts/navigation/blogazine'); ?>

    <div class="blogazine outer">
      <div class="blogazine inner">
        <img alt="Intro" src="<?php echo WP_CONTENT_URL; ?>/uploads/assets/images/blogazine-layout/intro_logo.png" class="intro_image" />
        <h1 class="title">The death of the <span class="title_large"><span class="white">boring</span> blog post?</span></h1>
        <p class="postmetadata">
	        By <a href="<?php echo home_url( '/author/paddy-donnelly/' ); ?>">Paddy Donnelly</a> |
	        November 19th, 2009 |
	        <a href="<?php home_url( '/category/design/' ); ?>">Design</a> |
	        <?php echo smash_get_jump_to_comments_link(); ?></p>
        <div style="color:#fff;background:#000;">
            <?php
            if (have_posts())
            {
                while (have_posts())
                {
                    the_post();
                    the_content();
                }
            }
            ?>
		</div>
		<?php comments_template(); ?>
      </div><?php /*<!-- /.blogazine.inner -->*/ ?>
    </div><?php /*<!-- /.blogazine.outer -->*/ ?>

    <?php get_footer(); ?>

  </body>
</html>
