<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
     <span class="d-none d-lg-block">Product Management</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
    <li class="nav-item dropdown pe-3">

      <a class=" nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
        <span class="d-none d-md-block   ps-2">
              <?php 
              
              if($result->user_type == 0){
                echo "Welcome Admin<br>" .$result->email; 
              }else{
                echo $result->user_profile->first_name . " " . $result->user_profile->last_name;
              }
              
              ?>
            </span> 
    </li> 

  </ul>
</nav> 

</header>