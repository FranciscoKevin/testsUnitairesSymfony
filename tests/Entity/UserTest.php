<?php

namespace App\Entity\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * Test si le getter() est égale au setter() et retourne true
     *
     * @return void
     */
    public function testIsTrue(): void
    {
        $user = new User();

        $user->setEmail("user@test.com");
        $user->setPrenom("Prénom");
        $user->setNom("Nom");
        $user->setPassword("Monsupermotdepasse");
        $user->setAPropos("What else ?");
        $user->setInstagram("Instagram");

        $this->assertTrue($user->getEmail() === "user@test.com");
        $this->assertTrue($user->getPrenom() === "Prénom");
        $this->assertTrue($user->getNom() === "Nom");
        $this->assertTrue($user->getPassword() === "Monsupermotdepasse");
        $this->assertTrue($user->getAPropos() === "What else ?");
        $this->assertTrue($user->getInstagram() === "Instagram");
    }

    /**
     * Test si le getter() est égale au setter() et retourne false
     *
     * @return void
     */
    public function testIsFalse(): void
    {
        $user = new User();

        $user->setEmail("user@test.com");
        $user->setPrenom("Prénom");
        $user->setNom("Nom");
        $user->setPassword("Monsupermotdepasse");
        $user->setAPropos("What else ?");
        $user->setInstagram("Instagram");

        $this->assertFalse($user->getEmail() === "claude-françois@test.com");
        $this->assertFalse($user->getPrenom() === "Claude");
        $this->assertFalse($user->getNom() === "François");
        $this->assertFalse($user->getPassword() === "Mot de passe");
        $this->assertFalse($user->getAPropos() === "I don't know");
        $this->assertFalse($user->getInstagram() === "Facebook");
    }

    /**
     * Test si le getter() est vide
     *
     * @return void
     */
    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getAPropos());
        $this->assertEmpty($user->getInstagram());
    }
}
