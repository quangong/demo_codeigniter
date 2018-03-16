<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="/application/views/jquery-3.1.1.min.js" ></script>
        <script type="text/javascript" src="/application/views/jquery.validate.js" ></script>
     </head>
    <body>
        <form method="POST" action="" id="login">
            <div>Username : <input type="text" name="username" value=""/> <br/></div>
            <div class="error"></div>
            <div>Password : <input type="password" name="password" value=""/> <br/>
            <input type="submit" name="submit_login" value="Login"/></div>
        </form>
        <script type="text/javascript">
        $(document).ready(function(){
                $('#login').validate({
                    rules:{
                        username:{
                            required:true,
                        },
                        password:{
                            required:true,
                        },
                    },
                    messages:{
                        username:{
                            required:"vui lòng nhập username",
                        },
                        password:{
                            required:"vui lòng nhập password",
                        },
                    }
                });
            });
        </script>
        <style>
            .error{
                color:red;
                font-weight:bold;
            }
        </style>
    </body>
</html>