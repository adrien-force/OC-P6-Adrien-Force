<?php

class Message extends AbstractEntity
{
    private string $content;
    private int $idFrom;
    private int $idTo;
    private DateTime $postDate;
    private string $status;

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getIdFrom(): int
    {
        return $this->idFrom;
    }

    public function setIdFrom(int $idFrom): void
    {
        $this->idFrom = $idFrom;
    }

    public function getIdTo(): int
    {
        return $this->idTo;
    }

    public function setIdTo(int $idTo): void
    {
        $this->idTo = $idTo;
    }

    public function getPostDate(): DateTime
    {
        return $this->postDate;
    }

    public function setPostDate(DateTime $postDate): void
    {
        $this->postDate = $postDate;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

}


