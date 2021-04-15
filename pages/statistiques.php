<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
  if(isset($_SESSION['employe'])){
?>


<div class="container-fluid" style="margin-top: 5%;">
    <div class="">
        <p style="color:#ffec371;font-size: 2.8em;font-family:Stencil Std, fantasy;";class="h2 text-center text-dark text-uppercase font-weight-bold">Statistiques des filieres et classes</p>
        <hr class="line-seprate">
        <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <a href="./index.php?p=employe" class="col-md-6 col-lg-3">
                            
                            </div>
                        </a>
                        
                        <a href="./index.php?p=departement" class="col-md-6 col-lg-3">

                            <div style="background-color: #FFD700;height: 10px;width: 500px;float: right; "; class="statistic__item statistic__item--orange">
                                <h2 style="color:#ffff;font-size: 2.4em ; font-family: Jazz LET, fantasy;" class="number">...</h2>
                                <span style="color:#ffff;font-size: 2.4em ; font-family: Jazz LET, fantasy;";class="desc">Filieres</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-graduation-cap zmdi-hc-lg"></i>
                                </div>
                            </div>
                        </a>
    
                       
                        <a href="./index.php?p=fonction" class="col-md-6 col-lg-3">
                            <div style="background-color: #d5f4e6 ;height: 10px;width: 500px;"; class="statistic__item statistic__item--red">
                                <h2 style="color:#ffff;font-size: 2.4em ; font-family: Jazz LET, fantasy;" class="number">...</h2>
                                <span style="color:#ffff;font-size: 2.4em ; font-family: Jazz LET, fantasy;" ; class="desc">Classes</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-library"></i>
                                </div>
                   
                            </div>
                        </a>
                              </tr>
                    </div>
                 <div class="row">
                        
                          <canvas id="myChart" width="800" height="400"></canvas>

                   </div>
                </div>
            </section>
    </div>
</div>
<script src="script/statistique.js" type="text/javascript"></script>
<?php
}
else{
  header("Location: ../index.php");
}
 ?>