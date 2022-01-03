<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class SecurityControllerTest extends WebTestCase
{
    public function testDisplayLogin(): void 
    {
        $client = static::createClient();
        $client->request("GET", "/login");

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains("h1", "Se connecter");
        $this->assertSelectorNotExists("alert alert-danger");
    }

    public function testLoginWithBadCredentials(): void 
    {
        $client = static::createClient();
        $crawler = $client->request("GET", "/login");
        $form = $crawler->selectButton("sign in")->form([
            "email" => "user@test.com",
            "password" => "fakepassword"
        ]);
        $client->submit($form);

        $this->assertResponseRedirects("/login");
        $client->followRedirect();
        $this->assertSelectorExists("alert alert-danger");
    }

    public function testSuccessfullLogin(): void 
    {
        $client = static::createClient();
        $crawler = $client->request("GET", "/login");
        $form = $crawler->selectButton("sign in")->form([
            "email" => "user@test.com",
            "password" => "Monsupermotdepasse"
        ]);
        $client->submit($form);

        $this->assertResponseRedirects("/auth");
    }
}