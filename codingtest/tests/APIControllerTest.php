<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

class APIControllerTest extends WebTestCase
{
    public function testAPICreate() {

        $data = '{
            "title" : "Ajout QA par l\'API 77778",
            "promoted" : 1,
            "status" : "draft",
            "answers" : [{
                "channel" : "faq",
                "body" : "<p>grg hgrugurgij krkgg</p>"   
            }]    
        }';

        $client = static::createClient();
        // $client->request->addContent($data);
        $client->request('POST', '/api/qa/create',[],[],[],$data);

        $this->assertJson($data);
        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());
             
    } 

    public function testAPIUpdate() {

        $data = '{
            "title" : "Ajout QA par l\'API 77778",
            "promoted" : 1,
            "status" : "draft",
            "answers" : [{
                "channel" : "faq",
                "body" : "<p>grg hgrugurgij krkgg</p>"   
            }]    
        }';

        $client = static::createClient();
        // $client->request->addContent($data);
        $client->request('PUT', '/api/qa/edit/22',[],[],[],$data);

        $this->assertJson($data);
        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
             
    } 
}