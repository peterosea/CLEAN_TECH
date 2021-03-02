<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?>
<?php
    if( has_post_thumbnail() ){
        $class = 'has-thumbnail';
    } else {
        $class = 'no-thumbnail';
    }
?>
<article id="post-<?php the_ID(); ?>" class="item-search <?php echo $class; ?>">
	<div class="col_1_4">
        <div class="thumb_bg" style="background-image:url(<?php echo the_post_thumbnail_url(); ?>);"></div>
    </div>
    <div class="col_3_4">
        <a href="<?php echo esc_url( get_permalink() ) ?>" class="_title">
            <h3>
                <?php echo the_title(); ?>
                <span class="posttype">
                <?php
                    $postType = get_post_type_object(get_post_type());
                    echo esc_html($postType->labels->singular_name);                
                ?>
                </span>
            </h3>
        </a>
        <a class="_excerpt" href="<?php echo esc_url( get_permalink() ) ?>">
            <?php the_excerpt(); ?>
        </a>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->