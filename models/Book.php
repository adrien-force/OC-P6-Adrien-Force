<?php

class Book extends AbstractEntity
{
    private string $title;
    private string $author;
    private string $description;
    private DateTime $printDate;
    private string $owner; //FIXME : string for now but need a change to int -> gonna match userId later on
    private string $availability;
    private string $picturePath;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrintDate(): DateTime
    {
        return $this->printDate;
    }

    public function setPrintDate(DateTime $printDate): void
    {
        $this->printDate = $printDate;
    }

    public function getOwner(): string
    {
        return $this->owner;
    }

    public function setOwner(string $owner): void
    {
        $this->owner = $owner;
    }

    public function getAvailability(): string
    {
        return $this->availability;
    }

    public function setAvailability(string $availability): void
    {
        $this->availability = $availability;
    }

    public function getPicturePath(): string
    {
        return $this->picturePath;
    }

    public function setPicturePath(string $picturePath): void
    {
        $this->picturePath = $picturePath;
    }

}