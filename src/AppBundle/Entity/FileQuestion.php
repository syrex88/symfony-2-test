<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Table()
 * @ORM\Entity
 * 
 * @Vich\Uploadable
 */
class FileQuestion {

    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question", inversedBy="files")
     *
     * @var AppBundle\Entity\Question;
     */
    public $question;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=65535)
     */
    protected $name;

    /**
     * @var string $nameFile
     *
     * @ORM\Column( type="string", length=65535, name="name_file")
     */
    protected $nameFile;

    /**
     * @Vich\UploadableField(mapping="files", fileNameProperty="nameFile")
     * @var File $objFile
     */
    protected $objFile;

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     */
    public function setObjFile(File $file = null) {
        $this->objFile = $file;
    }

    /**
     *  @return File 
     */
    public function getObjFile() {
        return $this->objFile;
    }

    /**
     * @var text $description
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    protected $type;

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
     * @param string $questionId
     * @return Files
     */
    public function setQuestionId($questionId) {
        $this->question_id = $questionId;

        return $this;
    }

    /**
     * Get question_id
     *
     * @return string 
     */
    public function getQuestionId() {
        return $this->question_id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Files
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Files
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

    /**
     * Set question
     *
     * @param \AppBundle\Entity\Question $question
     * @return File
     */
    public function setQuestion(\AppBundle\Entity\Question $question = null) {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \AppBundle\Entity\Question 
     */
    public function getQuestion() {
        return $this->question;
    }

    /**
     * Set nameFile
     *
     * @param string $nameFile
     * @return FileQuestion
     */
    public function setNameFile($nameFile) {
        $this->nameFile = $nameFile;

        return $this;
    }

    /**
     * Get nameFile
     *
     * @return string 
     */
    public function getNameFile() {
        return $this->nameFile;
    }

    public function __toString() {
        return $this->nameFile;
    }

}
