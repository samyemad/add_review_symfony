<?php
namespace App\Tests\Requests;

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{

    private $data;

    private $headers;

    protected function setUp(): void
    {
        $data['credentials']['login']='samyemad4@gmail.com';
        $data['credentials']['password']='123456';
        $this->data = $data;
        $this->headers=[
            'Content-Type' => 'application/json',
        ];
    }
    public function testAuthorizeApi()
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => $_ENV['APP_URL'],
            'debug'=> true,
            'defaults' => [
                'exceptions' => false
            ],
            'headers' => $this->headers
        ]);
        $response = $client->post('/api/shop/login', [
            'body' => json_encode($this->data)
        ]);
        $content=json_decode($response->getBody()->getContents(),true);
        $this->assertEquals(200,$response->getStatusCode());
        $this->assertEquals($this->data['credentials']['login'],$content['username']);
    }
    protected function tearDown(): void
    {
        $this->data=[];
        $this->headers=[];
    }
}
