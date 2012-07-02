<?php 

global $wp_query;
$total_results = $wp_query->found_posts;

?>

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
     <?php wp_dropdown_categories(array('show_option_all' => 'Select Shoots', 'show_count' => 1, 'class' => 'styled')); ?> 
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

<section class="posts ten columns offset-by-one">

<h2>Category: <?php single_cat_title(); ?> (<?php echo $total_results; ?> entries)</h2>

<?php query_posts($query_string . '&cat=-5'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article class="post">

        <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        <p class="date">Posted <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>
        <?php if(get_the_tags()): ?>
            in <?php the_tags('', ', '); ?>
        <?php endif; ?>
        </p>
    
    <?php the_excerpt(); ?>

    </article>
    
        
    <?php endwhile; ?>
    
    <nav>
        <?php if(get_previous_posts_link()): ?>
            <p class="newer"><?php previous_posts_link('Newer Posts',0); ?></p>
        <?php endif; ?>
        <?php if(get_next_posts_link()): ?>
            <p class="older"><?php next_posts_link('Older Posts',0); ?></p>
        <?php endif; ?>
    </nav>        
    
    <?php else: ?>
    
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    
    <?php endif; ?>


</section>

<?php get_sidebar(); ?>



</div>

<?php get_footer(); ?>