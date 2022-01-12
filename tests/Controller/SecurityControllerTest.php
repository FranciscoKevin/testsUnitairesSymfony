<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class SecurityControllerTest extends WebTestCase
{
    /**
     * Test la route /login
     *
     * @return void
     */
    public function testDisplayLogin(): void 
    {
        $client = static::createClient();
        $client->request("GET", "/login");

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains("h1", "Se connecter");
        $this->assertSelectorNotExists("alert alert-danger");
    }

    /**
     * Test la connexion utilisateur en cas d'erreur
     *
     * @return void
     */
    public function testLoginWithBadCredentials(): void 
    {
        $client = static::createClient();
        $crawler = $client->request("GET", "/login");
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $form = $crawler->selectButton("Sign in")->form([
            "email" => "user@test.com",
            "password" => "fakepassword"
        ]);

        $client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $client->followRedirect();
    }

    /**
     * Test la connexion utilisateur en cas de succés
     *
     * @return void
     */
    public function testSuccessfulLogin(): void 
    {
        $client = static::createClient();
        $userRepository = static::getContainer()->get(UserRepository::class);

        // retrieve the test user
        $testUser = $userRepository->findOneByEmail('user@test.com');

        // simulate $testUser being logged in
        $client->loginUser($testUser);

        $client->request('GET', '/home');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Hello user@test.com!');
    }
}