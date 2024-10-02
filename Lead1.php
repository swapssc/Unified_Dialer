<?php
include_once "header2.php";
include_once "Databases/Connect_db.php";
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
                                                                                echo "Leads";
                                                                            } else {
                                                                                echo ucfirst($page);
                                                                            } ?>
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?page=dashboard">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><?php if ($page == "") {
                                                                        echo "Leads";
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
                <button class="btn btn-primary" id="button" data-toggle="modal" data-target="#createExtensionModal">Create Lead</button>
            </div>
        </div>

        <div class="content-body">
            <!-- Kick start -->
            <div class="card">
                <div class="card-header p-1 bg-primary">
                    <h4 class="card-title text-white"><i data-feather="list" class="feather-icon animated-icon"></i> Lead</h4>
                </div>

                <div class="card-body p-2">

                    <table class="table">
                        <thead>
                            <th>Lead Id </th>
                            <th>Lead Name</th>
                            <th>Active</th>
                         <th>overwrite_data</th>
                            <th>Campaign</th>
                            <th>Duplicate</th>
                            <th>choose file</th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                            <?php
                            //query to get all admins from database
                            $sql = "SELECT * FROM Lead";
                            $res = mysqli_query($conn, $sql);
                            foreach ($res as $menu) {

                                $id = $menu['id'];
                                $lead_id = $menu['lead_id'];
                                $lead_name = $menu['lead_name'];
                                $active = $menu['active'];
                                $check_duplicate = $menu['check_duplicate'];
                                $campaign = $menu['campaign'];
                                $overwrite_data = $menu['overwrite_data'];
                                $file = $menu['file'];
                               
                            ?>
                                <tr>
                                    <td><?php echo $menu['lead_id']; ?></td>
                                    <td><?php echo $menu['lead_name']; ?></td>
                                    <td><?php echo $menu['active']; ?></td>
                                    <td><?php echo $menu['check_duplicate']; ?></td>
                                    <td><?php echo $menu['campaign']; ?></td>
                                    <td><?php echo $menu['overwrite_data']; ?></td>
                                    <td><?php echo $menu['file']; ?></td>
                                    

                                    <td>

                                        <div class="btn-group" role="group">

                                            <button data-toggle="modal" data-target="#viewLeadModal<?php echo $id; ?>" class="btn btn-success mr-1 rounded" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            
                                            <button data-toggle="modal" data-target="#editExtensionModal<?php echo $id; ?>" class="btn btn-primary mr-1 rounded" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                                <i class="fa fa-edit "></i>
                                            </button>

                                            <button class="btn btn-danger rounded" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>



                                <!-- View Extension Modal -->
                                <div class="modal fade" id="viewLeadModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="eye" class="feather-icon animated-icon"></i> View Lead</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Lead Id:16</p>
                                                <p>Lead Name: Swap</p>
                                                <p>Active: Yes</p>
                                                <p>Campaign: Yes</p>
                                                <p>Choose File: file1</p>
                                                <p>Overwrite_Data: yes</p>
                                                <p>Check Duplicate: yes</p>

                                                <!-- 3<p>Lead Count: 19</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <form method="post" action="Databases/Submit.php" enctype="multipart/form-data">
                                    <div class="modal fade" id="editExtensionModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="edit" class="feather-icon animated-icon"></i> Edit Lead</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>


                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="Lead_id">Lead ID<span class="required text-danger">*</span></label>
                                                                <input type="text" name="lead_id" id="Lead_id" value="<?php echo $menu['lead_id']; ?>" placeholder="Enter Lead ID" required class="form-control">
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="Lead_name">Lead Name<span class="required text-danger">*</span></label>
                                                                <input type="text" name="lead_name" id="Lead_name" value="<?php echo $menu['lead_name']; ?>" placeholder="Enter Lead Name" required class="form-control">
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="old_file1" value="<?php echo $menu['file']; ?>">

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="active">Active<span class="required text-danger">*</span></label>
                                                                <select name="active" class="form-control">
                                                                    <option>Choose Type</option>
                                                              
                                                              <option <?php if (strtolower($menu['active']) == "yes") {
                                                                                echo  "selected";
                                                                            } ?>>Yes</option>
                                                                    <option <?php if (strtolower($menu['active']) == "no") {
                                                                                echo  "selected";
                                                                            } ?>>NO</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="campaign">Campaign<span class="required text-danger">*</span></label>
                                                                <select name="campaign" class="form-control">
                                                                    <option>Choose Campaign</option>
                                                                    <option <?php if (strtolower($menu['campaign']) == "A") {
                                                                                echo  "selected";
                                                                            } ?>>A</option>
                                                                    <option <?php if (strtolower($menu['campaign']) == "B") {
                                                                                echo  "selected";
                                                                            } ?>>B</option>
                                                                    <option <?php if (strtolower($menu['campaign']) == "C") {
                                                                                echo  "selected";
                                                                            } ?>>C</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="OverwriteData">OverWrite Data<span class="required text-danger">*</span></label>
                                                                <select name="overwrite_data" class="form-control">
                                                                    <option>Choose Overwrite Data</option>
                                                                    <option <?php if (strtolower($menu['overwrite_data']) == "yes") {
                                                                                echo  "selected";
                                                                            } ?>>Yes</option>
                                                                    <option <?php if (strtolower($menu['overwrite_data']) == "no") {
                                                                                echo  "selected";
                                                                            } ?>>NO</option>
                                                                    <!-- <option>No</option> -->
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="checkduplicate">Check Duplicate<span class="required text-danger">*</span></label>
                                                                <select class="form-control" id="checkduplicate" name="check_duplicate">
                                                                    <option selected value="select">Select Duplicate</option>
                                                                    <!-- <option value="yes">Yes</option> -->
                                                                    <option <?php if (strtolower($menu['check_duplicate']) == "yes") {
                                                                                echo  "selected";
                                                                            } ?>>Yes</option>
                                                                    <option <?php if (strtolower($menu['check_duplicate']) == "no") {
                                                                                echo  "selected";
                                                                            } ?>>NO</option>
                                                                    <!-- <option value="No">No</option> -->
                                                                    <!-- Add more options here -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                    
                                                      <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="Choose file">Choose file<span class="required text-danger">*</span></label>
                                                                <input type="file" name='file1' required class="form-control">
                                                            </div>

<!--                                                             
                                                      <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="Choose file">Choose file</label>
                                                                <input type="file" name="newfile" class="form-control">
                                                                <input type="hidden" name='file1'
                                                            </div> -->

                                                
                                
                                                        
                                                            <div class="modal-footer" style="margin-left: 90px;">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="edit_lead" value="true">
    <!-- <button type="submit" class="btn btn-primary" style="margin-left: 100px;">Save</button> -->
</div>

                                                        <div class="modal-footer">
                    <button type="submit" name="edit_lead" value="Submit" class="btn btn-primary">Submit</button>
                </div>
                                                        </div>
  
                                                        
                                                    </div>
                                                </div>
                                            </div>
                            </form>
                </div>

            </div>
        </div>
    </div>
    </form>


<?php } ?>
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
<form method="post" action="Databases/Submit.php">
    <div class="modal fade" id="createExtensionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="list" class="feather-icon animated-icon"></i> Create Lead</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="Lead_id">Lead ID<span class="required text-danger">*</span></label>
                                <input type="text" name="lead_id" id="Lead_id"  placeholder="Enter Lead ID" required class="form-control">
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Lead_name">Lead Name<span class="required text-danger">*</span></label>
                                <input type="text" name="lead_name" id="Lead_name" placeholder="Enter Lead Name" required class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="active">Active<span class="required text-danger">*</span></label>
                                <select name="active" class="form-control">
                                    <option>Choose Type</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="campaign">Campaign<span class="required text-danger">*</span></label>
                                <select name="campaign" class="form-control">
                                    <option>Choose Campaign</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="OverwriteData">OverWrite Data<span class="required text-danger">*</span></label>
                                <select name="overwrite_data" class="form-control">
                                    <option>Choose Overwrite Data</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="checkduplicate">CheckDuplicate<span class="required text-danger">*</span></label>
                                <select class="form-control" id="checkduplicate" name="check_duplicate">
                                    <option selected value="select">Select Duplicate</option>
                                    <option value="yes">Yes</option>
                                    <option value="No">No</option>
                                    <!-- Add more options here -->
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Choose file">Choose file</label>
                                <input type="file" name="file" value="file1" id="Choose file" required class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="create_lead" class="btn btn-primary">Create</button>
                </div>

            </div>
        </div>
    </div>
</form>

<!-- Vertical modal end-->
<?php
include_once "footer1.php";
?>