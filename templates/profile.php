<?php
include "../lib.php";

//Moves item image files to folder and saved the file names and other other to DB
if(isset($_POST['upload'])){
  $defaultFileName = "../img/defaultitemimage.jpg";

  $filetmp = $_FILES['itemImages']['tmp_name'][0];
  $filename = $_FILES["itemImages"]["name"][0];
  $filetype = $_FILES["itemImages"]["type"][0];
  $filepath = "../img/".$filename;
  
  $filetmp1 = $_FILES["itemImages"]["tmp_name"][1];
  if($_FILES["itemImages"]["name"][1] != null){
    $filename1 = $_FILES["itemImages"]["name"][1];
     move_uploaded_file($filetmp1,$filepath1);
  }   
  else
    $filename1 = $defaultFileName;

  $filetype1 = $_FILES["itemImages"]["type"][1];
  $filepath1 = "../img/".$filename1;

  $filetmp2 = $_FILES["itemImages"]["tmp_name"][2];
  if($_FILES["itemImages"]["name"][2] != null){
    $filename2 = $_FILES["itemImages"]["name"][2];
    move_uploaded_file($filetmp2,$filepath2);
  }
    
  else
    $filename2 = $defaultFileName;

  $filetype2 = $_FILES["itemImages"]["type"][2];
  $filepath2 = "../img/".$filename2;

  move_uploaded_file($filetmp,$filepath);
 
  //$imagePath = "../img/".$post['image'];
  try{
    $itemName = $_POST['itemname'];
    $itemDescription = $_POST['itemdescription'];
    //unset($_POST);
    //print_r($_POST);
    // print "Name: $name, Price:$price, Country: $countryId";
    $res = saveItem($filepath, $filepath1, $filepath2, $itemName, $itemDescription);
    //print_r($res);
    //var_dump($res);
  }catch(Exception $e){
    print( $e->getMessage());
  }

}

if (isset($_POST['uploadU'])) {
  $filetmp = $_FILES["imageU"]["tmp_name"];
  $filename = $_FILES["imageU"]["name"];
  $filetype = $_FILES["imageU"]["type"];
  $filepath = "../img/".$filename;
  
  move_uploaded_file($filetmp,$filepath);
  try{
    $id = $_POST['id'];
    $name = $_POST['itemnameU'];
    $description = $_POST['itemdescriptionU'];
    //$itempic = "../img/" . $_POST['imageU'];


    $db = getDBConnection();

    $sql = "UPDATE items SET itemname= '{$name}', itemdescription='{$description}', picture='{$filepath}' WHERE itemid=$id;";

    $db->query($sql);
    unset($_POST);
   /*if ($db->query($sql) === TRUE) {
         echo "Record updated successfully";
     } else {
         echo "Error updating record: " . $db->error;
     }
     */
     $db->close();
  }
  catch(Exception $e){
    print( $e->getMessage());
  }

}

if (isset($_POST['uploadPic'])) {
  $filetmp = $_FILES["imagePic"]["tmp_name"];
  $filename = $_FILES["imagePic"]["name"];
  $filetype = $_FILES["imagePic"]["type"];
  $filepath = "../img/".$filename;
  
  move_uploaded_file($filetmp,$filepath);
  try{
    $id = $_SESSION["id"];
    $db = getDBConnection();

    $sql = "UPDATE users SET profilepicture='{$filepath}' WHERE id=$id;";
    $db->query($sql);
    unset($_POST);
    $db->close();
   }
   catch(Exception $e){
    print( $e->getMessage());
   }



}
$userID = getCurrentUser();
$userRating = getUserRating($userID);
  //print_r($userRating);
  if($userRating[0][0] == null)
    $rating = $userRating[1][0];
  else if($userRating[1][0]==null)
    $rating = $userRating[0][0];
  else
    $rating = $userRating[0][0] + $userRating[1][0];
  $rating = number_format($rating, 1);

$tradeCount = getUserTradeCount($userID);
include "base.php";
?>

<div class ="container-fluid">
  <div class ="row">
    <div class ="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <a href='#' data-toggle='tooltip' title= '<?php echo $rating. " out of 5 stars" ?>' data-placement='bottom'><input  type='hidden' class='rating' data-filled='fa fa-star fa-3x' data-empty='fa fa-star-o fa-3x' data-readonly value= <?php 
                                    echo $rating 
                                  ?>
    ></a>
    Trades: <?php echo $tradeCount[0]['numtrades']?>
  </div>

    <div class ="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <button type="button" onclick ="showProfilePictureForm();" class="btn btn-success btn-block"> <i class="fa fa-file-image-o fa-lg" aria-hidden="true"></i> Update Profile Picture</button>
    </div>
    <div class ="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <button type="button" onclick ="showForm();" class="btn btn-success btn-block"><i class="fa fa-gift fa-lg" aria-hidden="true"></i> Add Item</button>
    </div>
    <!-- <div class ="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <button type="button" onclick ="showSearch();" class="btn btn-info btn-block"><i class="fa fa-search fa-lg" aria-hidden="true"></i> Find Item</button>
    </div> -->
  </div>
 
  <!-- Perform a seafrch -->
  <div class="container" id ="ProfileSearch" style ="display:none;">
  <div class="row">
        <div class="col-md-6">
        <h2>Search Your Items</h2>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" placeholder="Seach.." />
                    <span class="input-group-btn">
                        <button onclick ="hideSearch();" class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
  </div>
</div>

  <!-- Update Profile Pic -->
  <div class ="row" style ="display:none" id ="uploadProfilePic">
    <div class ="col-md-6">
      <form class="form-horizontal" action ="profile.php" enctype="multipart/form-data" method ="POST">
      <!-- <form class="form-horizontal" action ="index.php/additem" enctype="multipart/form-data" method ="POST" onsubmit="return addItem();"> -->
        <fieldset>
          <legend style="text-align:center">Change Profile Pic</legend>
            <!-- File Button --> 
            <div class="form-group">
              <label class="col-md-4 control-label" for="uppic">Choose an Image </label>
              <div class="col-md-6">
                <input name="imagePic" class="input-file" id="imagePic" type="file" accept="image/*" required="">
              </div>
            </div>
            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="upload"></label>
              <div class="col-md-4">
                <button type ="submit" name="uploadPic" class="btn btn-success" id="uploadPic">Add</button>
                  <button type="button"onclick ="hideProfilePictureForm();" class="btn btn-warning" ></a>Cancel
                </button>
              </div>
            </div>

          </fieldset>
        </form>
    </div>
  </div>

  

  <div class ="row" style ="display:none" id ="updateItemform">
    <div class ="col-md-6">
      <form class="form-horizontal" action ="profile.php" method ="POST" enctype="multipart/form-data">
        <fieldset>
          <legend style="text-align:center">Edit Item</legend>
            <!-- File Button-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="uppic">Photo 1 </label>
              <div class="col-md-6">
                <input name="imageU" class="input-file" id="imageU" type="file" accept="image/*" required="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="uppic">Photo 2 </label>
              <div class="col-md-6">
                <input name="imageU2" class="input-file" id="imageU" type="file" accept="image/*" required="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="uppic">Photo 3 </label>
              <div class="col-md-6">
                <input name="imageU3" class="input-file" id="imageU" type="file" accept="image/*" required="">
              </div>
            </div>
            
          	<!-- Input -->
            <div class="form-group"  >
              <!-- <label class="col-md-4 control-label" for="ItemDescription">ItemID</label> -->
              <div class="col-md-6">                     
                <input name="id" class="form-control" id="id"  type="hidden" placeholder="ID" required="" >
              </div>
            </div>
          
            <!-- Input -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="ItemDescription">Item Name</label>
              <div class="col-md-6">                     
                <input name="itemnameU" class="form-control" id="itemnameU" type="text" placeholder="Item Name" maxlength="20" required="">
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="ItemDescription">Item Description</label>
              <div class="col-md-6">                     
                <textarea name="itemdescriptionU" class="form-control" id="itemdescriptionU" placeholder="Tell us about your item" rows="5" required=""></textarea>
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="upload"></label>
              <div class="col-md-4">
                <button type ="submit" name="uploadU" class="btn btn-success" id="uploadU">Update</button>
                  <button type="button"onclick ="hideUpdateForm();" class="btn btn-warning" ></a>Cancel
                </button>
              </div>
            </div>

          </fieldset>
        </form>
    </div>
  </div>
  
  <div class="row">
    <div class="table-responsive">
      <div class="header text-center">
        <h1> Your Junk <i class="fa fa-gift fa-lg" aria-hidden="true" ></i> </h1>
      </div>

      <div id="table_secp"></div>
    </div>
  </div>

</div>  <!-- close container -->  
<script type="text/template" id="table_headingp">
  <table class="table table-hover table-condensed">
    <thead>
    <tr>
      <th>Primary Image</th>
      <th>Name</th>
      <th>Description</th>
      <th>Edit</th>
      <th>Remove</th>
      <th>Uploaded</th>
      <th>Status</th>
    </tr>
    </thead>
    <tbody>
</script>



<script>window.onload = function() {
    getUserItems();
};
</script>