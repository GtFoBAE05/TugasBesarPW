<?php     
    // $_POST itu method di formnya     
    if(isset($_POST['register'])){ 
         
        include('../db.php'); 

        $email = $_POST['email'];         
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);         
        $username = $_POST['username'];    
        /*
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));     
        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            } else {
            echo "File is not an image.";
            $uploadOk = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        
        // Check file size if it more than 500 kb
        if ($_FILES["foto"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["foto"]["name"])). " has been uploaded.";
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
        }
        */
        $select = mysqli_query($con, "SELECT * FROM users WHERE email = '".$_POST['email']."'");
        if(mysqli_num_rows($select)) {
            echo                 
                '<script>                 
                alert("Register gagal karena alamat email tersebut telah digunakan");                  
                window.location = "../page/registerPage.php"
                </script>';         
        } else{
            $query = mysqli_query($con,             
            "INSERT INTO users(email, pass, username)                  
                VALUES
                ('$email', '$pass', '$username')")                 
                    or die(mysqli_error($con));  
        }
 
            if($query){             
                echo                 
                '<script>                 
                alert("Register Success");                  
                window.location = "../index.php"                 
                </script>';         
            }else{             
                echo                 
                '<script>                 
                alert("Register Failed");                 
                </script>';         
            } 
    
        }else{         
            echo             
            '<script>             
            window.history.back()             
            </script>';     
        } 
    ?> 