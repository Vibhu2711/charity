<?php 
    include 'conn.php';

    session_start();
    $email = $_SESSION['email-id'];

    $select = mysqli_query($con, "SELECT * FROM `donation_req_donor` WHERE `N_email` = '$email' ");

    if(mysqli_num_rows($select) > 0)
    {
        while($fetch = mysqli_fetch_assoc($select))
        {
            $req_id = $fetch['request_id'];
        }
            $q1 = "SELECT * FROM `donation_req_donor` WHERE `request_id` = '$req_id' ";
            $query = mysqli_query($con, $q1);
            if(mysqli_num_rows($query) > 0)
            {
                
                $sql_up = "UPDATE `donation_req_donor` SET `request_status` = 'Approved' WHERE `request_id` = $req_id";
                $query = mysqli_query($con, $sql_up);
                if($query)
                {
                    // header("location: welcome_n.php");
                    // exit(0);
?>
                    <script>
                        alert("accepted");
                    </script>
    <?php
                }
                else
                {
    ?>
                    <script>
                        alert("not accepted");
                    </script>
    <?php 
                }
            }
            else
            {
    ?>
                <tr>
                  <td colspan="6">No record found</td>
                </tr>
    <?php
            }
    }
    else
    {
?>
        <tr>
          <td colspan="6">No record found</td>
        </tr>
<?php
    }
?>
