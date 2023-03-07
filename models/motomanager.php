<?php
class Voituremanager{

    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function ajouter_moto(moto $engin)
    {
      
        /** Recuperation de l'identifient du client a partir de la session */

        $id_client= $_SESSION['id_client'];
        $etat=1;
        
        /**----------------------fin criptage-------------------------- */
        $q=$this->_db->prepare('INSERT INTO engin (`id_engin`, `nom_engin`, `matricule_engin`, `debut_engin`, `fin_stat`, `etat`, `id_client`) VALUES (NULL, nom_engin, matricule_engin, debut_engin, fin_stat, etat, id_client)');

        $q->bindvalue(':nom_engin', $engin->nom_engin());
        $q->bindvalue(':matricule', $engin->matricule());
        $q->bindvalue(':debut_stat', $engin->debut_stat());
        $q->bindvalue(':fin_stat', $engin->fin_stat());
        $q->bindvalue(':etat', $etat);
        $q->bindvalue(':id_client', $id_client);
        $result = $q->execute();
        if($result)
        {?>
            <script>
                    alert("Stationnement effectue avec succes..!!! ");
                    window.location.replace("../views/pages-parking.php");
                </script><?php
            }else{?>
                <script>
                alert("Erreur survenue lors du stationnemnt veillez recommencer ..!!!");
                    window.location.replace("../views/stationner.php");
                </script>?><?php
            }
        
    }

    public function verifierclient(Client $user)
    {
        /**Initialisation des variable avec le numero de telephone et le mot de passe saisie */
        $tel=$user->telephone();
        $pass=$user->password();

        $request=$this->_db->query("SELECT id_client, nom, prenom, telephone, mpassword FROM client WHERE telephone='$tel'");

        while($donnees=$request->fetch(PDO::FETCH_ASSOC))
        {
            $hash= $donnees['mpassword'];
            //**Recuperation des identifient du client */
          $id_user= $donnees['id_client'];
            $_SESSION['id_client'] = $id_user;
            $_SESSION['nom'] = $donnees['nom'];
            $_SESSION['prenom'] = $donnees['prenom'];
            $_SESSION['telephone'] = $donnees['telephone'];
            /** fin recuperation */
           
           /**verification du mot de passe saisie avec celle recuperer ans la base de donne */ 
           if(password_verify($pass,$hash))
           {
            ?>
            <script>           
                window.location.replace("../views/acceuil.php");
            </script><?php

           }else{
            ?>
            <script>
            alert("Mot de passe et numero de telephone incorrecte..!!!");
                window.location.replace("../views/pages-login.php");
            </script><?php
           }
           /** fin verification */
        }

    }
    public function setDb(PDO $db)
    {
        $this->_db=$db;
    }
    


}



?>