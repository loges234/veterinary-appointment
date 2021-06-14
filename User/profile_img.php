<?php include("include/sidenavbar.php"); ?>
    <br><br>
    <h2 align="center"><b>My Profile Photo</b></h2>
    <?php
    $id=$_GET['id'];
    $sql="select * from tbl_user where user_id=$id";
        $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result))
        { ?>           

    <form class="form-horizontal" action="../controller/edit_db.php" method="post" enctype="multipart/form-data">
    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-2">
            <label class="form-control-label">Profile Photo</label><br>
            <div class="input-group">
            <span class="input-group-addon addon-secondary">
                    <i class="fa fa-cloud-upload" style="font-size:35px;color:red"></i>
            </span>
                <input type="file" name="profile" class="form-control" style="font-size:20px;color:red" accept="image/*"   required autofocus />
            </div>
        </div><br><center>
        <button type="submit" name="btn_userphoto" class="btn btn-primary" > Add Photo </button></center>
        
    </div>
    </form>
        <?php } ?>
        </div>
       </div>
       <br><br>
<?php include('include/footer.php'); ?>