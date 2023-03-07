<?php
class Clientmanager{

    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function verifiercompte(Client $user)
    {
           /**Verification si un client existe deja avec le meme identifient */
           $tel=$user->telephone();
           $request=$this->_db->query("SELECT id_client, nom, prenom, telephone, mpassword FROM client");
           
           while($donnees=$request->fetch(PDO::FETCH_OBJ))
           {
             if($tel==$donnees->telephone)
             {
              $trouver=1;
             }else{$trouver= 0;}
           } 

           return $trouver;

    }

    public function add(Client $user)
    {
      
        /** Criptage de mot de passe avce Bcrypte criptage symetrique */

        $pass=$user->password();
        $hash=password_hash($pass,PASSWORD_BCRYPT);
        /**----------------------fin criptage-------------------------- */
        $q=$this->_db->prepare('INSERT INTO client (`id_client`, `nom`, `prenom`, `telephone`, `mpassword`) VALUES (NULL, :nom, :prenom, :telephone, :mpassword)');

        $q->bindvalue(':nom', $user->nom());
        $q->bindvalue(':prenom', $user->prenom());
        $q->bindvalue(':telephone', $user->telephone());
        $q->bindvalue(':mpassword', $hash);
        $result = $q->execute();
        if($result)
        {?>
            <script>
                    alert("Inscription effectue avec succes..!!! ");
                    window.location.replace("../views/pages-login.php");
                </script><?php
            }else{?>
                <script>
                alert("Erreur survenue lors de l'inscription veillez recommencer ..!!!");
                    window.location.replace("../views/pages-register.php");
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