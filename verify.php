<?php
    include 'batadese/conect.php';

    if(isset($_GET['v_key'])){
        $vkey = $_GET['v_key'];
        $sql = "SELECT v_key,v_status FROM user WHERE v_status = 0 AND v_key='$vkey'";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0){
            $sql = "UPDATE user SET v_status = 1 WHERE v_key='$vkey' LIMIT 1";
            $query = mysqli_query($conn,$sql);
            if($query){
                echo 'div class="bs-example"> 
                <div class="alert alert-warning alert-dismissible fade show">
                    <strong>Success!</strong> Please Check your Verificetion email.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            </div>';
            }
        }
    }
?>