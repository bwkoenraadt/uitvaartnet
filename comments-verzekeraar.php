<?php // Do not delete these lines
    if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
        die('Please do not load this page directly. Thanks!');
    }

    $args = array(    'post_id' => get_the_ID(),
                    'status' => 'approve');

    $comments = get_comments($args);

?>
<section class="reviews">

   <form class="reply" method="post" action="<?php get_site_url(); ?>/wp-comments-post.php">
      <fieldset>
         <a name="beoordeel"></a>
         <h2>Wat vindt u van <?php the_title(); ?></h2>
         <p>Uw e-mail blijft altijd privé.</p>
         <div class="grid-x grid-padding-x">


            <div class="medium-6 cell">
               <label for="name00">Naam</label><input id="name00" type="text" name="author">
            </div>

            <div class="medium-6 cell">
               <label for="email00">E-mail</label><input id="email00" type="text" name="email">
            </div>

            <div class="cell">
               <label for="reply00">Wat vindt u van de verzekeraar?</label>
               <textarea id="reply00" name="comment"></textarea>
            </div>

            <div class="medium-8 cell">
               <strong>Beoordeling premie</strong><br>
               <fieldset class="rating"><input type="radio" id="beoordeling_star5" name="beoordeling" value="10"><label class="full" for="beoordeling_star5" title="Awesome - 5 stars"></label><input type="radio" id="beoordeling_star4" name="beoordeling" value="8"><label class="full"
                     for="beoordeling_star4" title="Pretty good - 4 stars"></label><input type="radio" id="beoordeling_star3" name="beoordeling" value="6"><label class="full" for="beoordeling_star3" title="Meh - 3 stars"></label><input type="radio" id="beoordeling_star2"
                     name="beoordeling" value="4"><label class="full" for="beoordeling_star2" title="Kinda bad - 2 stars"></label><input type="radio" id="beoordeling_star1" name="beoordeling" value="2"><label class="full" for="beoordeling_star1" title="Sucks big time - 1 star"></label></fieldset>
            </div>

            <div class="medium-8 cell">
               <strong>Beoordeling service</strong><br>
               <fieldset class="rating"><input type="radio" id="beoordeling_star5" name="beoordeling" value="10"><label class="full" for="beoordeling_star5" title="Awesome - 5 stars"></label><input type="radio" id="beoordeling_star4" name="beoordeling" value="8"><label class="full"
                     for="beoordeling_star4" title="Pretty good - 4 stars"></label><input type="radio" id="beoordeling_star3" name="beoordeling" value="6"><label class="full" for="beoordeling_star3" title="Meh - 3 stars"></label><input type="radio" id="beoordeling_star2"
                     name="beoordeling" value="4"><label class="full" for="beoordeling_star2" title="Kinda bad - 2 stars"></label><input type="radio" id="beoordeling_star1" name="beoordeling" value="2"><label class="full" for="beoordeling_star1" title="Sucks big time - 1 star"></label></fieldset>
            </div>

            <div class="medium-8 cell align-right">
               <button class="button block"><span>Plaats uw beoordeling</span></button>
            </div>
         </div>

         <input id="comment_post_ID" type="hidden" value="114" name="comment_post_ID" />

      </fieldset>

   </form>
   <hr />
   <div class="reactions">
      <h2><?php comments_number('Geen beoordelingen', '1 beoordeling', '% beoordelingen'); ?> van <?php the_title(); ?></h2>

         <?php if (have_comments()) : ?>
             <ul class="comment">
         <?php
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              wp_list_comments(array( 'callback' => 'show_review_comment', 'style' => 'ul', 'reverse_top_level' => false, 'reverse_children' => true, 'posts_per_page' => 30, 'paged' => $paged), $comments);
          ?>
            </ul>
         <?php endif; ?>
      <!-- #comment-## -->

   </div>

</section>
