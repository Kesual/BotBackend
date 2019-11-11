<?php


namespace App\Repositories;

use App\Entities\GoodMorning;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use JsonSerializable;
use LaravelDoctrine\ORM\Serializers\JsonSerializer;

class GoodMorningRepository {

    /**
     * @var string
     */
    private $class = 'App\Entities\GoodMorning';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function create(GoodMorning $msg)
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

    public function update(GoodMorning $msg, $data)
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

    public function delete(GoodMorning $msg)
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

    public function getAll() {
        return $this->em->getRepository($this->class)->findAll();
    }

}
