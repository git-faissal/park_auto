<?php
class Forfaitmanager{

    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function verifierforfait()
    {
           /**Verification si un client existe deja avec le meme identifient */
           $id_user= $_SESSION['id_client'];
           $request=$this->_db->query("SELECT id_abn, categorie_abn, date_debut, date_fin, etat, id_client FROM abonnement");
           
           while($donnees=$request->fetch(PDO::FETCH_OBJ))
           {
             if($id_user==$donnees->id_client)
             {
              return 1;
             }else{return 0;}
           } 

           //return $trouver;

    }

    public function ajouter_abn(forfait $user)
    {
      
        /** Recuperation de l'identifient du client a partir de la session */

        $id_client= $_SESSION['id_client'];
        /**----------------------fin criptage-------------------------- */
        $q=$this->_db->prepare('INSERT INTO abonnement (`id_abn`, `categorie_abn`, `montant`, `date_debut`, `date_fin`, `etat`, `id_client`) VALUES (NULL, :categorie, :montant, :date_debut, :date_fin, :etat, :id_client)');

        $q->bindvalue(':categorie', $user->categorie());
        $q->bindvalue(':montant', $user->montant());
        $q->bindvalue(':date_debut', $user->date_debut());
        $q->bindvalue(':date_fin', $user->date_fin());
        $q->bindvalue(':etat', $user->etat());
        $q->bindvalue(':id_client', $id_client);
        $result = $q->execute();
        if($result)
        {?>
            <script>
                    alert("Abonnement effectue avec succes..!!! ");
                    window.location.replace("../views/pages-forfait.php");
                </script><?php
            }else{?>
                <script>
                alert("Erreur survenue lors de l'abonnement veillez recommencer ..!!!");
                    window.location.replace("../views/pages-forfait.php");
                </script>?><?php
            }
        
    }

    public function setDb(PDO $db)
    {
        $this->_db=$db;
    }
    


}



?>