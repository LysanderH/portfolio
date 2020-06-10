<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <title><?= wp_title(); ?></title>
    <!--Yoast SEO here-->
    <?php do_action('wpseo_head'); ?>
    <!--Yoast SEO end here-->

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Theme Color for Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">

    <!-- Identify the software used to build the document (i.e. - WordPress, Dreamweaver) -->
    <meta name="generator" content="WordPress">

    <!-- Short description of your document's subject -->
    <meta name="subject"
          content="Le portfolio de Lysander reprend une sélection de ses projets">

    <!-- Gives a general age rating based on the document's content -->
    <meta name="rating" content="General">

    <!-- Disable automatic detection and formatting of possible phone numbers -->
    <meta name="format-detection" content="telephone=no">

    <!-- Geo tags -->
    <meta name="ICBM" content="50.6833,5.55">
    <meta name="geo.position" content="50.7137802,6.0060589">
    <meta name="geo.region" content="BE">
    <!-- Country code (ISO 3166-1): mandatory, state code (ISO 3166-2): optional; eg. content="US" / content="US-NY" -->
    <meta name="geo.placename" content="La Calamine"><!-- eg. content="New York City" -->

    <!-- Provides information about an author or another person -->
    <link rel="me" href="mailto:lysander.hans@hotmail.com">
    <link rel="me" href="tel:0032471553304">

    <link rel="apple-touch-icon" sizes="57x57" href="<?= portfolio_get_theme_asset('assets/img/favicon/apple-icon-57x57.png'); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= portfolio_get_theme_asset('assets/img/favicon/apple-icon-60x60.png'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= portfolio_get_theme_asset('assets/img/favicon/apple-icon-72x72.png'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= portfolio_get_theme_asset('assets/img/favicon/apple-icon-76x76.png'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= portfolio_get_theme_asset('assets/img/favicon/apple-icon-114x114.png'); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= portfolio_get_theme_asset('assets/img/favicon/apple-icon-120x120.png'); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= portfolio_get_theme_asset('assets/img/favicon/apple-icon-144x144.png'); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= portfolio_get_theme_asset('assets/img/favicon/apple-icon-152x152.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= portfolio_get_theme_asset('assets/img/favicon/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= portfolio_get_theme_asset('assets/img/favicon/android-icon-192x192.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= portfolio_get_theme_asset('assets/img/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= portfolio_get_theme_asset('assets/img/favicon/favicon-96x96.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= portfolio_get_theme_asset('assets/img/favicon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?= portfolio_get_theme_asset('assets/img/favicon/manifest.json'); ?>">
    <meta name="msapplication-TileColor" content="#84146D">
    <meta name="msapplication-TileImage" content="<?= portfolio_get_theme_asset('assets/img/favicon/ms-icon-144x144.png'); ?>">
    <meta name="theme-color" content="#84146D">

    <!--stylesheets-->
    <link rel="stylesheet" href="<?= portfolio_get_theme_asset('assets/css/bundle.css'); ?>">

</head>
<body>
<header class="header">
    <a class="skip-main" href="#main">Allez au contenu principal</a>
    <h1 role="heading" aria-level="1" class="header__heading sro"><?= the_title(); ?></h1>
    <a href="<?php echo esc_url(get_permalink(get_page_by_title('Accueil'))); ?>" class="header__name">Hans Lysander</a>
    <nav class="global" role=menu aria-label="<?= __('Principale'); ?>">
        <h2 class="global__heading sro" role="heading" aria-level="2"><?= __('Navigation principale', 'portfolio'); ?></h2>
        <ul class="global__list">
            <?php foreach (portfolio_get_menu('main', 'nav__link') as $i => $link): ?>
                <li class="global__item">
                    <a href="<?= $link->url; ?>"
                        <?php if ($link->target): ?> target="<?= $link->target; ?>" rel="noopener noreferrer"<?php endif; ?>
                        <?php if ($link->current): ?> aria-current="page"<?php endif; ?>
                       class="<?php if ($link->classes): ?>
                   <?= implode('', $link->classes); ?>
                   <?php endif; ?> global__link"><?= $link->label; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>

<main class="main">