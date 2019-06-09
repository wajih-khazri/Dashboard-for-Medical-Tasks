<?php    
        require 'database.php';
            $error= null;
 if ( !empty($_POST)) {
         $id=$_POST['ID'];
         $motdepasse=$_POST['motdepasse'];
     
          if ( (empty($id)) || (empty($motdepasse)) ) {
            $error= 'Champ identifiant ou mot de passe est vide';
          
        }
     else{

     
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM Administrateur WHERE ID= ? AND motdepasse=?";
            $result = $pdo->prepare($sql);
            $result->execute(array($id,$motdepasse));
            $columns = $result->fetchAll(); 
            $nb = count($columns);
           if ($nb==0) {
           $error= 'Identifiant ou mot de passe est incorrect';
           }
           else {
               header("Location: index.php");
           }
            }
            Database::disconnect();
       
}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentification</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/authentification.css">
     <link rel="icon" href="favicon.ico" >

    
</head>
<body>
      <div class="content-inner" id="content">
        <div class="form-wrapper">
        <form id="form" action="authentification.php" method="post" >
        <div class="form-group">
        <table>
        <tr>
        <td> <label>Identifiant  </label> </td>
        <td> <input type="text" class="form-control" id="ID" name="ID" placeholder="ID"> </td> 
        </tr> 
       <tr>
        <td> <label> Mot de passe </label> </td>
        <td> <input type="password" class="form-control" id="password" name="motdepasse" placeholder="Mot de passe"> </td>
       </tr>
       
       <tr> 
         <td> </td> 
         <td id="msg"> <strong><?php echo $error; ?></strong>  </td>

         
   </tr>
      <tr> 
        <td colspan="2"> <button id="btn" >  SE CONNECTER  </button> </td>
        <td> </td>
        </tr>
   
        </div>
        </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
 </body> 
</html> 