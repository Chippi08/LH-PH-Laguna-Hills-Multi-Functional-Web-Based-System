<?php require_once('includes/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='https://npmcdn.com/flickity@2/dist/flickity.css'>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />


    <title>Laguna Hills Subdivision</title>
    <link rel="icon" type="image/x-icon" href="Images/logo-icon.png">
</head>

<body onload="Homenav()" id="top">
    <div class="pre-loading-home">
        <div class="spinner-border text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <div class="homepagenavigation">
        <!--Navigation Bar-->
        <nav class="navbar navbar-expand-lg fixed-top p-md-1">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="Images/LHPHlogo.png" class="logo">
                </a>

                <button class="navbar-toggler" type="button" onclick="toggleNavbar()">
                    <span class="navbar-toggler-icon nas"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mx-auto">
                        <ul class="navbar-nav me-auto mt-mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="#home" id="navhome" class="nav-link nas active" onclick="setActiveLink(this); Homenav()">Home</a>
                            </li>

                            <li class="nav-item">
                                <a href="#AboutUs" id="navaboutus" class="nav-link  nas" onclick="setActiveLink(this);AboutUsnav()">About Us</a>
                            </li>

                            <li class="nav-item">
                                <a href="#Amenities" id="navamenities" class="nav-link nas" onclick="setActiveLink(this);Amenitiesnav()">Amenities</a>
                            </li>

                            <li class="nav-item">
                                <a href="#PropertyFinder" class="nav-link nas" id="property-finder-page" onclick="setActiveLink(this);PropertyFindernav()">Property Finder</a>
                            </li>
                            <li class="nav-item">
                                <a href="#ContactUs" id="navcontactus" class="nav-link nas" onclick="setActiveLink(this);ContactUsnav()">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn loginbutton nas no-border" data-bs-toggle="modal" data-bs-target="#Login">Login</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav><!--END--Navigation Bar-->
    </div>

    <!-- LOGIN MODAL --><!--SHOW ON CLICK-->
    <div class="modal fade" id="Login" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="login modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="login-content justify-content-between">
                    <div class="login_banner justify-content-center d-flex forms">
                        <div class="justify-content-center align-self-center login_banner_2  d-flex flex-column ">
                            <img src="Images/LHPHlogo.png " class="d-flex align-self-center">
                            <h1 class="text-center">Welcome!</h1>
                        </div>
                    </div>
                    <div class="right_side forms  justify-content-center d-flex flex-column">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="loginend()"></button>
                        </div>
                        <div class="modal-body d-flex flex-column">
                            <h2 class="text-center mb-3" class="modal-title">Login</h2>

                            <div id="login-message" class="login-alert d-flex"></div>
                            <!-- <div class="alert alert-success alert-dismissible fade show " role="alert" id="login-messages">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>-->

                            <form class="login_form">
                                <div class="form_input ">
                                    <div class="login_input_field mb-4">
                                        <label for="Email" class="mb-2"></i>Email/Username</label>
                                        <div class="">
                                            <input class="form-control" id="login_emailusername" name="login_emailusername">
                                        </div>
                                    </div>
                                </div>
                                <div class=" login_input_field ">
                                    <label for="Password" class="mb-2">Password</label>

                                    <input class="form-control" type="password" placeholder="*********" name="login_password" id="login_password">
                                    <i class=" toggle-iconsh bx bxs-show fs-2" id="toggle-icon" onclick="togglePassword()"></i>

                                    <a class="d-flex justify-content-end mb-2 resend_btn" id="forgotpass" data-bs-toggle="modal" data-bs-target="#FORGOTMODAL" onclick="forgotend()">Forgot
                                        Password?</a>
                                </div>
                                <div class=" login_button_area d-flex justify-content-center">

                                    <button class="btn-submit4 btn-submit-5" name="Login_button" id="Login_button" type="button" onclick="login_function()">
                                        <div class="btn-submit-6" onclick="login_function()">
                                            <p class='bx-fw bx bx-log-in'></p>
                                        </div>
                                        <a class="text-white" onclick="login_function()">Log in</a>
                                    </button>
                                </div>
                                <p class="text-center" hidden> Don't have an account?<a href="Account-Request.php" class="text-center resend_btn">Click here</a></p>
                                <p class="text-center mb-auto"> Homeowners can request an account via <a href="#ContactUs" class="text-center dark-green resend_btn" onclick="activateNav('navcontactus');ContactUsnav();">Contact Us</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END--LOGIN MODAL -->

    <!-- FORGOT PASSWORD --><!--SHOW ON CLICK-->
    <div class="modal fade" id="FORGOTMODAL" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="right_side ">
                    <div class="modal-header justify-content-center login_input_field ">
                        <i class='bx bx-caret-left dark-green resend_btn d-inline'><a class="d-inline dark-green resend_btn"onclick="loginend()">Back to Login</a></i>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-0 d-flex flex-column justify-content-center" id="modal-body-change">

                        <h2 class="text-center" class="modal-title">Forgot Password</h2>
                        <div id="loading" style="display: none;">Loading...</div>
                        <div id="forgot_errors" class="text-center mb-4 error-divs text-white success">Enter your username or email.</div>

                        <form class="forgot_form">

                            <div class="form_input mb-auto">


                                <div class="login_input_field">

                                    <div class="">
                                        <input class="form-control mb-2" id="forgot_emailusername" name="forgot_emailusername" placeholder="Email/Username">


                                    </div>
                                    <div id="verify-input"></div>
                                </div>
                            </div>
                            <div class=" login_button_area d-flex justify-content-center">
                                <button class="btn-submit4 btn-submit-5" name="sending_button" id="sending_button" type="button" onclick="sending_function()">
                                    <span class="btn-submit-6">
                                        <p class='bx-fw bx bxs-send'></p>
                                    </span>
                                    <a class="text-white">Submit</a>
                                </button>
                            </div>
                        </form>
                        <div class="justify-content-center lh-1 border-0 p-0 pb-3">
                            <p class="text-center mb-auto" hidden> Don't have an account?<a href="Account-Request.php" class="text-center dark-green resend_btn">Click here</a></p>
                            <p class="text-center mb-auto"> Homeowners can request an account via <a href="#ContactUs" class="text-center dark-green resend_btn" onclick="activateNav('navcontactus');ContactUsnav();">Contact Us</a></p>
                            <p class="text-center mb-auto"> If you encountered a problem, please <a href="#ContactUs" class="text-center dark-green resend_btn" onclick="activateNav('navcontactus');ContactUsnav();">Contact Us</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END--FORGOT MODAL -->

    <!--CONTACT SUCCESS MODAL-->
    <div class="modal fade" id="CONTACTMODAL" tabindex="-1" aria-labelledby="ContactLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="right_side ">
                    <div class="modal-header justify-content-center login_input_field ">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ps-5 pe-5 d-flex flex-column justify-content-center align-items-center" id="modal-body-changed">
                        <p class=" bx bxs-check-circle"></p>
                        <h3 class="text-center modal-title mb-5 lh-1">Thank you for reaching out!</h3>
                        <p>We will respond to you as soon as possible.</p>
                        <div class="justify-content-center lh-1 border-0 p-0 pb-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loginend(){
    $("#FORGOTMODAL").modal("hide");
    $("#Login").modal("show");
}
function forgotend(){
    $("#FORGOTMODAL").modal("show");
    $("#Login").modal("hide");
}
        function setActiveLink(element) {
            var navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function(link) {
                link.classList.remove('active');
                link.parentNode.classList.remove('active');
            });

            element.classList.add('active');
            element.parentNode.classList.add('active');
        }

        function setButtonActiveLink(buttonId) {
            var navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function(link) {
                link.classList.remove('active');
                link.parentNode.classList.remove('active');
            });

            var buttonElement = document.getElementById(buttonId);
            var correspondingNavLink = document.querySelector('a[href="#' + buttonId + '"]');

            if (buttonElement && correspondingNavLink) {
                buttonElement.classList.add('active');
                correspondingNavLink.classList.add('active');
                correspondingNavLink.parentNode.classList.add('active');
            }
        }
    </script>
    <script>
        function Homenav() { //
            $.ajax({
                url: "home.php",
                method: "post",
                data: {
                    record: 1
                },
                success: function(data) {
                    $('.HomeContents').html(data);
                }
            });
        }

        function AboutUsnav() { //
            $.ajax({
                url: "AboutUs.php",
                method: "post",
                data: {
                    record: 1
                },
                success: function(data) {
                    $('.HomeContents').html(data);
                }
            });
        }

        function Amenitiesnav() { //
            $.ajax({
                url: "Amenities.php",
                method: "post",
                data: {
                    record: 1
                },
                success: function(data) {
                    $('.HomeContents').html(data);
                }
            });
        }

        function PropertyFindernav() { //
            $.ajax({
                url: "PropertyFinder.php",
                method: "post",
                data: {
                    record: 1
                },
                success: function(data) {
                    $('.HomeContents').html(data);
                }
            });
        }

        function ContactUsnav() { //
            $.ajax({
                url: "ContactUs.php",
                method: "post",
                data: {
                    record: 1
                },
                success: function(data) {
                    $('.HomeContents').html(data);
                }
            });
        }

        //LOGIN FUNCTION

        function login_function() {
            $(document).on('click', '#Login_button', function() {
                var emailusername = $('#login_emailusername').val();
                var password = $('#login_password').val();

                $.ajax({
                    url: 'includes/Act-login.php',
                    method: 'post',
                    data: {
                        EU: emailusername,
                        PASS: password
                    },
                    success: function(data) {
                        $('#login-message').html(data);
                        $('#Login').modal("show");
                        $('form').trigger('reset');
                    }
                })
                $('form').trigger('reset');
            })

            $(document).on('click', '#btn_close', function() {
                $('form').trigger('reset');
                $('#message').html('');
            })
        }

        function togglePassword() {
            var passwordInput = document.getElementById("login_password");
            var toggleIcon = document.getElementById("toggle-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("bxs-show");
                toggleIcon.classList.add("bxs-hide");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("bxs-hide");
                toggleIcon.classList.add("bxs-show");
            }
        }

        //FORGOT PASSWORD FUNCTION
  
        function sending_function() {
            var email = $("#forgot_emailusername").val();
            if (email == "") {
                $("#forgot_errors").html("Email field is required").addClass("error");

            } else {
                $.ajax({
                    type: "POST",
                    url: "includes/Act-show.php",
                    data: {
                        email: email
                    },
                }).done(function(response) {
                    $("#forgot_errors").html(response);
                    var forgotError = document.getElementById("forgot_errors");

                    if (response === "A one time password was sent to your email") {
                        forgotError.classList.remove("error");
                        forgotError.classList.add("success");

                        $("#verify-input").html("<input class='form-control' type='text' id='verification_code' placeholder='Enter the otp code'/>" +
                            "<br>" +
                            "<a  class='resend_btn text-center d-flex justify-content-center' onclick='resend_function()'>Send another code</a>");

                        $("#sending_button").replaceWith(' <button class="btn-submit4 btn-submit-5" name="verify_button" id="verify_button" type="button" onclick="verify_function()"">' + '<span class="btn-submit-6">' + '<p class="bx-fw bx bxs-send"></p>' + '</span>' + '<a class="text-white">Verify</a>' + '</button>');
                    } else if (response === "An error occured while generating the code" || "An error occured while generating the code" || "The email or username you entered does not exists in our record") {
                        forgotError.classList.remove("success");
                        forgotError.classList.add("error");
                    } else {
                        $("#forgot_errors").html("We encountered a problem try again later").addClass("error");
                    }

                });
            }
        }

    function resend_function() {
    var email = $("#forgot_emailusername").val();
    if (email == "") {
    $("#forgot_errors").html("Email field is required").addClass("error");
} else {
    $.ajax({
        type: "POST",
        url: "includes/Act-showre.php",
        data: {
            email: email
        }
    }).done(function(response) {
        $('#forgot_errors').html(response);
        var forgotError = document.getElementById("forgot_errors");
        if (response === "A one time password was sent to your email") {
            forgotError.classList.remove("error");
            forgotError.classList.add("success");
        } else if (response === "An error occurred while generating the code" || response === "The email or username you entered does not exist in our records") {
            forgotError.classList.remove("success");
            forgotError.classList.add("error");
        } else {
            $("#forgot_errors").html("We encountered a problem. Please try again later '" + response + "'").addClass("error");
        }
    });
}
}


        function verify_function() {
            var veremail = $("#forgot_emailusername").val();
            var vercode = $("#verification_code").val();
            if (vercode == "" || veremail == "") {
                $("#forgot_errors").html("Please enter the code").addClass("error");
            } else {
                $.ajax({
                    type: "POST",
                    url: "includes/Act-verify.php",
                    data: {
                        VerifyEmail: veremail,
                        VerifyCode: vercode
                    },
                    success: function(data) {
                        $('#forgot_errors').html(data);

                        var forgotError = document.getElementById("forgot_errors");

                        if (data.includes("Verification successful. Please wait while you are redirected to a page where you can change your password.")) {
                            forgotError.classList.remove("error");
                            forgotError.classList.add("success");
                            $("#modal-body-change").replaceWith('<div class="modal-body ps-5 pe-5 d-flex flex-column justify-content-center align-items-center" id="modal-body-changed">' + '<p class=" bx bxs-check-circle"></p>' + '<h3 class="text-center modal-title mb-5 lh-1" >Verification successful. Please wait while you are redirected to a page where you can change your password.</h3>' + '<div class="justify-content-center lh-1 border-0 p-0 pb-3">' + '<p class="text-center mb-auto"> If you encountered a problem, please <a href="ContactUs.php" class="text-center  dark-green text-reset">Contact Us</a></p>' + '</div>' + '</div>'); // Show the loading dots
                            var loading = document.getElementById("loading");
                            loading.style.display = "block";
                            // Hide the loading dots
                            //  loading.style.display = "none";
                        } else if (data === "You've entered incorrect code!" || data === "Direct access not allowed." || data === "An error occured while sending the email." || data === "An error occured when generating the code." || data === "The email or userame you entered does not exists in our record") {
                            forgotError.classList.add("error");
                            forgotError.classList.remove("success");
                        }
                    }
                });
            }
        }

        function send_contacts() {
            event.preventDefault();
            var form = document.querySelector("#cont");
            if (form.checkValidity() === false) {
                event.stopPropagation();
            }
            form.classList.add("was-validated");

            if (form.checkValidity() === true) {
                var Fullname = $("#Fullnameinput").val();
                var Email = $("#Emailinput").val();
                var Number = $("#Numberinput").val();
                var Subject = $("#Subjectinput").val();
                var Messages = $("#Messages").val();
                // Use jQuery's post method to send data to server
                $.post("includes/Act-Contact.php", {
                    Fullname: Fullname,
                    Email: Email,
                    Number: Number,
                    Subject: Subject,
                    Messages: Messages
                }, function(data) {
                    $('#CONTACTMODAL').modal('show');
                    form.reset();
                    form.classList.remove("was-validated");
                });
            }
        }
    </script>