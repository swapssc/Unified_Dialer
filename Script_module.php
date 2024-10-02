<?php
include_once "header2.php";
include_once "Databases/Connect_db.php";

?>

<?php

//   1.get the id of admin to be deleted
$id = $_GET['id'];
//   2.create sql query to delete admin
$sql4 = "DELETE FROM script WHERE id = $id";

//   execute the query
$res = mysqli_query($conn, $sql4);

if ($res == true) {
    echo "admin deleted";
    echo "Deleted";
    header("location:../Script_module.php");
} else {
    echo "can't delete";
    header("location:../Script_module.php");
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
                                                                                echo "Script";
                                                                            } else {
                                                                                echo ucfirst($page);
                                                                            } ?>
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="?page=dashboard">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><?php if ($page == "") {
                                                                        echo "Script";
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#createExtensionModal">Create Script</button>
            </div>
        </div>
        <div class="content-body">
            <!-- Kick start -->
            <div class="card">
                <div class="card-header p-1 bg-primary">
                    <h4 class="card-title text-white"><i data-feather="Script" class="feather-icon animated-icon"></i> Script</h4>
                </div>

                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Script Name </th>
                                <th>Script</th>
                                <th>Action</th>

                            </thead>
                            <tbody>

                                <?php
                                //query to get all admins from database 
                                $sql = "SELECT * FROM script";
                                $res = mysqli_query($conn, $sql);

                                foreach ($res as $menu) {
                                  
                                    $id = $menu['id'];
                                    $script_name = $menu['script_name'];
                                    $script = $menu['script'];
                                    // 


                                ?>
                                    <tr>
                                        <td><?php echo $menu['script_name']; ?></td>
                                        <td>
                <button class="btn btn-link" type="button" name="viewscript" data-toggle="modal" data-target="#viewScriptModal<?php echo $id; ?>">
                    View Script
                </button>
            </td>
                                        <!-- <td>
                                            
                                            <button class="btn btn-link" type="button"  name="viewscript"data-toggle="collapse" data-target="#viewScript<?php echo $id; ?>" aria-expanded="false" aria-controls="viewScript<?php echo $id; ?>">
                                                View Script
                                            </button>
                                        </td> -->

                                        <td>
                                            <div class="btn-group" role="group">
                                                <button data-toggle="modal" data-target="#editScriptModal<?php echo $id; ?>" class="btn btn-primary mr-1 rounded" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                                    <i class="fa fa-edit "></i></button>
                                                <button data-toggle="modal" data-target="#deleteScriptModal<?php echo $id; ?>" class="btn btn-danger rounded mr-1 " style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                              
                                            </div>
                                        </td>

                                        <!-- <td colspan="3">
                <div class="collapse" id="viewScript<?php echo $id; ?>">
                    <?php echo $menu['script']; ?>
                </div>
            </td> -->
                                        </tr>
                                    
                                        <!-- <td colspan="3">
                <div class="collapse" id="viewScript
                </div>
            </td> -->
          

            <form method="post" action="Databases/Submitt.php">
            <div class="modal fade" name="viewscript" id="viewScriptModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="viewScriptModalLabel<?php echo $id; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="viewScriptModalLabel<?php echo $id; ?>">
                                <i data-feather="eye" class="feather-icon animated-icon"></i> View Script
                            </h5>
                            <button type="button" name="viewscript" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo $menu['script']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>

                                    <form method="post" action="Databases/Submitt.php">
                                        <div class="modal fade" id="editScriptModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="edit" class="feather-icon animated-icon"></i> Edit Script</h5>
                                                        <button type="button" class="close fixed-button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>



                                                    <div class="modal-body">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="Script_name">Script Name<span class="required text-danger">*</span></label>
                                                                <input type="text" name="script_name" id="Script_name" value="<?php echo $menu['script_name']; ?>" placeholder="Enter Script Name" required class="form-control">
                                                            </div>
                                                        </div>



                                                        <!-- 
                                                        <div class="form-floating">
                                                            <label for="Script">
                                                                Script(*)
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#viewScript<?php echo $id; ?>" aria-expanded="false" aria-controls="viewScript<?php echo $id; ?>">
                                                                    View Script
                                                                </button>
                                                            </label>
                                                            <textarea class="form-control" placeholder="Enter Script" id="Script" name="script" style="width:400px; height:60px;"><?php echo $menu['script']; ?></textarea>
                                                        </div>
                                                        <div class="collapse" id="viewScript
                                                        </div> -->


                                                        <div class="col-lg-6">
                                                            <div class="form-floating">
                                                                <label for="Script">Script(*)</label>
                                                                <textarea class="form-control" placeholder="Enter Script" id="Script" name="script" style="width:400px; height:60px;"><?php echo $menu['script']; ?></textarea>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        <button type="submit" name="edit_submit" class="btn btn-primary">Submit</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>


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
<form method="post" action="Databases/Submitt.php">
    <div class="modal fade" id="createExtensionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="user" class="feather-icon animated-icon"></i> Create Scipt</h5>
                    <button type="button" class="close fixed-button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <input type="hidden" name="create_script" value="true"> -->

                <div class="modal-body">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Script_name">Script Name(*)</label>
                            <input name="script_name" id="Script_name" type="text" placeholder="Enter Script Name" required class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="form-floating">
                                <label for="Script">Script(*)</label>
                                <input name="script" textarea class="form-control" placeholder="Enter Script" id="Script" name="script" style="width:400px; height:60px;"></input>
                            </div>
                        </div>
                    </div>

                    <span class="text-muted ">(<span class="text-danger">*</span>) Fields are Required.</span>
                </div>
                <!-- <div class="modal-footer">
                    <button type="submit" name="create_button" class="btn btn-primary">Create</button>
                </div> -->


                <div class="modal-footer">
                    <button type="submit" name="create_button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal -->



<?php

?>





<!-- Vertical modal end-->
<?php
include_once "footer1.php";
?>