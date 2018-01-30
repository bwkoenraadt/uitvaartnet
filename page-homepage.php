<?php

   /**
   * Template Name: Homepage
   */


	get_header();
?>

<section class="image-banner">
   <div class="grid-container">
      <div class="grid-x grid-padding-x">
         <div class="large-24 cell">
            <h1>Kenniscentrum voor uitvaart &amp; test</h1>
         </div>
         <div class="large-15 cell">

            <div class="box">
               <div class="grid-x grid-padding-x align-bottom">
                  <div class="cell">
                     <h2>Wat kost een uitvaartverzekering?</h2>
                  </div>

                  <div class="large-12 medium-12 cell">

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
                  <div class="large-12 medium-12 cell">
                     <p>
                        <a href="#result" class="button block">Verzekeringen bekijken</a>
                     </p>
                  </div>
                  <div class="cell text-center">
                     <p>Een uitvaartverzekering dekt dus de kosten die komen kijken bij een begrafenis of crematie. Hierbij kunt u denken aan vanzelfsprekende kosten, zoals het begeleiden.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>



<section>
   <div class="grid-container">
      <div class="grid-x grid-padding-x">
         <div class="large-24 cell">
            <h2>Uitvaartverzekering: hoe werkt het?</h2>
            <p>Een uitvaartverzekering dekt dus de kosten die komen kijken bij een begrafenis of crematie. Hierbij kunt u denken aan vanzelfsprekende kosten, zoals het begeleiden van de uitvaart, het overbrengen van de overledene en de plechtigheid in het
               crematorium.&nbsp;Een uitvaartverzekering is niet verplicht of noodzakelijk, maar het kan u en uw nabestaanden wel een hoop zorgen uit handen nemen als het kostenplaatje rond de begrafenis of crematie is gedekt.</p>
            <p>Bij het afsluiten van een uitvaartverzekering wordt er een overeenkomst aangegaan tussen de verzekeringnemer en de uitvaartverzekeraar. De verzekeringsnemer betaalt premie en in ruil daarvoor keert de uitvaartverzekeraar een bepaald bedrag
               uit na overlijden. Dit kan op basis van een geldsom of in natura waarbij de uitvaartdiensten zelf worden geregeld en bekostigd.</p>

         </div>
      </div>
   </div>
</section>

<section class="quick-menu">
   <div class="grid-container">
      <div class="grid-x" data-equalizer data-equalize-on="large">
         <div class="large-8 medium-12 cell">
            <div class="box">
               <h2>Goed om te weten</h2>
               <div class="content"  data-equalizer-watch>
                  <ul class="items">
                   	<li><a href="#"><i aria-hidden="true" class="fa fa-info-circle"></i>Crematie of begrafenis</a></li>
                   	<li><a href="#"><i aria-hidden="true" class="fa fa-check-circle"></i>Checklist: regelen bij overlijden</a></li>
                   	<li><a href="#"><i aria-hidden="true" class="fa fa-check-square"></i>Regelen nalatenschap</a></li>
                   	<li><a href="#"><i aria-hidden="true" class="fa fa-info-square"></i>Overlijden in het buitenland</a></li>
               </ul>
               </div>
            </div>
         </div>
         <div class="large-8 medium-12 cell">
            <div class="box">
               <h2>Direct regelen</h2>
               <div class="content"  data-equalizer-watch>
                  <ul class="items">
                   	<li><a href="#"><i aria-hidden="true" class="fa fas fa-info"></i>Uitvaartverzekering afsluiten</a></li>
                   	<li><a href="#"><i aria-hidden="true" class="fa fa-info"></i>Verzekeraars zoeken</a></li>
                   	<li><a href="#"><i aria-hidden="true" class="fa fa-link"></i>Afkopen uitvaartverzekering</a></li>
                   	<li><a href="#"><i aria-hidden="true" class="fa fa-user"></i>Melden overlijden</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="large-8 cell">
            <div class="box alt">
               <h2>Goed om te weten</h2>
               <div class="content"  data-equalizer-watch>
                  <p>Een uitvaartverzekering dekt dus de kosten die komen kijken bij een begrafenis of crematie.</p>
                  <ul >
                   	<li>Bepaal welke zorg je nodig hebt</a></li>
                   	<li>Is de basisverzekering voldoende of heb ik aanvullende zorg nodig?</a></li>
                   	<li>Hoeveel eigen risico kan ik me veroorloven?</a></li>
                  </ul>
                  <a href="#" class="button block">Uitvaart kosten berekenen</a>
               </div>
            </div>
         </div>
      </div>
   </div>

</section>

<section class="contact-box">
   <div class="grid-container">
      <div class="grid-x grid-padding-x align-bottom">
         <div class="large-18 medium-14 cell">
            <div class="content">
               <h2>Vraag & Antwoord</h2>
               <p>
                  Bij het afsluiten van een uitvaartverzekering wordt er een overeenkomst aangegaan tussen de verzekeringnemer en de uitvaartverzekeraar. De
                  verzekeringsnemer betaalt premie en in ruil daarvoor keert de uitvaartverzekeraar een bepaald bedrag uit na overlijden.
                  Dit kan op basis van een geldsom of in natura waarbij de uitvaartdiensten zelf worden geregeld en bekostigd.
               </p>
               <a href="#" class="button white">wat kost een uitvaart</a>
               <a href="#" class="button white">Is de premie aftrekbaar?</a>
               <a href="#" class="button white">Wat kies ik: begrafenis of crematie?</a>
               <p>
                  Heeft u zelf een specifieke vraag? Dat kan natuurlijk altijd. Zoek op de website door middel van onze zoekbalk of neem contact op met onze experts.
                  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
               </a>
            </div>
         </div>
         <div class="large-6 medium-10 cell">

            <img class="alignright" src="https://www.zorgwijzer.nl/wp-content/themes/zorgwijzer/images/onze-man.png" alt="" class="man" width="200px">

         </div>
      </div>
   </div>
</section>

<section class="information-box">
      <div class="grid-container">
   <div class="grid-x grid-padding-x">

      <div class="medium-12 cell box">
         <div class="grid-x grid-padding-x align-middle">
            <div class="shrink cell">
               <i class="fa fa-lightbulb"></i>
            </div>
            <div class="auto cell">
               <h2> Natura uitvaartverzekering</h2>
               <p>
                  Bij een naturaverzekering zijn de diensten en goederen van een uitvaart verzekerd.
                  <a href="https://www.uitvaartnet.nl/uitvaartverzekering/wat-is-een-uitvaartverzekering#natura"> Lees meer</a>
               </p>
            </div>

         </div>

      </div>
      <div class="medium-12 cell box">
         <div class="grid-x grid-padding-x align-middle">
            <div class="shrink cell">
               <i class="fa fa-child"></i>
            </div>
            <div class="auto cell">
               <h2> Natura uitvaartverzekering</h2>
               <p>
                  Bij een naturaverzekering zijn de diensten en goederen van een uitvaart verzekerd.
                  <a href="https://www.uitvaartnet.nl/uitvaartverzekering/wat-is-een-uitvaartverzekering#natura"> Lees meer</a>
               </p>
            </div>

         </div>

      </div>
      <div class="medium-12 cell box">
         <div class="grid-x grid-padding-x align-middle">
            <div class="shrink cell">
               <i class="fa fa-bed"></i>
            </div>
            <div class="auto cell">
               <h2> Natura uitvaartverzekering</h2>
               <p>
                  Bij een naturaverzekering zijn de diensten en goederen van een uitvaart verzekerd.
                  <a href="https://www.uitvaartnet.nl/uitvaartverzekering/wat-is-een-uitvaartverzekering#natura"> Lees meer</a>
               </p>
            </div>

         </div>

      </div>
      <div class="medium-12 cell box">
         <div class="grid-x grid-padding-x align-middle">
            <div class="shrink cell">
               <i class="fa fa-users"></i>
            </div>
            <div class="auto cell">
               <h2> Natura uitvaartverzekering</h2>
               <p>
                  Bij een naturaverzekering zijn de diensten en goederen van een uitvaart verzekerd.
                  <a href="https://www.uitvaartnet.nl/uitvaartverzekering/wat-is-een-uitvaartverzekering#natura"> Lees meer</a>
               </p>
            </div>

         </div>

      </div>



   </div>
   </div>
</section>

<?php include('inc_php/most-read-faq.php'); ?>

<?php
	get_footer();
?>
