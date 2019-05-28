<?php

namespace ContactBoxBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Email
 *
 * @ORM\Table(name="email")
 * @ORM\Entity(repositoryClass="ContactBoxBundle\Repository\EmailRepository")
 */
class Email
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
     * @var string
     *
     * @ORM\Column(name="businessEmail", type="string", length=255 , nullable=true)
     */
    private $businessEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="privateEmail", type="string", length=255 , nullable=true)
     */
    private $privateEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="otherEmail", type="string", length=255 , nullable=true)
     */
    private $otherEmail;

    /**
     * @ORM\ManyToOne(targetEntity="Contact", inversedBy="email")
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
     * Set businessEmail
     *
     * @param string $businessEmail
     *
     * @return Email
     */
    public function setBusinessEmail($businessEmail)
    {
        $this->businessEmail = $businessEmail;

        return $this;
    }

    /**
     * Get businessEmail
     *
     * @return string
     */
    public function getBusinessEmail()
    {
        return $this->businessEmail;
    }

    /**
     * Set privateEmail
     *
     * @param string $privateEmail
     *
     * @return Email
     */
    public function setPrivateEmail($privateEmail)
    {
        $this->privateEmail = $privateEmail;

        return $this;
    }

    /**
     * Get privateEmail
     *
     * @return string
     */
    public function getPrivateEmail()
    {
        return $this->privateEmail;
    }

    /**
     * Set otherEmail
     *
     * @param string $otherEmail
     *
     * @return Email
     */
    public function setOtherEmail($otherEmail)
    {
        $this->otherEmail = $otherEmail;

        return $this;
    }

    /**
     * Get otherEmail
     *
     * @return string
     */
    public function getOtherEmail()
    {
        return $this->otherEmail;
    }

    /**
     * Set contact
     *
     * @param \ContactBoxBundle\Entity\Contact $contact
     *
     * @return Email
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
