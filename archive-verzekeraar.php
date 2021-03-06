<?php include_once('inc_php/header.php'); if($_GET['age']){}else{$_GET['age'] = 18;} ?>

<article class="verzekeraar">

   <div class="grid-container">
      <div class="grid-x grid-padding-x">

         <div class="large-16 medium-12 cell">
            <h2>Uitvaartverzekeraars</h2>
            <p>In Nederland zijn dertien uitvaartverzekeraars actief. De verzekeraars bieden allen verschillende uitvaartverzekeringspakketten aan en hanteren verschillende tarieven. </p>
            <p>Hieronder volgt een overzicht van alle uitvaartverzekeraars:</p>
            <ul>
               <?php

                  $wp_args = array(  'posts_per_page' => -1, 'post_type'  => 'verzekeraar' );
                  $posts = new WP_Query($wp_args);
                  $results;

                  foreach ($posts->posts as $post):
               ?>

               <li><a href="<?php permalink_link(); ?>"><?php the_title(); ?></a></li>

               <?php endforeach; ?>
            </ul>
         </div>
      </div>
   </div>

</article>

<section class="compare-insurance">

   <div class="grid-container">
      <div class="grid-x grid-padding-x">
         <div class="large-16 medium-12 cell">
            <h2>Het overzicht van uitvaartverzekeringen voor de leeftijd van <strong><?php echo $_GET['age']; ?></strong> jaar</h2>
         </div>
         <div class="large-8 medium-12 cell">
            <form method="get" action="#result">
               <select name="age" onchange="this.form.submit()">
               <?php for($i = 18; $i < 100; $i++): ?>
               <option value="<?php echo $i; ?>" <?php if($i ==  $_GET['age']): ?>selected<?php endif; ?>>
                  Toon het overzicht voor <?php echo $i; ?> jaar
               </option>
               <?php endfor; ?>
               </select>
            </form>
         </div>
      </div>

      <?php

         $wp_args = array(  'posts_per_page' => -1, 'post_type'  => 'verzekeraar' );
         $posts = new WP_Query($wp_args);
         $results;

         foreach ($posts->posts as $post):

            setup_postdata($post);

            $search_age = $_GET['age'];

            foreach(get_field('polissen') as $polis):

               $age_list = null;

               foreach($polis['leeftijden'] as $leeftijd):

                 $age_list[$leeftijd['leeftijden']] = $leeftijd;

               endforeach;

               for($search_age; $search_age > 0; $search_age--):

                  if($age_list[$search_age]):

                     $results[$age_list[$search_age]['permie_per_maand'] . $uniek]['permie_per_maand'] 	= $age_list[$search_age]['permie_per_maand'];
                     $results[$age_list[$search_age]['permie_per_maand'] . $uniek]['betaaltermijn'] 		= $polis['betaaltermijn'];
                     $results[$age_list[$search_age]['permie_per_maand'] . $uniek]['vergoed_bedrag'] 		= $polis['vergoed_bedrag'];
                     $results[$age_list[$search_age]['permie_per_maand'] . $uniek]['aff_url'] 				= get_field('aff_url');
                     $results[$age_list[$search_age]['permie_per_maand'] . $uniek]['logo'] 					= get_field('logo');
                     $results[$age_list[$search_age]['permie_per_maand'] . $uniek]['title'] 					= get_the_title();
                     $results[$age_list[$search_age]['permie_per_maand'] . $uniek++]['naam_polis'] 		= $polis['naam_polis'];

                  	break;

                  endif;

               endfor;

            endforeach;

         endforeach; wp_reset_postdata(); wp_reset_query();

			ksort($results);
      ?>

      <?php foreach($results as $result): ?>

      <div class="wrapper">
         <div class="grid-x grid-padding-x align-middle">
            <div class="large-4 medium-6 cell" >
               <div class="grid-x grid-padding-x text-center">
                  <div class="cell">

                     <a href="<?php echo $result['aff_url']; ?>">
                        <img src="<?php echo $result['logo']; ?>">
                     </a>

                  </div>
                  <div class="cell">
                     <strong><?php echo $result['naam_polis']; ?></strong>
                  </div>
               </div>
            </div>
            <div class="large-16 medium-18 cell">
               <div class="grid-x grid-padding-x text-center">

                  <div class="medium-8 cell ">
                     <div class="boxed yellow">

                        <p>
									Verzekerd bedrag<br/>
                           <strong>&euro; <?php echo $result['vergoed_bedrag']; ?>,- </strong>
                        </p>

                     </div>
                  </div>

                  <div class="medium-8  cell">
                     <div class="boxed orange">
                        <p>
                           Betaaltermijn<br/>
                           <strong><?php if($result['betaaltermijn']): ?>tot <?php echo $result['betaaltermijn']; ?> jaar<?php else: ?>levenslang<?php endif ;?></strong>
                        </p>

                     </div>
                  </div>

                  <div class="medium-8 cell">
                     <div class="boxed purple">

                        <p>
									Premie<br />
                           <strong>&euro; <?php echo number_format($result['permie_per_maand'] , 2, ',', ''); ?> p/m</strong>
                        </p>

                     </div>
                  </div>

               </div>
            </div>
            <div class="large-4 large-offset-0 medium-offset-12 medium-12 cell">
               <a rel="nofollow" href="<?php echo $result['aff_url']; ?>" class="button purple block">Bekijken</a>
            </div>
         </div>
      </div>
		<?php endforeach ;?>
		<p>
			<strong>
				Bovenstaande prijzen zijn vanaf prijzen, ze worden maandelijks gecontroleerd.
				Er kunnen geen rechten worden ontleed aan het overzicht.
				Heeft u een fout gevonden kunt u dit melden via de <a href="https://www.uitvaartnet.nl/contact">contact pagina</a>.
			</strong>
		</p>
   </div>

</section>


<?php include_once('inc_php/footer.php'); ?>
