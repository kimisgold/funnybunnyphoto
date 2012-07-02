<?php get_header(); ?>

<div class="content">

<section class="ten columns offset-by-one">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article class="post">
        
        <h1><?php the_title(); ?></h1>
    
    <?php the_content(); ?>

    </article>
    
    <?php endwhile; else: ?>
    
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    
    <?php endif; ?>

</section>

</div>

<?php get_footer(); ?>