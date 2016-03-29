<?php

class NewsCollection extends Collection {

    protected $entity = 'NewsEntity';
    protected $table = 'news';

    public function save(Entity $entity)
    {
        $dataInput = array(
            'name' => $entity->getName(),
            'date' => $entity->getDate(),
            'text' => $entity->getText(),
            'image' => $entity->getImage(),


        );

        if ($entity->getId() > 0) {
            $this->update($entity->getId(), $dataInput);
        } else {
            $this->create($dataInput);
        }
    }
}