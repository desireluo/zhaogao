<?php
declare(strict_types=1);

namespace App\Model;

class UserCs
{
    /** @var int */
    private int $id;

    /** @var string */
    private $name;

    public static function find(int $id): static
    {
        $static = new static();
        $static->setId($id);
        $static->setName(uniqid());
        return $static;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function toArray(): array
    {
        return (array)$this;
    }

    public function __toString(): string
    {
        return $this->getName() . ' ' . $this->getId() . PHP_EOL;
    }
}