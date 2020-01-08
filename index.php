<?php session_start();
if (isset($_SESSION['idUser']) && $_SESSION['idUser'] != '' && isset($_SESSION['username']) && $_SESSION['username'] != '') {
    header('location: getData.php');
} ?>
<!doctype html>
<!--[if lte IE 9]>
<html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">
    <title>AKUH - PHC DHIS - Login Page</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <!-- uikit -->
    <link rel="stylesheet" href="assets/bower_components/uikit/css/uikit.almost-flat.min.css"/>
    <!-- altair admin login page -->
    <link rel="stylesheet" href="assets/css/login_page.min.css"/>

</head>
<body class="login_page">

<div class="login_page_wrapper">
    <div class="md-card" id="login_card">
        <div class="md-card-content large-padding" id="login_form">
            <div class="login_heading">
                <h2>PHC - DHIS</h2>
            </div>
            <form>
                <div id="msg" style="display: none;" class="uk-alert" data-uk-alert>
                    <a href="javascript:void(0)" class="uk-alert-close uk-close"></a>
                    <p id="msgText"></p>
                </div>
                <div class="uk-form-row">
                    <label for="login_username">Username</label>
                    <input class="md-input" type="text" id="login_username" name="login_username"/>
                </div>
                <div class="uk-form-row">
                    <label for="login_password">Password</label>
                    <input class="md-input" type="password" id="login_password" name="login_password"/>
                </div>
                <div class="uk-margin-medium-top">
                    <a href="javascript:void(0)" onclick="getLogin()"
                       class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</a>
                </div>
                <div class="uk-margin-top">
                    <a href="#" id="login_help_show" class="uk-float-right">Need help?</a>
                    <span class="icheck-inline">
                            <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed"
                                   data-md-icheck/>
                            <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
                        </span>
                </div>
            </form>
        </div>
        <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
            <button type="button"
                    class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
            <h2 class="heading_b uk-text-success">Can't log in?</h2>
            <p>Here’s the info to get you back in to your account as quickly as possible.</p>
            <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps
                Lock is turned off, and that your username is spelled correctly, and then try again.</p>
            <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">reset your
                    password</a>.</p>
        </div>
        <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
            <button type="button"
                    class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
            <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
            <form>
                <div class="uk-form-row">
                    <label for="login_email_reset">Your email address</label>
                    <input class="md-input" type="text" id="login_email_reset" name="login_email_reset"/>
                </div>
                <div class="uk-margin-medium-top">
                    <a href="javascript:void(0)" class="md-btn md-btn-primary md-btn-block">Reset password</a>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- common functions -->
<script src="assets/js/common.min.js"></script>
<!-- uikit functions -->
<script src="assets/js/uikit_custom.min.js"></script>
<!-- altair core functions -->
<script src="assets/js/altair_admin_common.min.js"></script>
<!-- altair login page functions -->
<script src="assets/js/pages/login.min.js"></script>
<script src="assets/js/core.js"></script>
<script>
    function getLogin() {
        $('#msg').removeClass('uk-alert-danger').removeClass('uk-alert-success');
        var errorFlag = 0;
        $('#login_username').removeClass('error');
        $('#login_password').removeClass('error');
        var data = {};
        data['UserName'] = $('#login_username').val();
        data['Password'] = $('#login_password').val();
        if (data['UserName'] == '' || data['UserName'] == undefined) {
            $('#login_username').addClass('error');
            errorFlag = 1;
            returnMsg('msgText', 'Invalid User Name', 'uk-alert-danger', 'msg');
            return false;
        }
        if (data['Password'] == '' || data['Password'] == undefined) {
            $('#login_password').addClass('error');
            returnMsg('msgText', 'Invalid Password', 'uk-alert-danger', 'msg');
            errorFlag = 1;
            return false;
        }
        if (errorFlag === 0) {
            CallAjax('login.php', data, 'POST', function (res) {
                if (res == 1) {
                    setTimeout(function () {
                        window.location.href = "getData.php";
                    }, 2000);
                    returnMsg('msgText', 'Success', 'uk-alert-success', 'msg');
                } else if (res == 2) {
                    $('#login_password').addClass('error');
                    returnMsg('msgText', 'Invalid Password', 'uk-alert-danger', 'msg');
                } else {
                    $('#login_username').addClass('error');
                    $('#login_password').addClass('error');
                    returnMsg('msgText', 'Invalid Username/Password', 'uk-alert-danger', 'msg');
                }
            });
        }
    }
</script>

</html>