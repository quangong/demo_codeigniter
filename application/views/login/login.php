<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="<?php echo base_url()?>application/views/login/css/style.css">
  <script type="text/javascript" src="/application/views/login/js/jquery-3.1.1.min.js" ></script>
  <script type="text/javascript" src="/application/views/login/js/jquery.validate.js" ></script>
</head>
<body>
  <div class="login-page">
    <div class="form">
      <b style="color:red"><?= $this->session->flashdata('mess')?></b>
      <form class="login-form" method="post" ">
        <input type="text" placeholder="username" name="username" />
        <input type="password" placeholder="password" name="password" />
        <button type="submit">login</button>
      </form>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.login-form').validate({
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
