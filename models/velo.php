<?php

   class Velo
   {
       private $_modele;
       private $_matricule;
       private $_motpass;
       private $_categorie;
      


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

       /** SPECIFICATION DES GETTER DE LA CLASSE  */

       public function modele()
       {
           return $this->_modele;
       }

       public function matricule()
       {
           return $this->_matricule;
       }

       public function motpass()
       {
           return $this->_motpass;
       }
       
       public function categorie()
       {
           return $this->_categorie;
       }

       /** FIN SPECIFICATION DE LA CLASSE MOTO */

   /** DEBUT SPECIFICATION DES GETTER DE LA CLASSE MOTO */

   public function setModele($modele)
   {
       $this->_modele=$modele;
   }

   public function setMatricule($matricule)
   {
       $this->_matricule=$matricule;
   }

   public function setMotpass($motpass)
   {
       $this->_motpass=$motpass;
   }

   public function setCategorie($categorie)
   {
       $this->_categorie=$categorie;
   }

   /** FIN SPECIFICATION DES GETTER DE LA CLASSE voiture */
   }

   

?>