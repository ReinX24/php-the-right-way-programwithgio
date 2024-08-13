<?php

namespace App\Entity;

use App\Enums\InvoiceStatus;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\Table;
use Doctrine\Persistence\Event\LifecycleEventArgs;

#[Entity]
#[Table('products')]
#[HasLifecycleCallbacks]
class Product
{
    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    #[Column]
    private string $title;

    #[Column(type: Types::TEXT)]
    private ?string $description;

    #[Column(type: Types::STRING)]
    private ?string $image;

    #[Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private float $price;

    #[Column(name: 'create_date')]
    private \DateTime $createdDate;

    /**
     * Triggers on the pre persist
     * @param \Doctrine\Persistence\Event\LifecycleEventArgs $args
     * @return void
     */
    #[PrePersist]
    public function onPrePersist(LifecycleEventArgs $args)
    {
        $this->createdDate = new \DateTime();
    }

    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    public function setImage(?string $image)
    {
        $this->image = $image;

        return $this;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;

        return $this;
    }

    public function setCreateDate(\DateTime $createAt)
    {
        $this->createdDate = $createAt;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCreateDate()
    {
        return $this->createdDate->format("m/d/Y h:i:s A");
    }
}