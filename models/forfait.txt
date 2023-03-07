<?php

   class Client
   {
       private $_nom;
       private $_prenom;
       private $_telephone;
       private $_password;

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

       public function nom()
       {
           return $this->_nom;
       }

       public function prenom()
       {
           return $this->_prenom;
       }

       public function telephone()
       {
           return $this->_telephone;
       }

       public function password()
       {
           return $this->_password;
       }

       /** FIN SPECIFICATION DE LA CLASSE CLIENT */

   /** DEBUT SPECIFICATION DES GETTER DE LA CLASSE CLIENT */

   public function setNom($nom)
   {
       $this->_nom=$nom;
   }

   public function setPrenom($prenom)
   {
       $this->_prenom=$prenom;
   }

   public function setTelephone($telephone)
   {
       $this->_telephone=$telephone;
   }

   public function setPassword($password)
   {
       $this->_password=$password;
   }

   /** FIN SPECIFICATION DES GETTER DE LA CLASSE CLIENT */
   }

   

?>