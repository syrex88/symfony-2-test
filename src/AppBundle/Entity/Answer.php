<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table()
 * @ORM\Entity
 */
class Answer {

    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question", inversedBy="answers")
     *
     * @var AppBundle\Entity\Question;
     */
    public $question;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="string", length=65535)
     */
    public $description;

    /**
     * @var boolean
     * @ORM\Column(name="true_answer", type="boolean")
     */
    protected $true_answer;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set question_id
     *
     * @param integer $questionId
     * @return Answer
     */
    public function setQuestionId($questionId) {
        $this->question_id = $questionId;

        return $this;
    }

    /**
     * Get question_id
     *
     * @return integer 
     */
    public function getQuestionId() {
        return $this->question_id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Answer
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    public function __toString() {
        return $this->description;
    }


    /**
     * Set question
     *
     * @param \AppBundle\Entity\Question $question
     * @return Answer
     */
    public function setQuestion(\AppBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \AppBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set true
     *
     * @param boolean $true
     * @return Answer
     */
    public function setTrue($true)
    {
        $this->true = $true;

        return $this;
    }

    /**
     * Get true
     *
     * @return boolean 
     */
    public function getTrue()
    {
        return $this->true;
    }

    /**
     * Set true_answer
     *
     * @param boolean $trueAnswer
     * @return Answer
     */
    public function setTrueAnswer($trueAnswer)
    {
        $this->true_answer = $trueAnswer;

        return $this;
    }

    /**
     * Get true_answer
     *
     * @return boolean 
     */
    public function getTrueAnswer()
    {
        return $this->true_answer;
    }
}
