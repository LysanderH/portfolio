<?php /* Template Name: Projects */

$projectsLoop = new WP_Query([
    'post_type' => 'project',
    'post_per_page' => 5,
    'paged' => get_query_var('projects-pagination') ?: 1,
]);

get_header();
?>
    <section class="projects-page__wrapper">
        <h2 class="projects-page__heading"><?= __('Projets', 'portfolio'); ?></h2>
        <?php if ($projectsLoop->have_posts()): while ($projectsLoop->have_posts()): $projectsLoop->the_post(); ?>
            <article class="post">
                <div class="post__content">

                    <h3 class="post__heading"><?= the_title(); ?></h3>

                    <p class="post__excerpt"><?= get_the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="post__link"><?= __('Voir le projet', 'portfolio'); ?>
                        <span class="sro">"<?= the_title(); ?>"</span></a>
                </div>

                <img src="<?php the_post_thumbnail_url('front-project'); ?>"
                     alt="Image montrant le projet <?= the_title(); ?>" class="post__img">
            </article>
            <?php wp_reset_query(); ?>
        <?php endwhile; endif; ?>
        <div class="pagination">
            <?= paginate_links([
                'format' => '?projects-pagination=%#%',
                'current' => get_query_var('projects-pagination') ?: 1,
                'total' => $projectsLoop->max_num_pages
            ]); ?>
        </div>
    </section>

    <div class="cta">
        <span class="cta__span"><?= __('Vous voulez me contacter?', 'portfolio'); ?></span>
        <p class="cta__paragraph"><?= __('Voici le lien vers le formulaire de contact', 'portfolio'); ?></p>
        <a href="<?php get_page_by_title('Contact'); ?>" class="cta__link"><?= __('Contact', 'portfolio'); ?></a>
    </div>

<?php get_footer(); ?>