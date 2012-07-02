<?php get_header(); ?>

<nav class="subnav">

    <label for="archive-dropdown">Archives</label>
    <span>
        <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
          <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
          <?php wp_get_archives( 'type=monthly&format=option&show_post_count=1' ); ?>
        </select>
    </span>
    
    
    <label for="cat">Categories</label>
    <span>
     <?php wp_dropdown_categories(array('show_option_all' => 'All Shoots', 'show_count' => 1, 'class' => 'styled')); ?> 
    </span>
    
    <script type="text/javascript"><!--
        var dropdown = document.getElementById("cat");
        function onCatChange() {
    		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
    			location.href = "<?php echo get_option('home');
    ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
    		}
        }
        dropdown.onchange = onCatChange;
    --></script>    
    
     <?php get_search_form(); ?>

</nav>

<div class="content">

<section class="post ten columns offset-by-one">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article class="post">
        
        <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

        <p class="date">Posted <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>
        <?php if(get_the_tags()): ?>
            in <?php the_tags('', ', '); ?>
        <?php endif; ?>
        </p>
    
    <?php the_content(); ?>

    </article>
    
    <nav class="post-nav">
    
        <?php
        $previous_post = get_adjacent_post(false, '', true);
        $next_post = get_adjacent_post(false, '', false);
        
        if ($previous_post): ?>
            <p class="prev"><span class="label">Previously</span><br><?php previous_post_link('%link', '%title', false, '92'); ?></a></p>
        <?php endif; ?>
        <?php if ($next_post): // if there are newer articles ?>
            <p class="next"><span class="label">Next</span><br><?php next_post_link('%link', '%title', false, '92'); ?></p>
        <?php endif; ?>
                
    </nav>
            
    <?php endwhile; else: ?>
    
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    
    <?php endif; ?>

    <section id="comments">

        <?php comments_template(); ?>
        
    </section>

</section>

</div>

<?php get_footer(); ?>