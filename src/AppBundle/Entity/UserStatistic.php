<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class UserStatistic {

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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Test", inversedBy="questions")
     *
     * @var AppBundle\Entity\Test;
     */
    public $test;
    
    /**
     * @var string $countAnswers
     *
     * @ORM\Column(name="count_answers", type="integer")
     */
    public $countAnswers;
    
    /**
     * @var string $countTrueAnswers
     *
     * @ORM\Column(name="count_true_answers", type="integer")
     */
    public $countTrueAnswers;
    

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
     * Set countAnswers
     *
     * @param integer $countAnswers
     * @return UserStatistic
     */
    public function setCountAnswers($countAnswers)
    {
        $this->countAnswers = $countAnswers;

        return $this;
    }

    /**
     * Get countAnswers
     *
     * @return integer 
     */
    public function getCountAnswers()
    {
        return $this->countAnswers;
    }

    /**
     * Set countTrueAnswers
     *
     * @param integer $countTrueAnswers
     * @return UserStatistic
     */
    public function setCountTrueAnswers($countTrueAnswers)
    {
        $this->countTrueAnswers = $countTrueAnswers;

        return $this;
    }

    /**
     * Get countTrueAnswers
     *
     * @return integer 
     */
    public function getCountTrueAnswers()
    {
        return $this->countTrueAnswers;
    }

    

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return UserStatistic
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
     * Set test
     *
     * @param \AppBundle\Entity\Test $test
     * @return UserStatistic
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
