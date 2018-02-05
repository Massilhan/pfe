<?php
    session_start();
    if($_SESSION['ID']==1)
    {
      
   
?>



<!DOCTYPE html>
<html>
      <head>

        <meta charset="utf-8">

        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
        <link href="/css/morris.css" rel="stylesheet" >
        <link href="/css/Profil.css" rel="stylesheet" >

      </head>
      <body>

        <script type="text/javascript" src="js/profil.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
        <script type="text/javascript" src="/js/morris.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>



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
                      <button type="submit"  class="btn btn-primary test"  data-toggle="modal" data-target="#PictModal" > Modifier votre photo </button>
    	              </div>

                    <div id="PictModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title">Modification de mon profil</h3>
                          </div>
                          <div class="modal-body">
                            <form  class="container" method="POST" action="" enctype="multipart/form-data">
                              <div class="row">
                                <div  class="form-group">
                                    <img src="<?php echo $_SESSION['photo']?>" class="picture_modal">
                                </div>
                              

                                <div  class="form-group">
                                      <input type="file" name="picture">                                     
                                </div>

                                <button type="submit" name="upload" class="btn btn-primary update" > Modifier </button>
                                <button type="button" class="btn btn-default update" data-dismiss="modal">Annuler</button>
                                <?php

                                  if(isset($_POST['upload']))
                                  {
                                    echo $image= $_FILES['picture']['name'];
                                    echo $target="img/".basename($_FILES['picture']['name']);?></br><?php
                                    $pict=$this->Profil->update(array('values' => array('photo'=>$target),'conditions'=> array('ID'=>$_SESSION['ID'])));

                                    echo $_SESSION['photo']=$target;
                                    move_uploaded_file($_FILES['picture']['tmp_name'], $target);

                                    header('Location: /Profil');
                                                                     
                                    
                                  }

                                ?>

 
                              </div>
              
                            </form>
                                   
                          </div>
                                
                        </div>
                          
                      </div>
                          
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
                    	<button type="button" class="btn btn-primary modif" data-toggle="modal" data-target="#ModifModal">Modifier </button>
                    </div>

                    <div id="ModifModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title">Modification de mon profil</h3>
                          </div>
                          <div class="modal-body">
                            <form  class="container" method="POST" action="">
                              <div class="row">
                                
                                <div class="form-group">
                                      <label>Nom :</label>
                                       <input required  type="text" class="form-control"  name="name" value="<?php echo $_SESSION['Nom'];?>">
                                </div>

                                 
                                <div class="form-group">
                                      <label> Prénom :</label>
                                       <input required  type="text" class="form-control"  name="firstname" value="<?php echo $_SESSION['Prenom'];?>">
                                    </div>

                                <div class="form-group">
                                      <label for=""> Date de naissance *</label>
                                      <input type="date" name="birth" class="form-control" required value="<?php echo $_SESSION['Naissance'];?>">
                                    </div>

                                <div class="form-group">
                                      <label>Email :</label>
                                      <input required  type="email" class="form-control"  name="email" value="<?php echo $_SESSION['Email'];?>">
                                    </div>

                                <div class="form-group">
                                      <label>Mot de passe :</label>
                                      <input type="password" class="form-control"  name="password" placeholder="Votre mot de passe">
                                    </div>

                                <div class="form-group">
                                      <label>N° :</label>
                                      <input required  type="text" class="form-control" name="num_rue" value="<?php echo $_SESSION['num_rue'];?>">
                                    </div>

                                <div class="form-group">
                                      <label>Voie :</label>
                                      <input required  type="text" class="form-control"  name="voie" value="<?php echo $_SESSION['Voie'];?>">
                                </div>

                                <div class="form-group">
                                      <label>Code :</label>
                                       <input required  type="text" class="form-control"  name="CP" id="code" value="<?php echo $_SESSION['Code'];?>">
                                    </div>
                              
                                <div class="form-group">
                                      <label>Ville :</label>
                                       <input required  type="text" class="form-control"  name="ville" id="ville" value="<?php echo $_SESSION['Ville'];?>">
                                </div>

                                <button type="submit"  class="btn btn-primary update" > Modifier </button>
                                <button type="button" name="annuler" class="btn btn-default update" data-dismiss="modal">Annuler</button>

 
                              </div>
                              <?php
                                if (isset($_POST) && !empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['birth']) && !empty($_POST['num_rue']) && !empty($_POST['voie']) && !empty($_POST['CP']) && !empty($_POST['ville']) && !empty($_POST['email']))
                                {
                                  
                                  extract($_POST);
                                  if(!empty($_POST['password']))
                                  {
                                    $password=sha1($password);
                                    
                                  }else
                                  {
                                    $password=$_SESSION['Password'];
                                    
                                  }
                     
                                    $update=$this->Profil->update(array('values' => array(' Nom'=>$name,' Prenom'=>$firstname, ' Naissance'=>$birth, ' Email'=>$email, ' Password'=>$password, ' num_rue'=> $num_rue, ' nom_rue'=>$voie,' Code'=>$CP, 'Ville'=>$ville),'conditions'=> array('ID'=>$_SESSION['ID'])));
                                    
                                    $_SESSION['Nom']=$name;
                                    $_SESSION['Prenom']=$firstname;
                                    $_SESSION['Naissance']=$birth;
                                    $_SESSION['Email']=$email;
                                    $_SESSION['Password']=$password;      
                                    $_SESSION['num_rue']=$num_rue;
                                    $_SESSION['Voie']=$voie;
                                    $_SESSION['Ville']=$ville;
                                    $_SESSION['Code']=$CP;

                                    header('Location: /Profil');

                                  } 

                                ?>
    					
                            </form>
                                   
                          </div>
                                
                        </div>
                          
                      </div>
                          
                    </div>
                       
            </div>
        <?php
        
        $alerts=$this->Profil->alert(array('conditions' => array('enfant_id' => $_SESSION['ID'])));

        foreach ($alerts as $k => $info) 
        {
            $alert=$info->Alerte;
            $mail=$info->Mail;                       

        }

        if($alert==1)
        {
          
        ?>

          <script> alert("Attention! Raph'y a détecté un risque de plagiocéphalie! Contactez rapidement un professionnel de santé en cliquant sur la rubrique 'Contacts'");</script>

          <?php
            if($mail==1)
            {
              $header="MIMI-Version: 1.0\r\n";
              $header.='From:"pfe raphy"<pfe.raphy@gmail.com'."\n";
              $header.='Content-Type:text/html ; charset="utf-8"'."\n";
              $header.='Content-Transfert-Encoding:8bit';

              $message='
              <html>
                <body>
                  <div align="center">
                    <span style="color:red; font-size:xx-large;"> Attention! Raph\'y a détecté un potentiel torticolis! </br> Contactez rapidement un professionnel de santé via la page:</span>
                    <a href="http://dev.raphy.com.localhost/Contacts" style="font-size:x-large;"> Contacts </a>
                    </br>
                    </br>
                    </br>
                    <img width=10% height=10% src="http://localhost/pfe_raphy/webroot/img/logo.png">

                    <span> © Raphy Entreprise 2018 </span>
                    

                  </div>
                </body>
              </html>
              ';
              
              mail($_SESSION['Email'],"Alerte Raph'y", $message,$header);
              $reinitmail=2;
              $mailok=$this->Profil->updatealert(array('values' => array('Mail'=>$reinitmail),'conditions'=> array('enfant_id'=>$_SESSION['ID'])));
              
            }
            
              
              
              
            
         
        }
        ?>


           <div class="col-md-10 col-centered">
                <div class="container-fluid contenu_droit">
                    <div class="row">
                      <?php 
                        if($alert==1)
                        {?>
                          <h2 class="alert"> Attention ! Raph'y a détecté un risque de plagiocéphalie! Contactez rapidement un professionnel de santé en cliquant sur la rubrique 'Contacts'</h2>
                          <h3> Vous ne pouvez plus utiliser Raph'y tant que vous n'êtes pas allé consulter !</h3>
                          <button type="submit"  class="btn btn-primary reprise"  data-toggle="modal" data-target="#alertModal" > Reprise des mesures </button>

                            <div id="alertModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title">Attention !</h3>
                                  </div>
                                  <div class="modal-body">
                                    <form  class="container" method="POST" action="">
                                      <div class="row">
                                        <div>
                                          <h3> Attention ! Raph'y a détecté un risque de plagiocéphalie! </h3>
                                          <h3> Avez-vous contacté un professionnel ?</h3>
                                          <h3> Etes-vous sûr de vouloir redémarrer le système ?</h3>
                                        </div>

                                        <button type="submit" name="alerte"  class="btn btn-primary update" > Oui </button>
                                        <button type="button" name="annuler" class="btn btn-default update" data-dismiss="modal">Non</button>
                                                                                                            
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                      <?php
                            if(isset($_POST['alerte']))
                            {
                                          $reinitalert=0;
                                          $reinitmail=0;
                                          
                                          $noalert=$this->Profil->updatealert(array('values' => array('Alerte'=>$reinitalert,'Mail'=>$reinitmail),'conditions'=> array('enfant_id'=>$_SESSION['ID'])));
                                          var_dump($noalert);


                                          header('Location: /Profil');
                            }
                        }
                      ?>
                      <h2> Comment bébé dort : </h2>
                    </div>
                    <div class="row">

                      <?php
                      $position=$this->Profil->findposition(array('conditions' => array('enfant_id' => $_SESSION['ID'])));

                      foreach ($position as $k => $infos) {
                        $secteur1=$infos->secteur1;
                        $secteur2=$infos->secteur2;
                        $secteur3=$infos->secteur3;
                        $secteur4=$infos->secteur4;
                        $secteur5=$infos->secteur5;
                        $date=$infos->Date_mesure;
                        

                      }

                      $total=$secteur1+$secteur2+$secteur3+$secteur4+$secteur5;
                      $gauche_gauche=round(($secteur1/$total)*100,1);
                      $gauche_milieu=round(($secteur2/$total)*100,1);
                      $droit=round(($secteur3/$total)*100,1);
                      $droite_milieu=round(($secteur4/$total)*100,1);
                      $droite_droite=round(($secteur5/$total)*100,1);
      

                      ?>
                      <div class="col-md-2 image_orientation" >
                        <div class="row">
                          <img src="/img/Gauche_gauche.png" class="photo_tete">
                        </div>
                        <div class="row progress_place">
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width:<?php echo $gauche_gauche;?>%" aria-valuenow="<?php echo $gauche_gauche; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $gauche_gauche; ?>%
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 image_orientation">
                        <div class="row">
                            <img src="/img/Gauche_milieu.png" class="photo_tete">
                        </div>
                        <div class="row progress_place">
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width:<?php echo $gauche_milieu; ?>%" aria-valuenow="<?php echo $gauche_milieu; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $gauche_milieu; ?>%
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 image_orientation" >
                        <div class="row">
                          <img src="/img/Droit.png" class="photo_tete" >
                        </div>
                        <div class="row progress_place" >
                          <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width:<?php echo $droit; ?>%" aria-valuenow="<?php echo $droit; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $droit; ?>%
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 image_orientation">
                        <div class="row">
                          <img src="/img/Droite_milieu.png" class="photo_tete">
                        </div>
                        <div class="row progress_place">
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width:<?php echo $droite_milieu; ?>%" aria-valuenow="<?php echo $droite_milieu; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $droite_milieu; ?>%
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 image_orientation" >
                        <div class="row">
                          <img src="/img/Droite_droite.png" class="photo_tete">
                        </div>
                        <div class="row progress_place" >
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width:<?php echo $droite_droite?>%" aria-valuenow="<?php echo $droite_droite; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $droite_droite; ?>%
                            </div>
                          </div>
                        </div>
                      </div>
                      <h5> Date de la dernière mesure: <?php echo $date;?></h5>
                    </div>
                    <div class="row">
                      <h2> Activité du berceau :  </h2>

                    </div>
                    <div class="row">
                      <?php 
                          $actions=$this->Profil->findaction(array('conditions' => array('enfant_id' => $_SESSION['ID'])));   

                      ?>

                      <div id="graph">
                      <?php
                       echo "
                        <script>
                          Morris.Area({
                            element: 'graph',
                            behaveLikeLine: true,
                            data: [";
                          foreach ($actions as $key => $infos) {
                            $number_action=$infos->nb_actions;
                            $date_action=$infos->date;
                         echo '{"j":"'.$date_action.'", "act":"'.$number_action.'" },';}
                         echo'
                            ],
                            xkey: "j",
                            ykeys: ["act"],
                            labels: ["Action du berceau"]
                          });
                          </script>';?>
                      </div>

                      
                    </div>
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

