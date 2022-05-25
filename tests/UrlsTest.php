<?php

namespace App\Tests;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UrlsTest extends WebTestCase
{


    public function testUrls(): void
    {
        $client = static::createClient();
        $client->request('GET', '');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Florian Grosjean');

    }

    /**
     * @dataProvider urlsList
     *
     */
    public function testUrlsAdmin($urls): void
    {
        $client = static::createClient();
        $client->request('GET', '');
        $userRepository = static::getContainer()->get(UserRepository::class);

        // ROLE_ADMIN
        $testUser = $userRepository->findOneBy(['email' => 'derboka@hotmail.com']);
        $client->loginUser($testUser);
        $client->request('GET', $urls);
        $this->assertResponseIsSuccessful();
    }

    public function urlsList()
    {

        return [
            [''],
            ['/login'],
            ['/back/'],
            ['/back/project/'],
            ['/back/presentation/'],
            ['/back/main/category/'],
            ['/back/category/'],
            ['/back/user/'],
        ];
    }
}
