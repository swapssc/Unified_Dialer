<?php
$conn = mysqli_connect("localhost", "root", "Root@1234", "vicidial");
//SELECT * FROM `cdr` WHERE calldate BETWEEN '2021-09-27 00:00:00' AND '2021-09-30 23:59:59'
?>
<form method="post">
    <input type="datetime-local" <?php if(isset($_POST['end_stamp'])){ echo "value='" . $_POST['start_stamp'] . "'"; } ?> name="start_stamp">
    <input type="datetime-local" <?php if(isset($_POST['end_stamp'])){ echo "value='" . $_POST['end_stamp'] . "'"; } ?> name="end_stamp">
    <select name="direction">
        <option <?php if(isset($_POST['direction'])){ if($_POST['direction'] == 'All'){ echo "selected"; } } ?>>All</option>
        <option <?php if(isset($_POST['direction'])){ if($_POST['direction'] == 'Outbound'){ echo "selected"; } } ?>>Outbound</option>
        <option <?php if(isset($_POST['direction'])){ if($_POST['direction'] == 'Inbound'){ echo "selected"; } } ?>>Inbound</option>
        <option <?php if(isset($_POST['direction'])){ if($_POST['direction'] == 'Local'){ echo "selected"; } } ?>>Local</option>
    </select>
    <button>Search</button>
</form>
<?php
if(isset($_POST['start_stamp'])){
    $start_stamp = $_POST['start_stamp'];
    $end_stamp = $_POST['end_stamp'];
    $get_direction = $_POST['direction'];
    ?>
<table>
    <thead>
        <th>Call Date</th>
        <th>From</th>
        <th>To</th>
        <th>Duration</th>
        <th>Talk Time</th>
        <th>Ring Time</th>
        <th>Direction</th>
    </thead>
    <tbody>
        <?php
            $fetchReports = mysqli_query($conn, "SELECT * FROM `cdr` WHERE calldate BETWEEN '$start_stamp' AND '$end_stamp'");
            while($report = mysqli_fetch_assoc($fetchReports)){
                $direction = "";
                if(strlen($report['src']) < 8){
                    $direction = "Outbound";
                }
                if(strlen($report['src']) > 8){
                    $direction = "Inbound";
                }
                if(strlen($report['src']) < 8 && strlen($report['dst']) < 8){
                    $direction = "Local";
                }
                if($get_direction == $direction || $get_direction == "All"){
                ?>
                    <tr>
                        <td><?php echo $report['calldate']; ?></td>
                        <td><?php echo $report['src']; ?></td>
                        <td><?php echo $report['dst']; ?></td>
                        <td><?php echo gmdate("H:i:s", $report['duration']); ?></td>
                        <td><?php echo $report['billsec']; ?></td>
                        <td><?php echo $report['duration']-$report['billsec']; ?></td>
                        <td><?php 
                            echo $direction;
                        ?></td>
                    </tr>
                    <?php
                }
            } 
        ?>  
    </tbody>
</table>
    <?php
}
?>

<?php

mysqli_close($conn);
?>