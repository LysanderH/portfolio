<?php /* Template Name: contact */
$feedback = portfolio_formFeedback('portfolio_custom_form_treatment');
?>
<?php get_header(); ?>
    <section class="contact">
        <h2 class="contact__heading" role="heading" aria-level="2"><?= __('Contact', 'portfolio'); ?></h2>
        <form action="<?= admin_url('admin-post.php'); ?>" method="post" class="contact__form" role="form"
              aria-label="<?= __('Contact', 'portfolio'); ?>">
            <fieldset>
                <legend class="contact__legend sro"><?= __('Vos informations', 'portfolio'); ?></legend>

                <label for="name" class="contact__label"><?= __('Nom', 'portfolio'); ?></label>
                <input type="text" id="name" class="contact__input contact__input--text" name="portfolio_name"
                       placeholder="Max Mustermann" value="<?= $feedback['good']['trueName']; ?>">
                <?php if ($feedback['errors']['name']): ?>
                    <label for="name" class="contact__error"><?= $feedback['errors']['name']; ?></label>
                <?php endif; ?>

                <label for="mail" class="contact__label"><?= __('Adresse mail', 'portfolio'); ?></label>
                <input type="email" name="portfolio_mail" id="mail" class="contact__input contact__input--mail"
                       placeholder="example@mail.com" value="<?= $feedback['good']['trueMail']; ?>">
                <?php if ($feedback['errors']['mail']): ?>
                    <label for="name" class="contact__error"><?= $feedback['errors']['mail']; ?></label>
                <?php endif; ?>

                <label for="subject" class="contact__label"><?= __('Sujet', 'portfolio'); ?></label>
                <input type="text" name="portfolio_subject" id="subject" class="contact__input contact__input--subject"
                       placeholder="<?= __('Sujet', 'portfolio'); ?>" value="<?= $feedback['good']['trueSubject']; ?>">
                <?php if ($feedback['errors']['subject']): ?>
                    <label for="name" class="contact__error"><?= $feedback['errors']['subject']; ?></label>
                <?php endif; ?>

                <label for="content" class="contact__label"><?= __('Votre message', 'portfolio'); ?></label>
                <textarea name="portfolio_content" id="content" cols="30" rows="10"
                          placeholder="<?= __('Votre message ici', 'portfolio'); ?>"><?= $feedback['good']['trueMessage']; ?></textarea>
                <?php if ($feedback['errors']['message']): ?>
                    <label for="name" class="contact__error"><?= $feedback['errors']['message']; ?></label>
                <?php endif; ?>

                <label for="contact-checkbox"
                       class="contact__label"><?= __('Je suis d’accord que mes données soient utilisées pour l’envoi de ce message.', 'portfolio'); ?></label>
                <input type="checkbox" name="portfolio_data_processing[]" class="contact__checkbox"
                       id="contact-checkbox"
                       value="portfolio-data-check" <?= $feedback['good']['trueProcessingData'] ? 'checked' : ''; ?>>
                <?php if ($feedback['errors']['dataProcessing']): ?>
                    <label for="name" class="contact__error"><?= $feedback['errors']['dataProcessing']; ?></label>
                <?php endif; ?>

                <input type="hidden" name="_wpnonce" value="<?= wp_create_nonce('portfolio_custom_form'); ?>">
                <input type="hidden" name="action" value="portfolio_custom_form_treatment">
                <input type="submit" value="<?= __('Envoyer', 'portfolio'); ?>">
            </fieldset>
        </form>
        <?php if ($feedback['sendMessage']): ?>
            <p class="contact__<?= $feedback['success']?'success':'error'; ?>-message"><?= $feedback['sendMessage']; ?></p>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>