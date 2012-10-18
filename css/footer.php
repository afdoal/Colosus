<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml">
<?php if (strpos($_SERVER['HTTP_USER_AGENT'],"MSIE 8")) {
header("X-UA-Compatible: IE=7");} ?> 
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# kiosban_auth:tips http://ogp.me/ns/fb/kiosban_auth#">
<?php $title = get_post_field( 'post_title', $post_id ); ?>
<?php $img_full_url = prima_get_image( $img_id ); ?>

<?php  if(get_post_type() <> 'wpsc-product'){ ?>
<meta property="fb:app_id" content="384945498218921" /> 
  <meta property="og:type"   content="kiosban_auth:tips" />  
  <meta property="og:title" content="<?php wp_title(); ?>" /> 
  <meta property="og:image" content="<?php echo $img_full_url; ?>" /> 
  <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" /> 
  <meta property="og:url" content="<?php the_permalink() ?>"> 
<?php } else { ?>
<meta property="fb:app_id" content="384945498218921" /> 
  <meta property="og:type"   content="kiosban_auth:product" />
  <meta property="og:title" content="<?php wp_title(); ?>" />
  <meta property="og:image" content="<?php $single_img = prima_get_image( $first_img_id, $image_width, $image_height, $crop ); echo $single_img; ?>" />
  <meta property="og:url" content="<?php the_permalink() ?>">  
<?php } ?>
<?php
   $cache_expire = 60*60*24*365;
   header("Pragma: public");
   header("Cache-Control: max-age=".$cache_expire);
   header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$cache_expire) . ' GMT');
?>
<script src="//connect.facebook.net/en_US/all.js"></script>
<script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '384945498218921', // App ID
        status     : true, // check login status
        cookie     : true, // enable cookies to allow the server to access the session
        xfbml      : true  // parse XFBML
      });
    };

    // Load the SDK Asynchronously
    (function(d){
      var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
      js = d.createElement('script'); js.id = id; js.async = true;
      js.src = "//connect.facebook.net/en_US/all.js";
      d.getElementsByTagName('head')[0].appendChild(js);
    }(document));
  </script>



<title><?php wp_title(); ?></title>

<?php wp_head(); ?>

<script language="javascript" type="text/javascript">
<!--
function methu(url) {
	newwindow=window.open(url,'name','height=100,width=700');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>

<meta name="google-site-verification" content="_mM8OMCs28yZo7tWzczFxCtz8rbCAAJO9r0fQz9oPKA" />


</head>
<?php if(!is_single()) {?>
<body id="<?php prima_option('themelayout') ?>" <?php body_class(); ?>>
<?php } else if(get_post_type() == 'wpsc-product') {?>
<body id="<?php prima_option('themelayout') ?>" <?php body_class(); ?> onload="postProduct()">
<?php } else { ?>
<body id="<?php prima_option('themelayout') ?>" <?php body_class(); ?> onload="postCook()">
<div id="fb-root"></div>

<?php } ?>
<?php wp_enqueue_script("jquery"); ?>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=384945498218921";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript">
  function postCook()
  {
      $pageURL = '/me/kiosban_auth:view?tips=' + window.location;
      FB.api($pageURL,'post',
                function(response) {
                     if (!response) { 
                          
                     }
                     else if (response.error) {
                          
                          
                     } else {
                         
                     }
             });
  }
  function postProduct()
  {
      $pageURL = '/me/kiosban_auth:search?product=' + window.location;
      FB.api($pageURL,'post',
                function(response) {
                     if (!response) { 
                          
                     }
                     else if (response.error) {
                          
                          
                     } else {
                         
                     }
             });
  }
  </script>