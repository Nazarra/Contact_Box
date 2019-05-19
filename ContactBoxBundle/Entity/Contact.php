<?php

namespace ContactBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="ContactBoxBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="firstName", type="string", length=15)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=15)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    /**
     * @ORM\OneToMany(targetEntity="Address", mappedBy="contact")
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="Email", mappedBy="contact")
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="Phone", mappedBy="contact")
     */
    private $phone;


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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Contact
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Contact
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Contact
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set address
     *
     * @param \ContactBoxBundle\Entity\Address $address
     *
     * @return Contact
     */
    public function setAddress(\ContactBoxBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \ContactBoxBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set email
     *
     * @param \ContactBoxBundle\Entity\Email $email
     *
     * @return Contact
     */
    public function setEmail(\ContactBoxBundle\Entity\Email $email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return \ContactBoxBundle\Entity\Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param \ContactBoxBundle\Entity\Phone $phone
     *
     * @return Contact
     */
    public function setPhone(\ContactBoxBundle\Entity\Phone $phone = null)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return \ContactBoxBundle\Entity\Phone
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->address = new \Doctrine\Common\Collections\ArrayCollection();
        $this->email = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phone = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add address
     *
     * @param \ContactBoxBundle\Entity\Address $address
     *
     * @return Contact
     */
    public function addAddress(\ContactBoxBundle\Entity\Address $address)
    {
        $this->address[] = $address;

        return $this;
    }

    /**
     * Remove address
     *
     * @param \ContactBoxBundle\Entity\Address $address
     */
    public function removeAddress(\ContactBoxBundle\Entity\Address $address)
    {
        $this->address->removeElement($address);
    }

    /**
     * Add email
     *
     * @param \ContactBoxBundle\Entity\Email $email
     *
     * @return Contact
     */
    public function addEmail(\ContactBoxBundle\Entity\Email $email)
    {
        $this->email[] = $email;

        return $this;
    }

    /**
     * Remove email
     *
     * @param \ContactBoxBundle\Entity\Email $email
     */
    public function removeEmail(\ContactBoxBundle\Entity\Email $email)
    {
        $this->email->removeElement($email);
    }

    /**
     * Add phone
     *
     * @param \ContactBoxBundle\Entity\Phone $phone
     *
     * @return Contact
     */
    public function addPhone(\ContactBoxBundle\Entity\Phone $phone)
    {
        $this->phone[] = $phone;

        return $this;
    }

    /**
     * Remove phone
     *
     * @param \ContactBoxBundle\Entity\Phone $phone
     */
    public function removePhone(\ContactBoxBundle\Entity\Phone $phone)
    {
        $this->phone->removeElement($phone);
    }
}
