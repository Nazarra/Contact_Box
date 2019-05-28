<?php

namespace ContactBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Phone
 *
 * @ORM\Table(name="phone")
 * @ORM\Entity(repositoryClass="ContactBoxBundle\Repository\PhoneRepository")
 */
class Phone
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="businessPhone", type="integer" , nullable=true)
     */
    private $businessPhone;

    /**
     * @var int
     *
     * @ORM\Column(name="privatePhone", type="integer" , nullable=true)
     */
    private $privatePhone;

    /**
     * @var int
     *
     * @ORM\Column(name="otherPhone", type="integer" , nullable=true)
     */
    private $otherPhone;

    /**
     * @ORM\ManyToOne(targetEntity="Contact", inversedBy="phone")
     * @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     */
    private $contact;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set businessPhone
     *
     * @param integer $businessPhone
     *
     * @return Phone
     */
    public function setBusinessPhone($businessPhone)
    {
        $this->businessPhone = $businessPhone;

        return $this;
    }

    /**
     * Get businessPhone
     *
     * @return int
     */
    public function getBusinessPhone()
    {
        return $this->businessPhone;
    }

    /**
     * Set privatePhone
     *
     * @param integer $privatePhone
     *
     * @return Phone
     */
    public function setPrivatePhone($privatePhone)
    {
        $this->privatePhone = $privatePhone;

        return $this;
    }

    /**
     * Get privatePhone
     *
     * @return int
     */
    public function getPrivatePhone()
    {
        return $this->privatePhone;
    }

    /**
     * Set otherPhone
     *
     * @param integer $otherPhone
     *
     * @return Phone
     */
    public function setOtherPhone($otherPhone)
    {
        $this->otherPhone = $otherPhone;

        return $this;
    }

    /**
     * Get otherPhone
     *
     * @return int
     */
    public function getOtherPhone()
    {
        return $this->otherPhone;
    }

    /**
     * Set contact
     *
     * @param \ContactBoxBundle\Entity\Contact $contact
     *
     * @return Phone
     */
    public function setContact(\ContactBoxBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \ContactBoxBundle\Entity\Contact
     */
    public function getContact()
    {
        return $this->contact;
    }
}
