<?php

class ItemCollection extends Collection {

    protected $entity = 'ItemEntity';
    protected $table = 'items';

    public function getAll($where = array(), $limit = -1, $offset = 0, $orderBy = array('id', 'DESC'), $like = array(), $rand = 0)
    {
        $sql = "SELECT
        i.id, i.name, i.description, i.price, i.image, i.category, c.name as category_name
        FROM {$this->table} as i ";

        $sql .= "JOIN categories as c ON c.id = i.category ";
        $sql .= "WHERE 1=1 ";

        if (!empty($like)){
            $sql .= "AND i.{$like[0]} LIKE '%{$like[1]}%' ";
        }

        foreach ($where as $key => $value){
            $sql .= "AND {$key} = '{$value}' ";
        }

        if($rand == 1) {
            $sql .= "ORDER BY RAND() ";
        } else {
            $sql .= "ORDER BY {$orderBy[0]} {$orderBy[1]} ";

        }


        if ($limit > -1) {
            $sql.= "Limit {$limit}";

            if ($offset > 0) {
                $sql.= " , {$offset}";
            }
        }

        $result = $this->db->query($sql);

        if ($result  === false) {
            $this->db->error();
        }

        $collections = array();

        while ($row = $this->db->translate($result)) {
            $entity = new $this->entity;
            $entityRow = $entity->init($row);

            $collections[] = $entityRow;
        }

        return $collections;

    }

    public function save(Entity $entity){

        $dataInput = array(
            'name' => $entity->getName(),
            'description' => $entity->getDescription(),
            'price' => $entity->getPrice(),
            'image' => $entity->getImage(),
            'category' => $entity->getCategory()
        );

        if($entity->getId() > 0){
            $this->update($entity->getId(), $dataInput);
        } else {
            $this->create($dataInput);
        }
    }

}