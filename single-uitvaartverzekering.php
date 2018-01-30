<?php
    get_header();
?>

<?php breadcrumb(); ?>

<article>
   <div class="grid-container">
      <div class="grid-x grid-padding-x">
         <div class="large-16 cell">
            <h1><?php the_title();?></h1>
            <?php the_content(); ?>

				<p>
					Deze pagina is geactualiseerd op: <?php the_modified_time('j F Y'); ?>
				</p>

               <?php if (get_field('vragen')): ?>

               <section class="calculator">
                  <form>
                     <div class="grid-container">
                        <?php if(get_field('tool_titel')): ?>
                        <h2><?php the_field('tool_titel'); ?></h2>
                        <?php endif; ?>
                        <div class="calculation grid-x grid-padding-x">
                       <?php
                          foreach(get_field('vragen') as $vraag):
                          $vraag_nummer++;
                          $antwoord_nummer = 0;
                       ?>
                          <div class="cell">
                             <h2><?php echo $vraag['vraag_titel']; ?></h2>
                             <p>
                                <i>
                                   <?php echo $vraag['vraag_omschrijving']; ?>
                                </i>
                             </p>
                          </div>

                           <?php if($vraag['vraag_radio_buttons']): ?>
                              <?php foreach($vraag['vraag_radio_buttons'] as $antwoord): ?>

                                 <div class="large-20 cell">
                                    <input
                                    <?php if($antwoord_nummer == 0): ?>checked<?php endif; ?>
                                    type="radio" value="<?php echo $antwoord['waarde']; ?>"
                                    name="antwoord-<?php echo $vraag_nummer; ?>"
                                    id="antwoord-<?php echo $vraag_nummer; ?>-<?php echo $antwoord_nummer; ?>"
                                    data-question-nr="<?php echo $vraag_nummer;?>"
                                    data-answer-nr="<?php echo $antwoord_nummer; ?>">
                                    <label for="antwoord-<?php echo $vraag_nummer; ?>-<?php echo $antwoord_nummer; ?>">
                                    <?php echo $antwoord['antwoord']; ?>
                                    </label>
                                 </div>
                                 <div class="large-4 cell">
                                    <span class="sub-price <?php if($antwoord_nummer == 0): ?>active<?php endif; ?> price-q-<?php echo $vraag_nummer; ?> price-a-<?php echo $vraag_nummer; ?>-<?php echo $antwoord_nummer; ?>">
                                    &euro; <?php echo number_format($antwoord['waarde'], 2, ',', '.') ?>
                                    </span>
                                 </div>

                              <?php $antwoord_nummer++; endforeach; ?>
                           <?php endif; ?>


                           <?php if($vraag['maximale_waarde']): ?>
                              <div class="large-16 cell">

                                 <div class="slider"
                                    data-slider
                                    data-initial-start="<?php echo $vraag['start_waarde']; ?>"
                                    data-start="<?php echo $vraag['minimale_waarde']; ?>"
                                    data-end="<?php echo $vraag['maximale_waarde']; ?>"
                                    data-step="<?php echo $vraag['stap_grote']; ?>">

                                    <span class="slider-handle"
                                       data-slider-handle
                                       role="slider"
                                       tabindex="1"
                                       aria-controls="antwoord-<?php echo $vraag_nummer; ?>">
                                    </span>
                                    <span class="slider-fill" data-slider-fill></span>
                                 </div>

                              </div>

                              <div class="large-4 cell">
                                 <input id="antwoord-<?php echo $vraag_nummer; ?>" class="slider-val" type="number" data-answer-nr="<?php echo $vraag_nummer; ?>">
                                 <input id="antwoord-<?php echo $vraag_nummer; ?>-weight" type="hidden" value="<?php echo $vraag['kosten_per_eenheid']; ?>" />
                              </div>

                              <div class="large-4 cell">
                                 <span class="sub-price active total-answer-<?php echo $vraag_nummer; ?>"></span>
                              </div>

                        <?php endif; ?>
                     </fieldset>
                     <?php endforeach; ?>
                  </div>
                  <div class="grid-x grid-padding-x">
                     <div class="price large-10 cell ">
                        <strong>Benodigd bedrag: € <span id="total-price">5.900,00</span></strong>
                     </div>
                  </div>
               <?php endif; ?>
               </form>
            </section>

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
