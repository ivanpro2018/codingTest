<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnswersRepository")
 */
class Answers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, columnDefinition="ENUM('faq', 'bot')")
     */
    private $channel;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Questions", inversedBy="answers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $questions;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChannel(): ?string
    {
        return $this->channel;
    }

    public function setChannel(string $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getQuestions(): ?Questions
    {
        return $this->questions;
    }

    public function setQuestions(?Questions $questions): self
    {
        $this->questions = $questions;

        return $this;
    }
}
