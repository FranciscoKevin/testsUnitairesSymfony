<?php

namespace App\Tests\Repository;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * Récupère le noyau Symfony
     *
     * @return void
     */
    protected function setUp(): void
    {
        //Initialisation du Kernel
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    /**
     * Vérifie si le nombre d'utilisateur en base de données
     *
     * @return void
     */
    public function testCountUser(): void
    {
        $user = $this->entityManager
            ->getRepository(User::class)
            ->count([])
        ;

        $this->assertEquals(12, $user);
    }

    /**
     * Vérifie si Prénom est bien en base de données
     *
     * @return void
     */
    public function testSearchByName(): void
    {
        $user = $this->entityManager
            ->getRepository(User::class)
            ->findOneBy(['prenom' => 'Prénom'])
        ;

        $this->assertEquals("Prénom", $user->getPrenom());
    }

    /**
     * Ferme le noyau Symfony
     *
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }
}