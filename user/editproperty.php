<?php
ob_start();
include('header.php');
$error="";
$msg="";

$pid=$_REQUEST['id']; 
$q="select * from amenities";
$r=mysqli_query($con,$q) or die(mysqli_error($con));
$num1=mysqli_num_rows($r);
$allAmenities = [];

if ( $num1 > 0) {
    while ($row = mysqli_fetch_array($r)) {
        $allAmenities[] = $row;
    }
}

$que="select * from property_amenities where pid='$pid'";
$res=mysqli_query($con,$que) or die(mysqli_error($con));
$num2=mysqli_num_rows($res);
$propertyAmenities = [];

if ( $num2 > 0) {
    while ($row = mysqli_fetch_array($res)) {
        $propertyAmenities[] = $row['amenity'];
    }
}
if(isset($_POST['add']))
{
	   
    function slug($text)
    {

        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    
    $meta_title='';
    $keyword='';
    $description='';
    $projectId='';
	$title=addslashes($_POST['title']);
    $engpost = str_replace(array('\'', '"'), '', $title);
    $arr = explode(" ", $engpost);
    $slug = implode("-", $arr);
    $project=addslashes($_POST['project']);
	$content=addslashes($_POST['content']);
	$ptype=$_POST['ptype'];
	$stype=$_POST['stype'];
    $buildingtype=$_POST['buildingtype'];
    $reranumber=$_POST['reranumber'];
    $facing=$_POST['facing'];
    $view=$_POST['view'];
    $ageofproperty=$_POST['ageofproperty'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$location=$_POST['location'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	$location=$_POST['location'];
    $map=$_POST['map'];
    $video=$_POST['video'];
    $room=$_POST['room'];
    $bedroom=$_POST['bedroom'];
    $bathroom=$_POST['bathroom'];
    $address=$_POST['address'];
    $typology=$_POST['typology'];
    $balcony=$_POST['balcony'];
    $carpetarea=$_POST['carpetarea'];
    $builtuparea=$_POST['builtuparea'];
    $superbuiltuparea=$_POST['superbuiltuparea'];
    $plotarea=$_POST['plotarea'];
    $rentalyield=$_POST['rentalyield'];
    $propertyappretiation=$_POST['propertyappretiation'];
    $poojaroom=$_POST['poojaroom'];
    $servantroom=$_POST['servantroom'];
    $studyroom=$_POST['studyroom'];
    $ftype=$_POST['ftype'];
    $coveredparking=$_POST['coveredparking'];
    $openparking=$_POST['openparking'];
    $posessiondate=$_POST['posessiondate'];
    $posessionstatus=$_POST['posessionstatus'];
    $ownership=$_POST['ownership'];
    $sqftprice=$_POST['sqftprice'];
    $maintenance=$_POST['maintenance'];
    $bookingamount=$_POST['bookingamount'];
    $annualduespayable=$_POST['annualduespayable'];
    $membershipcharges=$_POST['membershipcharges'];
    $sublocation=$_POST['sublocation'];
    $society=$_POST['society'];
    $tower=$_POST['tower'];
    $floor=$_POST['floor'];
    $totalfloor=$_POST['totalfloor'];
    $unitnumber=$_POST['unitnumber'];
    $housenumber=$_POST['housenumber'];
    $serviceroom=$_POST['serviceroom'];
   
    $isFeatured=0;

    if (isset($_FILES['aimage']) && $_FILES['aimage']['error'] === UPLOAD_ERR_OK) {
        $aimage = $title . $_FILES['aimage']['name'];
    }
    else
    $aimage='';

    if (isset($_FILES['aimage1']) && $_FILES['aimage1']['error'] === UPLOAD_ERR_OK) {
        $aimage1 = $title . $_FILES['aimage1']['name'];
    }
    else
    $aimage1='';

    if (isset($_FILES['aimage2']) && $_FILES['aimage2']['error'] === UPLOAD_ERR_OK) {
        $aimage2 = $title . $_FILES['aimage2']['name'];
    }
    else
    $aimage2='';

    if (isset($_FILES['aimage3']) && $_FILES['aimage3']['error'] === UPLOAD_ERR_OK) {
        $aimage3 = $title . $_FILES['aimage3']['name'];
    }
    else
    $aimage3='';

    if (isset($_FILES['aimage4']) && $_FILES['aimage4']['error'] === UPLOAD_ERR_OK) {
        $aimage4 = $title . $_FILES['aimage4']['name'];
    }
    else
    $aimage4='';
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	

	
	if($temp_name)
	{
	move_uploaded_file($temp_name,"../sitemanager/property/$aimage");
	$sql1 = "UPDATE property SET pimage='{$aimage}' WHERE pid = {$pid}";
	$result1=mysqli_query($con,$sql1);
	}

	if($temp_name1)
	{
	move_uploaded_file($temp_name1,"../sitemanager/property/$aimage1");
    $sql1 = "UPDATE property SET pimage1='{$aimage1}' WHERE pid = {$pid}";
	$result1=mysqli_query($con,$sql1);
	}
	if($temp_name2)
	{
	move_uploaded_file($temp_name2,"../sitemanager/property/$aimage2");
    $sql1 = "UPDATE property SET pimage2='{$aimage2}' WHERE pid = {$pid}";
	$result1=mysqli_query($con,$sql1);
	}
	if($temp_name3)
	{
	move_uploaded_file($temp_name3,"../sitemanager/property/$aimage3");
    $sql1 = "UPDATE property SET pimage3='{$aimage3}' WHERE pid = {$pid}";
	$result1=mysqli_query($con,$sql1);
	}
	if($temp_name4)
	{
	move_uploaded_file($temp_name4,"../sitemanager/property/$aimage4");
    $sql1 = "UPDATE property SET pimage4='{$aimage4}' WHERE pid = {$pid}";
	$result1=mysqli_query($con,$sql1);
	}
	
	
	$sql = "UPDATE property SET 
    meta_title = '$meta_title',
    keyword = '$keyword',
    description = '$description',
    slug = '$slug',
    title = '$title',
    project = '$project',
    pcontent = '$content',
    type = '$ptype',
    stype = '$stype',
    buildingtype = '$buildingtype',
    reranumber = '$reranumber',
    price = '$price',
    location = '$location',
    city = '$city',
    state = '$state',
    facing = '$facing',
    typology = '$typology',
    balcony = '$balcony',
    view = '$view',
    ageofproperty = '$ageofproperty',
    plotarea = '$plotarea',
    carpetarea = '$carpetarea',
    builtuparea = '$builtuparea',
    superbuiltuparea = '$superbuiltuparea',
    poojaroom = '$poojaroom',
    servantroom = '$servantroom',
    serviceroom = '$serviceroom',
    studyroom = '$studyroom',
    ftype = '$ftype',
    coveredparking = '$coveredparking',
    openparking = '$openparking',
    posessiondate = '$posessiondate',
    ownership = '$ownership',
    sqftprice = '$sqftprice',
    maintenance = '$maintenance',
    bookingamount = '$bookingamount',
    annualduespayable = '$annualduespayable',
    membershipcharges = '$membershipcharges',
    room = '$room',
    bedroom = '$bedroom',
    bathroom = '$bathroom',
    address = '$address',
    sublocation = '$sublocation',
    society = '$society',
    tower = '$tower',
    floor = '$floor',
    unitnumber = '$unitnumber',
    housenumber = '$housenumber',
    map = '$map',
    video = '$video',
    status = '$status',
    isFeatured = '$isFeatured',
    posessionstatus = '$posessionstatus',
    totalfloor = '$totalfloor',
    rentalyield = '$rentalyield',
    propertyappretiation = '$propertyappretiation',
    agentpic = '$agentpic',
    agentname = '$agentname',projectId = '$projectId'
   WHERE pid = '$pid'";
	
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
        $selectedAmenities = $_POST['amenities'] ?? [];

    // Remove existing amenities for the property
    $deleteQuery = "DELETE FROM property_amenities WHERE pid = $pid";
    $con->query($deleteQuery);

    // Insert selected amenities
    
    foreach ($selectedAmenities as $amenityId) {
        $insertQuery = ("INSERT INTO property_amenities (pid, amenity) VALUES ('$pid', '$amenityId')");
        $insertQuery=mysqli_query($con,$insertQuery);
    }

		$msg="<p class='alert alert-success'>Property Updated</p>";
		header("Location:my-listing.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Property Not Updated</p>";
		header("Location:my-listing.php?msg=$msg");
	}
}
?>



<section class="myprofile-section sec-pad">
    <div class="container">
        <!-- Sidebar -->

        <div class="main-content">
            <div class="tabs">
                <a href="profile.php" class="tab active">Profile</a>
                <a href="my-listing.php" class="tab">My Listings</a>

                <a href="communication.php" class="tab">Communication</a>


            </div>
            <div class="col-xl-12 col-lg-12 ">
                <form method="post" enctype="multipart/form-data" action="">

                    <?php
									
									$pid=$_REQUEST['id'];
									$query=mysqli_query($con,"select * from property where pid='$pid'");
									$row=mysqli_fetch_array($query);

									$isFeatured=$row['isFeatured'];
									$options = [
										['value' => 1, 'text' => 'Yes'],
										['value' => 0, 'text' => 'No'],
									];

                                    $poojaroom=$row['poojaroom'];
									$poptions = [
										['value' => 1, 'text' => 'Yes'],
										['value' => 0, 'text' => 'No'],
									];

                                    $serviceroom=$row['serviceroom'];
									$seoptions = [
										['value' => 1, 'text' => 'Yes'],
										['value' => 0, 'text' => 'No'],
									];

                                    $servantroom=$row['servantroom'];
									$soptions = [
										['value' => 1, 'text' => 'Yes'],
										['value' => 0, 'text' => 'No'],
									];

                                    $coveredparking=$row['coveredparking'];
									$cpoptions = [
										['value' => 1, 'text' => 'Yes'],
										['value' => 0, 'text' => 'No'],
									];

                                    $openparking=$row['openparking'];
									$opoptions = [
										['value' => 1, 'text' => 'Yes'],
										['value' => 0, 'text' => 'No'],
									];

                                    $studyroom=$row['studyroom'];
									$stoptions = [
										['value' => 1, 'text' => 'Yes'],
										['value' => 0, 'text' => 'No'],
									];


								
								?>

                    <div class="card-body">
                        <h4 class="card-title">Property Detail</h4>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Title <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control txtbox" name="title" required
                                            value="<?php echo $row['title']; ?>" placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Project Name <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control txtbox" name="project" required
                                            value="<?php echo $row['project']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Description <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control txtbox" name="content" rows="10" id="summernote"
                                            required cols="30"><?php echo $row['pcontent']; ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Property Type <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="ptype">
                                            <option value="<?php echo $row['type']; ?>">
                                                <?php echo $row['type']; ?></option>
                                            <?php
																		$query1=mysqli_query($con,"select * from category");
																		while($row1=mysqli_fetch_row($query1))
																			{
																	?>
                                            <option value="<?php echo $row1['1']; ?>" class="text-captalize">
                                                <?php echo $row1['1']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Selling Type <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="stype">
                                            <option value="<?php echo $row['stype']; ?>">
                                                <?php echo $row['stype']; ?></option>
                                            <option value="Rent">Rent</option>
                                            <option value="Sell">Sell</option>
                                            <option value="Buy">Buy</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Building Type <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="buildingtype">
                                            <option value="<?php echo $row['buildingtype']; ?>">
                                                <?php echo $row['buildingtype']; ?></option>
                                            <option value="Residential">Residential</option>
                                            <option value="Commercial">Commercial</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">RERA Number</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="reranumber"
                                            value="<?php echo $row['reranumber'];?>" placeholder="Enter RERA Number">

                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Age of Property <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="ageofproperty">
                                            <option value="<?php echo $row['ageofproperty']; ?>">
                                                <?php echo $row['ageofproperty']; ?></option>
                                            <option>Under Construction</option>
                                            <option>Ready to Move</option>
                                            <option value="0-1">0-1</option>
                                            <option value="1-2">1-2</option>
                                            <option value="2-5">2-5</option>
                                            <option value="5-10">5-10</option>
                                            <option value="10+">10+</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Facing <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="facing">
                                            <option value="<?php echo $row['facing']; ?>">
                                                <?php echo $row['facing']; ?></option>
                                            <option value="South">South</option>
                                            <option value="East">East</option>
                                            <option value="North">North</option>
                                            <option value="West">West</option>
                                            <option value="Northwest">Northwest</option>
                                            <option value="Southwest">Southwest</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">View</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="view"
                                            value="<?php echo $row['view']; ?>" placeholder="Enter View">

                                    </div>
                                </div>

                            </div>

                        </div>

                        <h4 class="card-title">Price</h4>
                        <div class="row">
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Unit Price <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="price" required
                                            value="<?php echo $row['price']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Maintenance</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="maintenance"
                                            value="<?php echo $row['maintenance']; ?>" placeholder="Enter Maintenance">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Annual Dues Payable</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="annualduespayable"
                                            value="<?php echo $row['annualduespayable'];?>" placeholder=" Enter
                                                    Annual Dues Payable">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Per Sq. Feet Price</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="sqftprice"
                                            placeholder="Enter Per Sq. Feet Price"
                                            value="<?php echo $row['sqftprice'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Booking Amount</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="bookingamount"
                                            placeholder="Enter Booking Amount"
                                            value="<?php echo $row['bookingamount'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Membership Charges</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="membershipcharges"
                                            placeholder="Enter Membership Charges"
                                            value="<?php echo $row['membershipcharges'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Location</h4>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">City <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="city">
                                            <option value="<?php echo $row['city']; ?>">
                                                <?php echo $row['city']; ?></option>
                                            <?php
																		$query1=mysqli_query($con,"select * from city");
																		while($row1=mysqli_fetch_row($query1))
																			{
																	?>
                                            <option value="<?php echo $row1['1']; ?>" class="text-captalize">
                                                <?php echo $row1['1']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Address <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="address" required
                                            value="<?php echo $row['address'];?>" placeholder="Enter Address">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Sub Locality</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="sublocation"
                                            value="<?php echo $row['sublocation'];?>" placeholder="Enter Sub Locality">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">State <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="state">
                                            <option value="<?php echo $row['state']; ?>">
                                                <?php echo $row['state']; ?></option>
                                            <?php
																		$query1=mysqli_query($con,"select * from state");
																		while($row1=mysqli_fetch_row($query1))
																			{
																	?>
                                            <option value="<?php echo $row1['1']; ?>" class="text-captalize">
                                                <?php echo $row1['1']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Locality <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="location" required
                                            value="<?php echo $row['location']; ?>">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <h4 class="card-title">Flooring</h4>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Floor <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="floor" required
                                            value="<?php echo $row['floor'];?>" placeholder="Enter Floor">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Total Floor</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="totalfloor"
                                            value="<?php echo $row['totalfloor'];?>" placeholder="Enter Total Floor">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Tower <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="tower" required
                                            value="<?php echo $row['tower'];?>" placeholder="Enter Tower">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Area Details</h4>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Carpet Area</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="carpetarea"
                                            value="<?php echo $row['carpetarea'];?>" placeholder="Enter Carpet Area">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Super Builtup Area</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="superbuiltuparea"
                                            value="<?php echo $row['superbuiltuparea'];?>"
                                            placeholder="Enter Super Builtup Area">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Built Up Area</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="builtuparea"
                                            value="<?php echo $row['builtuparea'];?>" placeholder="Enter Builtup Area">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Plot Area</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="plotarea"
                                            value="<?php echo $row['plotarea'];?>" placeholder="Enter Plot Area">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="card-title">ROI</h4>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Expected Rental Yield</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="rentalyield"
                                            value="<?php echo $row['plotarea'];?>"
                                            placeholder="Enter Expected Rental Yield">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Annual Property Appriciation</label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control txtbox" name="propertyappretiation"
                                            value="<?php echo $row['plotarea'];?>"
                                            placeholder="Enter Annual Property Appriciation">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Details</h4>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Ownership</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="ownership"
                                            value="<?php echo $row['plotarea'];?>" placeholder="Enter Ownership Type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Unit Number</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="unitnumber"
                                            value="<?php echo $row['plotarea'];?>" placeholder="Enter Unit Number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Room <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="room">
                                            <option value="<?php echo $row['room']; ?>">
                                                <?php echo $row['room']; ?></option>
                                            <option value="Studio">Studio</option>
                                            <option value="1 Rk">1 Rk</option>
                                            <option value="1">1</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="6+">6+</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Typology</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="typology"
                                            value="<?php echo $row['typology']; ?>" placeholder="Enter Typology">
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Bedroom</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="bedroom"
                                            value="<?php echo $row['bedroom']; ?>" placeholder="Enter No.of Bedroom">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Servant Room</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="servantroom">
                                            <?php foreach ($soptions as $option): ?>
                                            <option value="<?php echo $option['value']; ?>"
                                                <?php if ($servantroom == $option['value']) echo 'selected'; ?>>
                                                <?php echo $option['text']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Study Room</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="studyroom">
                                            <?php foreach ($stoptions as $option): ?>
                                            <option value="<?php echo $option['value']; ?>"
                                                <?php if ($studyroom == $option['value']) echo 'selected'; ?>>
                                                <?php echo $option['text']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Covered Parking</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="coveredparking">
                                            <?php foreach ($cpoptions as $option): ?>
                                            <option value="<?php echo $option['value']; ?>"
                                                <?php if ($coveredparking == $option['value']) echo 'selected'; ?>>
                                                <?php echo $option['text']; ?>
                                            </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Posession Status</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" requred name="posessionstatus">
                                            <option value="<?php echo $row['posessionstatus']; ?>">
                                                <?php echo $row['posessionstatus']; ?></option>
                                            <option value="Ready To Move">Ready To Move</option>
                                            <option value="Under Construction">Under Construction</option>


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Society</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="society"
                                            value="<?php echo $row['society'];?>" placeholder="Enter Society">
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">House Number</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="housenumber"
                                            value="<?php echo $row['housenumber']; ?>" placeholder="Enter House Number">
                                    </div>
                                </div>
                            </div>



                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Balcony</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="balcony"
                                            value="<?php echo $row['balcony']; ?>" placeholder="Enter No.of Balcony">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Bathroom</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="bathroom"
                                            value="<?php echo $row['bathroom']; ?>" placeholder="Enter No.of Bathroom">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Pooja Room</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="poojaroom">
                                            <?php foreach ($options as $option): ?>
                                            <option value="<?php echo $option['value']; ?>"
                                                <?php if ($poojaroom == $option['value']) echo 'selected'; ?>>
                                                <?php echo $option['text']; ?>
                                            </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Service Room</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="serviceroom">
                                            <?php foreach ($seoptions as $option): ?>
                                            <option value="<?php echo $option['value']; ?>"
                                                <?php if ($serviceroom == $option['value']) echo 'selected'; ?>>
                                                <?php echo $option['text']; ?>
                                            </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Open Parking</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="openparking">
                                            <?php foreach ($opoptions as $option): ?>
                                            <option value="<?php echo $option['value']; ?>"
                                                <?php if ($openparking == $option['value']) echo 'selected'; ?>>
                                                <?php echo $option['text']; ?>
                                            </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Furnishing Type</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="ftype">
                                            <option value="<?php echo $row['ftype']; ?>">
                                                <?php echo $row['ftype']; ?></option>
                                            <option>Unfurnished</option>
                                            <option>Furnished</option>
                                            <option>Semi-Furnished</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Posession Date</label>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control" name="posessiondate"
                                            value="<?php echo $row['posessiondate']; ?>" placeholder="Enter No.of Room">
                                    </div>
                                </div>

                            </div>

                        </div>



                        <h4 class="card-title">Image & Status</h4>
                        <div class="row">
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 1 <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <img src="property/<?php echo $row['pimage'];?>" alt="pimage" height="150"
                                            width="180"><br /><br />
                                        <input class="form-control txtbox" name="aimage" type="file">

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 2 <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <img src="property/<?php echo $row['pimage1'];?>" alt="pimage" height="150"
                                            width="180"><br /><br />
                                        <input class="form-control txtbox" name="aimage1" type="file">

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 3 <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <img src="property/<?php echo $row['pimage2'];?>" alt="pimage" height="150"
                                            width="180"><br /><br />
                                        <input class="form-control txtbox" name="aimage2" type="file">

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 4</label>
                                    <div class="col-lg-8">
                                        <img src="property/<?php echo $row['pimage3'];?>" alt="pimage" height="150"
                                            width="180"><br /><br />
                                        <input class="form-control" name="aimage3" type="file">

                                    </div>
                                </div>



                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 5</label>
                                    <div class="col-lg-8">
                                        <img src="property/<?php echo $row['pimage4'];?>" alt="pimage" height="150"
                                            width="180"><br /><br />
                                        <input class="form-control" name="aimage4" type="file">

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Status</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="status">
                                            <option value="<?php echo $row['status']; ?>">
                                                <?php echo $row['status']; ?></option>
                                            <option value="Available">Available</option>
                                            <option value="Sold out">Sold Out</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <h4 class="card-title">Map & Video</h4>
                        <div class="row">
                            <div class="col-xl-6">


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Map</label>
                                    <div class="col-lg-8">
                                        <input class="form-control txtbox" name="map" type="text"
                                            value="<?php echo $row['map']; ?>" placeholder="Enter Map Url">
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Video</label>
                                    <div class="col-lg-8">
                                        <input class="form-control txtbox" name="video"
                                            value="<?php echo $row['video']; ?>" type="text"
                                            placeholder="Enter Video Url">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <h4 class="card-title">Amenities</h4>
                        <div class="row">

                            <table style="font-size:15px;" align="center">
                                <tr>

                                    <?php
                                            foreach ($allAmenities as $amenity) {
                                            $checked = in_array($amenity['aname'], $propertyAmenities) ? 'checked' : '';
                                            echo '<td style="width:200px;">';
                                                echo '<input type="checkbox" name="amenities[]"
                                                    value="' . $amenity['aname'] . '" ' . $checked . '>';
                                                echo htmlspecialchars($amenity['aname']);
                                                echo '</td><br>';
                                                if(++$num1%4 == 0) echo '</tr><tr>';
                                            }
                                            ?>


                                </tr>
                            </table>

                        </div>


                        <br><br>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div align="center">
                                    <button type="submit" class="theme-btn btn-one" name="add">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</section>




<?php
    include('footer.php');
    ?>