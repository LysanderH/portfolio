<?php /* Template Name: Projects */

$projectsLoop = new WP_Query([
    'post_type' => 'project',
    'post_per_page' => 5,
    'paged' => get_query_var('projects-pagination') ?: 1,
]);

get_header();
?>
<?php if ($projectsLoop->have_posts()): while ($projectsLoop->have_posts()): $projectsLoop->the_post(); ?>
    <article class="post">
        <h2><?= the_title(); ?></h2>
        <img src="<?php the_post_thumbnail_url('front-project'); ?>"
             alt="Image montrant le projet <?= the_title(); ?>" class="post__img">
        <p class="post__excerpt"><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="post__link"><?= __('Voir le projet', 'portfolio'); ?>
            <span class="sro">"<?= the_title(); ?>"</span></a>
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

<?php get_footer(); ?>