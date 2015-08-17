<?php
App::uses('AppModel', 'Model');
/**
 * Prefecture Model
 *
 */
class Prefecture extends AppModel {
    public function getData($id){
        $sql = "SELECT * FROM prefectures WHERE id = :id;";
 
        $params = array(
            'id'=> $id
        );
 
        $data = $this->query($sql,$params);
        return $data;
    }
}
