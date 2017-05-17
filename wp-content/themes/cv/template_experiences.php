<?php /* Template Name: Expériences */ ?>

<?php
    get_header();
    $my_cat = get_categories();

   global $post;
   $args = array( "posts_per_page" => -1, "category_name" => "Expériences" );
   $myposts = get_posts( $args );
   if ( $myposts) {
       echo "<div>";
       echo "<h2>" .$cat->name. "</h2>";
       foreach ($myposts as $post) {
           setup_postdata( $post );
           if ( has_tag()) {
               the_title("<h3 class='hastag'>", "</h3>");
           }
           else {
               the_title("<h3>", "</h3>");
           }
           echo "<p>" . the_content() . "</p>";
           if ( is_user_logged_in()) {
               echo "<div>".edit_post_link()."</div>";
           }
       }
       echo "</div>";
       /* Restore original Post Data */
       wp_reset_postdata();
    } else {
       // no posts found
    }
?>
 <?php
