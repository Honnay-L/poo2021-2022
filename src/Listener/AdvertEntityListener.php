<?php

namespace App\Listener;


use App\Entity\Advert;
use Doctrine\ORM\Event\LifecycleEventArgs;

Class AdvertEntityListener
{

    private $authors = ['Lucas.H', 'Arnaud', 'Julie', 'Yael', 'Remy', 'Florian', 'Geoffrey', 'Lucas.P'];

    public function prePersist(Advert $entity, LifecycleEventArgs $args) {
        $entity->setAuthor($this->authors[random_int(0, count($this->authors) -1)]);
    }


}