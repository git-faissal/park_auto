<?php

   class Admin
   {
       private $_nom_user;
       private $_passw;

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

       public function nom_user()
       {
           return $this->_nom_user;
       }

       public function pass()
       {
           return $this->_pass;
       }

       /** FIN SPECIFICATION DE LA CLASSE CLIENT */

   /** DEBUT SPECIFICATION DES GETTER DE LA CLASSE CLIENT */

   public function setNom_user($nom_user)
   {
       $this->_nom_user=$nom_user;
   }

   public function setPrenom($prenom)
   {
       $this->_prenom=$prenom;
   }

   public function setTelephone($telephone)
   {
       $this->_telephone=$telephone;
   }

   public function setPass($pass)
   {
       $this->_pass=$pass;
   }

   /** FIN SPECIFICATION DES GETTER DE LA CLASSE CLIENT */
   }

   

?>