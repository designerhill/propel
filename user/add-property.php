<?php
     include('header.php');
     $uid=$_SESSION['user'];
     if (!isset($_SESSION['user'])) {
        // Redirect to login page if session is not set
        header("Location: ../login.php");
        exit();
    }
     $error="";
     $msg="";
     $uid=$_SESSION['user'];
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
         }
     
         if($temp_name1)
         {
         move_uploaded_file($temp_name1,"../sitemanager/property/$aimage1");
         }
         if($temp_name2)
         {
         move_uploaded_file($temp_name2,"../sitemanager/property/$aimage2");
         }
         if($temp_name3)
         {
         move_uploaded_file($temp_name3,"../sitemanager/property/$aimage3");
         }
         if($temp_name4)
         {
         move_uploaded_file($temp_name4,"../sitemanager/property/$aimage4");
         }
         
         
         
         $sql="INSERT INTO property( projectId, meta_title, keyword, description, slug,title, project,pcontent, type, stype,buildingtype,reranumber, price, location, city, state, facing,typology, balcony,view,ageofproperty,plotarea, carpetarea, builtuparea, superbuiltuparea, poojaroom, servantroom, serviceroom, studyroom, ftype, coveredparking, openparking, posessiondate, ownership, sqftprice, maintenance, bookingamount, annualduespayable, membershipcharges, pimage, pimage1, pimage2, pimage3, pimage4, room, bedroom, bathroom, address, sublocation, society, tower, floor, unitnumber, housenumber, map, video, status, isFeatured,posessionstatus,totalfloor,rentalyield,propertyappretiation,userid,isapproved)
         VALUES('$projectId', '$meta_title', '$keyword', '$description', '$slug','$title','$project','$content','$ptype','$stype','$buildingtype','$reranumber','$price','$location',
         '$city','$state','$facing','$typology','$balcony','$view','$ageofproperty','$plotarea','$carpetarea','$builtuparea','$superbuiltuparea','$poojaroom','$servantroom','$serviceroom','$studyroom','$ftype','$coveredparking','$openparking','$posessiondate','$ownership','$sqftprice','$maintenance','$bookingamount','$annualduespayable','$membershipcharges','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$room','$bedroom','$bathroom','$address','$sublocation','$society','$tower','$floor','$unitnumber','$housenumber','$map','$video','$status','$isFeatured','$posessionstatus','$totalfloor','$rentalyield','$propertyappretiation','$uid',0)";
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
    /* Set your desired background color */
}
</style>

<section class="myprofile-section sec-pad">
    <div class="container">
        <!-- Sidebar -->

        <div class="main-content">
            <div class="tabs">
                <a href="profile.php" class="tab">Profile</a>
                <a href="my-listing.php" class="tab active">My Listings</a>

                <a href="communication.php" class="tab">Communication</a>


            </div>
            <div class="col-xl-12 col-lg-12 ">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title">Property Detail</h4>
                        <?php echo $error; ?>
                        <?php echo $msg; ?>

                        <div class="row">

                            <div class="col-xl-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Title <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control txtbox" name="title" required
                                            placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Project Name <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control txtbox" name="project" required
                                            placeholder="Enter Project Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Description<span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control txtbox" name="content" rows="6" id="summernote"
                                            cols="30" required></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Property Type <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="ptype" required>
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
                                    <label class="col-lg-4 col-form-label">Selling Type <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="stype">
                                            <option value="">Select</option>
                                            <option value="Rent">Rent</option>
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
                                        <input type="text" class="form-control txtbox" name="reranumber"
                                            placeholder="Enter RERA Number">

                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Age of Property <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="ageofproperty">
                                            <option value="">Select</option>
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
                                        <input type="text" class="form-control txtbox" name="view"
                                            placeholder="Enter View">

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
                                        <input type="number" min="1" max="9999999999" class="form-control txtbox"
                                            name="price" required placeholder="Enter Price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Maintenance</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="maintenance"
                                            placeholder="Enter Maintenance">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Annual Dues Payable</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="annualduespayable"
                                            placeholder="Enter Annual Dues Payable">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Per Sq. Feet Price</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="sqftprice"
                                            placeholder="Enter Per Sq. Feet Price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Booking Amount</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="bookingamount"
                                            placeholder="Enter Booking Amount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Membership Charges</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="membershipcharges"
                                            placeholder="Enter Membership Charges">
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
                                        <select class="form-control" name="city" required>
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
                                    <label class="col-lg-4 col-form-label">Address <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="address" required
                                            placeholder="Enter Address">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Sub Locality</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="sublocation"
                                            placeholder="Enter Sub Locality">
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">State <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="state" required>
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
                                    <label class="col-lg-4 col-form-label">Locality <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="location" required
                                            placeholder="Enter Locality">
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
                                            placeholder="Enter Floor">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Total Floor</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="totalfloor"
                                            placeholder="Enter Total Floor">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Tower <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="tower" required
                                            placeholder="Enter Tower">
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
                                            placeholder="Enter Carpet Area">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Super Builtup Area</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="superbuiltuparea"
                                            placeholder="Enter Super Builtup Area">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Built Up Area</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="builtuparea"
                                            placeholder="Enter Builtup Area">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Plot Area</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="plotarea"
                                            placeholder="Enter Plot Area">
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
                                            placeholder="Enter Expected Rental Yield">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Annual Property Appriciation</label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control txtbox" name="propertyappretiation"
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
                                            placeholder="Enter Ownership Type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Unit Number</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="unitnumber"
                                            placeholder="Enter Unit Number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Room <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="room">
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
                                        <input type="text" class="form-control txtbox" name="typology"
                                            placeholder="Enter Typology">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Bedroom</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="bedroom"
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
                                        <input type="text" class="form-control txtbox" name="society"
                                            placeholder="Enter Society">
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">House Number</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control txtbox" name="housenumber"
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
                                        <input type="date" class="form-control txtbox" name="posessiondate"
                                            placeholder="Enter No.of Room">
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
                                        <input class="form-control   txtbox" name="aimage" type="file" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 2 <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input class="form-control txtbox" name="aimage1" type="file" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 3 <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input class="form-control txtbox" name="aimage2" type="file" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 4</label>
                                    <div class="col-lg-8">
                                        <input class="form-control txtbox" name="aimage3" type="file">
                                    </div>
                                </div>


                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Image 5</label>
                                    <div class="col-lg-8">
                                        <input class="form-control txtbox" name="aimage4" type="file">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Status <span
                                            style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" required name="status">
                                            <option value="">Select Status</option>
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
                                            placeholder="Enter Map Url">
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Video</label>
                                    <div class="col-lg-8">
                                        <input class="form-control txtbox" name="video" type="text"
                                            placeholder="Enter Video Url">
                                    </div>
                                </div>


                            </div>
                        </div>


                        <h4 class="card-title">Amenities</h4>
                        <div class="row">

                            <table style="font-size:15px;">
                                <tr>
                                    <?php
									$count=0;
										  $q="select * from amenities";
                                          $r=mysqli_query($con,$q) or die(mysqli_error($con));
											while ($rs = mysqli_fetch_array ($r))
											{
											$amenity=$rs['aname'];
								
											?>

                                    <td style="width:200px;  ">
                                        <center><?php echo $amenity;?><input type="hidden"
                                                name="amenity[<?php echo $count; ?>][amenity]"
                                                value="<?php echo $amenity;?>" />
                                        </center>
                                    </td>

                                    <td style="width:20px; ">
                                        <center><input type="checkbox" name="amenity[<?php echo $count; ?>][add]"
                                                value="Add" />
                                        </center>
                                    </td>
                                    <?php if(++$count%4 == 0) echo '</tr><tr>'; ?>



                                    <?php 
} ?>

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