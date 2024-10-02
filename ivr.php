<?php
include_once "header.php";
include_once "database/connect.php";

?>
<?php
//   1.get the id of admin to be deleted
$id = "";

if (isset($_GET['menu_id'])) {
    $id = $_GET['menu_id'];
    //   2.create sql query to delete admin
    $sql4 = "DELETE FROM ivr WHERE menu_id = $id";

    //   execute the query
    $res = mysqli_query($conn, $sql4);

    if ($res == true) {
        echo "admin deleted";
        echo "Deleted";
        header("location:ivr.php");
    } else {
        echo "can't delete";
        header("location:ivr.php");
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
                                                                                echo "Call Menu";
                                                                            } else {
                                                                                echo ucfirst($page);
                                                                            } ?></h2>
                        <button class="btn btn-primary d-block d-sm-none" id="button" data-toggle="modal" data-target="#createIvrModal" style="float:right;">Create New Call Record</button>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?page=dashboard">Home</a>
                                </li>
                                <li class="breadcrumb-item active"> <?php if ($page == "") {
                                                                        echo "Call Menu";
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
                <button class="btn btn-primary " id="button" data-toggle="modal" data-target="#createIvrModal">Create New Call Record</button>
            </div>
        </div>
        <div class="content-body">
            <!-- Kick start -->
            <div class="card">
                <div class="card-header p-1 bg-primary">
                    <h4 class="card-title text-white"><i data-feather="speaker" class="feather-icon animated-icon"></i>Call Menu</h4>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Menu ID</th>
                                <th>Name</th>
                                <th>Group</th>
                                <th>Prompt</th>
                                <th>Timeout</th>
                                <th>Options</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $get_menu = "SELECT * FROM ivr";
                                $result = mysqli_query($conn, $get_menu);
                                foreach ($result as $menu) {
                                    $id = $menu['menu_id'];
                                ?>
                                    <tr>
                                        <td><?php echo $menu['menu_id']; ?></td>
                                        <td><?php echo $menu['menu_name']; ?></td>
                                        <td><?php echo $menu['user_group']; ?></td>
                                        <td><?php echo $menu['menu_prompt']; ?></td>
                                        <td><?php echo $menu['menu_timeout']; ?></td>
                                        <td></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-primary mr-1 rounded editbtn" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button data-toggle="modal" data-target="#deleteIvrModal<?php echo $id; ?>" class="btn btn-danger rounded mr-1 " style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <form id="deleteIvr" method="post" enctype="multipart/form-data">
                                        <div class="modal fade" id="deleteIvrModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                    <div class="modal-footer mx-auto">
                                                        <a href="database/delete.php?ivr=<?php echo $id; ?>" data-target="#deleteIvrModal" name="delete_Ivr" class="btn btn-primary btn-icon center" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">
                                                            Yes
                                                        </a>
                                                        <button id="dontdeleteIvr" name="dontdeleteIvr" type="submit" class="btn btn-primary btn-icon center" data-dismiss="modal" aria-label="Close" style="padding-left: 6px; padding-right: 4px; padding-top: 7px; padding-bottom: 8px; border-top-width: 1px; width: 39px; height: 34px;">No</button>
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
        </div>
    </div>
</div>
<!-- END: Content-->
<!-- Vertical modal -->
<!-- Modal -->
<form method="post" enctype="multipart/form-data" action="database/create_menu.php">
    <div class=" modal fade bd-example-modal-lg" id="createIvrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="speaker" class="feather-icon animated-icon"></i>Create Call Menu</h5>
                    <button type="button" class="close fixed-button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="menu-id">Menu ID<span class="text-danger">*</span></label>
                                    <input type="number" id="menu-id" name="menu_id" placeholder="Enter Menu ID" maxlength="6" class="form-control" required oninput="validateForm();">
                                    <div id="menu-id-error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="menu-name">Menu Name<span class="text-danger">*</span></label>
                                    <input type="text" id="menu-name" name="menu_name" placeholder="Enter Menu Name" class="form-control" required oninput="validateForm();">
                                    <div id="menu-name-error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="usergroup">Process</label>
                                    <select class="form-control" name="user_group" id="user-group">

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
                                        <!-- <option>All Admin User Group</option>
<option>Admin - Vicidial Administrations</option>
<option>---ALL---</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="usergroup">Menu prompt</label>
                                    <select class="form-control" name="menu_prompt" id="menu-prompt">
                                        <option>filename</option>
                                        <option>filename</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="fullname">Menu Timeout</label>
                                    <input id="menu-timeout" type="text" name="menu_timeout" placeholder="Enter Menu Timeout" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="usergroup">Menu Timeout Prompt</label>
                                    <select class="form-control" name="menu_timeout_prompt" id="menu-timeout-prompt">
                                        <option>filename</option>
                                        <option>filename</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="usergroup">Menu Time Check</label>
                                    <select class="form-control" name="menu_invalid_prompt" id="menu-invalid-prompt">
                                        <option>filename</option>
                                        <option>filename</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="fullname">Menu Repeat</label>
                                    <input id="menu-repeat" type="text" name="menu_repeat" placeholder="Menu Repeat" class="form-control">
                                </div>
                            </div>
                        </div>
                        <span class="text-muted ">(<span class="text-danger">*</span>) Fields are .</span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="create-button" class="btn btn-primary" name="create">Create</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function validateForm() {
        var menuIdInput = document.getElementById("menu-id");
        var menuNameInput = document.getElementById("menu-name");
        var menuId = menuIdInput.value.trim();
        var menuName = menuNameInput.value.trim();
        var menuIdError = document.getElementById("menu-id-error");
        var menuNameError = document.getElementById("menu-name-error");
        var createButton = document.getElementById("create-button");
        menuIdError.innerHTML = ""; // Clear any previous error message
        menuNameError.innerHTML = ""; // Clear any previous error message

        if (menuId === "") {
            menuIdInput.classList.add("is-invalid");
            menuIdError.innerHTML = "Menu ID is required.";
            createButton.disabled = true; // Disable the Create button
            return;
        }

        if (isNaN(menuId)) {
            menuIdInput.classList.add("is-invalid");
            menuIdError.innerHTML = "Menu ID should be a number.";
            createButton.disabled = true; // Disable the Create button
            return;
        }

        if (menuName === "") {
            menuNameInput.classList.add("is-invalid");
            menuNameError.innerHTML = "Menu Name is required.";
            createButton.disabled = true; // Disable the Create button
            return;
        }

        checkMenuExists(menuId, menuName, function(exists) {
            if (exists.menuIdExists) {
                menuIdInput.classList.add("is-invalid");
                menuIdError.innerHTML = "Menu ID already exists.";
            } else {
                menuIdInput.classList.remove("is-invalid");
            }

            if (exists.menuNameExists) {
                menuNameInput.classList.add("is-invalid");
                menuNameError.innerHTML = "Menu Name already exists.";
            } else {
                menuNameInput.classList.remove("is-invalid");
            }

            if (!exists.menuIdExists && !exists.menuNameExists) {
                createButton.disabled = false; // Enable the Create button
            } else {
                createButton.disabled = true; // Disable the Create button
            }
        });
    }

    function checkMenuExists(menuId, menuName, callback) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "database/check_menu_exists.php", true); // Update the URL to your server-side file
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    callback(response);
                } else {
                    console.log("An error occurred.");
                    callback({
                        menuIdExists: false,
                        menuNameExists: false
                    });
                }
            }
        };

        var params = "menu_id=" + encodeURIComponent(menuId) +
            "&menu_name=" + encodeURIComponent(menuName);
        xhr.send(params);
    }
</script>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i data-feather="edit" class="feather-icon animated-icon"></i>Edit User</h5>
                <button type="button" class="close fixed-button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="database/edit.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div id="fieldsContainer">
                        <div class="row">
                            <input type="hidden" id="id" name="id" class="form-control">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="username">Menu ID<span class=" text-danger">*</span></label>
                                    <input type="number" id="menu_id1" name="menu-id1" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="secret">Menu Name<span class=" text-danger">*</span></label>
                                    <input type="text" id="menu_name1" name="menu-name1" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="usergroup">Process</label>
                                    <select class="form-control" id="user_group1" name="user-group1">


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
                                        <!-- <option>All Admin User Group</option>
                              <option>Admin - Vicidial Administrations</option>
                              <option>---ALL---</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="usergroup">Menu Prompt</label>
                                    <select class="form-control" id="menu_prompt1" name="menu-prompt1">
                                        <option>filename</option>
                                        <option>filename</option>
                                        <option>filename</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="fullname">Menu Timeout</label>
                                    <input id="menu_timeout1" name="menu-timeout1" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="usergroup">Menu Timeout Prompt</label>
                                    <select class="form-control" id="menu_time_prompt1" name="menu-time-prompt1">
                                        <!-- <option>Choose Type</option> -->
                                        <option>filename</option>
                                        <option>filename</option>
                                        <option>filename</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="usergroup">Menu Invalid Prompt</label>
                                    <select class="form-control" id="menu_invalid_prompt1" name="menu-invalid-prompt1">
                                        <option>filename</option>
                                        <option>filename</option>
                                        <option>filename</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="fullname">Menu Repeat</label>
                                    <input id="menu_repeat1" name="menu-repeat1" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="usergroup">Option</label>
                                    <select class="form-control" id="option1" name="option1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="fullname">Description</label>
                                    <input id="description1" type="text" class="form-control" name="description1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="usergroup">Route</label>
                                    <select class="form-control" id="routeS" name="routeS1">
                                        <option value="0">Select</option>
                                        <option value="hangup">Hangup</option>
                                        <option value="phone">Phone</option>
                                        <option value="voicemail">Voicemail</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <br>
                                    <button id="add" type="button" class="btn btn-primary" class="form-control" style="display:none">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group" id="choose_file">
                                <label for="fullname">Choose File</label>
                                <input type="file" class="form-control" id="choose_file1" name="choose-file1">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group" id="phone">
                                <label for="usergroup">Phone</label>
                                <select class="form-control" id="phone1" name="phone1">
                                    <option>127.1.1.23</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group" id="voice_mail">
                                <label for="fullname">Voice mail Box</label>
                                <input type="file" class="form-control" id="voice_mail1" name="voice-mail1">
                            </div>
                        </div>
                    </div>
                    <span class="text-muted ">(<span class="text-danger">*</span>) Fields are required.</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="edit" name="edit" class="btn btn-primary">Edit</button>
                </div>
        </div>
    </div>
</div>
</form>
<!-- Vertical modal end-->
<?php
include_once "footer.php";
?>