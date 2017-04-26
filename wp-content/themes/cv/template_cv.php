<?php /* Template Name: CV */ ?>

<?php
    $my_cat = get_categories();
    foreach ($my_cat as $cat ) {
        $query = new WP_Query( array("category__in" => $cat));
        if ($query -> have_posts()) {
            echo "<div>";
            echo "<h2>" .$cat->name. "</h2>";
            while ($query -> have_posts()) {
                $query -> the_post();
                echo "<h3>" . get_the_title()."</h3>";
                echo "<p>" . get_the_content(). "<p>";
            }
            echo "</div>";
            /* Restore original Post Data */
            wp_reset_postdata();
        } else {
            // no post found
        }
    }

?>
 <?php
