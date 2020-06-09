<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="project">
        <h2 class="project__heading"><?= the_title(); ?></h2>
        <span class="project__client"><?= get_field('client'); ?></span>
        <img src="<?php the_post_thumbnail_url('front-project'); ?>"
             alt="Image montrant le projet <?= the_title(); ?>" class="project__img">
        <a href="<?php get_field('project-link') ?>" class="project__link">Voir le projet <span class="sro"><?= the_title(); ?></span></a>
        <div class="project__wysiwyg">
            <?php the_content(); ?>
        </div>
        <a href="<?php get_field('project-link') ?>" class="project__link">Voir le projet <span class="sro"><?= the_title(); ?></span></a>

    </article>
    <?php wp_reset_query(); ?>
<?php endwhile; endif; ?>
    <div class="cta">
        <span class="cta__span"><?= __('Vous voulez me contacter?', 'portfolio'); ?></span>
        <p class="cta__paragraph"><?= __('Voici le lien vers le formulaire de contact', 'portfolio'); ?></p>
        <a href="<?php get_page_by_title('Contact'); ?>" class="cta__link"><?= __('Contact', 'portfolio'); ?></a>
    </div>

<?php get_footer(); ?>