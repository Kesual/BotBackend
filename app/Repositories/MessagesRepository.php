<?php


namespace App\Repositories;

use App\Entities\Messages;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class MessagesRepository {

    /**
     * @var string
     */
    private $class = 'App\Entities\Messages';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function create(Messages $msg)
    {
        try {
            $this->em->persist($msg);
        } catch (ORMException $e) {
        }
        try {
            $this->em->flush();
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }
    }

    public function update(Messages $msg, $data)
    {
        $msg->setMessage($data['msg']);
        try {
            $this->em->persist($msg);
        } catch (ORMException $e) {
        }
        try {
            $this->em->flush();
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }
    }

    public function findMsgById($id)
    {
        return $this->em->getRepository($this->class)->findOneBy([
            'id' => $id
        ]);
    }

    public function delete(Messages $msg)
    {
        try {
            $this->em->remove($msg);
        } catch (ORMException $e) {
        }
        try {
            $this->em->flush();
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }
    }
}
