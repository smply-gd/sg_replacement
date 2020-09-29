<?php

namespace SG\SgReplacement\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Item extends AbstractEntity
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var string
     */
    protected $searchFor = '';

    /**
     * @var string
     */
    protected $replaceWith = '';

    /**
     * @var bool
     */
    protected $isRegEx = false;

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

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getSearchFor(): string
    {
        return $this->searchFor;
    }

    /**
     * @param string $searchFor
     */
    public function setSearchFor(string $searchFor): void
    {
        $this->searchFor = $searchFor;
    }

    /**
     * @return string
     */
    public function getReplaceWith(): string
    {
        return $this->replaceWith;
    }

    /**
     * @param string $replaceWith
     */
    public function setReplaceWith(string $replaceWith): void
    {
        $this->replaceWith = $replaceWith;
    }

    /**
     * @return bool
     */
    public function isRegEx(): bool
    {
        return $this->isRegEx;
    }

    /**
     * @param bool $isRegEx
     */
    public function setIsRegEx(bool $isRegEx): void
    {
        $this->isRegEx = $isRegEx;
    }
}