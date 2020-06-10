<?php /* Template Name: conditions d’utilisation */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
        <div class="project__wysiwyg conditions"><?php the_content(); ?></div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>