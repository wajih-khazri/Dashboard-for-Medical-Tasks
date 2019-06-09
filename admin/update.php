
 <?php
    require 'database.php';
 
    $id = 0;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {

       
        $nom = $_POST['Nom'];
        $prenom = $_POST['Prenom'];
        $email = $_POST['Email'];
        $adresse = $_POST['Adresse'];
        $numtlf = $_POST['Numtlf'];
        $prix = $_POST['Prix'];
        $specialite = $_POST['specialite'];
        $ville = $_POST['ville'];
         
        $valid = true;
        if (empty($nom)) {
            $valid = false;
        }
        if (empty($prenom)) {
            $valid = false;
        }
        if (empty($email)) {
            $valid = false;
        }
        if (empty($adresse)) {
            $valid = false;
        }
        if (empty($ville)) {
            $valid = false;
        }
        if (empty($numtlf)) {
            $valid = false;
        }
        if (empty($prix)) {
            $valid = false;
        }
        if (empty($specialite)) {
            $valid = false;
        }
      
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `medecin` set `Email` = ? , `Nom`= ?, `Prenom` = ?, `Adresse`= ? ,`Numtlf` = ?, `Prix`= ? , `specialite`= ? ,`ville` = ? where`ID`=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($email,$nom,$prenom,$adresse,$numtlf,$prix,$specialite,$ville,$id));
             header("Location: affiche.php");
            Database::disconnect();
           
        }
    } else {
        $pdo = Database::connect();
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM medecin WHERE ID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nom = $data['Nom'];
        $prenom = $data['Prenom'];
        $email = $data['Email'];
        $adresse = $data['Adresse'];
        $numtlf = $data['Numtlf'];
        $prix = $data['Prix'];
        $specialite = $data['specialite'];
        $ville = $data['ville'];
        Database::disconnect();
    }
?>   


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajout medecin </title>
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
       
       <form id="form" action="update.php?id=<?php echo $id?>" method="post">
        <table>
        <tr>
        <td> <label>Email </label> </td>
        <td> <label> Numero Telephone de Medecin </label> </td> 
        </tr> 
     <tr> 
        <td> <input type="text" class="form-control" name="Email" id="Email" placeholder="Email"  value="<?php echo $email;?>"> </td>
        <td> <input type="text" class="form-control" id="Numtlf" name="Numtlf" placeholder="Numero de telephone"  value="<?php echo $numtlf;?>"></td>
        </tr>
       <tr>
        <td> <label> Nom de Medecin </label> </td>
        <td> <label> Prix de Consultation </label> </td>
       </tr>
    <tr> 
    <td> <input type="text" class="form-control" id="Nom" name ="Nom" placeholder="Nom"  value="<?php echo $nom;?>"> </td>
    <td> <input type="text" class="form-control" id="Prix" name="Prix" placeholder="Prix de Consultation"  value="<?php echo $prix;?>"> </td> 
    </tr>
     <tr>
        <td> <label> Prenom de Medecin </label> </td>
        <td>  <label> Specialite de Medecin </label> </td>
       </tr>
    <tr> 
    <td> <input type="text" class="form-control" id="Prenom" name="Prenom" placeholder="Prenom"  value="<?php echo $prenom;?>"> </td>
    <td> <select class="form-control" id="specialite" name="specialite" >
       <option> <?php echo $specialite;?> </option>
       <?php
                  
                   $pdo = Database::connect();
                   $sql = 'SELECT Nom FROM specialites ';
                   foreach ($pdo->query($sql) as $row) {
                             echo '<option>'. $row['Nom'].'</option>';
                   }
                   Database::disconnect();
?>
      
    </tr>
     <tr>
        <td> <label> Adresse de Medecin </label> </td>
        <td> <label> Ville de Medecin </label></td>
       </tr>
    <tr> 
        <td>  <input type="text" class="form-control" id="Adresse" name="Adresse" placeholder="Adresse"  value="<?php echo $adresse;?>"> </td>
        <td> <select class="form-control" id="ville" name="ville"  >
        <option> <?php echo $ville;?> </option>
        <option value="Jendouba">Jendouba</option>
        <option value="Beja">Beja</option>
        <option value="Le Kef"> Le Kef</option>
        <option value="Tunis">Tunis</option>
        <option value="Ariana">Ariana</option>
        <option value="Ben Arous">Ben Arous</option>
        <option value="Bizerte">Bizerte</option>
        <option value="Gabes">Gabes</option>
        <option value="Gafsa">Gafsa</option>
        <option value="Kairouan">Kairouan</option>
        <option value="Kasserine">Kasserine</option>
        <option value="Kebili">Kebili</option>
        <option value="Le Manouba">Le Manouba</option>
        <option value="Mahdia">Mahdia</option>
        <option value="Médenine">Médenine</option>
        <option value="Monastir">Monastir</option>
        <option value="Nabeul">Nabeul</option>
        <option value="Sfax">Sfax</option>
        <option value="Sidi Bouzid">Sidi Bouzid</option>
        <option value="Siliana">Siliana</option>
        <option value="Sousse">Sousse</option>
        <option value="Tataouine">Tataouine</option>
        <option value="Tozeur">Tozeur</option>
        <option value="Zaghouan">Zaghouan</option>

        </select>  </td></td> 
    </tr>
    
        <tr> 
        <td> </td>
        <td> <input type ="reset" id="btn1" value="Annuler"/>  <input type="submit" id="btn2" value="Valider"/> </td>
        </tr>
        </table>
        </form>
        </div>
   
        <div class="row">
            <footer id="admin-footer" class="clearfix"> 
            <div class="pull-left"> <b>Copyright</b> &copy; 2018 </div>
            <div class="pull-right"> <b> Crafted by Ahmed Khemiri </b></div>
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
