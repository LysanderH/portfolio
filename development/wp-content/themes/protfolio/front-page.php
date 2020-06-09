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
    <div class="landing">
        <img src="<?= portfolio_get_theme_asset('/assets/img/front-img.svg') ?>"
             alt="<?= __('Illustration d’une personne avec un ordinateur'); ?>" class="landing__img">
        <div class="landing__wrapper">
            <span class="landing__hello">Bonjour, Guten Tag, Hello</span>
            <p class="landing__tagline"><?php the_field('portfolio-tagline'); ?></p>
            <p class="landing__paragraph"><?php the_field('portfolio_description'); ?></p>
            <div class="landing__wrapper landing__wrapper--link">
                <a href="<?php echo esc_url(get_permalink(get_page_by_title('Projets'))); ?>"
                   class="landing__link"><?= __('Projets', 'portfolio'); ?></a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_title('Contact'))); ?>"
                   class="landing__link"><?= __('Contact', 'portfolio'); ?></a>
            </div>
        </div>
        <span class="landing__scroll"><?= __('Scrollez vers le bas'); ?></span>
    </div>
    <section class="about">
        <h2 class="about__heading"><?= __('À propos', 'portfolio'); ?></h2>
        <div class="about__wrapper">
            <p class="about__text"><?= get_field('portfolio_about'); ?></p>
        </div>
    </section>
<?php endwhile; ?>

<?php endif; ?>
<section class="front-projects">
    <h2 class="front-projects__heading"><?= __('Projets', 'portfolio'); ?></h2>
    <?php if ($projectsLoop->have_posts()): while ($projectsLoop->have_posts()): $projectsLoop->the_post(); ?>
        <article class="front-project">
            <h2 class="front-project__heading"><?= the_title(); ?></h2>
            <img src="<?php the_post_thumbnail_url('front-project'); ?>"
                 alt="Image montrant le projet <?= the_title(); ?>" class="front-project__img">
            <p class="front-project__content"><?= get_the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="front-project__permalink"><?= __('Voir le projet', 'portfolio'); ?>
                <span class="front-project__span sro"> <?= the_title(); ?></span>
            </a>
        </article>
    <?php endwhile; ?>
    <?php else: ?>
        <p><?= __('Il n’y a pas de projets pour le moment', 'portfolio'); ?></p>
    <?php endif; ?>
    <a href="<?php get_page_by_title('Contact'); ?>"
       class="front-project__link--all btn"><?= __('Tous les projets', 'portfolio'); ?></a>

</section>


<div class="cta">
    <span class="cta__span"><?= __('Vous voulez me contacter?', 'portfolio'); ?></span>
    <p class="cta__paragraph"><?= __('Voici le lien vers le formulaire de contact', 'portfolio'); ?></p>
    <a href="<?php get_page_by_title('Contact'); ?>" class="cta__link"><?= __('Contact', 'portfolio'); ?></a>
</div>

<?php get_footer(); ?>
