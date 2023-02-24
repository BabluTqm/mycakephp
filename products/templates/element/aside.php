<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
  <?= $this->Html->link(__('DashBoard'), ['action' => 'home'], ['class' => 'nav-link collapsed bi  bi-grid']) ?>

  </li>


  <li class="nav-item">
  <?= $this->Html->link(__('All Users'), ['action' => 'index'], ['class' => 'nav-link collapsed bi  bi-people']) ?>

  </li><!-- End Dashboard Nav -->


  <!-- <li class="nav-heading">Pages</li> -->

  <li class="nav-item">
      <?= $this->Html->link(__('Profile'), ['action' => 'profile',$result->id], ['class' => 'nav-link collapsed bi  bi-person']) ?>
  </li>

  <li class="nav-item">
      <?= $this->Html->link(__('Category'), ['action' => 'productcatIndex'], ['class' => 'nav-link collapsed bi  bi-card-list']) ?>
  </li>
 

  <li class="nav-item">
  <?= $this->Html->link(__('Product'), ['action' => 'productIndex'], ['class' => 'nav-link collapsed bi  bi-card-list']) ?>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
      <?= $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'nav-link collapsed bi bi-box-arrow-in-right']) ?>
  </li>



</ul>

</aside>