<?php    
    require 'database.php';
if ( !empty($_POST)) {
$nom=$_POST['Nom'];
$description=$_POST['Description'];

      $valid = true;
      
    if (empty($nom)) {
            $valid = false;
        }
    if (empty($description)) {
            $valid = false;
        }    
      if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO `specialites` ( `Nom`, `Description`) 
            VALUES ('$nom','$description')";
            $q = $pdo->prepare($sql);
            $q->execute(array( $nom, $description));
            header("Location:afficher-specialite.php");
            Database::disconnect();
      }
        
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajout specialité</title>
  <link rel="icon" href="favicon.ico" >
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/default.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
        <div class="row" id="content">

        <form id="form" action ="ajouter-specialite.php" method="post"> 
        <table> 
        
       <tr>
        <td> <label> Nom specialité </label> </td>
        <td> <input type="text" class="form-control" id="Nom" placeholder="Nom" name="Nom"> </td>
       </tr>
     <tr>
         <tr>
        <td> <label> Description</label> </td>
        <td> <textarea class="form-control" name="Description" id ="Description" rows="4" cols="50"></textarea>
        </td>
       </tr>
    
        <tr> 
        <td > </td>
        <td> <input type ="reset" id="btn1" value="Annuler" />  <input type="submit" id="btn2" value="Enregistrer"/> </td>
        </tr>
        </table>
         </form> 
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>