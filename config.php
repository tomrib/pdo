<?php
$regex = [
    'name' => '/^[A-Za-z\- áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ]{1,20}$/',
    'username' => '/^[A-Za-z0-9\-_]{3,20}$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
    'date' => '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',
    'content' => '/(<script>)/',
];

$mime_types = array(
    'png' => 'image/png',
    'jpeg' => 'image/jpeg',
    'jpg' => 'image/jpeg',
    'gif' => 'image/gif',
);

$formErrors = [];

define('GENERAL_ERROR', 'Une erreur est survenue, veuillez réessayer. Si le problème persiste, merci de <a href="mailto:boitemailbidon@mailbidon.fr">nous contacter</a>.');

define('USER_USERNAME_ERROR_EMPTY', 'Le nom d\'utilisateur est obligatoire.');
define('USER_USERNAME_ERROR_INVALID', 'Le nom d\'utilisateur ne peut comporter que des lettres en majuscule et minuscule, des chiffres, des tirets et des underscores.');
define('USER_USERNAME_ERROR_ALREADY_EXISTS', 'Ce nom d\'utilisateur existe déjà.');

define('USER_BIRTHDATE_ERROR_EMPTY', 'La date de naissance est obligatoire.');
define('USER_BIRTHDATE_ERROR_INVALID', 'La date de naissance doit être au format jj/mm/aaaa.');

define('USER_EMAIL_ERROR_EMPTY', 'L\'adresse mail est obligatoire.');
define('USER_EMAIL_ERROR_INVALID', 'L\'adresse mail ne peut comporter que des lettres non accentués, des chiffres, des tirets et des underscores');
define('USER_EMAIL_ERROR_ALREADY_EXISTS', 'Cette adresse mail est déjà utilisée.');

define('USER_PASSWORD_ERROR_EMPTY', 'Le mot de passe est obligatoire.');
define('USER_PASSWORD_ERROR_INVALID', 'Le mot de passe doit comporter au moins lettre en minuscule, une lettre en majuscule, un chiffre, un caractère spécial et au moins 8 caractères.');
define('USER_PASSWORD_CONFIRM_ERROR_EMPTY', 'La confirmation du mot de passe est obligatoire.');
define('USER_PASSWORD_ERROR_DIFFERENT_PASSWORD', 'Les mots de passes sont différents.');

define('USER_REGISTER_SUCCESS', 'Votre compte a été créé. Vous pouvez dès maintenant <a href="/connexion">vous connecter</a>.');
define('USER_LOGIN_ERROR', 'Le nom d\'utilisateur ou le mot de passe est incorrect.');

define('USER_POST_SUCCES','votre post à bien été envoyé');

define('USER_POST_ERROR_TITLE','Le titre est obligatoire');
define('USER_POST_ERROR_INVALID','Le titre ne peut comporter que des lettres en majuscule et minuscule, des chiffres, des tirets et des underscores.');

define('USER_POST_ERROR_CONTENT','votre article est obligatoire');
define('USER_POST_ERROR_INVALID_CONTENT','L article ne peut comporter que des lettres en majuscule et minuscule, des chiffres, des tirets et des underscores.');

define('USER_POST_ERROR_TYPE','La categorie est obligatoire');
define('USER_POST_ERROR_INVALID_TYPE','La categorie nes pas valible');

define('USER_POST_ERROR','L\'image est obligatoire');
define('USER_POST_ERROR_IMAGE','L\'image et trop volumine 20MO');
define('USER_POST_ERROR_INVALID_IMAGE','L\'image nes pas conforme');

define('USER_POST_ERROR_COMMENTS','L article ne peut comporter que des lettres en majuscule et minuscule, des chiffres, des tirets et des underscores.');