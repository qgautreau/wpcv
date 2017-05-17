<?php
    get_header();

    $my_cat = get_categories();
   foreach ($my_cat as $cat) {
       global $post;
       the_meta();
       $args = array( "posts_per_page" => -1,
       'orderby'=> 'meta_value',
       'meta_key'=> 'date',
       'order'=> 'DESC',
        "category" => $cat->cat_ID );
       $myposts = get_posts( $args );
       if ( $myposts) {
           printf('<div id="%s" class="cvpart">', $cat->cat_ID);
           echo "<h2>" .$cat->name. "</h2>";
           foreach ($myposts as $post) {
               setup_postdata( $post );
               if ( has_tag()) {
                   the_title("<h3 class='hastag'>", "</h3>");
               }
               else {
                   the_title("<h3>", "</h3>");
               }

               echo "<p>" . get_post_meta($post->ID, 'date', true)."</p>";
               the_content();
               if ( is_user_logged_in()) {
                   echo "<div>".edit_post_link()."</div>";
               }
           }
           printf("</div>");
           /* Restore original Post Data */
           wp_reset_postdata();
        } else {
           // no posts found
       }
   }

 ?>
