<?php
   include_once "header.php";
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

   .custom-button{
      margin-right: 0px !important;
      margin-left: 0px !important;
      margin-bottom: 0px !important;
      padding: 10px 20px !important;
      background-color: #dc3545 !important;
      color: #fff !important;
      border: none !important;
      border-radius: 4px !important;
      cursor: pointer !important;
   }
   .dataTables_filter label {
   display: inline-block;
   margin-right: 3px;
}

.dataTables_filter input[type="search"] {
   display: inline-block;
   width: 200px; /* Adjust the width as per your preference */
   border: 1px solid #ccc;
}
#inbound-datatable_length label {
   display: inline-block;
   margin-right: 10px;
}

#inbound-datatable_length select {
   display: inline-block;
   width: 50px; /* Adjust the width as per your preference */
   padding: 5px;
   border: 1px solid #ccc;
   border-radius: 4px;
}
#inbound-datatable_paginate {
   text-align: center;
   margin-top: 20px;
}

#inbound-datatable_paginate .paginate_button {
   display: inline-block;
   background-color: #fff;
   border: none;
   color: #333;
   font-weight: bold;
   text-decoration: none;
   cursor: pointer;
}

#inbound-datatable_paginate .paginate_button:hover {
   background-color: #fff !important;
   color: #fff !important;
}

#inbound-datatable_paginate .paginate_button.current {
   background-color: #fff !important;
   color: #fff;
}

#inbound-datatable_paginate .previous,
#inbound-datatable_paginate .next {
   display: inline-block;
   background-color: #fff !important;
   border: none;
   color: #333;
   font-weight: bold;
   text-decoration: none;
   cursor: pointer;
}

#paginate_button.page-item.active{
   background-color: #fff !important;
}

#inbound-datatable_paginate .previous:hover,
#inbound-datatable_paginate .next:hover {
   background-color: #fff !important;
   color: #fff;
}
#inbound-datatable thead .sorting:before,
#inbound-datatable thead .sorting_asc:before,
#inbound-datatable thead .sorting_desc:before {
  display: none !important;
}
#inbound-datatable thead .sorting::after,
#inbound-datatable thead .sorting_asc::after,
#inbound-datatable thead .sorting_desc::after {
  display: none !important;
}
/* Dropdown container */
.export-dropdown {
  position: relative;
  display: inline-block;
}

/* Export button */
.export-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #7164f1;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* Dropdown content */
.export-dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

/* Dropdown links */
.export-dropdown-content a {
  color: #333;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.export-dropdown-content a:hover {
  background-color: #7164f1;
  color: #fff;
}

/* Show dropdown content on hover */
.export-dropdown:hover .export-dropdown-content {
  display: block;
}

/* Position the dropdown links on the right side */
.export-dropdown-content {
  right: 0;
}

/* Adjust the position of the dropdown arrow */
.export-button::after {
  content: "\25BC";
  margin-left: 5px;
}

/* Style the dropdown arrow */
.export-button::after {
  font-size: 10px;
  vertical-align: middle;
}
.dropdown-item {
  background-color: white !important;
  color: black !important;
  text-align: center !important;
  text-align-last: left !important;
  border: none !important;
  padding: 10px 15px !important;
  transition: background-color 0.3s ease, color 0.3s ease;
}
.btn-outline-secondary.dropdown-toggle::after{
   background-image: #none !important;
}
.dropdown-toggle::after{
   background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E") !important;
}
.dropdown-item:hover,
.dropdown-item:focus {
  background-color: #f5f5f5 !important;
  color: black !important;
  text-decoration: none !important;
  outline: none !important;
}

.dt-button-collection .dt-button-background {
   background-color: transparent !important;
   box-shadow: none !important;
}
div.dt-button-background{
   background: none !important;
}
.page-item.active {
    background-color: #f3f2f7 !important;
}
div.dt-button-collection {
width: 130px !important;
}
button.dt-button.processing:after, div.dt-button.processing:after, a.dt-button.processing:after {  
margin-left: 13px !important;
}

</style>
<!-- Create -->
<!-- BEGIN: Content-->
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
                              echo "Inbound Call Report";
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
               <h4 class="card-title text-white">Inbound Call Report</h4>
               <span class="inbound_table" style="align-items:center !important;"></span>
            </div>
            <div class="card-body p-2">
               <div class="row">
                  <div class="col-md-2">
                     <div class="form-group">
                        <label for="start_date">Start Date/Time</label>
                        <input type="datetime-local" class="form-control datepicker-dropdown" placeholder="Start Date" name="start_date" id="start_date">
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label for="end_date">End Date/Time</label>
                        <input type="datetime-local" class="form-control datepicker" placeholder="End Date" name="end_date" id="end_date">
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label for="campaign">Campaign</label>
                        <select class="form-control" name="campaign" id="campaign">
                           <option value="">Select Campaign</option>
                           <option value="campaign1">Campaign 1</option>
                           <option value="campaign2">Campaign 2</option>
                           <option value="campaign3">Campaign 3</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label for="process">Process</label>
                        <select class="form-control" name="process" id="process">
                           <option value="">Select Process</option>
                           <option value="process1">Process 1</option>
                           <option value="process2">Process 2</option>
                           <option value="process3">Process 3</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label for="username">Username</label>
                        <select class="form-control" name="username" id="username">
                           <option value="">Select Username</option>
                           <option value="user1">User 1</option>
                           <option value="user2">User 2</option>
                           <option value="user3">User 3</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label for="extension">Extension No</label>
                        <select class="form-control" name="extension" id="extension">
                           <option value="">Select Extension</option>
                           <option value="ext1">Extension 1</option>
                           <option value="ext2">Extension 2</option>
                           <option value="ext3">Extension 3</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-2"></div>

            </div>
               <div class="table-responsive">
                  <table class="datatables-basic table" id="inbound-datatable">
                     <thead>
                        <tr>
                           <th class="text-center align-middle">Date</th>
                           <th class="text-center align-middle">Time</th>
                           <th class="text-center align-middle">Username</th>
                           <th class="text-center align-middle">Extension No.</th>
                           <th class="text-center align-middle">Incoming No.</th>
                           <th class="text-center align-middle">Missed call</th>
                           <th class="text-center align-middle">Ring Time</th>
                           <th class="text-center align-middle">Talk Time</th>
                           <th class="text-center align-middle">Total Duration</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="text-center align-middle">23.01.2023</td>
                           <td class="text-center align-middle">12:30 PM</td>
                           <td class="text-center align-middle">John Doe</td>
                           <td class="text-center align-middle">1001</td>
                           <td class="text-center align-middle">9876543210</td>
                           <td class="text-center align-middle">9876567890</td>
                           <td class="text-center align-middle">00:15</td>
                           <td class="text-center align-middle">03:10</td>
                           <td class="text-center align-middle">03:25</td>
                        </tr>
                        <tr>
                           <td class="text-center align-middle">24.01.2023</td>
                           <td class="text-center align-middle">02:15 AM</td>
                           <td class="text-center align-middle">Jane Doe</td>
                           <td class="text-center align-middle">1002</td>
                           <td class="text-center align-middle">9876543211</td>
                           <td class="text-center align-middle">-</td>
                           <td class="text-center align-middle">-</td>
                           <td class="text-center align-middle">-</td>
                           <td class="text-center align-middle">-</td>
                        </tr>
                        <tr>
                           <td class="text-center align-middle">25.01.2023</td>
                           <td class="text-center align-middle">10:45 PM</td>
                           <td class="text-center align-middle">Mike Smith</td>
                           <td class="text-center align-middle">1003</td>
                           <td class="text-center align-middle">9876543212</td>
                           <td class="text-center align-middle">-</td>
                           <td class="text-center align-middle">00:10</td>
                           <td class="text-center align-middle">02:45</td>
                           <td class="text-center align-middle">02:55</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- END: Content-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>

  <script>
   $(document).ready(function() {
      var table = $('#inbound-datatable').DataTable({
         lengthMenu: [10, 25, 50, 75, 100],

         buttons: [
        {
          extend: 'collection',
          className: 'btn btn-outline-secondary dropdown-toggle ml-5 custom-button',
          text:'Download..',
          buttons: [
            {
              extend: 'print',
              text: feather.icons['printer'].toSvg({ class: 'font-small-4 mr-50' }) + 'Print',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5, 6, 7, 8, 9] }
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 mr-50' }) + 'Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5, 6, 7, 8, 9] }
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 mr-50' }) + 'Excel',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5, 6, 7, 8, 9] }
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 mr-50' }) + 'Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5, 6, 7, 8, 9] }
            },
            {
              extend: 'copy',
              text: feather.icons['copy'].toSvg({ class: 'font-small-4 mr-50' }) + 'Copy',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            }
          ],
         }
         ],
      });

      
      // Append the export buttons to a custom container
      $('<div/>').addClass('export-buttons').append(
         table.buttons('.btn-export').container()
      ).appendTo('.inbound_table');
   });
</script>



<?php
include "footer.php";
?>
