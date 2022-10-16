<?php      
    // $_POST itu method di formnya     
    if(isset($_POST['login'])){ 
 
        include('../db.php'); 
        // untuk mengoneksikan dengan databas dengan memanggil file db.php         
   
        $email = $_POST['email'];         
        $pass = $_POST['pass'];         
        // Melakukan insert ke databse dengan query dibawah ini         
        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or die(mysqli_error($con));         
        // ini buat ngecek kalo misalnya hasil dari querynya == 0 ato ga ketemu -> emailnya tdk ditemukan         
        if(mysqli_num_rows($query) == 0){             
            echo             
            '<script>             
            alert("Email not found!"); window.location = "../page/loginPage.php"             
            </script>';         
        }else{             
            $user = mysqli_fetch_assoc($query);             
            if(password_verify($pass, $user['pass'])){                 
                // session adalah variabel global sementara yang disimpen di server                 
                               
                session_start();                 
                                
                $_SESSION['isLogin'] = true;                 
                $_SESSION['user'] = $user;                 
                echo                     
                    '<script>                     
                    alert("Login Success"); window.location = "../page/dashboardPage.php" 
                    </script>';
                }else {                 
                    echo                     
                        '<script>                     
                        alert("Email or Password Invalid");                     
                        window.location = "../page/loginPage.php"                     
                        </script>';             
                }         
            }     
        }else{         
            echo             
                '<script>             
                window.history.back()             
                </script>';     
        } 
    ?>