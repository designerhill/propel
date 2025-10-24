<?php
require("header.php");

?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">

            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mt-0 mb-4">Enquiry View</h4>
                        <?php 
											if(isset($_GET['msg']))	
											echo $_GET['msg'];	
										?>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <!-- <th>P ID</th> -->
                                    <th>Name</th>
                                    <th>Email</th>

                                    <th>Mobile Number</th>


                                    <th>Project</th>

                                    <th>Date</th>


                                </tr>
                            </thead>


                            <tbody>
                                <?php
													
													$query=mysqli_query($con,"select enquiry.*, property.* from enquiry inner join property on enquiry.project=property.pid ");
													while($row=mysqli_fetch_array($query))
													{
                                                        
$dateString =$row['addedon'];

// Convert to timestamp
$timestamp = strtotime($dateString);

// Format the date
$formattedDate = date('d-M-Y', $timestamp);
												?>

                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>

                                    <td><?php echo $row['title']; ?></td>


                                    <td><?php echo $formattedDate; ?></td>


                                </tr>
                                <?php
												} 
												?>
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div>
</div>
<!-- /Main Wrapper -->
<?php
include('footer.php');
?>