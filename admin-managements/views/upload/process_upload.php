<?php 
    // $_FILES['input_name']

    if(isset($_POST['btn-upload'])) {
        $fileName = time() . "_" . $_FILES['file']['name'];
    
        if (!empty($_FILES['file']['name'])) {
            echo "<pre>";
            echo print_r($_FILES['file']);
            echo "</pre>";

            move_uploaded_file($_FILES['file']['tmp_name'], "./admin-managements/views/assets/images/" . $fileName);
    
            echo "<img src='./admin-managements/views/assets/images/". $fileName ."' width='150' />";
        }
    }
?>