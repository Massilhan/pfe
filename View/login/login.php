<?php
		if(session_start())
		{
			session_destroy();
		}
		
		$id=0;
		if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass']))
		{

			extract($_POST);
			$pass=sha1($pass);
			$enfant=$this->Login->login(array('conditions' => array('Email'=>$login,'Password'=>$pass))); 
			$this->set('profil',$enfant);
			
			
			foreach ($enfant as $k => $info) {
				 $id=$info->ID;
				 $nom=$info->Nom;
				 $prenom=$info->Prenom;
				 $naissance=$info->Naissance;
				 $email=$info->Email;
				 $password=$info->Password;
				 $num_rue=$info->num_rue;
				 $voie=$info->nom_rue;
				 $ville=$info->Ville;
				 $code=$info->Code;
				 $photo=$info->photo;

			}

			if($id==1)
			{
				session_start();
				$_SESSION['ID']=$id;
				$_SESSION['Nom']=$nom;
				$_SESSION['Prenom']=$prenom;
				$_SESSION['Naissance']=$naissance;
				$_SESSION['Email']=$email;
				$_SESSION['Password']=$password;			
				$_SESSION['num_rue']=$num_rue;
				$_SESSION['Voie']=$voie;
				$_SESSION['Ville']=$ville;
				$_SESSION['Code']=$code;
				$_SESSION['photo']=$photo;

				header('Location: /Profil');

			}else
			{
				header('Location: /login/error/noconnect.php');
			}
			

		}

		/*if (isset($_POST) && !empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['birth']) && !empty($_POST['num_rue']) && !empty($_POST['voie']) && !empty($_POST['CP']) && !empty($_POST['ville']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm']) && $_POST['password']==$_POST['password_confirm'])
		{
			extract($_POST);
			if($password==$password_confirm)
			{
				$password=sha1($password);
				session_start();
				$_SESSION['ID']=1;
				
				$infos=array($_SESSION['ID'],$name,$firstname,$birth,$email,$password,$num_rue,$voie,$CP);
				$sql="UPDATE enfants SET Nom ='$name', Prenom ='$firstname', Naissance='$birth', Email='$email' , WHERE ID='1'";

				var_dump($infos);
				

				
				//$new=$this->Login->newbaby();
				/*$this->set('Enfants',$new);
				var_dump($new);
			}		
				
			
			

		}*/

?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		

		<link href="/css/Login.css" type="text/css" media="screen" rel="stylesheet">
		

	</head>

    
    <body>

	  	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	        <div class="container-fluid">
	            <div class="navbar-header">
	            	<ul class="nav nav-justified">
	                    <li id="logo"><img  src="/img/logo.png" class="logo_nav-bare img-circle"  ></li>
	                   	<li><h1> Raph'y vous souhaite la bienvenue ! </h1></li>
                	</ul>
	            	
	                
	            </div>
	        </div>
	    </nav>
    	
    	<div class="row">
    			
		   <!--
	     <div class="col-md-6">
		    
			    <img  src="/img/Inscription.png" width="301" height="190" data-toggle="modal" data-target="#inscriptModal">
				<div id="inscriptModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h4 class="modal-title">Formulaire d'inscription</h4>
				      </div>
				      <div class="modal-body">

						<form class="container" action=""  method="POST">

										<div class="form-group">
											<label for=""> Nom de l'enfant *</label>
											<input type="text" name="name" class="form-control" placeholder="Nom" required/>
										</div>

										<div class="form-group">
											<label for=""> Prénom de l'enfant *</label>
											<input type="text" name="firstname" class="form-control" placeholder="Prenom" required/>
										</div>

										<div class="form-group">
											<label for=""> Date de naissance *</label>
											<input type="date" name="birth" class="form-control" required/>
										</div>

										<div class="form-group">
											<label for=""> N° *</label>
											<input type="int" name="num_rue" class="form-control" placeholder="Numéro de rue" required/>
										</div>


										<div class="form-group">
											<label for=""> Voie *</label>
											<input type="int" name="voie" class="form-control" placeholder="Nom de la rue" required/>
										</div>


										<div class="form-group">
											<label for=""> Code Postal *</label>
											<input type="int" name="CP" class="form-control" placeholder="ex:75015" required/>
										</div>

										<div class="form-group">
											<label for=""> Ville *</label>
											<input type="int" name="ville" class="form-control" placeholder="Nom de la ville" required/>
										</div>


										<div class="form-group">
											<label for=""> Email des parents *</label>
											<input type="email" name="email" class="form-control" placeholder="Email" required/>
										</div>

										<div class="form-group">
											<label for=""> Mot de passe *</label>
											<input type="password" name="password" class="form-control" placeholder="Mot de passe" required/>
										</div>

										<div class="form-group">
											<label for=""> Confirmation du Mot de passe *</label>
											<input type="password" name="password_confirm" class="form-control" placeholder="Mot de passe" required/>
										</div>

										<div class="form-group">
											<label id="obligation">* Mention Obligatoire</label>
										</div>

										<button type="submit"  class="btn btn-primary" > S'inscrire </button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
								
							</form>

					      </div>

					  </div>
					</div>
				</div>
			</div>-->
			<div class="col-md-6">


				<img src="/img/Connexion.png" id="nuage" width="301" height="190" data-toggle="modal" data-target="#connectModal">
				<div id="connectModal" class="modal fade" role="dialog">
		  			<div class="modal-dialog">
					    <div class="modal-content">
						      <div class="modal-header">
						        <h4 class="modal-title">Formulaire de connexion</h4>
						      </div>
						      <div class="modal-body">
						      	<form class="container" action=""  method="POST">
									<div class="form-group">
										<label for=""> Identifiant *</label>
										<input type="email" name="login" class="form-control" placeholder="Email" required/>
									</div>

									<div class="form-group">
										<label for=""> Mot de passe *</label>
										<input type="password" name="pass" class="form-control" placeholder="Mot de passe" required/>
									</div>

									<div class="form-group">
										<label id="obligation">* Mention Obligatoire</label>
									</div>
									<button type="submit" class="btn btn-primary" > Se connecter </button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
								</form>
						      </div>
						      
					    </div>

				   	</div>
				</div>
			</div>
		</div>
		
	</body>
	

</html>