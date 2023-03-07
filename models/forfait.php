<?php

   class Forfait
   {
       private $_categorie;
       private $_montant;
       private $_date_debut;
       private $_date_fin;
       private $_etat;


       public function hydrate(array $donnees)
       {
           foreach ($donnees as $key=> $value)
           {
               $method = 'set'.ucfirst($key);
               if(method_exists($this,$method))
               {
                   $this->$method($value);
               }
           }
       }

       /** SPECIFICATION DES GETTER DE LA CLASSE CLIENT */

       public function categorie()
       {
           return $this->_categorie;
       }

       public function date_debut()
       {
           return $this->_date_debut;
       }

       public function date_fin()
       {
           return $this->_date_fin;
       }

       public function montant()
       {
           return $this->_montant;
       }
       public function etat()
       {
           return $this->_etat;
       }

       /** FIN SPECIFICATION DE LA CLASSE CLIENT */

   /** DEBUT SPECIFICATION DES GETTER DE LA CLASSE CLIENT */

   public function setCategorie($categorie)
   {
       $this->_categorie=$categorie;
   }

   public function setMontant($montant)
   {
       $this->_montant=$montant;
   }

   public function setDate_debut($date_debut)
   {
       $this->_date_debut=$date_debut;
   }

   public function setDate_fin($date_fin)
   {
       $this->_date_fin=$date_fin;
   }

   public function setEtat($etat)
   {
       $this->_etat=$etat;
   }

   /** FIN SPECIFICATION DES GETTER DE LA CLASSE CLIENT */
   }

   

?>