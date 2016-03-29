<?php

class UserCollection extends Collection {

    protected $entity = 'UserEntity';
    protected $table = 'users';

    public function save(Entity $entity)
    {
        $dataInput = array(
            'fname' => $entity->getFname(),
            'sname' => $entity->getSname(),
            'username' => $entity->getUsername(),
            'password' => $entity->getPassword(),
            'email' => $entity->getEmail(),
            //'image' => $entity->getImage()

        );

        if ($entity->getId() > 0) {
            $this->update($entity->getId(), $dataInput);
        } else {
            $this->create($dataInput);
        }
    }
}