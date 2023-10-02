
<html>
    <head>
        <title>Password validte</title>
        <!--<script src="/my_project/js/jquery-3.4.1.min.js"></script>
        <script src="/my_project/js/jquery.validate.min.js"></script>-->

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    </head>
<body>
    <form name="form-validate-name" method="post" action="#" id="form-validate">
        Password:<br>
        <input type="text" name="password" id="password"><br>
        confirm password:<br>
        <input type="text" name="Confirm_password" id="Confirm_password"><br><br>
        <input type="submit" name="submit">
    </form>
</body>
    <script>
        /*jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });*/


        $("#form-validate").validate({ // initialize the plugin
            rules: {
                password: {
                    required: true,
                    minlength: 5

                } ,

                Confirm_password: {
                    equalTo: "#password"
                }

            },
            messages: {
                password: {
                    required: "Inserire una password",
                    minlength: "La password deve contenere almeno 5 caratteri"
                },
                Confirm_password: {
                    equalTo: "Le due password devono coincidere"
                }
            }


            /*rules: {
                password: {
                    required: true,
                },
                Confirm_password: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: {
                    required: "password",
                },
                Confirm_password: {
                    equalTo: "Password Not Metch"
                }
            }*/

            /*rules: {
                password: "required",
                Confirm_password: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: " Enter Password",
                Confirm_password: {
                    equalTo: "Enter Confirm Password Same as Password"
                }
            }*/

            /*rules: {
                password: "required",
                Confirm_password: {
                    equalTo: "#password"
                }
            }*/

            /*rules: {
                password: "required",
                Confirm_password: {
                    equalTo: "#password"
                }
            },
            Confirm_password: {
                password: " Enter Password",
                Confirm_password: " Enter Confirm Password Same as Password"
            },*/

        });
    </script>
</html>


<!--<html>

<head>
    <title> Password and Confirm Password Validation Using Jquery </title>
    <script type="text/javascript" src="https://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
    <script type="text/javascript" src="https://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>
    <script>
        function validatePassword() {
            var validator = $("#loginForm").validate({
                rules: {
                    password: "required",
                    confirmpassword: {
                        equalTo: "#password"
                    }
                },
                messages: {
                    password: " Enter Password",
                    confirmpassword: " Enter Confirm Password Same as Password"
                }
            });
            if (validator.form()) {
                alert('Sucess');
            }
        }

    </script>
</head>

<body>
<form method="post" id="loginForm" name="loginForm">
    <table cellpadding="0" border="1">
        <tr>
            <td>Password</td>
            <td><input tabindex="1" size="40" type="password" name="password" id="password" /></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><input tabindex="1" size="40" type="password" name="confirmpassword" id="confirmpassword" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input tabindex="3" type="button" value="Submit" onClick="validatePassword();" /></td>
        </tr>
    </table>
</form>
</body>

</html>-->
