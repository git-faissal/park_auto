<?php
class Adminmanager{

    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function verifieradmin(Admin $user)
    {
        /**Initialisation des variable avec le numero de telephone et le mot de passe saisie */
        $nom_user=$user->nom_user();
        $pass=$user->pass();

        $request=$this->_db->query("SELECT id_client, nom, prenom, telephone, mpassword FROM client WHERE nom='$nom_user'");

        while($donnees=$request->fetch(PDO::FETCH_ASSOC))
        {

            $hash= $donnees['mpassword'];
            //**Recuperation des identifient du client */
          $id_user= $donnees['id_client'];
            $_SESSION['id_admin'] = $id_user;
            $_SESSION['nom_admin'] = $donnees['nom'];

            /** fin recuperation */
        }         
           /**verification du mot de passe saisie avec celle recuperer ans la base de donne */ 
           if(password_verify($pass,$hash))
           {
            ?>
            <script>  
               window.location.replace("../views/acceuil-admin.php");
            </script><?php

           }else{
            ?>
            <script>
            alert("Mot de passe ou nom utilisateur incorrecte..!!!");
                window.location.replace("../index.php");
            </script><?php
           }
           /** fin verification */
        

    }
    public function setDb(PDO $db)
    {
        $this->_db=$db;
    }
    


}



?>