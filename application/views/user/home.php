<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Dashboard</h1>
    </div>
  </div>
  <?php 
    $userinfo = $this->session->userdata('user');
      if($userinfo['role'] == 1){
  ?>
  <a href="<?php echo base_url('create')?>" style="width: 100px;">
    <button type="button" class="btn btn-success" style="margin-bottom: 10px">Create</button>
  </a>
  <?php }?>
  <b style="color: red"><?php echo $this->session->flashdata('mess');?></b>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Username</th>
                  <th>Fullname</th>
                  <th>Phone number</th>
                  <?php 
                  if($userinfo['role'] == 1){?>
                  <th>Function</th>
                  <?php }?>
                </tr>
              </thead>
              <tbody>
                <?php foreach($users as $user){?>
                <tr>
                  <td><?php echo $user['id']?></td>
                  <td><?php echo $user['username']?></td>
                  <td><?php echo $user['fullname']?></td>
                  <td><?php echo $user['phone_number']?></td>
                  <?php if($userinfo['role'] == 1){?>
                  <td class="center"><a href="<?php echo base_url('delete/' . $user['id'])?>">Delete</a></td>
                  <?php }?>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
