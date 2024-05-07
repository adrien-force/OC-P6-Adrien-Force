<?php

class MessageManager extends AbstractEntityManager
{

    public function getConversations(int $userId): array
    {
        $sql = <<<SQL
    SELECT * FROM message WHERE sender_id = :userId OR receiver_id = :userId ORDER BY sent_datetime DESC
    SQL;
        $result = $this->db->query($sql, ['userId' => $userId]);
        $messages = [];

        while ($message = $result->fetch()) {
            $messages[] = new Message($message);
        }

        $conversations = [];
        foreach ($messages as $message) {
            $senderId = $message->getSenderId();
            $receiverId = $message->getReceiverId();
            $otherUserId = $userId === $senderId ? $receiverId : $senderId;

            if (!array_key_exists($otherUserId, $conversations)) {
                $conversations[$otherUserId] = [
                    'receiver_id' => $receiverId,
                    'messages' => [],
                    'lastMessage' => $message->getContent(),
                    'conversationPartnerId' => $otherUserId,
                    'time' => $message->getSentDatetime()->format('H:i'),
                    'last_message' => $message->getContent()
                ];
            }

            $conversations[$otherUserId]['messages'][] = $message;
        }

        return $conversations;
    }


    public function addMessage(Message $message): void
    {
        $sql = <<<SQL
    INSERT INTO message(sender_id, receiver_id, content, is_read, sent_datetime)
    VALUES(:senderId, :receiverId, :content, :isRead, :sentDatetime)
    SQL;
        $this->db->query($sql, [
            'senderId' => $message->getSenderId(),
            'receiverId' => $message->getReceiverId(),
            'content' => $message->getContent(),
            'isRead' => $message->getIsRead(),
            'sentDatetime' => (new DateTime('now'))->format('Y-m-d H:i:s')
        ]);
    }

    public function markAsRead(int $userId, int $otherUserId): void
    {
        $sql = <<<SQL
        UPDATE message SET is_read = true WHERE sender_id = :otherUserId AND receiver_id = :userId
        SQL;
        $this->db->query($sql, ['otherUserId' => $otherUserId, 'userId' => $userId]);
    }

    public function countUnreadMessages(int $userId): int
    {
        $sql = <<<SQL
        SELECT COUNT(*) FROM message WHERE receiver_id = :userId AND is_read = 0
        SQL;
        $result = $this->db->query($sql, ['userId' => $userId]);
        return $result->fetchColumn();
    }

    public function getSelectedConversation(int $userId, int $receiverId = null): array
    {
        $conversations = $this->getConversations($userId);
        $firstConversation = reset($conversations);
        $selectedConversation = $firstConversation;

        if ($receiverId) {
            //Here we select the conversation with the receiverId if it exists
            $found = false;
            foreach ($conversations as $conversation) {
                if ($conversation['receiver_id'] == $receiverId) {
                    $selectedConversation = $conversation;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                //Here we create a new conversation with the receiverId in the case where the conversation does not exist
                $selectedConversation = [
                    'receiver_id' => $receiverId,
                    'conversationPartnerId' => $receiverId,
                    'messages' => []
                ];
            }
        }

        return $selectedConversation;
    }
}