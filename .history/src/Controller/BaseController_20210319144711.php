<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    protected EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param object $object
     * @return boolean
     */
    public function save(object $object): bool
    {
        try {
            if (!$object->getId()) {
                $this->em->persist($object);
            }
            $this->em->flush();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param object $object
     * @return boolean
     */
    public function remove(object $object): bool
    {
        try {
            if ($object) {
                $this->em->remove($object);
            }
            $this->em->flush();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}