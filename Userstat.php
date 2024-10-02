<?php
include_once "header.php";
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Create -->
<!-- BEGIN: Content-->

<script>
    function exportTableToCSV(tableId, filename) {
  var csv = [];
  var rows = document.getElementById(tableId).querySelectorAll("tr");
  
  for (var i = 0; i < rows.length; i++) {
    var row = [], cols = rows[i].querySelectorAll("td, th");
    
    for (var j = 0; j < cols.length; j++) {
      row.push(cols[j].innerText);
    }
    
    csv.push(row.join(","));
  }
  
  var csvContent = "data:text/csv;charset=utf-8," + csv.join("\n");
  var encodedUri = encodeURI(csvContent);
  var link = document.createElement("a");
  link.setAttribute("href", encodedUri);
  link.setAttribute("download", filename + ".csv");
  document.body.appendChild(link);
  
  link.click();
}

function downloadReport(type2){
    if(type2 == '0'){
        exportTableToCSV('basic', 'report1');
    } else {
        exportTableToCSV('outbound-datatable', 'report2');
        //outbound-datatable
    }
}

</script>

<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
         <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <h2 class="content-header-title float-left mb-0">
                     <?php if ($page == "") {
                        echo "Reports";
                        } else {
                        echo ucfirst($page);
                        } ?>
                  </h2>
                  <!-- <button class="btn btn-primary d-block d-sm-none" id="button" data-toggle="modal" data-target="#addUserModal" style="float:right;">Add User Role</button> -->
                  <div class="breadcrumb-wrapper">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
                        <li class="breadcrumb-item active">
                           <?php if ($page == "") {
                              echo "User Status Report";
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
            <!-- <button class="btn btn-primary" id="button" data-toggle="modal" data-target="#addUserModal">Add User Role</button> -->
         </div>
      </div>

<div class="content-body">
         <!-- Kick start -->
         <div class="card">
            <div class="card-header p-1 bg-primary">
            <h4 class="card-title text-white" style="display:inline;margin-right:0;">User Status Report</h4>

               <span class="outbound_table" style="align-items:center !important;"></span>
               <i data-feather="list" class="feather-icon animated-icon"></i>
               <!-- <div class="export-buttons"></div> -->

<select class="form-select" onchange="downloadReport(this.value)" aria-label="Default select example">
  <option selected>Select a Report to Download</option>
  <option value="0">One</option>
  <option value="1">Two</option>
</select>
            </div>
            <div class="card-body p-2">
               <div class="row">
                  <div class="col-md-3">
                     
                  <div class="form-group" style="margin-bottom:10px;">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control datepicker-dropdown" placeholder="Start Date" name="start_date" id="start_date">
                     </div>
                     <!-- <h4 style="margin-left:80px;">Admin log-in and log-out<h4> -->
                  </div>
               </div>

               <h4 style="margin-left:420px;"> Admin login and logout</h4>
               <div class="table-responsive">

              </div>
             
<table class="table table-bordered black-border datatable" id="basic" style="margin-left: auto; margin-right: auto; width: 70%; margin-top: 20px; margin-bottom: 50px;">

<thead>
                       <tr>
                       <th class="text-center align-middle"> Date</th>
                          <th class="text-center align-middle">Event</th>
                          <th class="text-center align-middle">Time</th>
                       </tr>
                    </thead>
                    <tbody>
                       <tr>
                       <td class="text-center align-middle"> User1</td>
                          <td class="text-center align-middle">Log In</td>
                          <td class="text-center align-middle">03.00 PM</td>
                       </tr>
                       <tr>
                       <td class="text-center align-middle"> User2</td>
                          <td class="text-center align-middle">Log In</td>
                          <td class="text-center align-middle">04.00 PM</td>
                       </tr>
                       <tr>
                       <td class="text-center align-middle"> User3</td>
                          <td class="text-center align-middle">Log Out</td>
                          <td class="text-center align-middle">05.00 PM</td>
                       </tr>
                    </tbody>
                    <tfoot>
                       <tr>
                       <td class="text-center align-middle"> Username</td>
                          <td class="text-center align-middle"><strong>Total</strong></td>
                          <td class="text-center align-middle"><strong>2 hours</strong></td>
                       </tr>
                    </tfoot>
                 </table>
                 <br>
          
</div>



<div class="table-responsive">

<table class="table table-bordered black-border datatables-basic display" id="outbound-datatable" style="margin-left: auto; margin-right: auto; width: 70%; margin-bottom:50px;">
      <thead>
         <tr>
            <th class="text-center align-middle">Date</th>
            <th class="text-center align-middle">Time</th>
            <th class="text-center align-middle">Mobile Number</th>
            <th class="text-center align-middle">Inbound/Outbound</th>
            <th class="text-center align-middle">Status</th>
            <th class="text-center align-middle">Ring Time</th>
            <th class="text-center align-middle">Talk Time</th>
            <th class="text-center align-middle">Total Duration Time</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td class="text-center align-middle">19/7/23</td>
            <td class="text-center align-middle">6.00 A.M.</td>
            <td class="text-center align-middle">9423962391</td>
            <td class="text-center align-middle">Inbound</td>
            <td class="text-center align-middle">Not Answerd</td>
            <td class="text-center align-middle"> - </td>
            <td class="text-center align-middle"> - </td>
            <td class="text-center align-middle"> - </td>
         </tr>
         <tr>
            <td class="text-center align-middle">20/07/2023</td>
            <td class="text-center align-middle">7.00 A.M.</td>
            <td class="text-center align-middle">840885674</td>
            <td class="text-center align-middle">Outbound</td>
            <td class="text-center align-middle">Answered</td>
            <td class="text-center align-middle">0.7sec</td>
            <td class="text-center align-middle">20sec</td>
            <td class="text-center align-middle">20.7sec</td>
         </tr>
         <tr>
            <td class="text-center align-middle">19/07/2023</td>
            <td class="text-center align-middle">8.00 A.M.</td>
            <td class="text-center align-middle">7034718705</td>
            <td class="text-center align-middle">Inbound</td>
            <td class="text-center align-middle">Answered</td>
            <td class="text-center align-middle">0.7sec</td>
            <td class="text-center align-middle">20sec</td>
            <td class="text-center align-middle">20.7sec</td>
         </tr>
      </tbody>
   </table>

                           
</div>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.flash.min.js"></script>


  
  <script>
    $(document).ready(function() {
   
      var table = $('#basic').DataTable({
        lengthMenu: [10, 25, 50, 75, 100],
        ordering: false,
        buttons: [
          {
            extend: 'collection',
            className: 'btn btn-outline-secondary dropdown-toggle ml-5 custom-button',
            text: 'Download..',
            buttons: [
              {
                extend: 'print',
                text: '<i class="feather icon-printer"></i> Print',
                className: 'dropdown-item',
                exportOptions: { columns: [0, 1,2] }
              },
              {
                extend: 'csv',
                text: '<i class="feather icon-file-text"></i> CSV',
                className: 'dropdown-item',
                exportOptions: { columns: [0, 1,2] }
              },
              {
                extend: 'excel',
                text: '<i class="feather icon-file"></i> Excel',
                className: 'dropdown-item',
                exportOptions: { columns: [0, 1,2] }
              },
              {
                extend: 'pdf',
                text: '<i class="feather icon-clipboard"></i> PDF',
                className: 'dropdown-item',
                exportOptions: { columns: [0, 1,2] }
              },
              {
                extend: 'copy',
                text: '<i class="feather icon-copy"></i> Copy',
                className: 'dropdown-item',
                exportOptions: { columns: [2, 3] }
              }
            ]
          }
        ]
      });

      $('<div/>').addClass('custom-export-buttons').append(
        table.buttons().container()
      ).appendTo('.custom-export-buttons');
    });
  </script>

<?php
include "footer2.php";
?>