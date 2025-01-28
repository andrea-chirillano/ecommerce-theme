<?php
get_header(); 

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
    <?php endwhile;
else : ?>
    <p><?php _e('No hay contenido disponible.', 'ecommerce-theme'); ?></p>
<?php
endif;

get_footer(); 

my_custom_home_top_sellers() 
?>


