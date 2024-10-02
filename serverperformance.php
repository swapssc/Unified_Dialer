<?php
include_once "header.php";
?>


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- 
<style>
    .card-text{
        color: black;
         font-size: 14px; 
         font-family: Arial;
        
    }

    </style> -->

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
                                        echo "Server Performance Report";
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
               
            </div>
        </div>

        <div class="row">
    <div class="card border-black mb-3" style="width: 20rem; margin-bottom: 15px;  margin-left: auto;">
        <div class="card-header" style="color: black; font-size: 16px; font-family: Arial;">RAM Usage</div>
        <div style="border-top: 1px solid black;"></div>
        <div class="card-body">
            <p class="card-text" style="color: black; font-size: 14px; font-family: Arial;">Total RAM - 100%</p>
            <p class="card-text" style="color: black; font-size: 14px; font-family: Arial;">Total amount of RAM - 50%</p>
            <p class="card-text" style="color: black; font-size: 14px; font-family: Arial;">Total amount of Free RAM - 50%</p>
        </div>
    </div>

    <div class="card border-black mb-3" style="width: 20rem; margin-bottom: 15px; margin-left: 15px;">
        <div class="card-header" style="color: black; font-size: 16px; font-family: Arial;">Disk Usage</div>
        <div style="border-top: 1px solid black;"></div>
        <div class="card-body">
            <p class="card-text" style="color: black; font-size: 14px; font-family: Arial;">Total RAM - 100%</p>
            <p class="card-text" style="color: black; font-size: 14px; font-family: Arial;">Total amount of RAM - 60%</p>
            <p class="card-text" style="color: black; font-size: 14px; font-family: Arial;">Total amount of Free RAM - 40%</p>
        </div>
    </div>


    <div class="card border-black mb-3" style="width: 20rem; margin-bottom: 15px; margin-left: 15px;">
        <div class="card-header" style="color: black; font-size: 16px; font-family: Arial;">CPU Usage</div>
        <div style="border-top: 1px solid black;"></div>
        <div class="card-body">
            <p class="card-text" style="color: black; font-size: 14px; font-family: Arial;">Total RAM - 100%</p>
            <p class="card-text" style="color: black; font-size: 14px; font-family: Arial;">Total amount of RAM - 30%</p>
            <p class="card-text" style="color: black; font-size: 14px; font-family: Arial;">Total amount of Free RAM - 70%</p>
        </div>
    </div>


    <div class="card border-black mb-3" style="width: 20rem; margin-bottom: 15px; margin-left: 15px; margin-right:auto;">
        <div class="card-header" style="color: black; font-size: 16px; font-family: Arial;">Call recording</div>
        <div style="border-top: 1px solid black;"></div>
        <div class="card-body">
            <p class="card-text" style="color: black; font-size: 14px; font-family: Arial;">Total call recording size</p>
            <p class="card-text" style="color: black; font-size: 14px; font-family: Arial;">Recording count</p>
        </div>
    </div>
</div>

            <!-- Kick start -->
           



 <?php
include_once "footer2.php";
?>  
