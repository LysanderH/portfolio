<?php /* Template Name: About */
get_header();
?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <div class="wysiwyg">
        <?php the_content(); ?>
    </div>
    <?php wp_reset_query(); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>