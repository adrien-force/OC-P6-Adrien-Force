<?php

class ConversationController
{
    private $messageManager;

    public function __construct()
    {
        $this->messageManager = new MessageManager();
    }

    public function getSelectedConversation(int $userId, int $receiverId = null): array
    {
        $conversations = $this->messageManager->getConversations($userId);
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