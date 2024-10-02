<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include_once "Connect_db.php";
//  echo "asd";
if (isset($_POST['create_button'])) 
{
// echo "asd";F
$sql = "INSERT INTO script(script_name,script) VALUES('" . $_POST['script_name'] . "', '" . $_POST['script'] . "')";
// echo $sql;

if (mysqli_query($conn, $sql)) 
{
    echo "Record inserted successfully";
    header("location:../Script_module.php");
} else 
{
    echo "Could not insert record: " . mysqli_error($conn);
    header("location:../Script_module.php");
}
    //   header("location:../Script.php");
    mysqli_close($conn);
}


    //check whether submit button is clicked or not
    if(isset($_POST['edit_submit'])){
        // get values form form to update
        $id = $_POST['id'];
        $script_name= $_POST['script_name'];
        $script = $_POST['script'];
      

         //sql query to update admin
         $sql3 = "UPDATE script SET
            script_name = '$script_name',
            script = '$script'
            
            WHERE id='$id'
         ";

         $res = mysqli_query($conn,$sql3);
         if($res == true){
            echo "script Updated";
            header("location:../Script_module.php");
         }else{
            echo "Error";
            header("location:../Script_module.php");
         }
        
    }

mysqli_close($conn);
?>
