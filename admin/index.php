<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Administrator Login</title>
<link href="../asset/css/bootstrap.css" rel="stylesheet">
<link href="../asset/css/style.css" rel="stylesheet">
</head>

<body>
<?php
    include "../config/koneksi.php";
    error_reporting(0);
    if (isset($_POST[login])){
        $userlogin = anti_injection($_POST[a]);
        $passlgoin = md5(anti_injection($_POST[b]));
        $login = mysql_query("SELECT * FROM tbl_admin 
                                where username='$userlogin' AND password='$passlgoin'");
        $cek = mysql_num_rows($login);
        $r = mysql_fetch_assoc($login);
            if ($cek >= 1){
                     $_SESSION[id]    = $r[id_admin];
                     $_SESSION[admin]    = $r[nama_lengkap];
                     $_SESSION[level] = 'admin';
                echo "<script>window.alert('Anda Sukses Login.');
                                window.location='../index.mu'</script>";
            }else{
                echo "<script>window.alert('Maaf, anda Gagal Login.');
                                window.location='../admin'</script>";
            }
    }
                
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Login as Administrator<br><small>Aplikasi Jaminan Mutu</small></h1>
            <div class="account-wall">
                <img class="profile-img" src="../asset/images/login.gif"
                    alt="">
                <form class="form-signin" action='' method='POST'>
                <input type="text" name='a' class="form-control" placeholder="Username" required autofocus>
                <input type="password" name='b' class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" name='login' type="submit">
                    Sign in</button>

                </form>
            </div>
            <a href="../index.mu" class="text-center new-account">Kembali Ke Halaman Utama </a>
        </div>
    </div>
</div>
</body>
</html>