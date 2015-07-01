<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class Question {

    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Test", inversedBy="questions")
     *
     * @var AppBundle\Entity\Test;
     */
    public $test;
    
    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Answer", mappedBy="question")
     */
    public $answers;
    
    
    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FileQuestion", mappedBy="question")
     */
    public $files;

    /**
     * @var string $question
     *
     * @ORM\Column(name="question", type="string", length=255)
     */
    public $question;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    public $description;

    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=65535)
     */
    public $type;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }
 

    /**
     * Set question
     *
     * @param string $question
     * @return Question
     */
    public function setQuestion($question) {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion() {
        return $this->question;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Question
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

    /**
     * Set type
     *
     * @param string $type
     * @return Question
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType() {
        return $this->type;
    }

    public function __toString() {
        return $this->question;
    }


    /**
     * Set test_id
     *
     * @param \AppBundle\Entity\Test $testId
     * @return Question
     */
    public function setTestId(\AppBundle\Entity\Test $testId = null)
    {
        $this->test_id = $testId;

        return $this;
    }

    /**
     * Get test_id
     *
     * @return \AppBundle\Entity\Test 
     */
    public function getTestId()
    {
        return $this->test_id;
    }

    /**
     * Set test
     *
     * @param \AppBundle\Entity\Test $test
     * @return Question
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->files = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add answers
     *
     * @param \AppBundle\Entity\Answer $answers
     * @return Question
     */
    public function addAnswer(\AppBundle\Entity\Answer $answers)
    {
        $this->answers[] = $answers;

        return $this;
    }

    /**
     * Remove answers
     *
     * @param \AppBundle\Entity\Answer $answers
     */
    public function removeAnswer(\AppBundle\Entity\Answer $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnswers()
    {
        return $this->answers;
    }

 

    /**
     * Add fileQuestion
     *
     * @param \AppBundle\Entity\FileQuestion $fileQuestion
     * @return Question
     */
    public function addFileQuestion(\AppBundle\Entity\FileQuestion $fileQuestion)
    {
        $this->fileQuestion[] = $fileQuestion;

        return $this;
    }

    /**
     * Remove fileQuestion
     *
     * @param \AppBundle\Entity\FileQuestion $fileQuestion
     */
    public function removeFileQuestion(\AppBundle\Entity\FileQuestion $fileQuestion)
    {
        $this->fileQuestion->removeElement($fileQuestion);
    }

    /**
     * Get fileQuestion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFileQuestion()
    {
        return $this->fileQuestion;
    }

    /**
     * Add files
     *
     * @param \AppBundle\Entity\FileQuestion $files
     * @return Question
     */
    public function addFile(\AppBundle\Entity\FileQuestion $files)
    {
        $this->files[] = $files;

        return $this;
    }

    /**
     * Remove files
     *
     * @param \AppBundle\Entity\FileQuestion $files
     */
    public function removeFile(\AppBundle\Entity\FileQuestion $files)
    {
        $this->files->removeElement($files);
    }

    /**
     * Get files
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFiles()
    {
        return $this->files;
    }
}
