<?php
session_start();
$message = "";
if (isset($_POST['btn_submit'])) {
    if ($_POST['email'] != '' && $_POST['password'] != '') {
        include_once 'beans/Employe.php';
        include_once 'services/EmployeService.php';
        $es = new EmployeService();
        $cin = $es->findByEmail($_POST['email']);
        $em = $es->findById($cin);
        if ($em->getPassword() == md5($_POST['password'])) {
            $_SESSION['employe'] = $em->getCin();
            $_SESSION['photo'] = $em->getPhoto();
            $_SESSION['nom'] = $em->getNom().' '.$em->getPrenom();
            $_SESSION['role'] = $em->getRole();
            $_SESSION['email'] = $em->getEmail();
            header('Location:./index.php');
        }
        else{
          header('Location:./login2.php?error=invalid');
        }
    } else {
        header('Location:./login2.php?error=vide');
    }
}

?>
<link href="script/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="script/bootstrap.min.js"></script>
<script src="script/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="login2.css" rel="stylesheet" type="text/css"/>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5"></h3>
        <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                        <form id="login-form" class="form" action="" method="post">
                            <h2 class="text-center ">Login</h2>
                            <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error']=="invalid")
                                        echo '<div class="alert alert-danger" role="alert">Mote de passe ou Email incorrect!</div>';
                                    if($_GET['error']=="vide")
                                        echo '<div class="alert alert-danger" role="alert">Quelque champ est vide</div>';
                                }if(isset($_GET['success'])){
                                    if($_GET['success']=="verifyok")
                                        echo '<div class="alert alert-success" role="alert">Votre mot de passe est changé avec succés</div>';
                                }
                               ?>
                            
                            <div class="form-group">
                                <label for="username" class="form-label" ><h4>Email:</h4></label><br>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password"  class="form-label" ><h4>Password:</h4></label><br>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button id="connect" name="btn_submit"class="btn btn-info" type="submit">Connexion</button>
                            </div>
                            
   
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
