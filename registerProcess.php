<?php     
    // $_POST itu method di formnya     
    if(isset($_POST['register'])){ 
         
        include('./db.php'); 

        $email = $_POST['email'];         
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);         
        $username = $_POST['username'];    
        
        $select = mysqli_query($con, "SELECT * FROM users WHERE email = '".$_POST['email']."'");
        if(mysqli_num_rows($select)) {
            echo                 
                '<script>                 
                alert("Register gagal karena alamat email tersebut telah digunakan");                  
                window.location = "./register.php"
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
                window.location = "./index.php"                 
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
