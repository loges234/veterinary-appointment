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
    $sql = "SELECT * FROM tbl_service where sp_id=$sid and id=$service_id ";
                $result=$connect->query($sql);
                while($row = $result->fetch_array())
                {     
                    $id=$row['id'];
                }
     $sql="select * from tbl_media where service_id=$id";
        $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result))
        {
            $video=$row['video'];
        }

    ?>
<div class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Videos Of Service</h2>
	                                <div>
			                            <ul class="breadcrumb">
			                                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
			                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
			                                <li class="breadcrumb-item active">Video</li>
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
                                        <h4>Video of Service</h4>
                                    </div>
                                    <form class="form-horizontal" action="../controller/edit_db.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $id; ?>"  name="id">
                                    <div class="widget-body">
                                        <div class="row flex-row justify-content-center">
                                            <div class="col-xl-10">
                                                  <div class="form-group row mb-3">
                                                                    <div class="col-xl-12 mb-3">
                                                                        <label class="form-control-label">Video</label><br>
                                                                        <?php
                                                                         if(isset($video)) 
                                                                         {  
                                                                                if($video!='No')
                                                                                {  ?>
                                                                                 <center>  <video width="800" height="300" controls>
                                                                                <source src="../controller/serviceprovider/videos/<?php echo $video; ?>"alt="video">
                                                                            </video> </center>
                                                                            <?php }
                                                                         
                                                                        if($video=='No')
                                                                         {  ?>
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon addon-secondary">
                                                                                <i class="la la-cloud-upload" style="font-size:25px;color:red"></i>
                                                                        </span>
                                                                        <input type="file" name="video" class="form-control" style="font-size:20px;color:red" accept="video/*" value="" required autofocus />
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                </div>
    </div><center>
    <li class="next d-inline-block">
       <?php
         if($video=='No')
         {  
           ?>
        <button type="submit" name="btn_servicevideo" class="finish btn btn-gradient-01" >Submit</button>
       <?php 
         } 
        }
         if(!isset($video))
         {  ?>
        <div class="input-group">
        <span class="input-group-addon addon-secondary">
                <i class="la la-cloud-upload" style="font-size:25px;color:red"></i>
        </span>
        <input type="file" name="video" class="form-control" style="font-size:20px;color:red" accept="video/*" value="" required autofocus />
        </div>
        <?php } ?>
    </div>
</div>
</div>
</div><center>
<li class="next d-inline-block">
<?php
if(!isset($video))
{  
?>
<button type="submit" name="btn_servicevideo" class="finish btn btn-gradient-01" >Submit</button>
<?php 
}
          ?>
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