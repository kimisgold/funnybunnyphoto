<?php
 
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
 
if ( post_password_required() ) { ?>
<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
return;
}

    /* Count the totals */ 
    $numPingBacks = 0; 
    $numComments  = 0; 

    /* Loop throught comments to count these totals */ 
    foreach ($comments as $comment) { 
        if (get_comment_type() != "comment") { $numPingBacks++; } 
        else { $numComments++; } 
    } 
     

?>

 
<!-- You can start editing here. -->
 
<?php if ( have_comments() ) : ?>
<h2 class="comments-header"><?php comments_number('No Responses', 'One Response', '% Responses' );?></h2>
 
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>
 
<ol class="commentlist">
<?php wp_list_comments('avatar_size=50&type=comment'); ?>
</ol>
 
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>

<?php else : // this is displayed if there are no comments so far ?>
 
<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->
<h2 class="comments-header">No comments.</h2>
  
<?php endif; ?>
<?php endif; ?>

<div id="trackbacks">

<?php 

/* This is a loop for printing pingbacks/trackbacks if there are any */ 
if ($numPingBacks != 0) : ?> 

    <h2 class="comments-header"><?php _e($numPingBacks); ?> Trackbacks/Pingbacks</h2> 
    <ol> 
 
<?php foreach ($comments as $comment) : ?> 
<?php if (get_comment_type()!="comment") : ?> 

    <li id="comment-<?php comment_ID() ?>" class="<?php _e($thiscomment); ?>"> 
    <?php comment_type(__('Comment'), __('Trackback'), __('Pingback')); ?>:  
    <?php comment_author_link(); ?> on <?php comment_date(); ?> 
    </li> 
     
    <?php if('odd'==$thiscomment) { $thiscomment = 'even'; } else { $thiscomment = 'odd'; } ?> 
 
<?php endif; endforeach; ?> 

    </ol>

<?php endif; ?> 

<?php if (pings_open()) : ?> 
<p id="respond"><span id="trackback-link"> 
    <a href="<?php trackback_url() ?>" rel="trackback">Get a Trackback link</a> 
</span></p> 
<?php endif; ?> 

</div> 


<?php if ('open' == $post->comment_status) : ?>
 
<div id="comments-form">
 
<h2 class="comments-header"><?php comment_form_title( 'Leave a comment', 'Leave a comment to %s' ); ?></h2>
 
<div class="cancel-comment-reply">
<small><?php cancel_comment_reply_link(); ?></small>
</div>
 
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
 
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
 
<?php if ( $user_ID ) : ?>
 
<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
 
<?php else : ?>
 
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>
 
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>
 
<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>
 
<?php endif; ?>
 
<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
 
<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
 
<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>
 
</form>
 
<?php endif; // If registration required and not logged in ?>
</div>

<?php else: ?>

<h2 class="comments-header">Comments are closed.</h2>

 
<?php endif; // if you delete this the sky will fall on your head ?>