<?php /* Template Name: Projects */

$projectsLoop = new WP_Query([
    'post_type' => 'project',
    'post_per_page' => 5,
    'paged' => get_query_var('projects-pagination') ?: 1,
]);

get_header();
?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="post">
        <h2><?= the_title(); ?></h2>
        <?php the_post_thumbnail('', ['class' => 'post__thumbnail']); ?>
        <p class="post__excerpt"><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="post__link">Voir le projet
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