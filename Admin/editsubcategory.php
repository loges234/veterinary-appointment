<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Service Category</h2>
                </div>
            </div>
            </div>
            <!-- End Page Header -->
            
            <div class="row">
                            <div class="col-xl-12">
                                <!-- Sorting -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Edit Service Category</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="table-responsive">
    <?php  
    $id=$_GET['id'];
    $sql = "SELECT * FROM tbl_subcategory where id=$id";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
                $category=$row['category_name'];
    ?>
                                        <form role="form" method="post" action="../controller/edit_db.php?id=<?php echo $row['id']; ?>">
                                            <table id="sorting-table" class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Subcategory ID</th>
                                                        <th>Category Name</th>
                                                        <th>Subcategory Name</th>
                                                         <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <td><span class="text-primary"><input name="id" type="text"class="form-control" value="<?php echo $row['id']; ?>" readonly></span></td>
                                                    <td>
                                                        <select id='category' name='category' class="form-control" >
                                                        <option  value="<?php echo $category;?>"> <?php echo $category;?></option>

                                                        <?php
                                                        $sql="select * from tbl_category";
                                                        $result=$connect->query($sql);
                                                        while($row1 = $result->fetch_array())
                                                        {
                                                            echo "<option value='".$row1['name']."'>".$row1['name']."</option>";

                                                        }
                                                           
                                                        ?>
                                                    </select>
                                                    </td>   
                                                    <td><input name="subcat_name" type="text"class="form-control" value="<?php echo $row['subcat_name']; ?>" required></td>
                                                        <td class="td-actions">
                                                            <input type="submit" name="btnupdatesubcategory" value="Update" class="btn btn-md btn-primary">  
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Sorting -->
<?php include('include/footer.php');  ?>