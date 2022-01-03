<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends WebTestCase
{
    public function testHomePage(): void 
    {
        $client = static::createClient();
        $client->request("GET", "/home");

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testH1HomePage(): void
    {
        $client = static::createClient();
        $client->request("GET", "/home");

        $this->assertSelectorTextContains("h1", "Bienvenue sur mon site");
    }
    
    public function testAuthPageIsRestricted() : void
    {
        $client = static::createClient();
        $client->request("GET", "/auth");

        $this->assertResponseStatusCodeSame(Response::HTTP_UNAUTHORIZED);
    }

    public function redirectToLogin(): void
    {
        $client = static::createClient();
        $client->request("GET", "/auth");

        $this->assertResponseRedirects("/login");
    }
}