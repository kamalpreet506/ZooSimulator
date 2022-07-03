<?php

class Zoo extends CI_Model
{

    /**
     * Feed all the animals
     * generate a random number for each type of animal and between 10-25
     * and add it to the current health of the each animal
     */
    public function feed_animals()
    {
        $this->load->model('Animal');
        // generate an array of 3 random numbers for each type of animal
        // and then add it to health of animal
        $random_number_array = range(10, 25);
        shuffle($random_number_array);
        $random_number_array = array_slice($random_number_array ,0,3);

        //get all the animals and update the health for each
        $animals = $this->Animal->get_animals();
        foreach($animals as $animal){
            $Incrementedhealth = $random_number_array[$animal['type']-1] + $animal['health'];
            $newHealth = $Incrementedhealth > 100 ? 100 : $Incrementedhealth;
            $this->Animal->update_animal($animal['id'],$animal['name'],$animal['type'], $newHealth);
        }
        return $this->Animal->get_animals();;   
     }

     /**
      * Resets all zoo animals Healthe and time cookie
      */
     public function reset_zoo()
     {
         $this->load->model('Animal');
         
         $animals = $this->Animal->get_animals();
         foreach($animals as $animal){
             $this->Animal->update_animal($animal['id'],$animal['name'],$animal['type'], 100);
         }
         return $this->Animal->get_animals();;   
      }

      /**
       * increment the time interval by one hour 
       * to simulate the every hour spent
       */
      public function increment_zoo_interval()
      {
          $this->load->model('Animal');
          $animals = $this->Animal->get_animals();
          
          
          foreach($animals as $animal){
            $random_health = rand(0,20);
           
            $decreasedhealth = $animal['health'] - $random_health;
            $newHealth = $decreasedhealth < 0 ? 0 : $decreasedhealth;
            $this->Animal->update_animal($animal['id'],$animal['name'],$animal['type'], $newHealth);
          }
          return $this->Animal->get_animals();;   
       }
}
