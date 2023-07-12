<?php
require_once '../models/database.php';
require_once '../models/usersModel.php';
require_once '../config.php';
//todo on create un nouvelle user dans la base de donne
if (count($_POST) > 0) {
    try {
        $user = new users;

        if (!empty($_POST['username'])) {
            if (preg_match($regex['username'], $_POST['username'])) {
                $user->username = $_POST['username'];
                if ($user->checkIfUserExists('username') > 0) {
                    $formErrors['username'] = USER_USERNAME_ERROR_ALREADY_EXISTS;
                }
            } else {
                $formErrors['username'] = USER_USERNAME_ERROR_INVALID;
            }
        } else {
            $formErrors['username'] = USER_USERNAME_ERROR_EMPTY;
        }

        if (!empty($_POST['birthdate'])) {
            if (preg_match($regex['birthdate'], $_POST['birthdate'])) {
                $date = explode('-', $_POST['birthdate']);
                if (checkdate($date[1], $date[2], $date[0])) {
                    $user->birthdate = $_POST['birthdate'];
                } else {
                    $formErrors['birthdate'] = USER_BIRTHDATE_ERROR_INVALID;
                }
            } else {
                $formErrors['birthdate'] = USER_BIRTHDATE_ERROR_INVALID;
            }
        } else {
            $formErrors['birthdate'] = USER_BIRTHDATE_ERROR_EMPTY;
        }

        if (!empty($_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $user->email = $_POST['email'];
                if ($user->checkIfUserExists('email') > 0) {
                    $formErrors['email'] = USER_EMAIL_ERROR_ALREADY_EXISTS;
                }
            } else {
                $formErrors['email'] = USER_EMAIL_ERROR_INVALID;
            }
        } else {
            $formErrors['email'] = USER_EMAIL_ERROR_EMPTY;
        }

        if (!empty($_POST['password'])) {
            if (!preg_match($regex['password'], $_POST['password'])) {
                $formErrors['password'] = USER_PASSWORD_ERROR_INVALID;
            }
        } else {
            $formErrors['password'] = USER_PASSWORD_ERROR_EMPTY;
        }

        if (!empty($_POST['passwordConfirm'])) {
            if (!isset($formErrors['password'])) {
                if ($_POST['password'] == $_POST['passwordConfirm']) {
                    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                } else {
                    $formErrors['password'] = $formErrors['passwordConfirm'] = USER_PASSWORD_ERROR_DIFFERENT_PASSWORD;
                }
            }
        } else {
            $formErrors['passwordConfirm'] = USER_PASSWORD_CONFIRM_ERROR_EMPTY;
        }

        if (count($formErrors) == 0) {
            $user->addUser();
            $form = [
                'status' => 'success',
                'message' => USER_REGISTER_SUCCESS
            ];
        }
    } catch (PDOException $e) {
        $form = [
            'status' => 'fail',
            'message' => GENERAL_ERROR
        ];
    }
}

require_once '../views/parts/header.php';
require_once '../views/register.php';
require_once '../views/parts/footer.php';
