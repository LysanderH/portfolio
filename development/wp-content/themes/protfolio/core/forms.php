<?php
add_action('init', 'portfolio_start_session', 1);
add_action('admin_post_portfolio_custom_form_treatment', 'portfolio_handleForm');
add_action('admin_post_nopriv_portfolio_custom_form_treatment', 'portfolio_handleForm');

function portfolio_start_session()
{
    if (session_id()) return;
    session_start();

}

function portfolio_handleForm()
{

    $nonce = $_POST['_wpnonce'] ?? null;
    $action = $_POST['action'] ?? null;

    if (!wp_verify_nonce($nonce, 'portfolio_custom_form')) {
        return false;
    }

    $name = sanitize_text_field($_POST['portfolio_name']);
    $mail = sanitize_text_field($_POST['portfolio_mail']);
    $subject = sanitize_text_field($_POST['portfolio_subject']);
    $message = sanitize_text_field($_POST['portfolio_content']);
    $dataProcessing = $_POST['portfolio_data_processing'];
    $errors = [];
    if (!strlen($name)) {
        $errors['errors']['name'] = __('Veuillez renseigner votre nom.', 'portfolio');
    } else {
        $errors['good']['trueName'] = $name;
    }

    if (!strlen($message)) {
        $errors['errors']['message'] = __('Veuillez à écrire un message.', 'portfolio');
    } else {
        $errors['good']['trueMessage'] = $message;
    }

    if (!strlen($subject)) {
        $errors['errors']['subject'] = __('Veuillez à remplir ce champs avec le sujet de votre message.', 'portfolio');
    } else {
        $errors['good']['trueSubject'] = $subject;
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['errors']['mail'] = __('Veuillez respecter le format du courriel (example@domaine.be).', 'portfolio');
    } else {
        $errors['good']['trueMail'] = $mail;
    }

    if (!isset($dataProcessing) && !in_array('portfolio-data-check', $dataProcessing)) {
        $errors['errors']['dataProcessing'] = __('Veuillez cocher cette case pour donner votre accord que vos données soient utilisées pour envoyer ce message.', 'portfolio');
    } else {
        $errors['good']['trueProcessingData'] = true;
    }

    if ($errors['errors']) {
        return portfolio_formRedirectFeedback($action, $errors);
    }

    $content = 'Un nouveau message est arrivé :' . PHP_EOL;
    $content .= 'Nom : ' . $name . PHP_EOL;
    $content .= 'Mail : ' . $mail . PHP_EOL;
    $content .= 'Sujet : ' . $subject . PHP_EOL;
    $content .= 'Message :' . PHP_EOL;
    $content .= $message;

    if (wp_mail('lysander.hans@hotmail.com', 'Contact de Lysanderhans.com', $content)) {
        return portfolio_formRedirectFeedback($action, [
            'success' => true,
            'sendMessage' => __('Merci ! Votre message a été envoyé.', 'portfolio')
        ]);
    }

    portfolio_formRedirectFeedback($action, [
        'success' => false,
        'sendMessage' => __('Woups, quelque chose n’a pas fonctionner', 'portfolio')
    ]);
}

function portfolio_formRedirectFeedback($action, $feedback)
{
    $url = wp_get_referer();

    $_SESSION['feedback_' . $action] = $feedback;

    wp_safe_redirect($url);

    exit;
}

function portfolio_formFeedback($action)
{
    if (!isset($_SESSION['feedback_' . $action])) {
        return false;
    }
    $feedback = $_SESSION['feedback_' . $action];
    unset($_SESSION['feedback_' . $action]);
    return $feedback;
}