<?php

namespace ContactBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="ContactBoxBundle\Repository\AddressRepository")
 */
class Address
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
     * @ORM\Column(name="city", type="string", length=40 , nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255 , nullable=true)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="hauseNumber", type="string", length=10 , nullable=true)
     */
    private $hauseNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="apartmentNumber", type="string", length=10 , nullable=true)
     */
    private $apartmentNumber;
    /**
     * @ORM\ManyToOne(targetEntity="Contact", inversedBy="address")
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
     * Set city
     *
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set hauseNumber
     *
     * @param string $hauseNumber
     *
     * @return Address
     */
    public function setHauseNumber($hauseNumber)
    {
        $this->hauseNumber = $hauseNumber;

        return $this;
    }

    /**
     * Get hauseNumber
     *
     * @return string
     */
    public function getHauseNumber()
    {
        return $this->hauseNumber;
    }

    /**
     * Set apartmentNumber
     *
     * @param string $apartmentNumber
     *
     * @return Address
     */
    public function setApartmentNumber($apartmentNumber)
    {
        $this->apartmentNumber = $apartmentNumber;

        return $this;
    }

    /**
     * Get apartmentNumber
     *
     * @return string
     */
    public function getApartmentNumber()
    {
        return $this->apartmentNumber;
    }

    /**
     * Set contact
     *
     * @param \ContactBoxBundle\Entity\Contact $contact
     *
     * @return Address
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
