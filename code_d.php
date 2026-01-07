<?php
    include 'conn.php';
     
    session_start();
    $email = $_SESSION['email-id'];

    if(!isset($email))
    {
      header("location: login.php");
    }

    if(isset($_POST['check_btn']))
    {
        $all_id = $_POST['check_select_req'];
        $extract_id = implode(',' , $all_id);
        // echo $extract_id;
        $query = "UPDATE `donation_req_ngo` SET `request_status` = 'Approved' WHERE `request_id` = $extract_id";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            ?>
            <script>
                alert("request accepted...!!");
                window.location = './welcome_d.php';
            </script>
            <?php
            // header("location: welcome_n.php");
        }
        else
        {
            ?>
            <script>
                alert("request not accepted...!!");
                window.location = './welcome_d.php';
            </script>
            <?php
        }
    }


    if(isset($_POST['check_btn_rej']))
    {
        $all_id = $_POST['check_select_req'];
        $extract_id = implode(',' , $all_id);
        // echo $extract_id;

        $query = "UPDATE `donation_req_ngo` SET `request_status` = 'Rejected' WHERE `request_id` = $extract_id";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            ?>
            <script>
                alert("request rejected...!!");
                window.location = './welcome_d.php';
            </script>
            <?php
            // header("location: welcome_d.php");
        }
        else
        {
            ?>
            <script>
                alert("request not rejected...!!");
                window.location = './welcome_d.php';
            </script>
            <?php
        }
    }

    if(isset($_POST['check_btn_yes']))
    {
        $all_id = $_POST['check_select_req'];
        $extract_id = implode(',' , $all_id);
        // echo $extract_id;

        $query = "UPDATE `donation_req_ngo` SET `item_collected` = 'Yes' WHERE `request_id` = $extract_id";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            ?>
            <script>
                alert("Item collected...!!");
                window.location = './welcome_d.php';
            </script>
            <?php
            // header("location: welcome_n.php");
        }
        else
        {
            ?>
            <script>
                alert("Item not collected...!!");
                window.location = './welcome_d.php';
            </script>
            <?php
        }
    }


    if(isset($_POST['check_btn_no']))
    {
        $all_id = $_POST['check_select_req'];
        $extract_id = implode(',' , $all_id);
        // echo $extract_id;

        $query = "UPDATE `donation_req_ngo` SET `item_collected` = 'No' WHERE `request_id` = $extract_id";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            ?>
            <script>
                alert("Item not collected...!!");
                window.location = './welcome_d.php';
            </script>
            <?php
            // header("location: welcome_n.php");
        }
        else
        {
            ?>
            <script>
                alert("Item not /collected...!!");
                window.location = './welcome_d.php';
            </script>
            <?php
        }
    }


    if(isset($_POST['check_btn_yes_d']))
    {
        $all_id = $_POST['check_select_req'];
        $extract_id = implode(',' , $all_id);
        // echo $extract_id;

        $query = "UPDATE `donation_req_donor` SET `item_collected` = 'Yes' WHERE `request_id` = $extract_id";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            ?>
            <script>
                alert("Item collected...!!");
                window.location = './welcome_d.php';
            </script>
            <?php
            // header("location: welcome_n.php");
        }
        else
        {
            ?>
            <script>
                alert("Item not collected...!!");
                window.location = './welcome_d.php';
            </script>
            <?php
        }
    }


    if(isset($_POST['check_btn_no_d']))
    {
        $all_id = $_POST['check_select_req'];
        $extract_id = implode(',' , $all_id);
        // echo $extract_id;

        $query = "UPDATE `donation_req_donor` SET `item_collected` = 'No' WHERE `request_id` = $extract_id";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            ?>
            <script>
                alert("Item not collected...!!");
                window.location = './welcome_d.php';
            </script>
            <?php
            // header("location: welcome_n.php");
        }
        else
        {
            ?>
            <script>
                alert("Item not /collected...!!");
                window.location = './welcome_d.php';
            </script>
            <?php
        }
    }
?>