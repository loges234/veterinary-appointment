<?php include('include/header.php');  ?>
<div class="content-inner">
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
    <div class="page-header">
    <div class="d-flex align-items-center">
    <h2 class="page-header-title">Estimation Details</h2>
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active">Estimation Details</li>
            </ul>
        </div>
    </div>
    </div>
    </div>
<!-- End Page Header -->
<div class="row">
<div class="col-xl-12">
    <!-- Sorting -->
    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h4>Manage Estimation</h4>
        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <form action="../controller/edit_db.php" method="post">
                <table id="sorting-table" class="table mb-0">
                 <tbody>
                    <?php  
                    $i=1;
 $token=$_GET['token'];
 $sql = "SELECT * FROM tbl_estimate where token='$token' ";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
            ?>
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">

                    <tr>
                        <td>Customer Name</td>
                        <td align="right"><input type="text" name="rdate" value="<?php echo $row['name']; ?>" class="form-control"  readonly></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td align="right"><input type="text" name="rdate" value="<?php echo $row['contact']; ?>" class="form-control"  readonly></td>
                    </tr>
                    <tr>
                        <td>Service Required On</td>
                        <td align="right"><input type="text" name="rdate" value="<?php echo $row['date']; ?>" class="form-control"  readonly></td>
                    </tr>
                    <tr>
                        <td>Requirement 1</td>
                        <td align="right"><input type="text" name="requirement" value="<?php echo $row['problem1']; ?>" class="form-control"  readonly></td>
                    </tr>
                    <tr>
                        <td>Requirement 2</td>
                        <td align="right"><input type="text" name="requirement" value="<?php echo $row['problem2']; ?>" class="form-control"  readonly></td>
                    </tr>
                    <tr>
                        <td>About issue</td>
                        <td><img src="../user/bg/issue/<?php echo $row['issue']; ?>" height="100" width="150"></td>
                    </tr>
                    <?php if($row['rate']!='') { ?>
                    <tr>
                        <td>Rate</td>
                        <td align="right"><input type="number" name="rate" class="form-control" value="<?php echo $row['rate']; ?>"readonly></td>
                    </tr>
                    <tr>               
                        <td colspan="4"> <h4 align="center">Your Request Quotation Already Submitted.. </h4></td>
                    </tr>
                    <?php } else { ?>
                    <tr>
                        <td>Rate</td>
                        <td align="right"><input type="number" name="rate" class="form-control"></td>
                    <tr>
                    <tr>
                        <td colspan="4" align="center"><br>
                             <input type="submit" name="btnestimation_Dashboard" class="btn btn-primary" value="Save">
                        </td>
                    </tr>
                    <?php } } ?>
            
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
    <!-- End Sorting -->

<?php        include('include/footer.php');  ?>
        <script src="../assets/vendors/js/datatables/datatables.min.js"></script>
        <script src="../assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
        <script src="../assets/vendors/js/datatables/jszip.min.js"></script>
        <script src="../assets/vendors/js/datatables/buttons.html5.min.js"></script>
        <script src="../assets/vendors/js/datatables/pdfmake.min.js"></script>
        <script src="../assets/vendors/js/datatables/vfs_fonts.js"></script>
        <script src="../assets/vendors/js/datatables/buttons.print.min.js"></script>
        <script src="../assets/vendors/js/app/app.min.js"></script>
        <script src="../assets/js/components/tables/tables.js"></script>

        