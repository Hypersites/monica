<?php

namespace Hypersites\MonicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;



/**
 * Customer
 *
 * @ORM\Table(name="Customer", uniqueConstraints={@ORM\UniqueConstraint(name="fiscal_identity", columns={"kind_of_customer", "fiscal_document"})})
 * @ORM\Entity(repositoryClass="Hypersites\MonicaBundle\Entity\CustomerRepository")
 */
class Customer
{
	const KINDOFPERSON_COMPANY = 1;

	const KINDOFPERSON_PERSON = 2;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="kind_of_customer", type="smallint")
     */
    private $kindOfCustomer;

    /**
     * @var string
     *
     * @ORM\Column(name="fiscal_document", type="string", length=20)
     */
    private $fiscalDocument;

    /**
     * @var string
     *
     * @ORM\Column(name="indetity_document", type="string", length=255)
     */
    private $indetityDocument;

    /**
     * @var Address
     *
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="customers", cascade={"persist"})
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=14)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="cellphone", type="string", length=14, nullable=true)
     */
    private $cellphone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date")
     */
    private $birthdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Customer", mappedBy="referred_by")
     */
    private $referrals;

    /**
     *
     * @var int
     * @ORM\Column(name="referred_by", nullable=true)
     */

    private $referredBy;

    public function __construct() {
    	$now = new \DateTime();
    	$this->setCreatedAt($now)->setUpdatedAt($now);
    	$referrals = new ArrayCollection();
    	$this->setReferrals($referrals);
    }


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
     * Set name
     *
     * @param string $name
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set kindOfCustomer
     *
     * @param integer $kindOfCustomer
     * @return Customer
     */
    public function setKindOfCustomer($kindOfCustomer)
    {
    	if($kindOfCustomer!=self::KINDOFPERSON_COMPANY && $kindOfCustomer!=self::KINDOFPERSON_PERSON) {
    		throw new \InvalidArgumentException('Invalid Kind of person');
    		return $this;
    	}

    		$this->kindOfCustomer = $kindOfCustomer;

        return $this;
    }

    /**
     * Get kindOfCustomer
     *
     * @return integer
     */
    public function getKindOfCustomer()
    {
        return $this->kindOfCustomer;
    }

    /**
     * Set fiscalDocument
     *
     * @param string $fiscalDocument
     * @return Customer
     */
    public function setFiscalDocument($fiscalDocument)
    {
        $this->fiscalDocument = $fiscalDocument;

        return $this;
    }

    /**
     * Get fiscalDocument
     *
     * @return string
     */
    public function getFiscalDocument()
    {
        return $this->fiscalDocument;
    }

    /**
     * Set indetityDocument
     *
     * @param string $indetityDocument
     * @return Customer
     */
    public function setIndetityDocument($indetityDocument)
    {
        $this->indetityDocument = $indetityDocument;

        return $this;
    }

    /**
     * Get indetityDocument
     *
     * @return string
     */
    public function getIndetityDocument()
    {
        return $this->indetityDocument;
    }

    /**
     * Set address
     *
     * @param \Hypersites\MonicaBundle\Entity\Address $address
     * @return Customer
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Hypersites\MonicaBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Customer
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set cellphone
     *
     * @param string $cellphone
     * @return Customer
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * Get cellphone
     *
     * @return string
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return Customer
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }



    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Customer
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Customer
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getReferredBy()
    {
        return $this->referredBy;
    }

    public function setReferredBy($referredBy)
    {
    	if(!empty($referredBy))
        	$this->referredBy = $referredBy;
        return $this;
    }
	public function getReferrals() {
		return $this->referrals;
	}
	/**
	 * @param ArrayCollection $referrals
	 * @return \Hypersites\MonicaBundle\Entity\Customer
	 */
	public function setReferrals(ArrayCollection $referrals) {
		$this->referrals = $referrals;
		return $this;
	}
	public function addReferral(Customer $referral) {
		$this->getReferrals()->add($referral);

	}


}
