<?php

	get_header();

   breadcrumb();

?>

<article>
   <div class="grid-container">
      <div class="grid-x grid-padding-x">
         <div class="medium-16 cell">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <hr />
				<?php comments_template('/comments-verzekeraar.php'); ?>
            
         </div>
         <aside class="medium-8  cell">
				<h2>Contact met <?php the_title(); ?></h2>
            <?php the_field('contact_veld'); ?>
         </aside>
      </div>
   </div>
</article>


<?php

	get_footer();

?>
