<?php

class ConversationController
{
    private $messageManager;

    public function __construct()
    {
        $this->messageManager = new MessageManager();
    }

    public function getSelectedConversation($userId, $receiverId = null)
    {
        $conversations = $this->messageManager->getConversations($userId);
        $firstConversation = reset($conversations);
        $selectedConversation = $firstConversation;

        if ($receiverId) {
            foreach ($conversations as $conversation) {
                if ($conversation['receiver_id'] == $receiverId) {
                    $selectedConversation = $conversation;
                    break;
                }
            }
        }

        return $selectedConversation;
    }
}