<?php 
    require 'database.php';
 $pdo = Database::connect();
{
$sql = 'SELECT COUNT(*) AS nb FROM medecin'; 
$result = $pdo->query($sql);
 $columns = $result->fetch(); 
 $nb = $columns['nb']; }
 {
     $sql1 = 'SELECT COUNT(*) AS nb1 FROM symptomes'; 
$result1 = $pdo->query($sql1);
 $columns1 = $result1->fetch(); 
 $nb1 = $columns1['nb1'];
 }
 {
 $sql2= 'SELECT COUNT(*) AS nb2 FROM utilisateur'; 
$result2 = $pdo->query($sql2);
 $columns2 = $result2->fetch(); 
 $nb2 = $columns2['nb2'];
 }
 {
 $sql3= 'SELECT COUNT(*) AS nb3 FROM specialites'; 
$result3 = $pdo->query($sql3);
 $columns3 = $result3->fetch(); 
 $nb3 = $columns3['nb3'];
 }
 
 Database::disconnect();
            
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
  <link rel="icon" href="favicon.ico" >
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/default.css">
    
</head>
<body>
     <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 display-table-cell valign-top " id="side-menu">
                <ul> 
           
             <img src="nav.png" id="img"/>   
              <img src="admin.png"id="logo-img1" />
              <h1>  <i class="fa fa-circle text-success"></i> Connecté </h1>
           
              
                <li>
                <a href="index.php">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xm"> Accueil </span>
                </a>
            </li> 
            <li>
                <a href="#collapse-post" data-toggle="collapse" aria-controls="collapse-post">
                <span class="fa fa-sitemap	fa-x" aria-hidden="true"> </span>
                <span class="hidden-sm hidden-xm"> Specialité </span> <i class="fa fa-angle-down pull-right"></i> 
                </a>
            <ul class="collapse collapseable" id="collapse-post">
            <li> <a href="ajouter-specialite.php"> <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"> </span>Ajout specialité</a></li>
            <li> <a href="afficher-specialite.php"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"> </span> Affiche specialité</a></li>
            </ul>
            </li>
            <li>
                <a href="#collapse-post1" data-toggle="collapse" aria-controls="collapse-post">
                <span class="fa fa-users fa-x" aria-hidden="true"> </span>
                <span class="hidden-sm hidden-xm"> Medecin </span> <i class="fa fa-angle-down pull-right"></i> 
                </a>
            <ul class="collapse collapseable" id="collapse-post1">
            <li> <a href="nouveau-medecin.php"> <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"> </span>Ajout Medecin</a></li>
            <li> <a href="affiche.php"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"> </span> Affiche Medecin</a></li>
            </ul>
            </li>
               <li >
                <a href="#collapse-post2" data-toggle="collapse" aria-controls="collapse-post">
                <span class="fa fa-archive	fa-x" aria-hidden="true"> </span>
                <span class="hidden-sm hidden-xm"> Symptome </span><i class="fa fa-angle-down pull-right"></i> 
                </a>
            <ul class="collapse collapseable" id="collapse-post2">
            <li> <a href="nouveau-symptome.php"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"> </span> Ajout Symptome</a></li>
            <li> <a href="affiche1.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"> </span> Affiche Symptome</a></li>
            </ul>
            </li>

         <li>
                <a href="Patient.php">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xm"> Patient </span>
                </a>
            </li> 

        </ul>
            </div>
            <div class="col-md-10  display-table-cell valign-top box "> 
                <div class="row">
                <header id="nav-header" class="clearfix">
            <div class="panel-group">
  <div class="panel-default">
        <a data-toggle="collapse" href="#collapse1"> <img src="admin1.png"id="logo-img" /> </a>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-footer"><a href="authentification.php"> <span class="glyphicon glyphicon-log-out" aria-hidden="true"> </span>Déconnexion</a></div>
    </div>
  </div>
</div>
        </header>
            </div>
        <div class="content-inner" id="content">
       
        <div id="icone">  
            <div id="i1">                                               
        <i class="fa fa-users fa-2x"></i>
        <h4>Active Medecins </h4> <?php echo 'Il y a '.$nb.' enregistrement(s)';
        ?>                       
         </div>
        </div>
         
          <div id="icone"> 
        <div id="i1">                                                
        <i class="fa fa-archive	fa-2x"></i>
        <h4>Symptomes </h4> <?php echo 'Il y a '.$nb1.' enregistrement(s)';?>
        </div>                           
         </div>
    <div id="icone"> 
        <div id="i1">                                                
        <i class="fa fa-address-card-o	 fa-2x"></i>
        <h4>Active Patients </h4> <?php echo 'Il y a '.$nb2.' enregistrement(s)';?>
        </div>                           
         </div>
    <div id="icone"> 
        <div id="i1">                                                
        <i class="fa fa-sitemap	 fa-2x"></i>
        <h4>Specialité </h4><?php echo 'Il y a '.$nb3.' enregistrement(s)';?>
        </div>                           
         </div>
     <div id="info"> 
           
            <table id="tableindex" border="1">
        <tr>
    
    <th>Nom Medecin</th>
    <th> Prenom Medecin </th>
     
          
  
  </tr>


<?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM medecin ORDER BY ID DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['Nom'] . '</td>';
                            echo '<td>'. $row['Prenom'] . '</td>';
                            
                           
                        
                   }
                   Database::disconnect();
                  ?>
</table> 

         </div>
         <div id="info"> 
           
            <table id="tableindex" border="1">
        <tr>
    
    <th>Symptome</th>
    <th> Specialité </th>
     
          
  
  </tr>


 <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM symptomes ORDER BY ID DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['symptome'] . '</td>';
                            echo '<td>'. $row['specialite'] . '</td>';
                            
                           
                        
                   }
                   Database::disconnect();
                  ?>

</table> 

         </div>
         <div id="info"> 
           
            <table id="tableindex" border="1">
        <tr>
    
    <th>Nom Patient</th>
    <th> Prenom Patient </th>
     
          
  
  </tr>


 <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM utilisateur ORDER BY ID DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['nom'] . '</td>';
                            echo '<td>'. $row['prenom'] . '</td>';
                            
                           
                        
                   }
                   Database::disconnect();
                  ?>

</table> 

         </div>
         <div id="info"> 
           
            <table id="tableindex" border="1">
        <tr>
    
    <th>Nom Specialité</th>
     
          
  
  </tr>


 <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT Nom FROM specialites ORDER BY ID DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['Nom'] . '</td>';
                            
                           
                        
                   }
                   Database::disconnect();
                  ?>

</table> 

         </div>
        
          </div> 

        <div class="row">
            <footer id="admin-footer" class="clearfix"> 
            <div class="pull-left"> <b>Copyright</b> &copy; 2018 </div>
            <div class="pull-right"> Crafted by Ahmed Khemiri</div>
            </footer>
        </div>
        </div>
        
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
 