<?php

class Message extends AbstractEntity
{
    private int $senderId;
    private int $receiverId;
    private string $content;
    private bool $isRead;
    private DateTime $sentDatetime;


    public function getSenderId(): int
    {
        return $this->senderId;
    }

    public function setSenderId(int $senderId): void
    {
        $this->senderId = $senderId;
    }

    public function getReceiverId(): int
    {
        return $this->receiverId;
    }

    public function setReceiverId(int $receiverId): void
    {
        $this->receiverId = $receiverId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getIsRead(): int
    {
        return $this->isRead;
    }

    public function setIsRead(int $isRead): void
    {
        $this->isRead = $isRead;
    }

    public function getSentDatetime(): DateTime
    {
        return $this->sentDatetime;
    }

    public function setSentDatetime(DateTime | string $sentDatetime): void
    {
        if (is_string($sentDatetime)) {
            $this->sentDatetime = new DateTime($sentDatetime);
            return;
        }
        $this->sentDatetime = $sentDatetime;
    }
}


