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
    <div class="hero__content wysiwyg"><?php the_content(); ?></div>
    <?php wp_reset_query(); ?>
<?php endwhile; endif; ?>

<?php if ($projectsLoop->have_posts()): while ($projectsLoop->have_posts()): $projectsLoop->the_post(); ?>
    <article class="project">
        <h2 class="project__heading"><?= the_title(); ?></h2>
        <p class="project__content"><?php the_excerpt(); ?></p>
        <?php the_post_thumbnail('', ['class' => 'project__thumbnail']); ?>
        <a href="<?php the_permalink(); ?>" class="project__permalink">Voir le projet <span
                    class="project__span"><?= the_title(); ?></span></a>
    </article>
<?php endwhile; ?>
<?php else: ?>
    <p><?= __('Il n’y a pas de projets pour le moment', 'portfolio'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
