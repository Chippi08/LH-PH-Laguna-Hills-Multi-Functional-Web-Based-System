<?php
    include ('connection.php');
    if(isset($_POST['updateownerid'])){
        
        $account_owner_id = $_POST['updateownerid'];
        
        $ownersql= "SELECT * FROM owner_accounts where owner_id ='".$account_owner_id."'";
        $ownerresult = mysqli_query($con, $ownersql);
        $ownerresponse = array();

        while($row = mysqli_fetch_assoc($ownerresult)){
            $ownerresponse = $row;
        }
        echo json_encode($ownerresponse);
    }else{
        $ownerresponse['status']=200;
        $ownerresponse['message']="Invalid or data not found";
    }

    // A query to update the data to database
    if(isset($_POST['ownerupdate_id'])){
        $owner_id = $_POST['ownerupdate_id'];
        $owner_fname = $_POST['up_owner_fname'];
        $owner_lname = $_POST['up_owner_lname'];
        $owner_email = $_POST['up_owner_email'];
        if(empty($owner_fname)||empty($owner_lname)||empty($owner_email)){
            echo'<div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
            Fill all the blanks
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>';
        }
        else{
            if (!preg_match("/^[a-zA-Z -]*$/",  $owner_fname) || !preg_match("/^[a-zA-Z -]*$/",  $owner_lname)) {
                echo'<div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                Invalid Characters
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                               </div>';
        }else{
            if (!filter_var($owner_email, FILTER_VALIDATE_EMAIL)) {
                echo'<div class="alert alert-danger alert-dismissible fade show w-100" role="alert" >
                Invalid Email
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                               </div>';
        }else{
                    $ownersql ="UPDATE `owner_accounts` SET owner_fname = '$owner_fname', owner_lname = '$owner_lname', owner_email = '$owner_email' WHERE owner_id = '$owner_id'";
                    $ownerresult = mysqli_query($con, $ownersql);
                    echo'<div class="alert alert-success alert-dismissible fade show w-100" role="alert" >
                    Successfully updated user information
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                   </div>';
        }
    }
    }}
?>