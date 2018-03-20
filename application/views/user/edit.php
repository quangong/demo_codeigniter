<div class="container layout-right">
  <div class="row">
      <h1 class="page-header">Edit User</h1>
      <b style="color: red"><?php echo $this->session->flashdata('mess')?></b>
    <form style="width: 600px; float: right" method="post" class="create-form">
     <div class="form-group">
        <label for="fullname">Fullname:</label>
        <input type="text" class="form-control" id="fullname" value="<?php echo $info['fullname']?>" name="fullname">
      </div>
      <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="text" class="form-control" id="phone" value="<?php echo $info['phone_number']?>" name="phone">
      </div>
      <button type="submit">Edit</button>
    </form>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.create-form').validate({
          rules:{
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
 
