<?php

namespace App\Controller;

use App\Entity\Answers;
use App\Entity\Questions;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="api_")
 */
class APIController extends AbstractController
{
    /**
     * @Route("/qa/create", name="create", methods={"POST"})
     */
    public function addQA(Request $request)
    {
        $donnees = json_decode($request->getContent());
        
        if(!empty($donnees))   {

            $title = $donnees->title;
            $promoted = $donnees->promoted;
            $status = $donnees->status;
            $channel = $donnees->channel;
            $body = $donnees->body;

            $em = $this->getDoctrine()->getManager();

            $question = new Questions();
            $question->setTitle($title);
            $question->setPromoted($promoted);
            $question->setCreated(new \DateTime());
            $question->setStatus($status);
            $em->persist($question);

            $answer = new Answers();
            $answer->setChannel($channel);
            $answer->setBody($body);
            $answer->setQuestions($question);
            $em->persist($answer);

            $em->flush();

            return new Response('OK Created. ', 201);

        } 
        return new Response('Error : not found. ', 404);   
    }
    
    /**
     * @Route("/qa/edit/{id}", name="edit", methods={"PUT"})
     */
    public function editQA(?Questions $question, Request $request) 
    {
        $donnees = json_decode($request->getContent());

        if(!empty($donnees) && $question != null)   {

            $title = $donnees->title;
            $promoted = $donnees->promoted;
            $status = $donnees->status;

            $em = $this->getDoctrine()->getManager();
            
            $question->setTitle($title);
            $question->setPromoted($promoted);
            $question->setCreated(new \DateTime());
            $question->setStatus($status);

            $em->persist($question);
            $em->flush();

            return new Response('OK Updated. ', 200);

        } 
        return new Response('Error : not found. ', 404);   
    }
    

    
}
