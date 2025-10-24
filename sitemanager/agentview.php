<?php
include('header.php');
?>
<script>
function confirmDelete(disUrl) {
    if (confirm("Are you sure you want to delete this agent?")) {
        document.location = disUrl;
    }
}
</script>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">

            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Agent</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mt-0 mb-4">Agent List</h4>
                        <?php 
											if(isset($_GET['msg']))	
											echo $_GET['msg'];	
										?>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <!-- <th>P ID</th> -->
                                    <th>Name</th>
                                    <th>Image</th>


                                    <th>Actions</th>

                                </tr>
                            </thead>


                            <tbody>
                                <?php
													
													$query=mysqli_query($con,"select * from agent");
													while($row=mysqli_fetch_array($query))
													{
												?>

                                <tr>
                                    <td><?php echo $row['name']; ?></td>

                                    <td><img src="agent/<?php echo $row['image']; ?>" style="height:80px;"></td>


                                    <td><a href="agentedit.php?id=<?php echo $row['0'];?>"><button
                                                class="btn btn-primary btn-sm">Edit</button></a>

                                        <a
                                            href="javascript:confirmDelete('agentdelete.php?id=<?php echo $row['0']; ?>')"><button
                                                class="btn btn-danger btn-sm">Delete</button></a>
                                    </td>
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
<?php
include('footer.php');
?>