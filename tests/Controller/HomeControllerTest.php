<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends WebTestCase
{
    /**
     * Test la route /home
     *
     * @return void
     */
    public function testHomePage(): void 
    {
        $client = static::createClient();
        $client->request("GET", "/home");

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    /**
     * vérifie si le titre h1 est présent dans la page
     *
     * @return void
     */
    public function testH1HomePage(): void
    {
        $client = static::createClient();
        $client->request("GET", "/home");

        $this->assertSelectorTextContains("h1", "Bienvenue sur mon site");
    }
    
    /**
     * vérifie s'il y a une restriction sur la page d'authentification
     *
     * @return void
     */
    public function testAuthPageIsRestricted() : void
    {
        $client = static::createClient();
        $client->request("GET", "/auth");

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
    }

    /**
     * vérifie si la redirection se fait ou non
     *
     * @return void
     */
    public function redirectToLogin(): void
    {
        $client = static::createClient();
        $client->request("GET", "/auth");

        $this->assertResponseRedirects("/login");
    }
}