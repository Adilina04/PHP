<?php
$error_Msg = $err_Fullname = $err_Email = $err_Phone = $err_Password = $err_Conf_Password =
    '';
$user_Ok = $email_Ok = $phone_Ok = $pass_Ok = $conf_Pass_Ok = $iban_Ok = 0;

function generate_french_iban()
{
    $check_digits = sprintf('%02d', mt_rand(0, 98));
    $bank_code = sprintf('%010d', mt_rand(0, 9999999999));
    $account_number = sprintf('%011d', mt_rand(0, 99999999999));
    $iban = 'FR' . $check_digits . $bank_code . $account_number;
    return $iban;
}

if (isset($_SESSION[''])) {
    header('location:login.php');
} else {
    if (isset($_POST['subm_user'])) {
        if (
            !isset(
                $_POST['fullname'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['password']
            ) &&
            empty(
                $_POST['fullname'] ||
                    empty($_POST['email']) ||
                    empty($_POST['phone']) ||
                    empty($_POST['password'])
            )
        ) {
            $error_Msg = 'Champ Obligatoire*';
        } else {
            $fullname = trim($_POST['fullname']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $password = $_POST['password'];
            $conf_Password = $_POST['conf_password'];
            //-----------------Password regex----------------------
            if (strlen($password) < 8 || strlen($password) > 16) {
                $err_password =
                    'Password should be min 8 characters and max 16 characters';
            }
            if (!preg_match('/\d/', $password)) {
                $err_password = 'Password should contain at least one digit';
            }
            if (!preg_match('/[A-Z]/', $password)) {
                $err_password =
                    'Password should contain at least one Capital Letter';
            }
            if (!preg_match('/[a-z]/', $password)) {
                $err_password =
                    'Password should contain at least one small Letter';
            }
            if (!preg_match('/\W/', $password)) {
                $err_password =
                    'Password should contain at least one special character';
            }
            if (preg_match('/\s/', $password)) {
                $err_password = 'Password should not contain any white space';
            }
            if ($err_Password) {
                $pass_Ok = 1;
            } else {
                $pass_Ok = 2;
            }
            if (empty($_POST['conf_password'])) {
                $err_Conf_Password = 'Confirm password is required';
                $conf_Pass_Ok = 1;
            } elseif ($_POST['password'] == $_POST['conf_password']) {
                $conf_Pass_Ok = 2;
            } else {
                $err_Conf_Password = 'password is different';
                $conf_Pass_Ok = 1;
            }
            //-----------------fullname check---------------------------
            if (empty($_POST['fullname'])) {
                $err_Fullname = 'Fullname is required';
            }
            if ($err_Fullname) {
                $user_Ok = 1;
            } else {
                $user_Ok = 2;
            }
            //-----------------email check----------------------------
            if (empty($_POST['email'])) {
                $err_Email = 'Email is required';
                $email_Ok = 1;
            } else {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $check_Email = $dbManager->select('SELECT mail FROM users ')
                    if(){
                        $email_Ok = 2;
                    }
                } else {
                    $err_Email = 'Email is not valid';
                    $email_Ok = 1;
                }
            }
            //-----------------Phone check----------------------------
            if (empty($_POST['phone'])) {
                $err_Phone = 'phone is required';
                $phone_Ok = 1;
            }
            if (
                !preg_match(
                    '/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/',
                    $phone
                )
            ) {
                $err_Phone = 'Phone number is invalid';
                $phone_Ok = 1;
            } else {
                $phone_Ok = 2;
            }

            //-----------------insert into DB-------------------------
            if (
                $user_Ok == 2 &&
                $email_Ok == 2 &&
                $phone_Ok == 2 &&
                $pass_Ok == 2 &&
                $conf_Pass_Ok == 2
            ) {
                //-----------------Iban generation------------------------
                $iban_number = generate_french_iban();
                if ($iban_number) {
                    $iban_Ok = 2;
                } else {
                    $iban_Ok = 1;
                }
                //------------------Insert DB-------------------------------
                $userInsert = $dbManager->insert(
                    'INSERT INTO users(fullname, mail, phone, password, iban, id_roles) VALUES(?,?,?,?,?,?)',
                    [
                        $fullname,
                        $email,
                        $phone,
                        hash('sha256', $password),
                        $iban_number,
                        1,
                    ]
                );
            }
        }
    }
}
?>
