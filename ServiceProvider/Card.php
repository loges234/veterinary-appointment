<?php include('../db_connect.php'); ?>
<!doctype <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mai Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="180x180" href="../assets/logo.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/logo.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/logo.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- You don't have to include font-awesome. If you don't, the card will fall back gracefully to a Materialize Icon -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <style>
           .businessCard {
                width: 80%;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
                font-family: 'lato','sans-serif';
                font-size: 1.1em;
                position: relative;
            }
            .businessCard .fullName {
                font-weight: bolder;
                font-size: 2em;
            }
            .businessCard .jobTitle {
                font-style: italic;
                font-size: 1.3em;
            }
            .businessCard .profilePictureWrapper {
                overflow: hidden;
                border-radius: 50%;
                padding: 10px;
                border: 4px solid black;
                margin-top: 38%;
            }
            .businessCard .linksAndDetailsSection .rowJoinerWrapper {
                width: 34px;
                height: 15px;
                padding-left: 0.75rem;
                min-height: 1px;
                position: relative;
                text-align: center;
                z-index: 999;
                float: left;
                margin-bottom: -1px;
                margin-top: -1px;
            }
            .businessCard .linksAndDetailsSection .rowJoiner {
                width: 50%;
                height: 100%;
                margin-left: auto;
                border-left: 1px solid black;
                border-right: 1px solid black;
            }
            .businessCard .linkedInURL i, .businessCard .codingProfileURL i {
                position: absolute;
                width: 24px;
                height: 24px;
                text-align: center;
                font-size: large;
            }
            .businessCard .linksAndDetailsSection i.fa {
                font-size: x-large;
            }
            .businessCard .linksAndDetailsSection .iconWrapper {
                display: inline-block;
                width: 34px;
                height: 31px;
                padding-top: 3px;
                padding-left: 4px;
                margin-right: 10px;
                border-radius: 8px;
                border: 1px solid black;
            
            }
            .businessCard .linksAndDetailsSection .textWrapper {
                display: inline-block;
            }
            .businessCard .iconsSolidBackground {
                background-color: black;
                color: white !important;
            }
            .businessCard .diagonals {
                position: absolute;
                height: 200%;
                width: 14px;
                top: -50%;
                right: 222px;
                border-left: 4px solid red;
                border-right: 4px solid red;
                transform: rotateZ(24deg);
                background-color: #38013d;
            }
            .businessCard > .card-panel {
                position: relative;
                background-color: unset;
            }
            .businessCard .background {
                width: 100%;
                position: absolute;
                height: 100%;
                top: 0px;
                left: 0px;
                overflow: hidden;
                background-color: white;
            }
            .businessCard .ageWrapper {
                margin-top: 4px;
                font-size: medium;
                font-style: italic;
            }
            .businessCard .linksAndDetailsSection {
                min-height: 88px;
            }
            .businessCard .fixedUpperRightToolbar {
                position: absolute;
                right: 10px;
                top: 10px;
            }
            @media (max-width: 600px) {
                .businessCard .profilePictureWrapper {
                    margin-top: 0px;
                }
            }
     </style>
</head>
<body>
<?php  
$id=$_GET['id'];
$sql = "SELECT * FROM tbl_service,tbl_serviceprovider where tbl_service.sp_id=$id and tbl_service.sp_id=tbl_serviceprovider.id";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            { ?>
    <div class="businessCard materialize">
        <div class="background">
            <div class="diagonals"></div>
        </div>
        <div class="card-panel z-depth-4 hoverable">
            <div class="row valign-wrapper">
                <div class="col s8 leftSide">
                    <div class="row nameAndTitleSection">
                        <div class="fullName col s12"><?php echo $row['service_name']; ?></div>
                        <div class="divider col s12" style="height: 2px;"></div>
                        <div class="jobTitle col s11 offset-s1"><?php echo $row['category']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col s11 offset-s1 linksAndDetailsSection">
                            <div class="emailAddress col s12 valign-wrapper">
                                <div class="iconWrapper z-depth-2 iconsSolidBackground">
                                    <div class="icon">
                                        <i class="material-icons left">email</i>
                                    </div>
                                </div>
                                <div class="textWrapper">
                                    <a href="mailto:email@example.com" target="_blank"><?php echo $row['email']; ?></a>
                                </div>
                            </div>
                            <div class="rowJoinerWrapper"><div class="rowJoiner iconsSolidBackground"></div></div>
                            <div class="geography col s12 valign-wrapper">
                                <div class="iconWrapper z-depth-2 iconsSolidBackground">
                                    <div class="icon">
                                        <i class="material-icons left">map</i>
                                    </div>
                                </div>
                                <div class="textWrapper">
                                    <span><?php echo $row['location']; ?></span>
                                </div>
                            </div>
                            <div class="rowJoinerWrapper"><div class="rowJoiner iconsSolidBackground"></div></div>
                            <div class="linkedInURL col s12 valign-wrapper">
                                <div class="iconWrapper z-depth-2 iconsSolidBackground">
                                    <div class="icon">
                                        <i class="material-icons left"></i>
                                        <i class="fa fa-dollar iconsSolidBackground" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="textWrapper">
                                    <span>Appointment Fee:<?php echo $row['appointment_fee']; ?></span>
                                </div>
                            </div>
                            <div class="rowJoinerWrapper"><div class="rowJoiner iconsSolidBackground"></div></div>
                            <div class="codingProfileURL col s12 valign-wrapper">
                                <div class="iconWrapper z-depth-2 iconsSolidBackground">
                                    <div class="icon">
                                        <i class="material-icons left"></i><i class="fa fa-phone iconsSolidBackground" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="textWrapper">
                                    <span><?php echo $row['phone']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s4 rightSide">
                    <div class="valign-wrapper">
                        <!-- <div class="profilePictureWrapper col s12 z-depth-2">
                            <img class="profilePicture responsive-img" src="../controller/serviceprovider/services/<?php echo $row['photo']; ?>">
                        </div> -->
                    </div><br><br><br><br><br><br><br><br><br><br>
                    <div class="ageWrapper col s12 center">
                        <font size="4">
                          <b>  <?php echo $row['name']; ?></b>
                        </font><br>
                        <?php echo $row['city']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <?php } ?>
 
</body>
</html>