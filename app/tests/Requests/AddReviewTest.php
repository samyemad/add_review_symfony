<?php
namespace App\Tests\Requests;


use PHPUnit\Framework\TestCase;

class AddReviewTest extends TestCase
{
    private $data;

    protected function setUp(): void
    {
        $data['project']="1";
        $data['client']="7";
        $data['reviewItems'][0]['result']=3;
        $data['reviewItems'][0]['reviewConstruction']=9;
        $data['reviewItems'][1]['result']=5;
        $data['reviewItems'][1]['reviewConstruction']=8;
        $this->data = $data;
    }
    public function testAddReviewApi()
    {
        $headers = [
            'Content-Type' => 'application/json',
            'token' => 'token'
        ];
        $client = new \GuzzleHttp\Client([
            'base_uri' => $_ENV['APP_URL'],
            'debug'=> true,
            'defaults' => [
                'exceptions' => false
            ],
            'headers' => $headers
        ]);
        $response = $client->post('api/account/addreview', [
            'body' => json_encode($this->data)
        ]);
        $content=json_decode($response->getBody()->getContents(),true);

       $this->assertEquals(200,$response->getStatusCode());
       $this->assertCount(2,$content['data']['reviewItems']);
    }
    protected function tearDown(): void
    {
        $this->data=[];
    }


}
