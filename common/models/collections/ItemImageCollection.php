<?php

class ItemImageCollection extends Collection{

    protected $entity = 'ItemImageEntity';
    protected $table = 'items_images';

    public function save(Entity $entity)
    {
        $dataInput = array(
            'image' => $entity->getImage(),
            'item_id' => $entity->getItemId(),
        );

        if ($entity->getId() > 0) {
            $this->update($entity->getId(), $dataInput);
        } else {
            $this->create($dataInput);

        }
    }
}