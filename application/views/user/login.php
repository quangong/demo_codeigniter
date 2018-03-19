<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="/application/views/jquery-3.1.1.min.js" ></script>
        <script type="text/javascript" src="/application/views/jquery.validate.js" ></script>
        <style type="text/css" media="screen">
            form{
                width: 600px;
            }
        </style>
     </head>
    <body>
        <b style="color:red"><?= $this->session->flashdata('mess')?></b>
        <form action="" method="post" accept-charset="utf-8" id="login">
           <fieldset>
              <legend>Login</legend>
                <div>
                    <label>username: </label>
                    <input type="text" name="username" value="" size="25"  />
                </div>
                <br>
                <div>
                    <label>Password: </label>
                    <input type="password" name="password" value="" size="25"  />
                </div>
                <br>
                <input type="submit" name="ok" value="login"  />
           </fieldset>
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