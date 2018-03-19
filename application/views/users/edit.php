<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <title>update user</title>
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
        <form action="" method="post" accept-charset="utf-8" id="update">
           <fieldset>
              <legend>update user</legend>
              <div><label>username: </label><input type="text" name="username" value="<?=$info[0]->username?>" size="25"  /></div>
              <br />
              <div><label>Password: </label><input type="password" name="password" value="" size="25"  /></div>
              <br />
              <input type="submit" name="ok" value="update"  />
           </fieldset>
        </form>
        <script type="text/javascript">
        $(document).ready(function(){
                $('#update').validate({
                    rules:{
                        username:{
                            required:true,
                            minlength:6,
                            maxlength:10
                        },
                        password:{
                            required:true,
                            minlength:6,
                            maxlength:10
                        },
                    },
                    messages:{
                        username:{
                            required:"vui lòng nhập username",
                            minlength:"Enter at least 6 characters",
                            maxlength:"Enter no more than 10 characters"
                        },
                        password:{
                            required:"vui lòng nhập password",
                            minlength:"Enter at least 6 characters",
                            maxlength:"Enter no more than 10 characters"
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