<html>

<head>
    <title>Home page</title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
    <!-- Message: Creation of dynamic property CI_Javascript::$CI is deprecated -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container-wrapper">
        <div class="left-navigation-bar">
            <div class="col-flex-center navigation-bar">
                <img src="<?php echo base_url('uploads/blank-profile-pic.png') ?>" alt="" width="100px">
                <a href="<?php echo base_url() ?>user" class="navigation-bar-pill">Home page</a>
                <a href="<?php echo base_url() ?>addcontact" class="navigation-bar-pill">Add new contact</a>
                <a href="<?php echo base_url() ?>contactlist" class="navigation-bar-pill">Contact list</a>
                <a href="<?php echo base_url() ?>user/logout" class="navigation-bar-pill">Logout</a>
            </div>
        </div>
        <div class="center-container">
            <div class="flex-center-box title-box">
                <h2 class="w-100">Phone-Book</h2>
            </div>
            <div class="flex-center-box welcome-text">
                <p>Welcome back, <?php echo $userdata['username'] ?></p>
            </div>
            <div class="flex-center-box home-title-text">
                <p>Most Recent Contact</p>
            </div>

            <div class="recent-contact-container-wrapper">
                <!-- template for generate -->
                <!-- <div class="flex-center-box w-100 recent-contact-pills">
                        <a href="" class="flex-center-box recent-contact-info">
                            <img src="<?php //echo base_url('uploads/blank-profile-pic.png') ?>" alt="">
                            <div class="col-flex-center">
                                <p>K6E&hPRZ@RL7NnX#5YRT8GpD4VcA2zW*e</p>
                                <p>012345678910</p>
                            </div>
                        </a>
                        <div class="end-content flex-center-box">
                            <a href=""><img src="<?php //echo base_url('uploads/vertical-three.png') ?>" alt=""
                                    width="30px"></a>
                            <a href=""><img src="<?php //echo base_url('uploads/delete-icon.png') ?>" alt="" width="30px"></a>
                        </div>
                    </div> -->
                <?php 
                    if($recent_record){
                        foreach($recent_record as $record){
                            //echo $record->contact_name. $record->contact_number . "<br>";

                            echo
                            "
                            <div class=\"flex-center-box w-100 recent-contact-pills\">
                                <a href=\"\" class=\"flex-center-box recent-contact-info\">
                                    <img src=\"".base_url($record->image_path)."\" alt=\"\">
                                    <div class=\"col-flex-center\">
                                        <p>".$record->contact_name."</p>
                                        <p>".$record->contact_number."</p>
                                    </div>
                                </a>
                                <div class=\"end-content flex-center-box\">
                                    <a href=\"".base_url("editcontact/".$record->id)."\"><img src=\"".base_url('uploads/vertical-three.png')."\" alt=\"\"
                                    width=\"30px\"></a>
                                    <a href=\"".base_url("deletecontact/".$record->id)."\"><img src=\"".base_url('uploads/delete-icon.png')."\" alt=\"\"
                                    width=\"30px\"></a>
                                </div>
                            </div>
                            ";
                        }
                    }
                    else{
                        echo"
                        <div class=\"flex-center-box\">
                            <p>No record founded.</p>
                        </div>
                        ";
                    }

                ?>
            </div>
        </div>
    </div>

</body>

</html>