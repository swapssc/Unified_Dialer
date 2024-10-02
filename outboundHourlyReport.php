<?php
   include_once "header.php";
   include_once "database/connect.php";
   
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
   width: 20px;
   height: 20px;
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
   height: 40px !important;
   font-size: .88em;   
   background: linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
   }
   .custom-button:hover{
   background-color: rgba(0, 0, 0, 0.1);
   background: linear-gradient(to bottom, rgba(153, 153, 153, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
   }
   .dataTables_filter label {
   display: inline-block;
   margin-right: 3px;
   }
   .dataTables_filter input[type="search"] {
   display: inline-block;
   width: 200px; 
   border: 1px solid #ccc;
   }
   #outbound-datatable_length label {
   display: inline-block;
   margin-right: 10px;
   }
   #outbound-datatable_length select {
   display: inline-block;
   width: 50px; 
   padding: 5px;
   border: 1px solid #ccc;
   border-radius: 4px;
   }
   #outbound-datatable_paginate {
   text-align: center;
   margin-top: 20px;
   }
   #outbound-datatable_paginate .paginate_button {
   display: inline-block;
   background-color: #fff;
   border: none;
   color: #333;
   font-weight: bold;
   text-decoration: none;
   cursor: pointer;
   }
   #outbound-datatable_paginate .paginate_button:hover {
   background-color: #fff !important;
   color: #fff !important;
   }
   #outbound-datatable_paginate .paginate_button.current {
   background-color: #fff !important;
   color: #fff;
   }
   #outbound-datatable_paginate .previous,
   #outbound-datatable_paginate .next {
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
   #outbound-datatable_paginate .previous:hover,
   #outbound-datatable_paginate .next:hover {
   background-color: #fff !important;
   color: #fff;
   }
   #outbound-datatable thead .sorting:before,
   #outbound-datatable thead .sorting_asc:before,
   #outbound-datatable thead .sorting_desc:before {
   display: none !important;
   }
   #outbound-datatable thead .sorting::after,
   #outbound-datatable thead .sorting_asc::after,
   #outbound-datatable thead .sorting_desc::after {
   display: none !important;
   }
   .export-dropdown {
   position: relative;
   display: inline-block;
   }
   .export-button {
   display: inline-block;
   padding: 10px 20px;
   background-color: #7164f1;
   color: #fff;
   border: none;
   border-radius: 4px;
   cursor: pointer;
   }
   .export-dropdown-content {
   display: none;
   position: absolute;
   background-color: #f9f9f9;
   min-width: 160px;
   box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
   z-index: 1;
   }
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
   .export-dropdown:hover .export-dropdown-content {
   display: block;
   }
   .export-dropdown-content {
   right: 0;
   }
   .export-button::after {
   content: "\25BC";
   margin-left: 5px;
   }
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
   width: 0px !important;
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
   .card-header {
   display: flex;
   justify-content: space-between;
   align-items: center;
   }
   .card-header .button-container {
   display: flex;
   gap: 10px;
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
                              echo "Outbound Hourly Call Report";
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
               <h4 class="card-title text-white">Outbound Hourly Call Report</h4>
               <div class="button-container">
                  <button class="btn custom-button" data-toggle="modal" data-target="#createGraphModal">Graphical View..</button>
                  <span class="outbound_table"></span>
               </div>
            </div>
            <!-- modal start -->
            <div class="modal fade" id="createGraphModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                  <div class="modal-content">
                     <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalCenterTitle">Graph [Outbound Hourly Report]</h5>
                        <button type="button" class="close fixed-button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="chart-container mt-2" id="chart"></div>
                     </div>
                     <!-- <div class="modal-footer">
                        </div> -->
                  </div>
               </div>
            </div>
            <!-- modal end -->
            <form>
               <div class="card-body p-2">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="start_date">Select Date</label>
                           <input type="date" class="form-control datepicker-dropdown" placeholder="Start Date" name="start_date" id="start_date">
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="campaign">Campaign</label>
                           <select class="form-control" name="campaign" id="campaign">
                              <option value="">Select Campaign</option>
                              <?php
                                 $query1 = "SELECT * FROM campaign";
                                 $res = mysqli_query($conn, $query1);
                                 
                                 if (mysqli_num_rows($res) > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                       $selected = '';
                                       if (in_array($row['campaign'], $_POST['campaign'])) {
                                          $selected = 'selected';
                                       }
                                       echo '<option value="' . $row['campaign_name'] . '" ' . $selected . '>' . $row['campaign_name'] . '</option>';
                                    }
                                 } else {
                                    echo '<option value="">No record found</option>';
                                 }
                                 ?>   
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="process">Process</label>
                           <select class="form-control" name="process" id="process">
                              <option value="">Select Process</option>
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
                        </div>
                     </div>
                     <div class="col-md-3">
                        <button type="submit" class="btn btn-primary mt-2" style="margin-top:2px; margin-bottom:1px !important;">Submit</button>
                     </div>
            </form>
            </div>
            <div class="table-responsive">
            <table class="datatables-basic table" id="outbound-datatable">
            <thead>
            <tr>
            <!-- <th class="text-center align-middle">Date</th>
               <th class="text-center align-middle">Time</th>
               <th class="text-center align-middle">Username</th>
               <th class="text-center align-middle">Extension No.</th>
               <th class="text-center align-middle">Dialled No.</th> -->
            <th class="text-center align-middle">Time Period</th>
            <th class="text-center align-middle">Total Outbound</th>
            <th class="text-center align-middle">Connected</th>
            <th class="text-center align-middle">Not Connected</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <!-- <td class="text-center align-middle">23.01.2023</td>
               <td class="text-center align-middle">12:30 PM</td>
               <td class="text-center align-middle">John Doe</td>
               <td class="text-center align-middle">1001</td>
               <td class="text-center align-middle">9876543210</td> -->
            <td class="text-center align-middle">12:00AM - 01:00AM</td>
            <td class="text-center align-middle">100</td>
            <td class="text-center align-middle">90</td>
            <td class="text-center align-middle">10</td>
            </tr>
            <tr>
            <td class="text-center align-middle">01:00AM - 02:00AM</td>
            <td class="text-center align-middle">120</td>
            <td class="text-center align-middle">90</td>
            <td class="text-center align-middle">30</td>
            <!-- <td class="text-center align-middle">9876543211</td>
               <td class="text-center align-middle">Not Answered</td>
               <td class="text-center align-middle">-</td>
               <td class="text-center align-middle">-</td>
               <td class="text-center align-middle">-</td> -->
            </tr>
            <tr>
            <td class="text-center align-middle">02:00AM - 03:00AM</td>
            <td class="text-center align-middle">50</td>
            <td class="text-center align-middle">10</td>
            <td class="text-center align-middle">40</td>
            <!-- <td class="text-center align-middle">9876543212</td>
               <td class="text-center align-middle">Answered</td>
               <td class="text-center align-middle">00:10</td>
               <td class="text-center align-middle">02:45</td>
               <td class="text-center align-middle">02:55</td> -->
            </tr>
            <tr>
            <!-- <td class="text-center align-middle">23.01.2023</td>
               <td class="text-center align-middle">12:30 PM</td>
               <td class="text-center align-middle">John Doe</td>
               <td class="text-center align-middle">1001</td>
               <td class="text-center align-middle">9876543210</td> -->
            <td class="text-center align-middle">12:00AM - 01:00AM</td>
            <td class="text-center align-middle">100</td>
            <td class="text-center align-middle">90</td>
            <td class="text-center align-middle">10</td>
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
      var table = $('#outbound-datatable').DataTable({
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
              className: 'dropdown-item'
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 mr-50' }) + 'Csv',
              className: 'dropdown-item'
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 mr-50' }) + 'Excel',
              className: 'dropdown-item'
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 mr-50' }) + 'Pdf',
              className: 'dropdown-item'
            },
            {
              extend: 'copy',
              text: feather.icons['copy'].toSvg({ class: 'font-small-4 mr-50' }) + 'Copy',
              className: 'dropdown-item'
            }
          ],
         }
         ],
      });
   
      
      $('<div/>').addClass('export-buttons').append(
         table.buttons('.btn-export').container()
      ).appendTo('.outbound_table');
   });
</script>
<script>
   var currentDate = new Date();
   var dateString = currentDate.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
   var options = {
    series: [{
    name: 'Connected Calls',
    data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 55, 57, 56, 61, 58, 63, 60, 66, 44, 55, 57, 56, 61, 58, 63]
   }, {
    name: 'Total Calls',
    data: [76, 85, 101, 98, 87, 105, 91, 114, 94, 89, 110, 110, 144, 122, 76, 85, 101, 98, 87, 105, 91, 114, 94, 89]
   }, {
    name: 'Not Connected Calls',
    data: [35, 41, 36, 26, 45, 48, 52, 53, 41, 31, 35, 41, 36, 26, 45, 48, 52, 53, 41, 31, 27, 65, 33, 12]
   }],
    chart: {
    type: 'bar',
    height: 550,
    width: 1250
   
   },
   plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '55%',
      endingShape: 'rounded'
    },
   },
   dataLabels: {
    enabled: false
   },
   stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
   },
   title: {
          text: 'Outbound Call Hourly Report For' + ' "' + dateString + '"',
          align: 'center',
          style: {
          fontSize: '14px'
          }
      },
   xaxis: {
    categories: ['12AM-01AM', '01AM-02AM', '02AM-03AM', '03AM-04AM', '04AM-05AM', '05AM-06AM', '06AM-07AM', '07AM-08AM', '08AM-09AM', '09AM-10AM', '10AM-11AM', '11AM-12PM', '12PM-01PM', '01PM-02PM', '02PM-03PM', '03PM-04PM', '04PM-05PM', '05PM-06PM', '06PM-07PM', '07PM-08PM', '08PM-09PM', '09PM-10PM', '10PM-11PM', '11PM-12AM'],
   },
   yaxis: {
    title: {
      text: 'No. of Calls'
    }
   },
   
   fill: {
    opacity: 1
   },
   tooltip: {
    y: {
      formatter: function (val) {
        return "" + val + " calls"
      }
    }
   }
   };
   
   var chart = new ApexCharts(document.querySelector("#chart"), options);
   chart.render();
</script>
<?php
   include "footer.php";
   ?>