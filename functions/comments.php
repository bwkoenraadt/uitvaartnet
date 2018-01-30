<?php
   function show_review_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :
	break;
	default :
		// Proceed with normal comments.
	global $post;
?>

   <li>
      <div class="comments" id="comment-<?php comment_ID() ?>">
         <h3><?php comment_author_link() ?></h3>

         <?php comment_text() ?>

         <div class="grid-x grid-padding-x small-up-1 medium-up-3 align-bottom">
            <?php if(get_comment_meta( get_comment_ID(), 'premie', true)): ?>
               <div class="cell">

                  <span>Beoordeling premie</span><br />
                  <span class="score stars"><span style="width:<?php echo get_comment_meta( get_comment_ID(), 'premie', true) * 100; ?>%"></span></span>

               </div>
            <?php  endif; ?>
            <?php if(get_comment_meta( get_comment_ID(), 'service', true)): ?>
               <div class="cell">

                  <span>Beoordeling service</span><br />
                  <span class="score stars"><span style="width:<?php echo get_comment_meta( get_comment_ID(), 'service', true) * 100; ?>%"></span></span>

               </div>
            <?php  endif; ?>
         </div>
      </div>
<?php
   break;
   endswitch; // end comment_type check
}
?>
