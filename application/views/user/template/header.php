<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Demo Codeigniter</title>
    <link href="<?php echo base_url()?>application/views/user/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>application/views/user/template/css/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>application/views/user/template/css/timeline.css" rel="stylesheet">
    <link href="<?php echo base_url()?>application/views/user/template/css/startmin.css" rel="stylesheet">
    <link href="<?php echo base_url()?>application/views/user/template/css/morris.css" rel="stylesheet">
    <link href="<?php echo base_url()?>application/views/user/template/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?php echo base_url()?>application/views/user/template/css/style.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url()?>application/views/user/template/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>application/views/user/template/js/jquery.validate.js" ></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="<?php echo base_url('logout')?>">Logout</a></li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <?php $userinfo = $this->session->userdata('user');?>
                        <a href="<?php echo base_url('edit/' . $userinfo['id'])?>"><i class="fa fa-sitemap fa-fw"></i>My Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>