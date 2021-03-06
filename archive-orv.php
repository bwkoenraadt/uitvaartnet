<?php
	get_header();
?>

<?php  if($_GET['age']){}else{$_GET['age'] = 18;} ?>



<section class="content-background">
   <div class="grid-container">
      <div class="grid-x grid-padding-x">
         <div class="large-16 medium-12 cell medium-order-1 small-order-2">
            <div class="content">
               <h1>Uitvaartverzekering vergelijken</h1>
               <p>
                  Uw gezin goed achterlaten als u er straks niet meer bent?<br />
                  U regelt het eenvoudig met een uitvaartverzekering

               </p>
               <p><a class="button no-arrow">Bereken uw premie</a><a class="button white">Meer informatie</a></a>
            </div>
         </div>
      </div>
   </div>
</section>

<?php breadcrumb(); ?>

<section>

   <div class="grid-container">
      <div class="grid-x grid-padding-x">

         <div class="large-16 medium-12 cell">
            <?php the_field('tekst_boven_overlijdensrisicoverzekering', 'options'); ?>
         </div>
         <aside class="large-8 medium-12 cell">
            <div class="table-of-contents">
            <h2>Onderwerpen</h2>
            <ul class="arrow">
					<?php foreach(get_field('links_boven_uitvaartverzekering', 'options') as $link ) : ?>
               <li><a href="<?php echo $link['links']; ?>"><?php echo $link['tekst']; ?></a></li>
					<?php endforeach; ?>
            </ul>
         </div>
         </aside>
      </div>
   </div>

</section>
<!--<a name="result"></a>
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
               <a href="<?php echo $result['aff_url']; ?>" class="button purple block">Bekijken</a>
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

</section>-->


<section>

   <div class="grid-container">
      <div class="grid-x grid-padding-x">

         <div class="cell">
				<?php the_field('tekst_onder_overlijdensrisicoverzekering', 'options'); ?>
         </div>

			<!--
         <aside class="large-8 medium-12 cell medium-order-2 small-order-1">

            <h2>Nog meer informatie</h2>
            <ul class="arrow">
               <li><a href="//www.zorgwijzer.nl/vergoeding/acupunctuur">Acupunctuur</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/antroposofische-geneeskunde">Antroposofische geneeskunde</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/aps-therapie">APS therapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/ayurveda">Ayurveda</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/body-stress-release">Body Stress Release</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/chinese-geneeswijzen">Chinese geneeswijzen</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/chiropractie">Chiropractie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/counseling">Counseling</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/craniosacraal-therapie">Craniosacraal therapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/emdr-therapie">EMDR therapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/euritmietherapie">Euritmietherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/gestalttherapie">Gestalttherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/halotherapie">Halotherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/haptotherapie">Haptotherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/holistisch-energetische-therapie">Holistisch energetische therapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/homeopathie">Homeopathie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/hypnotherapie">Hypnotherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/integrale-therapie">Integrale therapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/iriscopie">Iriscopie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/kinesiologie">Kinesiologie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/mesologie">Mesologie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/moermantherapie">Moermantherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/natuurgeneeskunde">Natuurgeneeskunde</a></li>
               <li><a href="www.zorgwijzer.nl/vergoeding/neuraaltherapie">Neuraaltherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/neuromusculaire-therapie">Neuromusculaire therapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/osteopathie">Osteopathie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/orthomoleculaire-geneeskunde">Orthomoleculaire geneeskunde</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/psychomotorische-kindertherapie">Psychomotorische kindertherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/psychosociale-therapie">Psychosociale therapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/psychotherapie">Psychotherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/reflexzonetherapie">Reflexzonetherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/regressietherapie">Regressietherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/reincarnatietherapie">Reïncarnatietherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/shiatsu-therapie">Shiatsu therapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/spatadertherapie">Spatadertherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/speltherapie">Speltherapie</a></li>
               <li><a href="//www.zorgwijzer.nl/vergoeding/vaktherapie">Vaktherapie</a></li>
            </ul>
         </aside>
			-->

      </div>
   </div>


</section>

<?php
	get_footer();
?>
