<?php

namespace App\Controller;

use App\Entity\Answers;
use App\Entity\QuestionHistoric;
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
            $answers = $donnees->answers;
            foreach ($answers as $row) {
                $channel = $row->channel;
                $body = $row->body;
            }

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
        $em = $this->getDoctrine()->getManager();

        if(!empty($donnees) && isset($question))   {

            $title = $donnees->title;
            $promoted = $donnees->promoted;
            $status = $donnees->status;
            $questionHistoric = new QuestionHistoric();

            if(strcmp($title, $question->getTitle()) !== 0 || strcmp($status, $question->getStatus()) !== 0) 
            {
                $questionHistoric->setTitle($title);
                $questionHistoric->setStatus($status);
                $questionHistoric->setUpdated(new \DateTime());
                $em->persist($questionHistoric);
            }
            
            $question->setTitle($title);
            $question->setPromoted($promoted);
            $question->setStatus($status);
            $em->persist($question);


            $em->flush();

            return new Response('OK Updated. ', 200);

        } 
        return new Response('Error : not found. ', 404);   
    }
    

    
}
