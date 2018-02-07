<?php
    session_start();
    if($_SESSION['ID']==1)
    {
   
?>

<!DOCTYPE html>
<html>
  <head>

      <meta charset="utf-8">
      

      <link href="/css/Contacts.css" rel="stylesheet" >

     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

    

  </head>
      <body>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container-fluid">
              <div class="navbar-header">
                  <ul class="nav nav-justified">
                      <li><img alt="Brand" src="/img/logo.png" class="logo_nav-bare img-circle"  ></li>
                      <li role="presentation"><a href="Profil"><h1> Profil</h1></a></li>
                      <li role="presentation"><a href="Conseils"><h1>Conseils</h1></a></li>
                      <li role="presentation"><a href="Contacts"><h1>Contacts</h1></a></li>
                      <li role="presentation"><a href="Login"><h1>Déconnexion</h1></a></li>
                  </ul>
              </div>
          </div>
        </nav>
        <div class="row corps_bas">
            <div class="col-md-2" id="conteneur" >
                <div class="container-fluid">
                    <img id="photo_profil" src="<?php echo $_SESSION['photo']?>" class="img-circle">
                </div>

                    <div class="row nom">

                      <div  class="container-fluid">
                           <h2><?php echo $_SESSION['Nom'].' '.$_SESSION['Prenom'];?></h2>
                      </div>
                    </div>

                    <div id="infos" class="container-fluid" >
                      <ul>
                        <li><h4><img src="/img/date.png" id="icon" ><?php echo $_SESSION['Naissance'];?></h4></li>
                        <li><h4><img src="/img/adresse.png" id="icon"><?php echo $_SESSION['num_rue'].' '.$_SESSION['Voie'].' '.$_SESSION['Code'].' '.$_SESSION['Ville'];?></h4></li>
                        <li><h4><img src="/img/mail.png" id="icon"><?php echo $_SESSION['Email'];?></h4></li>
                      </ul>
                    </div>
                
            </div>
 
            <div class="col-md-10 col-centered " >
                <div class="container-fluid contenu_droit ">
                  <table width="100%" height="700px">
                      <tr height="30%">
                        <td align="center" width="31%">
                          <img id="image_med" src="/img/doctor.png" >
                        </td>

                        

                        <td id="info-box" width="35%" align="left">
                            <div>
                              <u> Cliquez sur l'hôpital de votre choix pour obtenir ses informations </u>
                            </div>
                            <p id="nom"> </p>
                            <p id="adresse" value=""> </p>
                            <p id="telephone"> </p>
                            <p id="categorie"> </p>
                            <p id="psph"> </p>
                        </td>

                        <td id="info-box2" width="9%" align="right">
                            <p><img src="/img/trip1.png" /></p>
                            <p><img src="/img/time1.png" /></p>
                        </td>

                        <td id="info-box3" width="25%" align="center">
                          <div id="distance">
                            <u>Calculer un trajet</u>
                            <p>1. Sélectionner un professionnel de santé</p>
                            <p>2. Appuyer sur l'adresse du médecin</p>
                            <p>3. Appuyer sur votre adresse</p>
                            <p>4. Sélectionner votre mode de déplacement</p>
                            <p>5. Valider en cliquant sur 'Entrée'</p>
                          </div>
                          <div id="duree"> </div>
                          <div id="mode-transport"> </div>
                        </td>
                      </tr>

                      <tr ><!--height="70%"-->

                        

                        <td  id="Gauche"><!--width="13%"-->
                          <u id="ServiceTitle"> Choisir un service : </u>
                          <form NAME="form1">
                            <div>
                              <input TYPE="CHECKBOX" id="check1"  NAME="check1"  VALUE="1" > <img src="pin/pinrouge - Copie.png"/> Kinésithérapeuthe 
                            </div>
                            <div>
                              <input TYPE="CHECKBOX" id="check2"  NAME="check2"  VALUE="2" > <img src="pin/pinbleu2 - Copie.png"/> Ostéopathe
                            </div>
                            <div>
                              <input TYPE="CHECKBOX" id="check3"  NAME="check3"  VALUE="3" > <img src="pin/pinvert3 - Copie.png"/> Pédiatre
                            </div>
                           </form>
                        </td>

                    

                        <input id="origin-input" class="controls" type="text"
                        value="<?php echo $_SESSION['num_rue']. " ".$_SESSION['Voie']." ".$_SESSION['Code']." ".$_SESSION['Ville'];?>">

                        <input id="destination-input" class="controls" type="text"
                        placeholder="Adresse d'arrivée">

                        <div id="mode-selector" class="controls">
                          <input type="radio" name="type" id="changemode-walking" checked="checked">
                          <label for="changemode-walking">Marche</label>

                          <input type="radio" name="type" id="changemode-transit">
                          <label for="changemode-transit">Transports</label>

                          <input type="radio" name="type" id="changemode-driving">
                          <label for="changemode-driving">Voiture</label>
                        </div>

                        <td id="EmplacementDeMaCarte" colspan="3">

                        </td>
                      </tr>

                      <script src="js/Contacts.js" type="text/javascript"></script>
                      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbZ4mlkgxfdwdIwcFmaA4c6CAaps9GbYU&libraries=places&callback=initialisation" style="font-family:roboto;"> </script>

                  </table>
                  
                  
                </div>

                  
                  
            </div>
        </div> 
        





      </body>

</html>

<?php
}else{
  header('Location:Login');
}
?>
