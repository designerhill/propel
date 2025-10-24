<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('header.php');

?>
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css" rel="stylesheet">

<style>
     .page-titles{
        z-index: 9;
    }
.property-table-wrapper {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    color: #444;
}

.property-table-wrapper .card-body {
    padding: 25px;
}

.property-table-wrapper .header-title {
    font-weight: 600;
    color: #333;
    border-bottom: 2px solid #667eea;
    padding-bottom: 10px;
}

.table-responsive .table thead th {
    background: #114880;
    color: white;
    font-weight: 500;
    border: none;
    padding: 12px 15px;
}

.table-responsive .table tbody td {
    vertical-align: middle;
    padding: 12px 15px;
}

.table-responsive .table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(102, 126, 234, 0.05);
}

.table-responsive .table-hover tbody tr:hover {
    background-color: rgba(102, 126, 234, 0.1);
    transition: background-color 0.2s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    padding: 6px 16px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
}

.btn-danger {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    border: none;
    padding: 6px 16px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(245, 87, 108, 0.3);
}

.badge {
    padding: 6px 12px;
    font-size: 0.85rem;
    border-radius: 20px;
}

.badge-success {
    background: #28a745;
}

.badge-warning {
    background: #ffc107;
    color: #000;
}

.badge-danger {
    background: #dc3545;
}

/* DataTables Pagination Styling */
.dataTables_wrapper .dataTables_paginate .paginate_button {
    /* padding: 5px 12px; */
    margin: 0 2px;
    border-radius: 5px;
    border: 1px solid #667eea;
    color: #667eea !important;
    transition: all 0.3s ease;
    overflow: hidden;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white !important;
    border-color: #667eea;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white !important;
    border-color: #667eea;
}

.dataTables_wrapper .dataTables_length select,
.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 5px 10px;
}

.dataTables_wrapper .dataTables_filter input:focus {
    border-color: #667eea;
    outline: none;
    box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
}

.dataTables_info {
    color: #666;
    font-size: 0.9rem;
}

.breadcrumb {
    background: transparent;
    padding: 0;
}

.breadcrumb-item a {
    color: #667eea;
    text-decoration: none;
}

.breadcrumb-item.active {
    color: #666;
}
</style>

<script>
function confirmDelete(disUrl) {
    if (confirm("Are you sure you want to delete this city?")) {
        document.location = disUrl;
    }
}

function confirmApprove(disUrl) {
    if (confirm("Are you sure you want to approve this property?")) {
        document.location = disUrl;
    }
}

function rejectApprove(disUrl) {
    if (confirm("Are you sure you want to cancel approve this property?")) {
        document.location = disUrl;
    }
}
</script>
<div class="content-body bg-light">
    <div class="container-fluid">
        <div class="row page-titles">

            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Property</li>
                </ol>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card property-table-wrapper">
                    <div class="card-body">

                        <h4 class="header-title mt-0 mb-4">👥 User Property List</h4>
                        <?php 
											if(isset($_GET['msg']))	
											echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';	
										?>
                        <div class="table-responsive">
                            <table id="userPropertyTable" class="table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>S/R</th>
                                        <th>Area</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Approval</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody>
                                <?php
												 // Check if role is admin (either string "admin" or number 1)
                                    if($role == 1 || $role == 'admin')
                                    {                    
                                    $query=mysqli_query($con,"select * from property where userid!=''");
                                    }
                                    else
                                    {                    
                                    $query=mysqli_query($con,"select * from property where city='$city' AND userid!=''");
                                    }                                    
                                    if(!$query) {
                                        echo "<tr><td colspan='8'>Error: " . mysqli_error($con) . "</td></tr>";
                                    } else {
                                        $count = mysqli_num_rows($query);
                                        if($count == 0) {
                                            echo "<tr><td colspan='8' class='text-center'>No user properties found</td></tr>";
                                        }
                                    while($row=mysqli_fetch_array($query))
                                    {
                                ?>

                                <tr>
                                    <td><strong><?php echo $row['title']; ?></strong></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td>
                                        <span class="badge badge-<?php echo $row['stype'] == 'Buy' ? 'success' : 'info'; ?>">
                                            <?php echo $row['stype']; ?>
                                        </span>
                                    </td>
                                    <td><?php echo $row['location']; ?></td>
                                    <td><strong>₹<?php echo number_format((float)$row['price']); ?></strong></td>
                                    <td>
                                        <span class="badge badge-<?php 
                                            if($row['status'] == 'available') echo 'success';
                                            elseif($row['status'] == 'sold') echo 'danger';
                                            else echo 'warning';
                                        ?>">
                                            <?php echo ucfirst($row['status'] ?? 'pending'); ?>
                                        </span>
                                    </td>
                                    <td>

                                        <?php
                   if($row['isapproved']==0)
                   {

                   ?> 
                                        <a href="javascript:confirmApprove('propertyapprove.php?id=<?php echo $row['0']; ?>')" title="Approve Property">
                                            <button class="btn btn-success btn-sm">
                                                <i class="mdi mdi-check-circle"></i> Approve
                                            </button>
                                        </a>
                                        <span class="badge badge-pending">Pending</span>
                                        <?php
                   }
                   ?>
                                        <?php
                   if($row['isapproved']==1)
                   {

                   ?> 
                                        <a href="javascript:rejectApprove('propertyreject.php?id=<?php echo $row['0']; ?>')" title="Reject Approval">
                                            <button class="btn btn-warning btn-sm">
                                                <i class="mdi mdi-close-circle"></i> Cancel
                                            </button>
                                        </a>
                                        <span class="badge badge-approved">Approved</span>
                                        <?php
                   }
                   ?>

                                    </td>

                                    <td>
                                        <a href="propertyedit.php?id=<?php echo $row['0'];?>" title="Edit Property">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="mdi mdi-pencil"></i> Edit
                                            </button>
                                        </a>

                                        <?php
                   if($role == 1 || $role == 'admin')
                   {

                   ?> 
                                        <a href="javascript:confirmDelete('propertydelete.php?id=<?php echo $row['0']; ?>')" title="Delete Property">
                                            <button class="btn btn-danger btn-sm">
                                                <i class="mdi mdi-delete"></i> Delete
                                            </button>
                                        </a>
                                        <?php
                   }
                   ?>

                                    </td>
                                </tr>
                                <?php
												} // end while
												} // end else
												?>
                                </tbody>
                            </table>
                        </div>

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

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#userPropertyTable').DataTable({
        "pageLength": 10,
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "ordering": true,
        "searching": true,
        "responsive": true,
        "order": [[0, "asc"]],
        "language": {
            "search": "Search Properties:",
            "lengthMenu": "Show _MENU_ properties per page",
            "info": "Showing _START_ to _END_ of _TOTAL_ user properties",
            "infoEmpty": "No user properties available",
            "infoFiltered": "(filtered from _MAX_ total properties)",
            "paginate": {
                "first": "First",
                "last": "Last",
                "next": "Next",
                "previous": "Previous"
            },
            "emptyTable": "No user properties found in the database"
        },
        "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rtip',
        "columnDefs": [
            { "orderable": false, "targets": [6, 7] } // Disable sorting on Approval and Actions columns
        ]
    });
});
</script>