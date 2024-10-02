<?php
include_once "header.php";
include_once "database/connect.php";

?>
<?php
//   1.get the id of admin to be deleted
$id = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //   2.create sql query to delete admin
    $sql4 = "DELETE FROM users WHERE id = $id";

    //   execute the query
    $res = mysqli_query($conn, $sql4);

    if ($res == true) {
        echo "admin deleted";
        echo "Deleted";
        header("location:users.php");
    } else {
        echo "can't delete";
        header("location:users.php");
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
                                                                                echo "Users";
                                                                            } else {
                                                                                echo ucfirst($page);
                                                                            } ?></h2>
                        <button class="btn btn-primary d-block d-sm-none" style="float:right;" id="button" data-toggle="modal" data-target="#createUsersModal">Create User</button>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?page=dashboard">Home</a>
                                </li>
                                <li class="breadcrumb-item active"> <?php if ($page == "") {
                                                                        echo "Users";
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
                <button class="btn btn-primary " id="button" data-toggle="modal" data-target="#createUsersModal">Create User</button>
            </div>
        </div>
        <div class="content-body">
            <!-- Kick start -->
            <div class="card">
                <div class="card-header p-1 bg-primary">
                    <h4 class="card-title text-white"><i data-feather="user" class="feather-icon animated-icon"></i> Users</h4>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>User Name</th>
                                <th>Full Name</th>
                                <th>Process</th>
                                <th>Active</th>
                                <th>Employee Id</th>
                                <th>User Roles</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                //query to get all admins from database 
                                $sql = "SELECT * FROM users";
                                $res = mysqli_query($conn, $sql);

                                foreach ($res as $menu) {
                                    //count rows to check whether we have admins in database
                                    // $count = mysqli_num_rows($res);
                                    // echo $count;
                                    // die();
                                    // function to get all rows in the database
                                    // if($count>0){
                                    // while($rows = mysqli_fetch_assoc($res)){
                                    $id = $menu['id'];
                                    $username = $menu['username'];
                                    $secret = $menu['secret'];
                                    $full_name = $menu['full_name'];
                                    $process = $menu['process'];
                                    $active = $menu['active'];
                                    $email = $menu['email'];
                                    $employee_id = $menu['employee_id'];
                                    $user_roles = $menu['user_roles'];
                                    $extension_no = $menu['extension_no'];
                                    $outbound_caller_id = $menu['outbound_caller_id'];
                                    $protocol = $menu['protocol'];
                                    $call_recording = $menu['call_recording'];
                                    // 
                                ?>
                                    <tr>
                                        <td><?php echo $menu['username']; ?></td>
                                        <td><?php echo $menu['full_name']; ?></td>
                                        <td><?php echo $menu['process']; ?></td>
                                        <td><?php echo $menu['active']; ?></td>
                                        <td><?php echo $menu['employee_id']; ?></td>
                                        <td><?php echo $menu['user_roles']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button data-toggle="modal" data-target="#editUsersModal<?php echo $id; ?>" class="btn btn-primary mr-1 rounded" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                                    <i class="fa fa-edit "></i></button>
                                                <button data-toggle="modal" data-target="#deleteUsersModal<?php echo $id; ?>" class="btn btn-danger rounded mr-1 " style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <!-- 
                                    <a href="delete.php?del=<?php echo $id; ?>" name="delete" class="btn btn-danger rounded" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                        <i class="fa fa-trash"></i>
                                    </a> -->
                                            </div>
                                        </td>
                                    </tr>
                                    <form method="post" action="database/submit.php">
                                        <div class="modal fade" id="editUsersModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="edit" class="feather-icon animated-icon"></i> Edit User</h5>
                                                        <button type="button" class="close fixed-button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="username">User Name<span class="required text-danger">*</span></label>
                                                                    <input type="text" name="username" placeholder="Enter User Name" value="<?php echo $menu['username']; ?>" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="fullname">Full Name<span class="required text-danger">*</span></label>
                                                                    <input id="fullname" name="full_name" type="text" placeholder="Enter Full Name" value="<?php echo $menu['full_name']; ?>" required class="form-control">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="process">Process<span class="required text-danger">*</span></label>
                                                                    <select name="process" class="form-control">
                                                                        <?php
                                                                        $query1 = "SELECT * FROM process";
                                                                        $res = mysqli_query($conn, $query1);

                                                                        if (mysqli_num_rows($res) > 0) {
                                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                                $selected = '';
                                                                                if (in_array($row['process'], $_POST['process'])) {
                                                                                    $selected = 'selected';
                                                                                }
                                                                                echo '<option value="' . $row['process_name'] . '" ' . $selected . '>' . $row['process_name'] . '</option>';
                                                                            }
                                                                        } else {
                                                                            echo '<option value="">No record found</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <!-- <input type="text" placeholder="Enter User Group" required class="form-control"> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="secret">Secret<span class="required text-danger">*</span></label>
                                                                    <input type="text" name="secret" value="<?php echo $menu['secret']; ?>" id="secret2" onkeyup="checkPasswordValidity(this.value)" placeholder="Enter Secret" required class="form-control">
                                                                    <small class="text-danger" id="pass-validate"></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="active">Active<span class="required text-danger">*</span></label>
                                                                    <select name="active" class="form-control">
                                                                        <option selected value="A" <?php if ($menu['active'] == "A") {
                                                                                                        echo "selected";
                                                                                                    } ?>>A</option>
                                                                        <option value="B" <?php if ($menu['active'] == "B") {
                                                                                                echo "selected";
                                                                                            } ?>>B</option>
                                                                        <option value="C" <?php if ($menu['active'] == "C") {
                                                                                                echo "selected";
                                                                                            } ?>>C</option>
                                                                    </select>
                                                                    <!-- <input type="text" placeholder="Enter Active" required class="form-control"> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" name="email" value="<?php echo $menu['email']; ?>" placeholder="Enter Email" required class="form-control">
                                                                    <!-- <input id="secret-validation-msg" name="full_name" type="hidden"  required class="form-control"> -->
                                                                    <!-- <input type="hidden" id="secret-validation-msg" class="form-text text-muted">> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="employeeid">Employee Id<span class="required text-danger">*</span></label>
                                                                    <input type="text" value="<?php echo $menu['employee_id']; ?>" name="employee_id" placeholder="Enter Employee Id" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="userroles">User Roles<span class="required text-danger">*</span></label>
                                                                    <select name="user_roles" class="form-control">

                                                                        <?php
                                                                        $query1 = "SELECT * FROM user_roles";
                                                                        $res = mysqli_query($conn, $query1);

                                                                        if (mysqli_num_rows($res) > 0) {
                                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                                $selected = '';
                                                                                if (in_array($row['user_roles'], $_POST['user_roles'])) {
                                                                                    $selected = 'selected';
                                                                                }
                                                                                echo '<option value="' . $row['name'] . '" ' . $selected . '>' . $row['name'] . '</option>';
                                                                            }
                                                                        } else {
                                                                            echo '<option value="">No record found</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <!-- <input type="text" placeholder="Enter User Roles" required class="form-control"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-header bg-primary">
                                                        <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="edit" class="feather-icon animated-icon"></i>Edit Extension</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="extension_no">Extension No.<span class="required text-danger">*</span></label>
                                                                    <input type="text" name="extension_no" value="<?php echo $menu['extension_no']; ?>" placeholder="Enter Extension No." required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="outbound_caller_id">Outbound Caller Id<span class="required text-danger">*</span></label>
                                                                    <input id="outbound_caller_id" name="outbound_caller_id" value="<?php echo $menu['outbound_caller_id']; ?>" type="text" placeholder="Enter Outbound Caller Id" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="protocol">Protocol<span class="required text-danger">*</span></label>
                                                                    <select name="protocol" class="form-control">
                                                                        <option selected value="A" <?php if ($menu['user_roles'] == "A") {
                                                                                                        echo "selected";
                                                                                                    } ?>>A</option>
                                                                        <option value="B" <?php if ($menu['user_roles'] == "B") {
                                                                                                echo "selected";
                                                                                            } ?>>B</option>
                                                                        <option value="C" <?php if ($menu['user_roles'] == "C") {
                                                                                                echo "selected";
                                                                                            } ?>>C</option>
                                                                    </select>
                                                                    <!-- <input type="text" placeholder="Enter User Group" required class="form-control"> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="call_recording">Call Recording<span class="required text-danger">*</span></label>
                                                                    <select name="call_recording" class="form-control">
                                                                        <option selected value="YES" <?php if ($menu['user_roles'] == "YES") {
                                                                                                            echo "selected";
                                                                                                        } ?>>Yes</option>
                                                                        <option value="NO" <?php if ($menu['user_roles'] == "NO") {
                                                                                                echo "selected";
                                                                                            } ?>>No</option>
                                                                    </select>
                                                                    <!-- <input type="text" placeholder="Enter User Group" required class="form-control"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-muted ">(<span class="text-danger">*</span>) Fields are Required.</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        <button type="submit" name="edit_submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form id="deleteusers" method="post" enctype="multipart/form-data">
                                        <div class="modal fade" id="deleteUsersModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="trash" class="feather-icon animated-icon"></i> Delete Users</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center mt-2"><b>Do you really want to delete ? </b></p>
                                                    </div>
                                                    <!-- </div> -->
                                                    <div class="modal-footer mx-auto">
                                                        <!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->
                                                        <a href="database/delete.php?del=<?php echo $id; ?>" data-target="#deleteUsersModal" name="delete_users" class="btn btn-primary btn-icon center" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                                            Yes
                                                        </a>
                                                        <!-- <button id="deleteprocess" name="deleteprocess" type="submit" class="btn btn-primary btn-icon">Yes</button> -->
                                                        <button id="dontdeleteusers" name="dontdeleteusers" type="submit" class="btn btn-primary btn-icon center" data-dismiss="modal" aria-label="Close" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- <script>
                           document.getElementById("secret").addEventListener("input", validatePassword);
                           
                           function validatePassword() {
                               var passwordInput = document.getElementById("secret");
                               // var validationMsg = document.getElementById("secret-validation-msg");
                           
                               var password = passwordInput.value;
                               var pattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                           
                               if (!pattern.test(password)) {
                                   passwordInput.setCustomValidity("Password must contain at least 8 characters, including one letter and one number.");
                                   validationMsg.style.display = "block";
                               } else {
                                   passwordInput.setCustomValidity("");
                                   validationMsg.style.display = "none";
                               }
                           }
                                                           
                           </script> -->
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
<form method="post" action="database/submit.php" oninput="validateForm();">
    <div class="modal fade" id="createUsersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="user" class="feather-icon animated-icon"></i> Create User</h5>
                    <button type="button" class="close fixed-button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="username">User Name<span class="required text-danger">*</span></label>
                                <input type="text" name="username" id="username" placeholder="Enter User Name" class="form-control" required oninput="validateForm();">
                                <small class="text-danger" id="username-validation"></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fullname">Full Name<span class="required text-danger">*</span></label>
                                <input id="fullname" name="full_name" type="text" placeholder="Enter Full Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="process">Process<span class="required text-danger">*</span></label>
                                <select name="process" class="form-control">

                                    <?php
                                    $query1 = "SELECT * FROM process";
                                    $res = mysqli_query($conn, $query1);

                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $selected = '';
                                            if (in_array($row['process'], $_POST['process'])) {
                                                $selected = 'selected';
                                            }
                                            echo '<option value="' . $row['process_name'] . '" ' . $selected . '>' . $row['process_name'] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No record found</option>';
                                    }
                                    ?>
                                    <!-- <option>Choose Type</option> -->
                                    <!-- <option selected value="A">A</option>
                           <option value="B">B</option>
                           <option value="C">C</option> -->
                                </select>
                                <!-- <input type="text" placeholder="Enter User Group" required class="form-control"> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="secret">Secret<span class="required text-danger">*</span></label>
                                <input type="password" name="secret" id="secret" placeholder="Enter Secret" required class="form-control" oninput="validateForm();">
                                <small class="text-danger" id="secret-validation"></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="active">Active<span class="required text-danger">*</span></label>
                                <select name="active" class="form-control">
                                    <!-- <option>Choose Type</option> -->
                                    <option selected value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                                <!-- <input type="text" placeholder="Enter Active" required class="form-control"> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control" oninput="validateForm();">
                                <small class="text-danger" id="email-validation"></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="employee_id">Employee ID<span class="required text-danger">*</span></label>
                                <input type="text" name="employee_id" id="employee_id" placeholder="Enter Employee ID" required class="form-control" oninput="validateForm();">
                                <small class="text-danger" id="employee-id-validation"></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="userroles">User Roles<span class="required text-danger">*</span></label>
                                <select name="user_roles" class="form-control">

                                    <?php
                                    $query1 = "SELECT * FROM user_roles";
                                    $res = mysqli_query($conn, $query1);

                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $selected = '';
                                            if (in_array($row['user_roles'], $_POST['user_roles'])) {
                                                $selected = 'selected';
                                            }
                                            echo '<option value="' . $row['name'] . '" ' . $selected . '>' . $row['name'] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No record found</option>';
                                    }
                                    ?>
                                    <!-- <option>Choose Type</option> -->
                                    <!-- <option selected value="A">A</option>
                           <option value="B">B</option>
                           <option value="C">C</option> -->
                                </select>
                                <!-- <input type="text" placeholder="Enter User Roles" required class="form-control"> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
               <button type="submit" name="create_button" class="btn btn-primary">Create</button>
               </div> -->
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="user" class="feather-icon animated-icon"></i> Create Extension</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="extension_no">Extension No.<span class="required text-danger">*</span></label>
                                <input type="text" name="extension_no" id="extension_no" placeholder="Enter Extension No." required class="form-control" oninput="validateForm();">
                                <small class="text-danger" id="extension-no-validation"></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="outbound_caller_id">Outbound Caller Id<span class="required text-danger">*</span></label>
                                <input id="outbound_caller_id" name="outbound_caller_id" type="text" placeholder="Enter Outbound Caller Id" required class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="protocol">Protocol<span class="required text-danger">*</span></label>
                                <select name="protocol" class="form-control">
                                    <option selected value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                                <!-- <input type="text" placeholder="Enter User Group" required class="form-control"> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="call_recording">Call Recording<span class="required text-danger">*</span></label>
                                <select name="call_recording" class="form-control">
                                    <option selected value="YES">Yes</option>
                                    <option value="NO">No</option>
                                </select>
                                <!-- <input type="text" placeholder="Enter User Group" required class="form-control"> -->
                            </div>
                        </div>
                    </div>
                    <span class="text-muted ">(<span class="text-danger">*</span>) Fields are Required.</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="create_button" id="create-button" class="btn btn-primary" disabled>Create</button>
                </div>
                <div id="validation-errors"></div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->
<?php
//get id of selected admin
$id = $_GET['id'];
//create sql query to get details
$sql2 = "SELECT * FROM users WHERE id = $id";
//execute the query
$res = mysqli_query($conn, $sql2);
//check whether query is executed
if ($res == true) {
    //check whether data is avilable
    $count = mysqli_num_rows($res);
    //check whether we have admin data or not
    if ($count > 0) {
        if ($count == 1) {
            //get the details
            $row = mysqli_fetch_assoc($res);
            $username = $row['username'];
            $secret = $row['secret'];
            $full_name = $row['full_name'];
            $user_group = $row['user_group'];
            $active = $row['active'];
            $email = $row['email'];
            $employee_id = $row['employee_id'];
            $user_roles = $row['user_roles'];
        } else {
            //redirect to manage - admin page 
            header("location:../users.php");
        }
    }
}

?>
<?php
?>
<script>
    function validateForm() {
        var usernameInput = document.getElementById("username");
        var secretInput = document.getElementById("secret");
        var emailInput = document.getElementById("email");
        var employeeIdInput = document.getElementById("employee_id");
        var extensionInput = document.getElementById("extension_no");

        var username = usernameInput.value.trim();
        var secret = secretInput.value;
        var email = emailInput.value.trim();
        var employeeId = employeeIdInput.value.trim();
        var extension = extensionInput.value.trim();

        var usernameError = document.getElementById("username-validation");
        var secretError = document.getElementById("secret-validation");
        var emailError = document.getElementById("email-validation");
        var employeeIdError = document.getElementById("employee-id-validation");
        var extensionError = document.getElementById("extension-no-validation");

        // Clear any previous error messages
        usernameError.innerHTML = "";
        secretError.innerHTML = "";
        emailError.innerHTML = "";
        employeeIdError.innerHTML = "";
        extensionError.innerHTML = "";

        // Regular expressions for validations
        var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/;
        var numberRegex = /^\d+$/;

        // Validate each field

        // Username validation
        if (username === "") {
            usernameInput.classList.add("is-invalid");
            usernameError.innerHTML = "Username is required.";
        } else {
            usernameInput.classList.remove("is-invalid");
        }

        // Secret validation
        if (secret === "") {
            secretInput.classList.add("is-invalid");
            secretError.innerHTML = "Secret is required.";
        } else if (!passwordRegex.test(secret)) {
            secretInput.classList.add("is-invalid");
            secretError.innerHTML =
                "Secret must contain at least 1 uppercase letter, 1 lowercase letter, 1 numeric digit, and 1 special character.";
        } else {
            secretInput.classList.remove("is-invalid");
        }

        // Email validation
        if (email === "") {
            emailInput.classList.add("is-invalid");
            emailError.innerHTML = "Email is required.";
        } else if (!emailRegex.test(email)) {
            emailInput.classList.add("is-invalid");
            emailError.innerHTML = "Email must be a valid email address.";
        } else {
            emailInput.classList.remove("is-invalid");
        }

        // Employee ID validation
        if (employeeId === "") {
            employeeIdInput.classList.add("is-invalid");
            employeeIdError.innerHTML = "Employee ID is required.";
        } else if (!numberRegex.test(employeeId)) {
            employeeIdInput.classList.add("is-invalid");
            employeeIdError.innerHTML = "Employee ID must be a valid number.";
        } else {
            employeeIdInput.classList.remove("is-invalid");
        }

        // Extension validation
        if (extension === "") {
            extensionInput.classList.add("is-invalid");
            extensionError.innerHTML = "Extension number is required.";
        } else if (!numberRegex.test(extension)) {
            extensionInput.classList.add("is-invalid");
            extensionError.innerHTML = "Extension number must be a valid number.";
        } else {
            extensionInput.classList.remove("is-invalid");
        }

        // Check if any field has validation errors
        var hasErrors =
            usernameInput.classList.contains("is-invalid") ||
            secretInput.classList.contains("is-invalid") ||
            emailInput.classList.contains("is-invalid") ||
            employeeIdInput.classList.contains("is-invalid") ||
            extensionInput.classList.contains("is-invalid");

        var createButton = document.getElementById("create-button");
        createButton.disabled = hasErrors;

        // Perform server-side validation
        if (!hasErrors) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "database/check_user_fields.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            var data = "username=" + encodeURIComponent(username) +
                "&employee_id=" + encodeURIComponent(employeeId) +
                "&extension_no=" + encodeURIComponent(extension);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.usernameExists) {
                            usernameInput.classList.add("is-invalid");
                            usernameError.innerHTML = "Username already exists.";
                        }
                        if (response.employeeIdExists) {
                            employeeIdInput.classList.add("is-invalid");
                            employeeIdError.innerHTML = "Employee ID already exists.";
                        }
                        if (response.extensionExists) {
                            extensionInput.classList.add("is-invalid");
                            extensionError.innerHTML = "Extension number already exists.";
                        }
                    } else {
                        console.log("An error occurred.");
                    }
                }
            };

            xhr.send(data);
        }
    }
</script>
<!-- Vertical modal end-->
<?php
include_once "footer.php";
?>