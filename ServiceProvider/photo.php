<?php include('include/header.php');  
    if(isset($_SESSION['SP_id']))
    {
    $sid= $_SESSION['SP_id'];
    }
    if(isset($_SESSION['pro_id']))
    {
    $sid= $_SESSION['pro_id'];
    }
    $service_id=$_GET['id'];
    $sql = "SELECT * FROM tbl_service where SP_id=$sid and id=$service_id ";
                $result=$connect->query($sql);
                while($row = $result->fetch_array())
                {     
                    $id=$row['id'];
                }
     $sql="select * from tbl_media where service_id=$id";
        $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result))
        {
            $banner=$row['banner'];
            $work1=$row['work_image1'];
            $work2=$row['work_image2'];
            $work3=$row['work_image3'];
            $video=$row['video'];
        }

    ?>
<div class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Photos Of Service</h2>
	                                <div>
			                            <ul class="breadcrumb">
			                                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
			                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
			                                <li class="breadcrumb-item active">Photo</li>
			                            </ul>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <!-- End Page Header -->

                        <div class="row flex-row">
                            <div class="col-xl-12">
                               <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Photos of Service</h4>
                                    </div>
                    <div class="widget-body">
                        <div class="row flex-row justify-content-center">
                            <div class="col-xl-10">
                            <form class="form-horizontal" action="../controller/edit_db.php" method="post" enctype="multipart/form-data">
    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label">Banner Image</label><br><input type="hidden" value="<?php echo $id; ?>"  name="id">
            <?php if(isset($banner)) {  ?>
                <center> <img src="../controller/serviceprovider/services/banner/<?php echo $id.$banner; ?>" alt="banner" style="width:600px;" ></center>
                <?php } else {  ?>
            <div class="input-group">
            <span class="input-group-addon addon-secondary">
                    <i class="la la-cloud-upload" style="font-size:45px;color:red"></i>
            </span>
                <input type="file" name="banner" class="form-control" style="font-size:25px;color:red" accept="image/*"   required autofocus />
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-4 mb-3">
            <label class="form-control-label">Working Image<span class="text-danger ml-2">*</span></label><br>
            <?php if(isset($work1)) {  ?>
                <img src="../controller/serviceprovider/services/working/<?php echo  $id.$work1; ?>" alt="work1" style="width:200px; height:100px" >
                <?php } else {  ?>
            <div class="input-group">
            <span class="input-group-addon addon-secondary">
                    <i class="la la-cloud-upload" style="font-size:20px;color:red"></i>
            </span>
                <input type="file" name="work1" class="form-control" style="font-size:12px;color:red"accept="image/*"  value="" required autofocus/>
            </div>
            <?php } ?>
        </div>
        <div class="col-xl-4 mb-3">
            <label class="form-control-label">Working Image<span class="text-danger ml-2">*</span></label><br>
            <?php if(isset($work2)) {  ?>
                <img src="../controller/serviceprovider/services/working/<?php echo  $id.$work2; ?>" alt="work2" style="width:200px; height:100px" >
                <?php } else {  ?>
            <div class="input-group">
            <span class="input-group-addon addon-secondary">
                    <i class="la la-cloud-upload" style="font-size:20px;color:red"></i>
            </span>
                <input type="file" name="work2" class="form-control" style="font-size:12px;color:red"accept="image/*" value=""required autofocus  />
            </div>
                <?php } ?>
        </div>
        <div class="col-xl-4">
            <label class="form-control-label">Working Image<span class="text-danger ml-2">*</span></label><br>
            <?php if(isset($work3)) {  ?>
                <img src="../controller/serviceprovider/services/working/<?php echo  $id.$work3; ?>" alt="work3" style="width:200px; height:100px" >
                <?php } else {  ?>
            <div class="input-group">
            <span class="input-group-addon addon-secondary">
                    <i class="la la-cloud-upload" style="font-size:20px;color:red"></i>
            </span>
                <input type="file" name="work3" class="form-control" style="font-size:12px;color:red"accept="image/*" value=""required autofocus  />
            </div>
                <?php } ?>
        </div>
        </div>
        
    </div>
    </div><center>
    <li class="next d-inline-block">
       <?php  if(!isset($banner) & !isset($work1) & !isset($work2) & !isset($work3)) { ?>
        <button type="submit" name="btn_servicephoto" class="finish btn btn-gradient-01" >Submit</button>
       <?php } ?>
    </li></center>
</div>
</form>
</div>

</div> 
</div>
</div>
<li class="next d-inline-block" style="position:absolute;top:70px; right:20px;">
                           <a href="service.php?id=<?php echo $id; ?>" >  <button name="video" class="finish btn btn-gradient-01"style=" position: absolute;top:90px;  right:20px; font-size:15px;" >Back </button>
                            </li>     
</div>
 <?php include('include/footer.php');  ?>" 