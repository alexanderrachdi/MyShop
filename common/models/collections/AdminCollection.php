<?php

class AdminCollection extends Collection {

    protected $entity = 'AdminEntity';
    protected $table = 'admins';

    public function save(Entity $entity)
    {
        $dataInput = array(
            'fname' => $entity->getFname(),
            'sname' => $entity->getSname(),
            'username' => $entity->getUsername(),
            'password' => $entity->getPassword(),
            'email' => $entity->getEmail(),


        );

        if ($entity->getId() > 0) {
            $this->update($entity->getId(), $dataInput);
        } else {
            $this->create($dataInput);
        }
    }
}