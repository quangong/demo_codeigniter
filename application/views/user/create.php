<div class="container layout-right">
  <div class="row">
      <h1 class="page-header">Create User</h1>
      <b style="color: red"><?php echo $this->session->flashdata('mess')?></b>
    <form style="width: 600px; float: right" method="post" class="create-form">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      </div>
      <div class="form-group">
        <label for="fullname">Fullname:</label>
        <input type="text" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname">
      </div>
      <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
      </div>
      <button type="submit">Create</button>
    </form>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.create-form').validate({
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
            fullname:{
              required:true,
              maxlength:20
            },
            phone:{
              required:true,
              minlength:10,
              maxlength:11
            }
          },
          messages:{
            username:{
              required:"Please enter username",
              minlength:"Enter at least 6 characters",
              maxlength:"Enter no more than 10 characters"
            },
            password:{
              required:"Please enter password",
              minlength:"Enter at least 6 characters",
              maxlength:"Enter no more than 10 characters"
            },
            fullname:{
              required:"Please enter fullname",
              maxlength:"Enter no more than 20 characters"
            },
            phone:{
              required:"Please enter phone number",
              minlength:"Enter at least 10 characters",
              maxlength:"Enter no more than 11 characters"
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
  </div>
</div>
 
