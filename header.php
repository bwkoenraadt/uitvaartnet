

<!doctype html>
<html class="no-js" lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/app.css">
   <?php wp_head(); ?>
</head>

<body>

   <header class="top-header">
      <div class="grid-container">
         <div class="grid-x grid-padding-x align-middle">

            <div class="large-6 medium-12 cell large-order-2 medium-order-1">
               <a href="/"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" style="width: 236px" /></a>
            </div>

            <div class="large-18 cell medium-order-3">
               <div class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
                  <button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
                  <div class="title-bar-title">Menu</div>
               </div>

               <div class="top-bar" id="responsive-menu">
                  <div class="top-bar-right">
                     <?php
      						$params = array(
      							'menu_id' => 'Header Menu',
      							'menu_class' => 'dropdown menu',
                           'container' => false
      						);

      						wp_nav_menu($params);
      					?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <main>
