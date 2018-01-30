<?php

	get_header();

   breadcrumb();

?>

<article>
   <div class="grid-container">
      <div class="grid-x grid-padding-x">
         <div class="medium-16 cell">
            <h1><?php the_title();?></h1>
            <?php the_content(); ?>

            <section id="feedback-form" data-magellan-target="feedback-form" class="useful">
               <form class="reply" method="post" action="<?php get_site_url(); ?>/wp-comments-post.php">
                  <div class="grid-x grid-padding-x align-middle">
                     <div class="large-10 medium-12 cell">
                        <h2>Was deze informatie nuttig?</h2>
                     </div>
                     <div class="large-14 medium-12 cell">
                        <input type="radio" name="useful" id="useful-1" value="10"><label for="useful-1"><span><i class="fa fa-smile"></i> Ja</span></label>
                        <input type="radio" name="useful" id="useful-3" value="5"><label for="useful-3"><span><i class="fa fa-meh"></i> Kan beter</span></label>
                        <input type="radio" name="useful" id="useful-2" value="1"><label for="useful-2"><span><i class="fa fa-frown"></i> Nee</span></label>

                        <div class="feedback-text">
                           <label for="reply">Vertel ons waarom, en wat wij eventueel kunnen verbeteren?</label>
                           <textarea name="comment" id="reply" onfocus="if(this.value == 'Geen opmerkingen.')this.value='';">Geen opmerkingen.</textarea>
                           <button class="button purple">Reactie versturen</button>
                           <input id="name" type="hidden" value="Mr. Feedback" name="author">
                           <input id="email" type="hidden" value="mr@feedback.nl" name="email">
                           <input type="hidden" value="<?php the_ID(); ?>" name="comment_post_ID">
                        </div>
                     </div>
                  </div>
               </form>
            </section>

			</div>

         <aside class="medium-8 cell">
            <div class="table-of-contents">

               <?php
      				if(get_field('inhoudsopgaven')):

      					$inhoudsopgaven_html = '<h2>Inhoudsopgave</h2>';

      					foreach(get_field('inhoudsopgaven') as $inhoud):
      						$inhoud_nr++;
      						$i = 1;
      						$inhoudsopgaven_html .= '<a href="' . $inhoud['anker'] . '">' . $inhoud_nr . '. ' .  $inhoud['titel'] . '</a><br />';


      							if($inhoud['subparagrafen']):
      								$inhoudsopgaven_html .= '<ul>';

      								foreach($inhoud['subparagrafen'] as $sub):

      									$inhoudsopgaven_html .= '<li><a href="' . $sub['anker'] . '">' . $inhoud_nr . '.' . $i++ . ' ' . $sub['titel'] . '</a></li>';

      								endforeach;

      								$inhoudsopgaven_html .= '</ul>';

      							endif;

      					endforeach;

      					$inhoudsopgaven_html .= '';

      					echo $inhoudsopgaven_html;

      				endif;
      			?>

            </div>
         </aside>
      </div>
   </div>
</article>

<?php
	get_footer();
?>
