<?php
if(session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
if ($_SESSION["employe"]) {
    if ($_SESSION['role'] == "Admin") {
?>
<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <title>Gestion des filieres et classes</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    
    
    <script src='vendor/jquery-3.2.1.min.js'></script>
    <script src='vendor/bootstrap-4.1/popper.min.js'></script>
    <script src='vendor/bootstrap-4.1/bootstrap.min.js'></script>
    <script src='vendor/chartjs/Chart.js'></script>
    <link href="datatable/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <script src="datatable/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>

    <link rel='stylesheet' href='vendor/bootstrap-4.1/bootstrap.min.css'>
    <link rel='stylesheet' href='vendor/font-awesome-5/css/fontawesome-all.min.css'>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/theme.css">
    <link rel="stylesheet" href="style/main.css">

    
</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav style='border-top-right-radius:20px;background-color: #fff6dd'; id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                
                <div class="sidebar-header">
                <div class="logo-image-small">
                    <img src="img\avhomme2.jpg" width="80" height="70" >
                </div>
                        
                            
                    
                    <div class="user-info" ; style="color:#1B019B">
                        <span class="user-name">
                            <strong><?php
                                        if (isset($_SESSION['nom'])) {
                                            echo $_SESSION['nom'];
                                        }
                                    ?></strong>
                        </span>
                      
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                            <div><a href="./logout.php">
                    <i class="fa fa-power-off"></i>
                    <span>Déconnexion</span>
                </a></div>
                        </span>
                    </div>
                </div>
      
                <!-- sidebar-header  -->

                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li style='background-color: white ;list-style-type: none line-height: 80px; text-decoration: none; font-family: Georgia, "Times New Roman", Times, serif;
                            font-size: 21px;' class="header-menu">
                            <span>Gestion</span>
                        </li>
                        
                        <li>
                   
                            <a href="./index.php?p=departement"><i class="zmdi zmdi-graduation-cap zmdi-hc-lg"></i>Filieres</a>
                        </li>
                      
                        
                        <li>
                            <a href="./index.php?p=fonction"><i class="zmdi zmdi-library";style="color:#1B019B"></i>Classes</a>
                        </li>
                        
                        <li style='background-color: white ;list-style-type: none line-height: 80px; text-decoration: none; font-family: Georgia, "Times New Roman", Times, serif;
                            font-size: 21px;' class="header-menu">
                            <span >Statistique</span>
                        </li>
                        <li>
                            <a href="./index.php?p=statistiques"><i class="zmdi zmdi-trending-up"></i>Statistiques</a>
                        </li>
                         <li>
                            <a href="./index.php?p=Search"><i class="zmdi zmdi-search-in-page"></i>Search</a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div id="close-sidebar" class="sidebar-footer">
            <li style="cursor:pointer">
                   
                   <i style="text-align: center" class="zmdi zmdi-long-arrow-return" >Close SideBare</i>
               </li>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid" id="main-content">

                <?php
                    if( isset($_GET['p']) && $_GET['p'] != ""){
                        if($_GET['p']=="departement"){
                            include_once './pages/departement.php';
                        }elseif ($_GET['p']=="employe"){
                            include_once './pages/employe.php';
                        }elseif($_GET['p']=="fonction"){
                            include_once './pages/Fonction.php';
                        }elseif($_GET['p']=="pointage"){
                            include_once './pages/Pointage.php';
                        }elseif($_GET['p']=="historique"){
                            include_once './pages/historique.php';
                        }elseif($_GET['p']=="statistiques"){
                            include_once './pages/statistiques.php';
                        }elseif($_GET['p']=="Search"){
                            include_once './pages/Search.php';
                        }
                    }else{
                        include_once './pages/statistiques.php';
                    }
                ?>
            </div>

        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <script src="script/index.js"></script>

</body>
</html>
<?php
    } else {
        include_once './pages/HistoriqueSimple.php';
    }
} else {
    header('Location:./login2.php');
}
?>