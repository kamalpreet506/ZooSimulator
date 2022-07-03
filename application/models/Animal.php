<?php
class Animal extends CI_Model
{

    public $name;
    public $health;
    public $type;


    /**
     * get list of animals
     * @return array list of all the animals from the database
     */
    public function get_animals()
    {
        $this->db->select("*");
        $this->db->from('animals');
        $this->db->join('animal_type', 'animal_type.type_id = animals.type');
        $this->db->order_by("animal_type.type_id", "asc");
        $this->db->order_by("animals.name","asc");
        $query = $this->db->get();
        return $query->result_array();
    }


    /**
     * update the animal
     * @param int $id Id of the animal
     * @param string $name Name of the animal
     * @param int $type Type of animal
     * @param float $health Health of the animal
     */
    public function update_animal($id, $name, $type, $health)
    {
        $this->health  = $health;
        $this->name = $name;
        $this->type = $type;
        $this->db->where('id', $id);
        $this->db->update('animals', $this, array('id' => $id));
    }
}
