<?php
/*
 * Template Name: Accueil
 */
get_header();

$projectsLoop = new WP_Query([
    'post_type' => 'project',
    'post_per_page' => 3
]);
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <div class="hero__content wysiwyg"><?= the_content(); ?></div>
    <?php wp_reset_query(); ?>
<?php endwhile; endif; ?>

<?php if ($projectsLoop->have_posts()): while ($projectsLoop->have_posts()): $projectsLoop->the_post(); ?>
    <div class="project"><?= the_title(); ?></div>
<?php endwhile; ?>
<?php else: ?>
<p><?= __('Il n’y a pas de projets pour le moment', 'portfolio'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
