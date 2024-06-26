<?php
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | SI TABSIS</title>
    <link rel="icon" href="dist/img/logo.png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
</head>

<body>
    <div class="form-structor">
        <div class="signup slide-up">
            <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
            <div class="form-holder">
                <input type="text" class="input" placeholder="Name" />
                <input type="email" class="input" placeholder="Email" />
                <input type="password" class="input" placeholder="Password" />
            </div>
            <button class="submit-btn">Sign up</button>
        </div>
        <div class="login">
            <div class="center">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="https://www.kemdikbud.go.id/main/files/large/433664a7969f47f" width="70" alt="">
                </div>
                <h2 class="form-title" id="login" style="position: relative; left: -10px"><span>or</span>Log in</h2>
                <div class="form-holder">
                    <form action="" method="post">
                        <input type="text" class="input" name="username" placeholder="Username" required>
                        <input type="password" class="input" name="password" placeholder="Password" required>
                        <button type="submit" class="submit-btn" name="btnLogin">Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <?php
    if (isset($_POST['btnLogin'])) {
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);

        $sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password='$password'";
        $query_login = mysqli_query($koneksi, $sql_login);
        $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
        $jumlah_login = mysqli_num_rows($query_login);

        if ($jumlah_login == 1) {
            session_start();
            $_SESSION["ses_id"] = $data_login["id_pengguna"];
            $_SESSION["ses_nama"] = $data_login["nama_pengguna"];
            $_SESSION["ses_username"] = $data_login["username"];
            $_SESSION["ses_password"] = $data_login["password"];
            $_SESSION["ses_level"] = $data_login["level"];

            if ($data_login["level"] == "ortu" || "orangtua" || "Orangtua") {
                echo "<script>
                    Swal.fire({title: 'Login Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
                    .then((result) => {
                        if (result.value) {
                            window.location = 'index.php?page=petugas';
                        }
                    })
                </script>";
            } else {
                echo "<script>
                    Swal.fire({title: 'Login Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
                    .then((result) => {
                        if (result.value) {
                            window.location = 'index.php?page=admin';
                        }
                    })
                </script>";
            }
        } else {
            echo "<script>
                Swal.fire({title: 'Login Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
                .then((result) => {
                    if (result.value) {
                        window.location = 'login.php';
                    }
                })
            </script>";
        }
    }
    ?>
</body>

</html>
