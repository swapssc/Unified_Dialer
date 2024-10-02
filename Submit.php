<?php
include_once "Connect_db.php";
if (isset($_POST['create_lead'])) 
{
    
$sql = "INSERT INTO Lead(lead_id, lead_name, active, campaign, overwrite_data, check_duplicate, file) VALUES 
('" . $_POST['lead_id'] . "', '" . $_POST['lead_name'] . "','" . $_POST['active'] . "','" . $_POST['campaign'] . "','" . $_POST['overwrite_data'] . "', '" . $_POST['check_duplicate'] . "', '" . $_POST['file'] . "')";
echo $sql;
if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
} else {
    echo "Could not insert record: " . mysqli_error($conn);
}
      header("location:../Lead1.php");
    mysqli_close($conn);
}





if (isset($_POST['edit_lead'])) {
    echo "edit lead";
    // get values form form to update
    $id = $_POST['id'];
    $lead_id = $_POST['lead_id'];
    $lead_name = $_POST['lead_name'];
    $active = $_POST['active'];
    $campaign = $_POST['campaign'];
    $overwrite_data = $_POST['overwrite_data'];
    $file = "";
    $check_duplicate = $_POST['check_duplicate'];

    $target_dir = "../Images_store/";

    $temp = explode(".", $_FILES["file1"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);

    $target_file = $target_dir . $newfilename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    // // Allow certain file formats
    // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    // && $imageFileType != "gif" ) {
    //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //   $uploadOk = 0;
    // }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file1"]["tmp_name"], "../Images_store/" . $newfilename)) {


            $query = "UPDATE Lead SET
        lead_id ='$lead_id ',
        lead_name ='$lead_name',
        active ='$active',
        campaign='$campaign',
        overwrite_data='$overwrite_data',
        file= '$newfilename', 
        -- file='$file ',
        check_duplicate = '$check_duplicate'
                WHERE id='$id'
             ";

            echo $query;
            $res = mysqli_query($conn, $query);
            if ($res) {
                header('location:../Lead1.php');
            } else {

                header('location:../Lead1.php');
            }



            // echo "The file ". htmlspecialchars( basename( $_FILES["file1"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file. - ";
            print_r($_FILES['file1']);
        }
    }
}

mysqli_close($conn);
