
<?php
class Voituremanager{

    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }


    public function ajouter_engin(voiture $engin)
    {
      
        /** Recuperation de l'identifient du client a partir de la session */

        $id_client= $_SESSION['id_client'];
        $etat=1;
        $debut_stat=date("y/m/d H:i:s");
        $fin_stat=date("y/m/d H:i:s");
        /**----------------------fin criptage-------------------------- */
   //     $q=$this->_db->prepare('INSERT INTO engin (`id_engin`, `nom_engin`, `matricule_engin`, `debut_stat`, `fin_stat`, `etat`, `id_client`) VALUES (NULL, :nom_engin, :matricule_engin, :debut_stat, :fin_stat, :etat, :id_client)');
        $q=$this->_db->prepare('INSERT INTO engin (`id_engin`, `categorie`, `nom_engin`, `matricule_engin`, `debut_stat`, `fin_stat`, `etat`, `id_client`, `code_engin`, `num_place`) VALUES (NULL, :categorie, :nom_engin, :mat_engin, :debut_stat, :fin_stat, :etat, :id_user, :code_engin, :num_place)');

        $q->bindValue(':categorie', $engin->categorie());
        $q->bindValue(':nom_engin', $engin->modele(), PDO::PARAM_STR);
        $q->bindValue(':mat_engin', $engin->matricule(), PDO::PARAM_STR);
        $q->bindValue(':debut_stat', $debut_stat);
        $q->bindValue(':fin_stat', $fin_stat);
        $q->bindValue(':etat', $etat);
        $q->bindValue(':id_user', $id_client);
		$q->bindValue(':code_engin', $_SESSION['engin']);
		$q->bindValue(':num_place', $_SESSION['num_place']);
       $resultat=$q->execute();
        if($resultat)
        {?>
            <script>
                    alert("Stationnement effectue avec succes..!!! ");
                    window.location.replace("../views/pages-parking.php");
                </script><?php
            
            ?>
            <script>
                    alert("Stationnement effectue avec succes..!!! ");
                    window.location.replace("../views/pages-parking.php");
                </script><?php
            }else{?>
                <script>
                alert("Erreur survenue lors du stationnemnt veillez recommencer ..!!!");
                   // window.location.replace("../views/stationner.php");
                </script><?php
            }
        
    }
	public function desactiverplace($id_eng)
	{

        /** Requete de desactivation de l'engin dans la base */
        $q=$this->_db->prepare("UPDATE engin SET etat=0 WHERE id_engin=:id_eng");
       $q->bindValue(':id_eng', $id_eng);
       // $result = $q->execute();
       $resultat=$q->execute();
           /**verification du mot de passe saisie avec celle recuperer ans la base de donne */ 
           if($resultat)
           {
			   // Recuperation du numero de place dans parking pour le desactiver dans le capteur
			    $request=$this->_db->query("SELECT num_place FROM engin WHERE id_engin='$id_eng'");

                   while($donnees=$request->fetch(PDO::FETCH_ASSOC))
                {
                 /**Recuperation mot de passe du client */
                $trouve= $donnees['num_place'];
		         }
			   
                 return $trouve;

           }else{
			   
           return 0;
           /** fin desactivation */
           }
		
	}

    public function verifierclient(voiture $user)
    {
        /**Initialisation des variable avec le identifient et le mot de passe saisie */
       
        $pass=$user->motpass();
        $id_user=$_SESSION['id_client'];
        /** Requete de lesture des donne de la table client */
        $request=$this->_db->query("SELECT id_client, nom, prenom, telephone, mpassword FROM client WHERE id_client='$id_user'");

        while($donnees=$request->fetch(PDO::FETCH_ASSOC))
        {
            /**Recuperation mot de passe du client */
            $hash= $donnees['mpassword'];
           
           /**verification du mot de passe saisie avec celle recuperer ans la base de donne */ 
           if(password_verify($pass,$hash))
           {
           return 1;

           }else{
           return 0;
           /** fin verification */
           }
        }

    }
    public function setDb(PDO $db)
    {
        $this->_db=$db;
    }
    


}



?>