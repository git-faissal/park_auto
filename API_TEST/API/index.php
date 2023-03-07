<?php 
//** Inclusion de la du fichier contenant les fonction a appele */
    
    include("api.php");

//** Recuperation des donne selon la reecriture des url  */

try{
    if(!empty($_GET['demande'])){
       // echo "test";
      // $url= explode('/',$_GET['demande']);
        $url= explode("/", filter_var($_GET['demande'],FILTER_SANITIZE_URL));
      
        switch($url[0]){
            case "places" :
                if(empty($url[1])){   
                   // echo "places";            
                    getPlaces();
                }else{
                    getPlacesByCategorie($url[1]);
                }
            break;
            case "place" : 
                if(!empty($url[1])){     
                    desactivePlace($url[1]);
                    
                }else{

                    throw new Exception ("Vous n'avez pas renseignez le numero de la categorie");

                } 
            break;
            case "parking" : 
                if(!empty($url[1])){     
                    activePlace($url[1]);
                    
                }else{

                    throw new Exception ("Vous n'avez pas renseignez le numero de la categorie");

                } 
            break;
            break;
            case "sorti" : 
                if(!empty($url[1])){     
                    ajoutidentifient($url[1]);
                    
                }else{

                    throw new Exception ("Vous n'avez pas renseignez le numero de la categorie");

                } 
            break;
            case "nbvoiture" : 
                if(!empty($url[1])){     
                    comptePlacevoiture($url[1]);
                    
                }else{

                    throw new Exception ("Vous n'avez pas renseignez le numero de la categorie");

                } 
            break;
         default : throw new Exception ("La demande n'est pas valide, verifier l'url");
         }
    }else{
        throw new Exception ("Probleme de recuperation de donnees");
    }
} catch(Exception $e){
    $erreur = [
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}

?>