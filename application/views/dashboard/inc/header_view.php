<!DOCTYPE html>
<html>
  <head>
    <title>Title</title>
    <link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/css/style.css" />

    <script type="text/javascript" src="<?=base_url()?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/js/jrdash/dashboard/result.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/js/jrdash/dashboard/event.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/js/jrdash/dashboard/template.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/js/jrdash/dashboard.js"></script>
    <script>
      $(function(){
        //init the dashboard
        var dashboard = new Dashboard();
      });
    </script>
  </head>

  <body>

      <div class="navbar">
        <div class="navbar-inner">
          <div class="container">
            <span class="brand">My First App</span>

            <ul class="nav">
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">User</a></li>
              <li class="pull-right"><a href="<?=site_url('dashboard/logout')?>">Logout</a></li>
            </ul>
        </div>
      </div>
    </div>
      <!-- start wrapper-->
      <div class="container">

        <div id="error" class="alert alert-error hide">
        </div>

        <div id="success" class="alert alert-success hide">
        </div>
