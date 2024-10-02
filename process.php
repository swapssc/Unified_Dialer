<?php
   include_once "header.php";
   include_once "common_modal.php";
   include_once "fetch_permission.php";
   ?>
<style>
   #button{
   background: linear-gradient(118deg, #7164f1, rgb(26 26 26 / 69%));
   box-shadow: 0 0 5px 1px rgba(115, 103, 240, 0.7);
   color: #fff;
   border-radius: 10px;
   }
   .feather-icon {
   margin-right: 10px;
   width: 20px;
   height: 20px;
   }
   @keyframes rotateAnimation {
   0% {
   transform: rotate(0deg);
   }
   100% {
   transform: rotate(360deg);
   }
   }
   .animated-icon {
   animation: rotateAnimation 2s linear infinite;
   }
   /* CSS styles for Audio Store */
   .upload-details {
   background-color: #f2f2f2;
   padding: 10px;
   margin-top: 20px;
   }
   .file-actions {
   margin-top: 10px;
   text-align: right;
   }
   .file-actions button {
   margin-right: 10px;
   }
   .custom-file-label {
   overflow: hidden;
   white-space: nowrap;
   text-overflow: ellipsis;
   }
</style>
<!-- BEGIN: Content-->
<div class="app-content content ">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
         <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <h2 class="content-header-title float-left mb-0">
                     <?php if ($page == "") {
                        echo "Process";
                        } else {
                        echo ucfirst($page);
                        } ?>
                  </h2>
                  <button class="btn btn-primary d-block d-sm-none" id="button" data-toggle="modal" data-target="#createProcessModal" style="float:right;">Create Process</button>
                  <div class="breadcrumb-wrapper">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                           <?php if ($page == "") {
                              echo "Process";
                              } else {
                              echo ucfirst($page);
                              } ?>
                        </li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <?php if(in_array('process-add', $permission)) { ?>
         <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <button class="btn btn-primary" id="button" data-toggle="modal" data-target="#createProcessModal">Create Process</button>
         </div>
         <?php } ?>


      </div>
      <div class="content-body">
         <!-- Phones Page -->
         <div class="card">
            <div class="card-header p-1 bg-primary">
               <h4 class="card-title text-white custom-heading"><i data-feather="cpu" class="feather-icon animated-icon"></i>Process</h4>
            </div>
            <div class="card-body p-2">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <th>Process Name</th>
                        <th>Active</th>
                        <th>Action</th>
                     </thead>
                     <tbody>
                        <?php
                           $sql6 = "SELECT * FROM process";
                           $res = mysqli_query($conn, $sql6);
                           
                           
                           foreach ($res as $menu) {
                               $id = $menu['id'];
                               $process_name = $menu['process_name'];
                               $active = $menu['active'];
                           ?>
                        <tr>
                           <td><?php echo $menu['process_name']; ?></td>
                           <td><?php echo $menu['active']; ?></td>
                           <td>
                              <div class="btn-group" role="group" aria-label="Edit and Delete Buttons">
                              <?php if(in_array('process-read', $permission)) { ?>
                                 <!-- View process modal -->
                                 <button data-toggle="modal" data-target="#viewProcessModal<?php echo $id; ?>" class="btn  mr-1 rounded" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px; background-color:#29a34a; color:white;">
                                    <i class="fa fa-eye"></i>
                                    </button>
                              <?php } ?>

                                 <?php if(in_array('process-edit', $permission)) { ?>
                                    <button data-toggle="modal" data-target="#editProcessModal<?php echo $id; ?>" class="btn btn-primary mr-1 rounded" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                    <i class="fa fa-edit"></i>
                                    </button>
                                 <?php } ?>

                                 <?php if(in_array('process-delete', $permission)) { ?>
                                    <button  data-toggle="modal" data-target="#deleteProcessModal<?php echo $id; ?>" class="btn btn-danger rounded mr-1 " style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                 <?php } ?>
                              </div>
                           </td>
                        </tr>
               </div>
               </td>
               </tr>
               <?php
                  }
                  ?>
               </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<!-- end of Phones page -->
<?php
   include_once "footer.php";
   ?>