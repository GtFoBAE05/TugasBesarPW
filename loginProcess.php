<?php
// $_POST itu method di formnya     
if (isset($_POST['login'])) {

    include('./db.php');
    // untuk mengoneksikan dengan databas dengan memanggil file db.php         

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    // Melakukan insert ke databse dengan query dibawah ini         
    $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or die(mysqli_error($con));
    // ini buat ngecek kalo misalnya hasil dari querynya == 0 ato ga ketemu -> emailnya tdk ditemukan         
    if (mysqli_num_rows($query) == 0 && $email != "admin") {
        echo
        '<script>             
            alert("Email not found!"); window.location = "./login.php"             
            </script>';
    } else {
        if ($email == "admin" && $pass == "admin") {
            echo
            '<script>
                alert("Login Admin"); window.location = "./indexAdmin.php"
                </script>';
        //login ke index admin tapi kalo passwordnya diganti ??
        // }else if($email == "admin" && password_verify($pass, $user['pass'])){
        //     echo
        //     '<script>
        //         alert("Login Admin"); window.location = "./indexAdmin.php"
        //         </script>';
        }else {
            $user = mysqli_fetch_assoc($query);
            if (password_verify($pass, $user['pass'])) {
                // session adalah variabel global sementara yang disimpen di server                 

                session_start();

                $_SESSION['isLogin'] = true;
                $_SESSION['user'] = $user;
                echo
                '<script>                     
                    alert("Login Success"); window.location = "./index.php" 
                    </script>';
            } else {
                echo
                '<script>                     
                        alert("Email or Password Invalid");                     
                        window.location = "./login.php"                     
                        </script>';
            }
        }
    }

} else {
    echo
    '<script>             
                window.history.back()             
                </script>';
}