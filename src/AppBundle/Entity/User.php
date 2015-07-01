<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User  
 * 
 * @ORM\Table() 
 * @ORM\Entity 
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Customer", mappedBy="user")
     */
    protected $customers;

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->customers = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set id
     *
     * @return integer 
     */
    public function setId($id) {
        $this->id = $id;
    }


    /**
     * Add customers
     *
     * @param \AppBundle\Entity\Customer $customers
     * @return User
     */
    public function addCustomer(\AppBundle\Entity\Customer $customers)
    {
        $this->customers[] = $customers;

        return $this;
    }

    /**
     * Remove customers
     *
     * @param \AppBundle\Entity\Customer $customers
     */
    public function removeCustomer(\AppBundle\Entity\Customer $customers)
    {
        $this->customers->removeElement($customers);
    }

    /**
     * Get customers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCustomers()
    {
        return $this->customers;
    }
}
