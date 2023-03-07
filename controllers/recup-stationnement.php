<?php

  //Demarrage de la session
  session_start();
  //--fin start session---////
 /** FONCTION DE CHARGEMENT DE CLASSE AUTOMATIQUE */
 function chargerClasse($classe)
 {
     $chemin="../models/";
     include $chemin.$classe .'.php';
 }
 spl_autoload_register('chargerClasse');
 /** FIN FONCTION */

if(isset($_POST['envoyer'])){
    if(!empty($_POST['model_voiture'])&& !empty($_POST['password'])&& !empty($_POST['categorie'])) 
    {
		//** Recuperation des donnees dans des variable session et verifiation de nombre place libre dans le parking a ravers le capteur comme API */

	 $cat =$_POST['categorie'];
	 $_SESSION['categorie']=$cat;

	 $type = json_decode(file_get_contents("http://localhost:8080/park_auto/API_TEST/API/nbvoiture/".$cat));
	// echo $type;
	 if($type >0 && $type<=6)
	 {	
       //*  Verification du matricule des velo */
	   if(empty($_POST['num_matricule']))
	   {
		   if($_POST['categorie']=='velo')
		   {
			     /** Recuperation des information de engin a stationner et ranger dans une variable pour le recuperer plus tard */

                $_SESSION['model_voiture']= $_POST['model_voiture'];
                $_SESSION['num_matricule']= "000velo";
                $_SESSION['password']=$_POST['password']; 
     //**  Redirection pour enregistrer l'engin */				
				   ?>
              <script>
            window.location.replace("../views-capteur/parking.php");
            </script>
           
        <?php
			   
		   }else{
			   	   ?>
       
            <script>
            alert("Veuillez remplir tous les champs ..!!!");
                window.location.replace("../views/stationner.php");
            </script>
           
        <?php
			   
			 }
	 }else{
		  
			   $_SESSION['model_voiture']= $_POST['model_voiture'];
               $_SESSION['num_matricule']= $_POST['num_matricule'];
               $_SESSION['password']=$_POST['password']; 
			      //**  Redirection pour enregistrer l'engin */				

			 ?>     
            <script>
            window.location.replace("../views-capteur/parking.php");
            </script>
           
        <?php
	 
	    }
	 }else{
		 
		?>    
            <script>
            alert("Nous sommes desole les places libre pour cette categorie  est sature ..!!!");
                window.location.replace("../views/stationner.php");
            </script>
           
        <?php
	 }
        
    }
}
?>