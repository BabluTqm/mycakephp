<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--     Fonts and icons     -->

</head>

<body class="g-sidenav-show  bg-gray-200 ">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
  
      <!-- Edit Modal HTML -->
      <div class="modal fade modelhide" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                  <h5 class="">Edit User</h5>
                  <p class="mb-0">Enter your email and password to register</p>
              </div>
              <div class="card-body pb-3">
                <?php echo $this->Form->create(null , ['type' => 'file','id'=>'useredit']); ?>
                <img src="" id="showimg" width="100px">
                <div class="input-group input-group-outline my-3">
                   <?php echo $this->Form->control('user_profile.first_name', ['style' => 'width:366px;', 'class' => 'form-control' , 'required' => false]); ?> 
                  </div>
              <input type="hidden"  id="imagedd" name="imagedd"/>
              <input type="hidden"  id="iddd" name="iddd"/>
              
                  <div class="input-group input-group-outline my-3">
                  <?php echo $this->Form->control('user_profile.last_name', ['style' => 'width:366px;', 'class' => 'form-control' , 'required' => false]); ?> 
                  </div>

                  <div class="input-group input-group-outline my-3">
                    <?php echo $this->Form->control('email', ['style' => 'width:366px;', 'class' => 'form-control' , 'required' => false]); ?>
                  </div>
                  <div class="input-group input-group-outline my-3">
                  <?php echo $this->Form->control('user_profile.contact', [ 'style' => 'width:366px;', 'class' => 'form-control' , 'required' => false]); ?>
                </div>
                  
                <div class="input-group input-group-outline my-3">
                  <?php echo $this->Form->control('user_profile.address', ['style' => 'width:366px;', 'class' => 'form-control' , 'required' => false]); ?> 
                </div>

                <div class="input-group input-group-outline my-3">
                  <?php echo $this->Form->control('user_profile.profile_image', [ 'type' => 'file' , 'style' => 'width:366px;', 'class' => 'form-control' , 'required' => false]); ?> 
                </div>
                
                
                
                <div class="text-center">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                </div>
                <?php echo $this->Form->end(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <!--  End Modal  -->
    <!-- End Navbar -->
    <div class="container  py-4">
    <?= $this->Flash->render() ?>
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">All User List</h6>
                 
              </div>
              
              <?= $this->Html->link(__('Add New User'), ['action' => 'adduser'], ['class' => 'btn btn-light  mt-2 p-2 float-end']) ?>
            </div>
            
          

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

            

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">s no</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                      <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>

          
            
                  
                    <?php $count = 0 ?> 
                  <?php foreach ($users as $user): 

                   if($result->id == $user->id){
                            continue;
                        }

                   if($user->delete_status == 0){
                            continue;
                        }

                        ?>
                  <tr id='dataid<?php $user->id ?>'>
                      
 

                    <td class="p-3">
                           <?= ++$count; ?>
                      </td>


                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <?php echo $this->Html->image($user->user_profile->profile_image , ['class' => 'avatar avatar-sm me-3 border-radius-lg']); ?>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= ($user->user_profile->first_name. " ".$user->user_profile->last_name) ?></h6>
                            <p class="text-xs text-secondary mb-0"> <?= ($user->email) ?></p>
                          </div>
                        </div>
                      </td>

                      
                    <td>
                        <?php if($user->user_type == 1) : ?>
                          <span class='text-xs font-weight-bold mb-0'> 
                        <?= $this->Form->postLink(__('User'), ['action' => 'userType', $user->id ,$user->user_type], ['confirm' => __('Are you sure you want to Inactive # {0}?', $user->id)]) ?>
                        </span>
                        <?php else: ?>
                          <span class='text-xs font-weight-bold mb-0'> 
                        <?= $this->Form->postLink(__('Admin'), ['action' => 'userType', $user->id ,$user->user_type], ['confirm' => __('Are you sure you want to Active # {0}?', $user->id)]) ?>
                        </span>
                        <?php endif ; ?>
                    </td>







                    <td class="align-middle text-center text-sm">
                      <?php if($user->status == 1) : ?>
                      <span class="badge badge-sm bg-gradient-success">
                        <?= $this->Form->postLink(__('Active'), [ 'action' => 'userStatus', $user->id ,$user->status], ['confirm' => __('Are you sure you want to Inactive?', $user->id)]) ?>                     
                      </span>
                      <?php else: ?> 
                        <span class="badge badge-sm bg-gradient-danger ">
                          <?= $this->Form->postLink(__("Deactive"), [ 'action' => 'userStatus', $user->id ,$user->status], ['confirm' => __('Are you sure you want to Active?', $user->id)]) ?>
                        </span>
                        <?php endif ; ?> 
                      </td>
                      
                      
                          <?php
                                $cre_time = $user->created_date;
                                $date = new DateTime($cre_time, new DateTimeZone('UTC'));
                                $date->setTimezone(new DateTimeZone("Asia/Kolkata"));
                                $cre_time= $date->format('d-m-Y H:i:a');  
                          ?>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $cre_time ;?></span>
                      </td>

                      <td class="align-middle">
                        <?= $this->Html->link(__(''), ['action' => 'view', $user->id],['class' => 'fa-solid fa-eye' ]) ?> &nbsp;
                         <!-- <?=  $this->Html->link(__(''), ['action' => 'edit', $user->id], ['class' => 'fa-solid fa-pencil']);  ?>  &nbsp; -->
                    <a class="fa-solid fa-pencil editUser" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $user->id ?>"></a> &nbsp;

                           <!-- <?= $this->Form->postLink(__(' '), [ 'action' => 'delete', $user->id], ['class' => 'btn-delete fa-solid fa-trash text-danger','confirm' => __('Are you sure you want to delete?', $user->id)]) ?> -->
                            <!-- <?= $this->Form->postLink(__(''), [ 'action' => 'delete', $user->id], ['class' => 'btn-delete fa-solid fa-trash text-danger']) ?> -->
                         
                          <a href="javascript:void(0)" class="fa-sharp fa-solid fa-trash btn-delete-user" data="<?= $user->id ?>"></a>
                            
                    <!-- <a class="fa-solid fa-pencil editUser" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $user->id ?>"></a> -->
                    </td>
                    </tr>
                   
                    <?php endforeach; ?>
                
                </table>

                <div class="paginator">
                  <ul class="pagination">
                      <?= $this->Paginator->first('<< ' . __('first')) ?>
                      <?= $this->Paginator->prev('< ' . __('previous')) ?>
                      <?= $this->Paginator->numbers() ?>
                      <?= $this->Paginator->next(__('next') . ' >') ?>
                      <?= $this->Paginator->last(__('last') . ' >>') ?>
                  </ul>
                  <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>



    
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <?php echo $this->Html->script('core/popper.min.js') ?>
  <?php echo $this->Html->script('core/bootstrap.min.js') ?>
  <?php echo $this->Html->script('plugins/perfect-scrollbar.min.js') ?>
  <?php echo $this->Html->script('plugins/smooth-scrollbar.min.js') ?>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <?php echo $this->Html->script('material-dashboard.min.js') ?>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>


  <?= $this->Html->script(['jquery' ]) ?>
    <?= $this->Html->script(['validate' ]) ?>
    <?= $this->Html->script(['myjs' ]) ?>
    <?= $this->Html->script(['ajax']) ?>

  <script>
        $(document).ready(function() {

       /* $(".btn-delete").click(function(e){
          e.preventDefault();
          alert("Delete By Ajax?..");
          //write you ajax here
          //var getURL = $(this).attr('href');
          //alert(getURL);
        }),*/

        
/******************Search Function***************/
        
        $("#key").on("keyup", function() {  
        var value = $(this).val().toLowerCase();  
        $("tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

/************User Status**************/
        $('.statuscheck').click(function(){
        var status = $(this).val();
        var id = $(this).prev('a').click();

        })
       
/************User Edit**************/

  });

    $("#useredit").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
        },
        messages: {
            first_name: {
                required: " Please enter your car company name",
            },
            last_name: {
                required: "Please enter your car description",
            },
        },
        submitHandler: function (form) {
            // alert("dddd");
            var formData = new FormData(form);
            // alert("ddddddg");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/users/editProfile",
                type: "JSON",
                method: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function (response) {
                    // console.log(response);
                    // alert(response);
                    var data = JSON.parse(response);
                    if (data["status"] == 0) {
                        alert(data["message"]);
                    } else {
                        
                        $('.table-responsive').load('/users/tables .table-responsive')
                        $(".modelhide").modal("hide");
                        swal("Good job!", "The user has been update!", "success");
                    }
                },
            });
            return false;
        },
    });
  $(document).on("click", ".editUser", function () {
    var user_id = $(this).data("id");
    console.log(user_id);
    $.ajax({
        url: "/users/updateProfile",
        data: { id: user_id },
        type: "JSON",
        method: "get",
        success: function (response) {
            user = $.parseJSON(response);
            console.log(user)
            // console.log(user["user_profile"]["first_name"]);

            // hidden input for image and id
            $("#imagedd").val(user["user_profile"]["profile_image"]);
            $("#iddd").val(user["id"]);
            // hidden input for image and id

            var image = user["user_profile"]["profile_image"];
            document
                .querySelector("#showimg")
                .setAttribute("src", "/img/" + image);
            $("#user-profile-first-name").val(
                user["user_profile"]["first_name"]
            );
            $("#user-profile-last-name").val(user["user_profile"]["last_name"]);
            $("#user-profile-contact").val(user["user_profile"]["contact"]);
            $("#user-profile-address").val(user["user_profile"]["address"]);
            $("#email").val(user["email"]);
        },
    });
});
</script>
</body>

</html>