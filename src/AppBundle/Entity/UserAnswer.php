<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class UserAnswer
{
    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    public $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Answer")
     *
     * @var AppBundle\Entity\Answer;
     */
    public $answer;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question")
     *
     * @var AppBundle\Entity\Question;
     */
    public $question;

    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Test")
     *
     * @var AppBundle\Entity\Test;
     */
    
    public $test;
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set answer_id
     *
     * @param string $answerId
     * @return UserAnswer
     */
    public function setAnswerId($answerId)
    {
        $this->answer_id = $answerId;

        return $this;
    }

    /**
     * Get answer_id
     *
     * @return string 
     */
    public function getAnswerId()
    {
        return $this->answer_id;
    }

   


    /**
     * Set user_id
     *
     * @param \AppBundle\Entity\User $userId
     * @return UserAnswer
     */
    public function setUserId(\AppBundle\Entity\User $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return UserAnswer
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set answer
     *
     * @param \AppBundle\Entity\Answer $answer
     * @return UserAnswer
     */
    public function setAnswer(\AppBundle\Entity\Answer $answer = null)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return \AppBundle\Entity\Answer 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set question
     *
     * @param \AppBundle\Entity\Question $question
     * @return UserAnswer
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
     * Set test
     *
     * @param \AppBundle\Entity\Test $test
     * @return UserAnswer
     */
    public function setTest(\AppBundle\Entity\Test $test = null)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Get test
     *
     * @return \AppBundle\Entity\Test 
     */
    public function getTest()
    {
        return $this->test;
    }
}
