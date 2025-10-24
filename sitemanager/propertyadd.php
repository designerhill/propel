<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
include('header.php');
echo "<!-- Header loaded successfully -->";
$error="";
$msg="";
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

    
	$meta_title=addslashes($_POST['meta_title']);
    $keyword=addslashes($_POST['keyword']);
    $description=addslashes($_POST['description']);
    $projectId=addslashes($_POST['projectId']);
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
    $agentname=$_POST['agentname'];

    $qu="select * from agent where name='$agentname'";
    $re=mysqli_query($con,$qu) or die(mysqli_error($con));
    $rw=mysqli_fetch_array($re);
    $agentpic = ($rw && isset($rw['image'])) ? $rw['image'] : '';
    

	

	$isFeatured=$_POST['isFeatured'];
	
	
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
	move_uploaded_file($temp_name,"property/$aimage");
	}

	if($temp_name1)
	{
	move_uploaded_file($temp_name1,"property/$aimage1");
	}
	if($temp_name2)
	{
	move_uploaded_file($temp_name2,"property/$aimage2");
	}
	if($temp_name3)
	{
	move_uploaded_file($temp_name3,"property/$aimage3");
	}
	if($temp_name4)
	{
	move_uploaded_file($temp_name4,"property/$aimage4");
	}
	
	
	
	$sql="INSERT INTO property( projectId, meta_title, keyword, description, slug,title, project,pcontent, type, stype,buildingtype,reranumber, price, location, city, state, facing,typology, balcony,view,ageofproperty,plotarea, carpetarea, builtuparea, superbuiltuparea, poojaroom, servantroom, serviceroom, studyroom, ftype, coveredparking, openparking, posessiondate, ownership, sqftprice, maintenance, bookingamount, annualduespayable, membershipcharges, pimage, pimage1, pimage2, pimage3, pimage4, room, bedroom, bathroom, address, sublocation, society, tower, floor, unitnumber, housenumber, map, video, status, isFeatured,posessionstatus,totalfloor,rentalyield,propertyappretiation,agentpic,agentname,isapproved)
	VALUES('$projectId', '$meta_title', '$keyword', '$description', '$slug','$title','$project','$content','$ptype','$stype','$buildingtype','$reranumber','$price','$location',
	'$city','$state','$facing','$typology','$balcony','$view','$ageofproperty','$plotarea','$carpetarea','$builtuparea','$superbuiltuparea','$poojaroom','$servantroom','$serviceroom','$studyroom','$ftype','$coveredparking','$openparking','$posessiondate','$ownership','$sqftprice','$maintenance','$bookingamount','$annualduespayable','$membershipcharges','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$room','$bedroom','$bathroom','$address','$sublocation','$society','$tower','$floor','$unitnumber','$housenumber','$map','$video','$status','$isFeatured','$posessionstatus','$totalfloor','$rentalyield','$propertyappretiation','$agentpic','$agentname',1)";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
				$pid = $con->insert_id;	
                foreach($_REQUEST['amenity'] as $key=>$value) {
                    if(isset($value['add']))
		{
 
                    $query4="INSERT INTO property_amenities(pid, amenity) VALUES ('$pid','".$value['amenity']."')";
                    $result4=mysqli_query($con,$query4) or die (mysqli_error($con)) ;
        }
                }
		}
		else
		{
			$error="<p class='alert alert-warning'>Something went wrong. Please try again</p>";
		}
        
}
?>
<style>
.note-editable {
    background-color: #f5f5f5 !important;
}
.page-titles{
        z-index: 9;
    }

/* Modern Card Layout Styles */
.section-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    margin-bottom: 25px;
    padding: 25px;
    transition: all 0.3s ease;
}

.section-card:hover {
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
}

.section-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid #f0f0f0;
}

.section-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    margin-right: 15px;
}

.section-header .section-title {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin: 0;
}

.form-control {
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    padding: 10px 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.col-form-label {
    font-weight: 500;
    color: #555;
}

.btn-success {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 6px;
    padding: 12px 40px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.amenities-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 15px;
    margin-top: 15px;
}

.amenity-item {
    display: flex;
    align-items: center;
    padding: 12px;
    background: #f8f9fa;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.amenity-item:hover {
    background: #e9ecef;
}

.amenity-item input[type="checkbox"] {
    margin-left: 10px;
    width: 18px;
    height: 18px;
}

.page-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 30px;
    border-radius: 10px;
    margin-bottom: 30px;
}

.page-header h4 {
    color: white;
    margin: 0;
    font-size: 24px;
    font-weight: 600;
}

.alert {
    border-radius: 8px;
    border: none;
}
</style>
<!-- Summernote CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

<div class="content-body bg-light">
    <div class="container-fluid">
        <div class="row page-titles">

            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Property</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="page-header">
                    <h4>Add Property Details</h4>
                    <p style="margin: 5px 0 0 0; opacity: 0.9;">Fill in the details below to add a new property to your listings</p>
                </div>
                
                <?php echo $error; ?>
                <?php echo $msg; ?>
                
                <form method="post" enctype="multipart/form-data">
                    <!-- Property Details Section -->
                    <div class="section-card">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <h4 class="section-title">Property Details</h4>
                        </div>

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Title</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Enter Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Project Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="project"
                                                placeholder="Enter Project Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Description</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" name="content" rows="6" id="summernote"
                                                cols="30"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Property Type</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="ptype">
                                                <option value="">Select</option>
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
                                        <label class="col-lg-4 col-form-label">Selling Type</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="stype">
                                                <option value="">Select</option>
                                                <option value="Rent">Rent</option>
                                                <option value="Buy">Buy</option>
                                            </select>
                                        </div>
                                    </div>



                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Building Type</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="buildingtype">
                                                <option value="">Select</option>
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
                                            <input type="text" class="form-control" name="reranumber"
                                                placeholder="Enter RERA Number">

                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Age of Property</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="ageofproperty">
                                                <option value="">Select</option>
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
                                        <label class="col-lg-4 col-form-label">Facing</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="facing">
                                                <option value="">Select</option>
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
                                            <input type="text" class="form-control" name="view"
                                                placeholder="Enter View">

                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Project Id</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="projectId"
                                                placeholder="Enter ProjectId">

                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                    
                    <!-- SEO Section -->
                    <div class="section-card">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-search"></i>
                            </div>
                            <h4 class="section-title">SEO Data</h4>
                        </div>
                        <div class="row">
                                <div class="col-xl-12">

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Meta Title</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="meta_title"
                                                placeholder="Enter Meta Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Meta Keyword</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" name="keyword"
                                                placeholder="Enter Meta Keyword"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Meta Description</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" name="description"
                                                placeholder="Enter Meta Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    
                    <!-- Price Section -->
                    <div class="section-card">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-dollar"></i>
                            </div>
                            <h4 class="section-title">Pricing Details</h4>
                        </div>
                        <div class="row">
                                <div class="col-xl-6">

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Unit Price</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="price"
                                                placeholder="Enter Price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Maintenance</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="maintenance"
                                                placeholder="Enter Maintenance">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Annual Dues Payable</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="annualduespayable"
                                                placeholder="Enter Annual Dues Payable">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Per Sq. Feet Price</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="sqftprice"
                                                placeholder="Enter Per Sq. Feet Price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Booking Amount</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="bookingamount"
                                                placeholder="Enter Booking Amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Membership Charges</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="membershipcharges"
                                                placeholder="Enter Membership Charges">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    
                    <!-- Location Section -->
                    <div class="section-card">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <h4 class="section-title">Location Details</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">City</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="city">
                                            <option value="">Select</option>
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
                                    <label class="col-lg-4 col-form-label">Address</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="address"
                                            placeholder="Enter Address">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Sub Locality</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="sublocation"
                                            placeholder="Enter Sub Locality">
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">State</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="state">
                                            <option value="">Select</option>
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
                                    <label class="col-lg-4 col-form-label">Locality</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="location"
                                            placeholder="Enter Locality">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Flooring Section -->
                    <div class="section-card">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-building"></i>
                            </div>
                            <h4 class="section-title">Floor Details</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Floor</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="floor"
                                            placeholder="Enter Floor">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Total Floor</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="totalfloor"
                                            placeholder="Enter Total Floor">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Tower</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="tower"
                                            placeholder="Enter Tower">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Area Details Section -->
                    <div class="section-card">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-expand"></i>
                            </div>
                            <h4 class="section-title">Area Details</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Carpet Area</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="carpetarea"
                                            placeholder="Enter Carpet Area">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Super Builtup Area</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="superbuiltuparea"
                                            placeholder="Enter Super Builtup Area">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Built Up Area</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="builtuparea"
                                            placeholder="Enter Builtup Area">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Plot Area</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="plotarea"
                                            placeholder="Enter Plot Area">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Agent Details Section -->
                    <div class="section-card">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <h4 class="section-title">Agent Details</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Agent Name</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="agentname">
                                            <option value="">Select</option>
                                            <?php
                                            $query1=mysqli_query($con,"select * from agent");
                                            while($row1=mysqli_fetch_row($query1))
                                            {
                                            ?>
                                            <option value="<?php echo $row1[1]; ?>" class="text-captalize">
                                                <?php echo $row1[1]; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    
                    <!-- ROI Section -->
                    <div class="section-card">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-line-chart"></i>
                            </div>
                            <h4 class="section-title">Return on Investment (ROI)</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Expected Rental Yield</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="rentalyield"
                                            placeholder="Enter Expected Rental Yield">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Annual Property Appriciation</label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control" name="propertyappretiation"
                                            placeholder="Enter Annual Property Appriciation">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Property Specifications Section -->
                    <div class="section-card">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-list"></i>
                            </div>
                            <h4 class="section-title">Property Specifications</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Ownership</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="ownership"
                                            placeholder="Enter Ownership Type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Unit Number</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="unitnumber"
                                            placeholder="Enter Unit Number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Room</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="room">
                                            <option value="">Select</option>
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
                                        <input type="text" class="form-control" name="typology"
                                            placeholder="Enter Typology">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Bedroom</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="bedroom"
                                            placeholder="Enter No.of Bedroom">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Servant Room</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="servantroom">
                                            <option value="">Select...</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Study Room</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="studyroom">
                                            <option value="">Select...</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Covered Parking</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="coveredparking">
                                            <option value="">Select...</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3+">3+</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Posession Status</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" requred name="posessionstatus">
                                            <option value="">Select...</option>
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
                                        <input type="text" class="form-control" name="society"
                                            placeholder="Enter Society">
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">House Number</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="housenumber"
                                            placeholder="Enter House Number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Balcony</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="balcony">
                                            <option value="">Select...</option>
                                            <option value="Connected">Connected</option>
                                            <option value="Individual">Individual</option>
                                            <option value="Room-Attached">Room-Attached</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Bathroom</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="bathroom">
                                            <option value="">Select...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3+">3+</option>

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Pooja Room</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="poojaroom">
                                            <option value="">Select...</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Service Room</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="serviceroom">
                                            <option value="">Select...</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Furnishing Type</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="ftype">
                                            <option value="">Select...</option>
                                            <option>Unfurnished</option>
                                            <option>Furnished</option>
                                            <option>Semi-Furnished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Open Parking</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" requred name="openparking">
                                            <option value="">Select...</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3+">3+</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Posession Date</label>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control" name="posessiondate"
                                            placeholder="Enter No.of Room">
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                    </div>

                    <!-- Images & Status Section -->
                    <div class="section-card">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-image"></i>
                            </div>
                            <h4 class="section-title">Images & Status</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 1</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="aimage" type="file"="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 2</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="aimage1" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 3</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="aimage2" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 4</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="aimage3" type="file">
                                    </div>
                                </div>


                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 5</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="aimage4" type="file">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Status</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option value="Available">Available</option>
                                            <option value="Sold out">Sold Out</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>                        
                    </div>

                    <!-- Map & Video Section -->
                    <div class="section-card">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-video-camera"></i>
                            </div>
                            <h4 class="section-title">Map & Video</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Map</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="map" type="text"
                                            placeholder="Enter Map Url">
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Video</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="video" type="text"
                                            placeholder="Enter Video Url">
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>

                    <!-- Amenities Section -->
                    <div class="section-card">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <h4 class="section-title">Amenities</h4>
                        </div>
                        <div class="amenities-grid">
                            <?php
                            $count=0;
                            $q="select * from amenities";
                            $r=mysqli_query($con,$q) or die(mysqli_error($con));
                            while ($rs = mysqli_fetch_array ($r))
                            {
                                $amenity=$rs['aname'];
                            ?>
                                <div class="amenity-item">
                                    <label style="margin: 0; flex: 1; cursor: pointer;">
                                        <?php echo $amenity;?>
                                        <input type="hidden" name="amenity[<?php echo $count; ?>][amenity]" value="<?php echo $amenity;?>" />
                                    </label>
                                    <input type="checkbox" name="amenity[<?php echo $count; ?>][add]" value="Add" />
                                </div>
                            <?php 
                                $count++;
                            } 
                            ?>
                        </div>
                    </div>

                    <!-- Featured & Submit Section -->
                    <div class="section-card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Is Featured?</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="isFeatured">
                                            <option value="">Select...</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success btn-lg" name="add">
                                    <i class="fa fa-save"></i> Submit Property
                                </button>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>
</div>

<?php include('footer.php'); ?>

<script>
$(document).ready(function() {
    $("#summernote").summernote({
        placeholder: 'Enter post content here...',
        height: 300,
        callbacks: {
            onImageUpload: function(files, editor, welEditable) {

                for (var i = files.length - 1; i >= 0; i--) {
                    sendFile(files[i], this);
                }
            }
        }
    });
});

function sendFile(file, el) {
    var form_data = new FormData();
    form_data.append('file', file);
    $.ajax({
        data: form_data,
        type: "POST",
        url: 'editor-upload.php',
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
            $(el).summernote('editor.insertImage', url);
        }
    });
}
</script>