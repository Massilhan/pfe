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
        <link href="css/conseils.css" rel="stylesheet" >

      </head>
      <body>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
          <div class="container-fluid">
            <div class="navbar-header">
              <ul class="nav nav-justified">
                <li><img alt="Brand" src="/img/logo.png" class="logo_nav-bare img-circle"></li>
                <li role="presentation" ><a href="Profil"><h1> Profil</h1></a></li>
                <li role="presentation"><a href="Conseils"><h1>Conseils</h1></a></li>
                <li role="presentation"><a href="Contacts"><h1>Contacts</h1></a></li>
                <li role="presentation"><a href="Login"><h1>Déconnexion</h1></a></li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="row corps_bas">
          <div class="col-md-2" id="conteneur"  >
              <div class="container-fluid">
               		<img id="photo_profil" src="<?php echo $_SESSION['photo']?>" class="img-circle photo_bebe">
              </div>
              <div class="row nom">

                      <div class="container-fluid">
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
        

          <div class="col-md-10 col-centered">
              <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-11 contenu_droit" >
                      <div class="row">
                        <div class="container-fluid">
                          <div class="row">
                         
                         
                            <div class="row">
                              
                              <h3> Comment la prevenir : </h3>
                                  
									
									            <div class="container-fluid sommeil">
            									    <div class="col-md-1">
            									       <div class="photo-sommeil">
            									         <img src="/img/sleeping.png">
            									       </div>
            									    </div>
										              <div class="col-md-9 texte">
										
                                      <p> Pour le sommeil, la position sur le dos demeure la règle, mais veillez à alterner le côté d’appui du crâne de bébé sur le plan du lit : tantôt à droite, tantôt à gauche, tantôt sur l’arrière.</p>
                                      <p> Evitez les cale-bébé, coussins cocon et couverture d’emmaillotage qui bloquent le bébé dans sa mobilité et font obstacle à son développement moteur.</p>
                                      <p>Changez régulièrement la position du lit de bébé dans la chambre pour modifier les orientations de la tête</p>
									
									                </div>
									            </div>
									
          									  <div class="container-fluid eveil">
          									    <div class="col-md-1">
          									       <div class="photo-walking">
          									         <img src="/img/walking.png">
          									        </div>
          									    </div>
          										  <div class="col-md-9 texte">
          									 
                                    <p>Lors des périodes d’éveil, stimulez votre bébé en le mettant sur le tapis d’éveil, en le plaçant sur le ventre afin qu’il sollicite les muscles de son cou (toujours sous surveillance), en jouant avec lui, en le portant.</p> 
          									        <p>« C’est dans les bras rassurants de ses parents que le tout petit bébé s’éveille le mieux et va découvrir ce qui l’entoure », aime à rappeler la pédiatre. </p>
          									        <p>N’hésitez pas à utiliser écharpe de portage ou porte-bébé physiologique, pourvu que vous variiez les positions et que vous soyez à l’aise avec ces accessoires.</p>
                                    <p>Evitez de le laisser trop longtemps dans son transat ou son cosy (lequel doit être réservé uniquement au transport en voiture). « Dans ces coques dures ou ces toiles tendues, le bébé est limité dans sa mobilité et toujours en position dorsale », ajoute le docteur.</p>
                                              
          									    </div>
          									  </div>

            									<div class="container-fluid biberon">
              									 <div class="col-md-1">
                  									 <div class="photo-biberon">
                  										    <img src="/img/biberon.png">
                  										</div>
              									  </div>
            										  <div class="col-md-9 texte">
            									 
            									       <p>S’il est nourri au biberon, alternez les positions en tenant votre bébé tantôt a? droite, tantôt a? gauche, comme un enfant allaité.</p>
            									    </div>
            									</div>

            									<div class="container-fluid medical">
              									 <div class="col-md-1">
                									 <div class="photo-medical">
                									     <img src="/img/medical.png">
                									  </div>
                									</div>

              										<div class="col-md-9 texte">
              									 
                									  <p>Pour éviter une plagiocéphalie, il faut bien observer la tête du nourrisson et ce, dès la naissance.</p>
                									  <p> Si le torticolis se précise, des séances de kinésithérapie avec ostéopathie viseront à assouplir doucement le muscle du cou.</p>
                									  <p>Cependant, si la déformation est vraiment installée ou si elle s’est déjà organisée in utéro, l’enfant peut en garder une petite séquelle.</p>
                                    <p>Mais pas d’inquiétude, car en général, seuls les parents la devinent lorsque leur enfant grandit. En effet, au fur et à mesure que son cou et son dos se tonifient, le programme génétique des os vise à arrondir la voûte crânienne.</p>
                									  <p>Dans certains cas, afin de remédier à la plagiocéphalie, des médecins proposent des appuis sur le crâne grâce au port de casques.</p>
              									  </div>
              								</div>
									
									          </div>
								  
                          </div>
                        </div>
                      </div>
                        
                      <div class="row">
                        <div class="container-fluid livre">
                          <div class="row">
                              <h3> Lecture sur le sujet : </h3>
                          </div>
                          <div class="row lecture">
							
                              <div class="col-md-4 ">
                                <img src="/img/livre.jpg" class="img-thumbnail image_livre" >
                              </div>
                            <div class="col-md-6 texte">

                                  <p>Dans les années 1970, les pédiatres recommandaient de coucher les bébés uniquement sur le ventre : il a fallu près de vingt ans pour se rendre compte que cette position était directement en rapport avec l augmentation affolante des morts subites chez le nourrisson. L abandon de cette préconisation a permis une spectaculaire chute du nombre de décès. Une victoire éclatante pour une médecine qui semble avoir oublié qu elle était à l origine du drame... 

                                  Aujourd hui, pour éviter tous les risques, une nouvelle règle est imposée aux parents : le coucher uniquement sur le dos et ceci dès la naissance. Au mépris de la pression que cette position exerce sur l arrière-crâne du nouveau-né, très malléable pendant les premiers mois. Et au mépris d une augmentation épidémique du nombre de déformations crâniennes dont les conséquences ne sont pas seulement esthétiques une tête plate , mais possiblement vertébrales ou psychomotrices.

                                  Quand donc la médecine saura-t-elle retrouver le « bon sens » ? Ce combat contre la plagiocéphalie réunit ici les docteurs Thierry Marck, pédiatre, et Bernadette de Gasquet, médecin spécialiste de la préparation à la naissance et de l accompagnement post-accouchement. Il faut impérativement organiser le dépistage, apprendre à observer un crâne et mesurer une déformation, élaborer une politique de prévention efficace, et si besoin ne pas laisser passer l heure d un traitement réparateur.</p>
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="container-fluid">
                            <div class="row">
                              <h3> Quelques videos : </h3>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                  <div>
                                      <iframe class="videos" src="https://www.youtube.com/embed/9rSSzow2ncw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div>
                                    <iframe class="videos" src="https://www.youtube.com/embed/luq6znxdhB4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                      <iframe class="videos" src="https://www.youtube.com/embed/ebZE_77c2uY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                          </div>
                      </div>
                    </div>
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