<?php
   include_once "database/connect.php";
   include_once "header.php";
   ?>

<?php

//   1.get the id of admin to be deleted
$id = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
//   2.create sql query to delete admin
$sql4 = "DELETE FROM campaign WHERE id = $id";

//   execute the query
$res = mysqli_query($conn, $sql4);

if ($res == true) {
    echo "admin deleted";
    echo "Deleted";
    header("location:campaign.php");
} else {
    echo "can't delete";
    header("location:campaign.php");
}
}


?>
<style>
   #button {
   background: linear-gradient(118deg, #7164f1, rgb(26 26 26 / 69%));
   box-shadow: 0 0 5px 1px rgba(115, 103, 240, 0.7);
   color: #fff;
   border-radius: 10px;
   }
   .feather-icon {
   margin-right: 10px;
   /* Adjust the margin as per your preference */
   width: 20px;
   /* Adjust the width as per your preference */
   height: 20px;
   /* Adjust the height as per your preference */
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
                  <h2 class="content-header-title float-left mb-0"><?php if ($page == "") {
                     echo "Campaign";
                     } else {
                     echo ucfirst($page);
                     } ?>
                  </h2>
                  <button class="btn btn-primary d-block d-sm-none" id="button" data-toggle="modal" data-target="#createCampaignModal" style="float:right;">Add Campaign</button>
                  <div class="breadcrumb-wrapper">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item active"><?php if ($page == "") {
                           echo "Campaign";
                           } else {
                           echo ucfirst($page);
                           } ?>
                        </li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <button class="btn btn-primary" id="button" data-toggle="modal" data-target="#createCampaignModal">Add Campaign</button>
         </div>
      </div>
      <div class="content-body">
         <!-- Kick start -->
         <div class="card">
            <div class="card-header p-1 bg-primary">
               <h4 class="card-title text-white"><i data-feather="grid" class="feather-icon animated-icon"></i>Campaign</h4>
            </div>
            <div class="card-body p-2">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <th>Campaign Id </th>
                        <th>Campaign Name</th>
                        <th>Active</th>
                        <th>Process</th>
                        <th>Caller ID</th>
                        <th>Action</th>
                     </thead>
                     <tbody>
                        <?php
                           $sql = "SELECT * FROM campaign";
                           $res = mysqli_query($conn, $sql);
                           
                           foreach ($res as $menu) {
                           
                               $id = $menu['id'];
                               $campaign_id = $menu['campaign_id'];
                               $campaign_name = $menu['campaign_name'];
                               $active = $menu['active'];
                               $process = $menu['process'];
                               $caller_id = $menu['caller_id'];
                           ?>
                        <tr>
                           <td><?php echo $menu['campaign_id']; ?></td>
                           <td><?php echo $menu['campaign_name']; ?></td>
                           <td><?php echo $menu['active']; ?></td>
                           <td><?php echo $menu['process']; ?></td>
                           <td><?php echo $menu['caller_id']; ?></td>
                           <td>
                              <div class="btn-group" role="group" aria-label="Edit and Delete Buttons">
                                 <button data-toggle="modal" data-target="#editCampaignModal<?php echo $id; ?>" class="btn btn-primary mr-1 rounded" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                 <i class="fa fa-edit "></i></button>
                                 <button data-toggle="modal" data-target="#deleteCampaignModal<?php echo $id; ?>" class="btn btn-danger rounded mr-1 " style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                 <i class="fa fa-trash"></i>
                                 </button>
                              </div>
                           </td>
                        </tr>
                        <form id="deleteim" method="post" enctype="multipart/form-data">
                           <div class="modal fade" id="deleteCampaignModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                       <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="trash" class="feather-icon animated-icon"></i> Delete Campaign</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <p class="text-center mt-2"><b>Do you really want to delete ? </b></p>
                                    </div>
                                    <div class="modal-footer mx-auto">
                                       <a href="database/delete.php?cam=<?php echo $id; ?>" data-target="#deleteCampaignModal" name="delete_campaign" class="btn btn-primary btn-icon center" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                       Yes
                                       </a>
                                       <button id="dontdeletecampaign" name="dontdeletecampaign" type="submit" class="btn btn-primary btn-icon center" data-dismiss="modal" aria-label="Close" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">No</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <!----Edit Modal Start----->
                        <form method="post" action="database/submit.php">
                           <div class="modal fade" id="editCampaignModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                       <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="edit" class="feather-icon animated-icon"></i> Edit Campaign</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="row">
                                          <div class="col-lg-6">
                                             <div class="form-group">
                                                <label for="campaign_id">Campaign ID<span class="required text-danger">*</span></label>
                                                <input type="number" name="campaign_id" value="<?php echo $menu['campaign_id']; ?>"  placeholder="Enter Campaign ID" required class="form-control">
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="form-group">
                                                <label for="campaign_name">Campaign Name<span class="required text-danger">*</span></label>
                                                <input type="text" name="campaign_name" value="<?php echo $menu['campaign_name']; ?>" placeholder="Enter Lead Name" required class="form-control">
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="form-group">
                                                <label for="active">Active<span class="required text-danger">*</span></label>
                                                <select name="active" id="active" class="form-control">
                                                   <option value="Yes" <?php if ($menu['active'] == "Yes") {
                                                      echo "selected";
                                                      } ?>>Yes</option>
                                                   <option value="No" <?php if ($menu['active'] == "No") {
                                                      echo "selected";
                                                      } ?>>No</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="form-group">
                                                <label for="process">Process<span class="required text-danger">*</span></label>
                                                <select name="process" id="process" class="form-control">
                                                   <?php
                                                      $sql = "SELECT * FROM incoming_mapping";
                                                      $res = mysqli_query($conn, $sql);
                                                      $selectedOptions = "";
                                                      if (mysqli_num_rows($res) > 0) {
                                                          while ($row = mysqli_fetch_assoc($res)) {
                                                              $selected = '';
                                                              $selectedOptions = json_decode($menu['process'], true);
                                                              if (in_array($row['process_name'], $selectedOptions)) {
                                                                  $selected = 'selected="selected"';
                                                              }
                                                          }
                                                      
                                                          $getDropDownValues = (mysqli_query($conn, "SELECT * FROM process"));
                                                          foreach ($getDropDownValues as $option) {
                                                              $selected = '';
                                                              if (in_array($option['id'], $selectedOptions)) {
                                                                  $selected = 'selected="selected"';
                                                              }
                                                              echo '<option value="' . $option['process_name'] . '" ' . $selected . '>' . $option['process_name'] . '</option>';
                                                          }
                                                      } else {
                                                          echo '<option value="">No options available</option>';
                                                      }
                                                      ?>
                                                   <!-- <option value="Vodafone Support" <?php if ($menu['process'] == "Vodafone Support") {
                                                      echo "selected";
                                                      } ?>>Vodafone Support</option>
                                                      <option value="Vodafone" <?php if ($menu['process'] == "Vodafone") {
                                                         echo "selected";
                                                         } ?>>Vodafone</option>
                                                      <option value="Jio" <?php if ($menu['process'] == "Jio") {
                                                         echo "selected";
                                                         } ?>>Jio</option> -->
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="form-group">
                                                <label for="hold_music">Hold Music<span class="required text-danger">*</span></label>
                                                <select name="hold_music" id="hold_music" class="form-control">
                                                <?php
                                                   $sql = "SELECT * FROM campaign";
                                                   $res = mysqli_query($conn, $sql);
                                                   $selectedOptions = "";
                                                   if (mysqli_num_rows($res) > 0) {
                                                       while ($row = mysqli_fetch_assoc($res)) {
                                                           $selected = '';
                                                           $selectedOptions = json_decode($menu['hold_music'], true);
                                                           if (in_array($row['moh_name'], $selectedOptions)) {
                                                               $selected = 'selected="selected"';
                                                           }
                                                       }
                                                   
                                                       $getDropDownValues = (mysqli_query($conn, "SELECT * FROM moh"));
                                                       foreach ($getDropDownValues as $option) {
                                                           $selected = '';
                                                           if (in_array($option['id'], $selectedOptions)) {
                                                               $selected = 'selected="selected"';
                                                           }
                                                           echo '<option value="' . $option['moh_name'] . '" ' . $selected . '>' . $option['moh_name'] . '</option>';
                                                       }
                                                   } else {
                                                       echo '<option value="">No options available</option>';
                                                   }
                                                   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label for="script_for_outbound">Script For Outbound</label>
                                                <select class="form-control" id="script_for_outbound" name="script_for_outbound">
                                                <?php
                                                   $sql = "SELECT * FROM campaign";
                                                   $res = mysqli_query($conn, $sql);
                                                   $selectedOptions = "";
                                                   if (mysqli_num_rows($res) > 0) {
                                                       while ($row = mysqli_fetch_assoc($res)) {
                                                           $selected = '';
                                                           $selectedOptions = json_decode($menu['script_for_outbound'], true);
                                                           if (in_array($row['script_name'], $selectedOptions)) {
                                                               $selected = 'selected="selected"';
                                                           }
                                                       }
                                                   
                                                       $getDropDownValues = (mysqli_query($conn, "SELECT * FROM script"));
                                                       foreach ($getDropDownValues as $option) {
                                                           $selected = '';
                                                           if (in_array($option['id'], $selectedOptions)) {
                                                               $selected = 'selected="selected"';
                                                           }
                                                           echo '<option value="' . $option['script_name'] . '" ' . $selected . '>' . $option['script_name'] . '</option>';
                                                       }
                                                   } else {
                                                       echo '<option value="">No options available</option>';
                                                   }
                                                   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label for="hopper_level">Hopper Level<span class="required text-danger">*</span></label>
                                                <select class="form-control" id="hopper_level" name="hopper_level">
                                                   <option value="1" <?php if ($menu['hopper_level'] == "1") {
                                                      echo "selected";
                                                      } ?>>1</option>
                                                   <option value="5" <?php if ($menu['hopper_level'] == "5") {
                                                      echo "selected";
                                                      } ?>>5</option>
                                                   <option value="10" <?php if ($menu['hopper_level'] == "10") {
                                                      echo "selected";
                                                      } ?>>10</option>
                                                   <option value="50" <?php if ($menu['hopper_level'] == "50") {
                                                      echo "selected";
                                                      } ?>>50</option>
                                                   <option value="100" <?php if ($menu['hopper_level'] == "100") {
                                                      echo "selected";
                                                      } ?>>100</option>
                                                   <option value="500" <?php if ($menu['hopper_level'] == "500") {
                                                      echo "selected";
                                                      } ?>>500</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label for="edit_dial_method">Dial Method<span class="required text-danger">*</span></label>
                                                <select class="form-control" id="edit_dial_method" name="dial_method" onchange="toggleDialRatioDropdownEdit()">
                                                   <option value="Manual Dial" <?php if ($menu['dial_method'] == "Manual Dial") {
                                                      echo "selected";
                                                      } ?>>Manual Dial</option>
                                                   <option value="Progressive Dial" <?php if ($menu['dial_method'] == "Progressive Dial") {
                                                      echo "selected";
                                                      } ?>>Progressive Dial</option>
                                                   <option value="Predictive Dial" <?php if ($menu['dial_method'] == "Predictive Dial") {
                                                      echo "selected";
                                                      } ?>>Predictive Dial</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-6" id="edit_dial_ratio_container" <?php if ($menu['dial_method'] == "Predictive Dial") {
                                             echo 'style="display: block;"';
                                             } else {
                                             echo 'style="display: none;"';
                                             } ?>>
                                             <div class="form-group">
                                                <label for="edit_dial_ratio">Dial Ratio<span class="required text-danger">*</span></label>
                                                <select class="form-control" id="edit_dial_ratio" name="dial_ratio">
                                                   <option value="1" <?php if ($menu['dial_ratio'] == "1") {
                                                      echo "selected";
                                                      } ?>>1</option>
                                                   <option value="2" <?php if ($menu['dial_ratio'] == "2") {
                                                      echo "selected";
                                                      } ?>>2</option>
                                                   <option value="3" <?php if ($menu['dial_ratio'] == "3") {
                                                      echo "selected";
                                                      } ?>>3</option>
                                                   <option value="4" <?php if ($menu['dial_ratio'] == "4") {
                                                      echo "selected";
                                                      } ?>>4</option>
                                                   <option value="5" <?php if ($menu['dial_ratio'] == "5") {
                                                      echo "selected";
                                                      } ?>>5</option>
                                                   <option value="6" <?php if ($menu['dial_ratio'] == "6") {
                                                      echo "selected";
                                                      } ?>>6</option>
                                                   <option value="7" <?php if ($menu['dial_ratio'] == "7") {
                                                      echo "selected";
                                                      } ?>>7</option>
                                                   <option value="8" <?php if ($menu['dial_ratio'] == "8") {
                                                      echo "selected";
                                                      } ?>>8</option>
                                                   <option value="9" <?php if ($menu['dial_ratio'] == "9") {
                                                      echo "selected";
                                                      } ?>>9</option>
                                                   <option value="10" <?php if ($menu['dial_ratio'] == "10") {
                                                      echo "selected";
                                                      } ?>>10</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="form-group">
                                                <label for="prefix">Prefix<span class="required text-danger">*</span></label>
                                                <input type="text" name="prefix" value="<?php echo $menu['prefix']; ?>" id="prefix" placeholder="Enter Prefix" class="form-control">
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="form-group">
                                                <label for="caller_id">Caller ID<span class="required text-danger">*</span></label>
                                                <input type="text" value="<?php echo $menu['caller_id']; ?>" name="caller_id" id="caller_id" placeholder="Enter Caller ID" class="form-control">
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="form-group">
                                                <label for="routing_extension">Routing Extension<span class="required text-danger">*</span></label>
                                                <input type="text" value="<?php echo $menu['routing_extension']; ?>" name="routing_extension" id="routing_extension" placeholder="Enter Routing Extension" class="form-control">
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="form-group">
                                                <label for="call_back">Call Back<span class="required text-danger">*</span></label>
                                                <select name="call_back" id="call_back" class="form-control">
                                                   <option value="Yes" <?php if ($menu['call_back'] == "Yes") {
                                                      echo "selected";
                                                      } ?>>Yes</option>
                                                   <option value="No" <?php if ($menu['call_back'] == "No") {
                                                      echo "selected";
                                                      } ?>>No</option>
                                                </select>
                                             </div>
                                          </div>
                                          <input type="hidden" name="id_to_update" value="<?php echo $menu['id']; ?>">
                                          <div class="col-lg-6">
                                             <div class="form-group">
                                                <label for="allow_transfer_group">Allow Transfer Group<span class="required text-danger">*</span></label>
                                                <select name="allow_transfer_group[]" id="" class="form-control js-example-basic-multiple" multiple="multiple">
                                                <?php
                                                   $sql = "SELECT * FROM campaign";
                                                   $res = mysqli_query($conn, $sql);
                                                   $selectedOptions = "";
                                                   if (mysqli_num_rows($res) > 0) {
                                                       while ($row = mysqli_fetch_assoc($res)) {
                                                           $selected = '';
                                                           $selectedOptions = json_decode($menu['allow_transfer_group'], true);
                                                           if (in_array($row['id'], $selectedOptions)) {
                                                               $selected = 'selected="selected"';
                                                           }
                                                       }
                                                   
                                                       $getDropDownValues = (mysqli_query($conn, "SELECT * FROM dropdown"));
                                                       foreach ($getDropDownValues as $option) {
                                                           $selected = '';
                                                           if (in_array($option['id'], $selectedOptions)) {
                                                               $selected = 'selected="selected"';
                                                           }
                                                           echo '<option value="' . $option['id'] . '" ' . $selected . '>' . $option['name'] . '</option>';
                                                       }
                                                   } else {
                                                       echo '<option value="">No options available</option>';
                                                   }
                                                   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="form-group">
                                                <label for="edit-call_inbound">Allow Inbound<span class="required text-danger">*</span></label>
                                                <select name="allow_inbound" id="edit-call_inbound" class="form-control" onchange="toggleDIDNumberDropdownEdit()">
                                                   <option value="No" <?php if ($menu['allow_inbound'] == "No") {
                                                      echo "selected";
                                                      } ?>>No</option>
                                                   <option value="Yes" <?php if ($menu['allow_inbound'] == "Yes") {
                                                      echo "selected";
                                                      } ?>>Yes</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-lg-6" id="edit_did_number_container" <?php if ($menu['allow_inbound'] == "Yes") {
                                             echo 'style="display: block;"';
                                             } else {
                                             echo 'style="display: none;"';
                                             } ?>>
                                             <div class="form-group">
                                                <label for="edit_did_number">DID Number<span class="required text-danger">*</span></label>
                                                <select name="did_number[]" id="" class="form-control js-example-basic-multiple" multiple="multiple">
                                                <?php
                                                   $sql = "SELECT * FROM campaign";
                                                   $res = mysqli_query($conn, $sql);
                                                   $selectedOptions = "";
                                                   if (mysqli_num_rows($res) > 0) {
                                                       while ($row = mysqli_fetch_assoc($res)) {
                                                           $selected = '';
                                                           $selectedOptions = json_decode($menu['did_number'], true);
                                                           if (in_array($row['id'], $selectedOptions)) {
                                                               $selected = 'selected="selected"';
                                                           }
                                                       }
                                                   
                                                       $getDropDownValues = (mysqli_query($conn, "SELECT * FROM did_dropdown"));
                                                       foreach ($getDropDownValues as $option) {
                                                           $selected = '';
                                                           if (in_array($option['id'], $selectedOptions)) {
                                                               $selected = 'selected="selected"';
                                                           }
                                                           echo '<option value="' . $option['id'] . '" ' . $selected . '>' . $option['name'] . '</option>';
                                                       }
                                                   } else {
                                                       echo '<option value="">No options available</option>';
                                                   }
                                                   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="row ml-0 mr-0" id="transfer-fields-edit-<?php echo $menu['id']; ?>">
                                             <?php
                                                $transferData = json_decode($menu['transfer'], true);
                                                foreach ($transferData as $key => $data) {
                                                ?>
                                             <div class="col-lg-6">
                                                <div class="form-group transferGroup<?php echo $menu['id']; ?>">
                                                   <label for="transfer">Transfer <?php echo $key + 1; ?></label>
                                                   <div name="transfer_field" class="input-group">
                                                      <div style="display: flex; align-items: center;">
                                                         <input type="text" value="<?php echo $data['name']; ?>" name="transfer_name[]" placeholder="Enter Transfer Name" class="form-control" style="margin-right: 10px; width:180px;">
                                                         <input type="text" value="<?php echo $data['number']; ?>" name="transfer_number[]" placeholder="Enter Transfer Number" class="form-control" style="margin-right: 10px; width:180px;">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <?php
                                                }
                                                ?>
                                          </div>
                                          <div class="col-lg-6" id="add-button-edit">
                                             <div class="form-group">
                                                <label>&nbsp;</label>
                                                <div>
                                                   <button type="button" id="add-transfer-edit<?php echo $menu['id']; ?>" onclick="addTransferFieldsEdit('<?php echo $menu['id']; ?>', this.id)" class="btn btn-primary">Add</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <span class="text-muted ">(<span class="text-danger">*</span>) Fields are Required.</span>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="submit" name="edit_campaign" class="btn btn-primary">Update</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <!----Edit Modal End---->
                        <?php
                           }
                           
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <!--/ Kick start -->
         <!-- Page layout -->
         <!--/ Page layout -->
      </div>
   </div>
</div>
<!-- END: Content-->
<!-- Vertical modal -->
<!-- Modal -->
<form method="post" action="database/submit.php">
   <div class="modal fade" id="createCampaignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header bg-primary">
               <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="grid" class="feather-icon animated-icon"></i> Create Campaign</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
               <div class="col-lg-6">
               <div class="form-group">
  <label for="campaign_id">Campaign ID<span class="required text-danger">*</span></label>
  <input type="number" name="campaign_id" id="campaign_id" placeholder="Enter Campaign ID" required class="form-control" oninput="validateForm();">
  <div id="campaign-id-error" class="invalid-feedback"></div>
</div>
                        </div>
                        <div class="col-lg-6">
<div class="form-group">
  <label for="campaign_name">Campaign Name<span class="required text-danger">*</span></label>
  <input type="text" name="campaign_name" id="campaign_name" placeholder="Enter Campaign Name" required class="form-control" oninput="validateForm();">
  <div id="campaign-name-error" class="invalid-feedback"></div>
</div>
                        </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="active">Active<span class="required text-danger">*</span></label>
                        <select name="active" id="active" class="form-control">
                           <option value="Yes">Yes</option>
                           <option value="No">No</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="process">Process<span class="required text-danger">*</span></label>
                        <select name="process" id="process" class="form-control">
                        <?php
                           $query1 = "SELECT * FROM process";
                           $res = mysqli_query($conn, $query1);
                           
                           if (mysqli_num_rows($res) > 0) {
                               while ($row = mysqli_fetch_assoc($res)) {
                                   $selected = '';
                                   if (in_array($row['process_name'], $_POST['process_name'])) {
                                       $selected = 'selected';
                                   }
                                   echo '<option value="' . $row['process_name'] . '" ' . $selected . '>' . $row['process_name'] . '</option>';
                               }
                           } else {
                               echo '<option value="">No record found</option>';
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="hold_music">Hold Music<span class="required text-danger">*</span></label>
                        <select name="hold_music" id="hold_music" class="form-control">
                        <?php
                           $query1 = "SELECT * FROM moh";
                           $res = mysqli_query($conn, $query1);
                           
                           if (mysqli_num_rows($res) > 0) {
                               while ($row = mysqli_fetch_assoc($res)) {
                                   $selected = '';
                                   if (in_array($row['moh_name'], $_POST['hold_music'])) {
                                       $selected = 'selected';
                                   }
                                   echo '<option value="' . $row['moh_name'] . '" ' . $selected . '>' . $row['moh_name'] . '</option>';
                               }
                           } else {
                               echo '<option value="">No record found</option>';
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="script_for_outbound">Script For Outbound</label>
                        <select class="form-control" id="script_for_outbound" name="script_for_outbound">
                        <?php
                           $query1 = "SELECT * FROM script";
                           $res = mysqli_query($conn, $query1);
                           
                           if (mysqli_num_rows($res) > 0) {
                               while ($row = mysqli_fetch_assoc($res)) {
                                   $selected = '';
                                   if (in_array($row['script_name'], $_POST['script_for_outbound'])) {
                                       $selected = 'selected';
                                   }
                                   echo '<option value="' . $row['script_name'] . '" ' . $selected . '>' . $row['script_name'] . '</option>';
                               }
                           } else {
                               echo '<option value="">No record found</option>';
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="hopper_level">Hopper Level<span class="required text-danger">*</span></label>
                        <select class="form-control" id="hopper_level" name="hopper_level">
                           <option value="1">1</option>
                           <option value="5">5</option>
                           <option value="10">10</option>
                           <option value="50">50</option>
                           <option value="100">100</option>
                           <option value="500">500</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="dial_method">Dial Method<span class="required text-danger">*</span></label>
                        <select class="form-control" id="dial_method" name="dial_method" onchange="toggleDialRatioDropdown()">
                           <option value="Manual Dial">Manual Dial</option>
                           <option value="Progressive Dial">Progressive Dial</option>
                           <option value="Predictive Dial">Predictive Dial</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6" id="dial_ratio_container" style="display: none;">
                     <div class="form-group">
                        <label for="dial_ratio">Dial Ratio<span class="required text-danger">*</span></label>
                        <select class="form-control" id="dial_ratio" name="dial_ratio">
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="prefix">Prefix<span class="required text-danger">*</span></label>
                        <input type="text" name="prefix" id="prefix" placeholder="Enter Prefix" class="form-control">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="caller_id">Caller ID<span class="required text-danger">*</span></label>
                        <input type="text" name="caller_id" id="caller_id" placeholder="Enter Caller ID" class="form-control">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="routing_extension">Routing Extension<span class="required text-danger">*</span></label>
                        <input type="text" name="routing_extension" id="routing_extension" placeholder="Enter Routing Extension" class="form-control">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="call_back">Call Back<span class="required text-danger">*</span></label>
                        <select name="call_back" id="call_back" class="form-control">
                           <option value="Yes">Yes</option>
                           <option value="No">No</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="add_allow_transfer_group">Allow Transfer Group<span class="required text-danger">*</span></label>
                        <select name="allow_transfer_group[]" id="add_allow_transfer_group" class="form-control js-example-basic-multiple" multiple="multiple">
                        <?php
                           $query1 = "SELECT * FROM dropdown";
                           $res = mysqli_query($conn, $query1);
                           
                           if (mysqli_num_rows($res) > 0) {
                               while ($row = mysqli_fetch_assoc($res)) {
                                   $selected = '';
                                   if (in_array($row['id'], $_POST['allow_transfer_group'])) {
                                       $selected = 'selected';
                                   }
                                   echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['name'] . '</option>';
                               }
                           } else {
                               echo '<option value="">No record found</option>';
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="call_inbound">Allow Inbound<span class="required text-danger">*</span></label>
                        <select name="allow_inbound" id="call_inbound" class="form-control" onchange="toggleDIDNumberDropdown()">
                           <option value="No">No</option>
                           <option value="Yes">Yes</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6" id="did_number_container" style="display: none;">
                     <div class="form-group">
                        <label for="did_number">DID Number<span class="required text-danger">*</span></label>
                        <select name="did_number[]" id="did_number" class="form-control js-example-basic-multiple" multiple="multiple">
                           <?php
                              $query1 = "SELECT * FROM did_dropdown";
                              $res = mysqli_query($conn, $query1);
                              
                              if (mysqli_num_rows($res) > 0) {
                                  foreach (($res) as $row) {
                              ?>
                           <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                           <?php
                              }
                              } else {
                              ?>
                           <option value="">No record found</option>
                           <?php
                              }
                              ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6" id="transfer-fields">
                     <div class="form-group">
                        <label for="transfer">Transfer 1</label>
                        <div name="transfer_field" class="input-group">
                           <input type="text" name="transfer_name[]" placeholder="Enter Transfer Name" class="form-control" style="margin-right: 10px;">
                           <input type="text" name="transfer_number[]" placeholder="Enter Transfer Number" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6" id="add-button">
                     <div class="form-group">
                        <label>&nbsp;</label>
                        <div>
                           <button type="button" id="add-transfer" class="btn btn-primary">Add</button>
                        </div>
                     </div>
                  </div>
               </div>
               <span class="text-muted ">(<span class="text-danger">*</span>) Fields are Required.</span>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary" id="create-button" name="create_campaign">Create</button>
            </div>
         </div>
      </div>
   </div>
   </div>
</form>
<!-- Modal -->
<!-- Vertical modal end-->
<script>
   function validateForm() {
  var campaignIdInput = document.getElementById("campaign_id");
  var campaignNameInput = document.getElementById("campaign_name");
  var campaignId = campaignIdInput.value.trim();
  var campaignName = campaignNameInput.value.trim();
  var campaignIdError = document.getElementById("campaign-id-error");
  var campaignNameError = document.getElementById("campaign-name-error");
  var createButton = document.getElementById("create-button");

  campaignIdError.innerHTML = ""; // Clear any previous error message
  campaignNameError.innerHTML = ""; // Clear any previous error message

  if (campaignId === "") {
    campaignIdInput.classList.add("is-invalid");
    campaignIdError.innerHTML = "Campaign ID is required.";
    createButton.disabled = true; // Disable the Create button
    return;
  }

  if (!/^[0-9]+$/.test(campaignId)) {
    campaignIdInput.classList.add("is-invalid");
    campaignIdError.innerHTML = "Campaign ID should only contain numbers.";
    createButton.disabled = true; // Disable the Create button
    return;
  }

  if (campaignName === "") {
    campaignNameInput.classList.add("is-invalid");
    campaignNameError.innerHTML = "Campaign Name is required.";
    createButton.disabled = true; // Disable the Create button
    return;
  }

  checkCampaignExists(campaignId, campaignName, function(exists) {
    if (exists.campaignIdExists) {
      campaignIdInput.classList.add("is-invalid");
      campaignIdError.innerHTML = "Campaign ID already exists.";
    } else {
      campaignIdInput.classList.remove("is-invalid");
    }

    if (exists.campaignNameExists) {
      campaignNameInput.classList.add("is-invalid");
      campaignNameError.innerHTML = "Campaign Name already exists.";
    } else {
      campaignNameInput.classList.remove("is-invalid");
    }

    if (!exists.campaignIdExists && !exists.campaignNameExists) {
      createButton.disabled = false; // Enable the Create button
    } else {
      createButton.disabled = true; // Disable the Create button
    }
  });
}

function checkCampaignExists(campaignId, campaignName, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "database/check_campaign_exists.php", true); // Update the URL to your server-side file
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        callback(response);
      } else {
        console.log("An error occurred.");
        callback({
          campaignIdExists: false,
          campaignNameExists: false
        });
      }
    }
  };

  var params = "campaign_id=" + encodeURIComponent(campaignId) +
    "&campaign_name=" + encodeURIComponent(campaignName);
  xhr.send(params);
}

</script>

<script>
   function toggleDialRatioDropdown() {
       var dialMethod = document.getElementById("dial_method").value;
       var dialRatioContainer = document.getElementById("dial_ratio_container");
   
       if (dialMethod === "Predictive Dial") {
           dialRatioContainer.style.display = "block";
       } else {
           dialRatioContainer.style.display = "none";
       }
   }
   
   
   function toggleDIDNumberDropdown() {
       var allowInbound = document.getElementById("call_inbound").value;
       var didNumberContainer = document.getElementById("did_number_container");
   
       if (allowInbound === "Yes") {
           didNumberContainer.style.display = "block";
       } else {
           didNumberContainer.style.display = "none";
       }
   }
   
   function toggleDialRatioDropdownEdit() {
       var dialMethodDropdown = document.getElementById("edit_dial_method");
       var dialRatioContainer = document.getElementById("edit_dial_ratio_container");
   
       if (dialMethodDropdown.value === "Predictive Dial") {
           dialRatioContainer.style.display = "block";
       } else {
           dialRatioContainer.style.display = "none";
       }
   }
   
   toggleDialRatioDropdownEdit();
   
   
   function toggleDIDNumberDropdownEdit() {
       var allowInboundDropdown = document.getElementById("edit-call_inbound");
       var didNumberContainer = document.getElementById("edit_did_number_container");
   
       if (allowInboundDropdown.value === "Yes") {
           didNumberContainer.style.display = "block";
       } else {
           didNumberContainer.style.display = "none";
       }
   }
   
   
   toggleDIDNumberDropdownEdit();
   
   var maxFields = 5;
   var currentFields = 1;
   
   
   function addTransferFields() {
       if (currentFields < maxFields) {
           var transferFields = document.getElementById("transfer-fields");
           var clone = transferFields.cloneNode(true);
           clone.setAttribute("id", "transfer-fields-" + (currentFields + 1));
   
           var label = clone.querySelector("label[for='transfer']");
           label.innerHTML = "Transfer " + (currentFields + 1);
   
           var inputs = clone.querySelectorAll("input[type='text']");
           for (var i = 0; i < inputs.length; i++) {
               inputs[i].value = "";
           }
   
           transferFields.parentNode.appendChild(clone);
           currentFields++;
       }
   }
   
   document.getElementById("add-transfer").addEventListener("click", addTransferFields);
   
   
   var maxFieldsEdit = 5;
   var currentFieldsEdit = 1;
   
   function addTransferFieldsEdit(id = '', btnId = '') {
    var currentFieldsEdit = document.querySelectorAll(".transferGroup" + id);
    if (currentFieldsEdit.length < maxFieldsEdit) {
        var clone = document.getElementById("transfer-fields-edit-" + id);
   
        var newTransferField = document.createElement("div");
        newTransferField.className = "col-lg-6";
        newTransferField.innerHTML = `
            <div class="form-group transferGroup${id}">
                <label for="transfer">Transfer ${(currentFieldsEdit.length + 1)}</label>
                <div name="transfer_field" class="input-group">
                    <input type="text" name="transfer_name[]" placeholder="Enter Transfer Name" required class="form-control" style="margin-right: 10px;">
                    <input type="text" name="transfer_number[]" placeholder="Enter Transfer Number" required class="form-control">
                </div>
            </div>
        `;
   
        clone.appendChild(newTransferField);
    } else {
        var getBtn = document.getElementById(btnId);
        getBtn.disabled = true;
    }
   }
   
   document.getElementById("add-transfer-edit").addEventListener("click", addTransferFieldsEdit);
</script>
<?php
   include_once "footer.php";
   ?>