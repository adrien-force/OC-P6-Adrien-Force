<?php

class MessageController
{
    private MessageManager $messageManager;

    public function __construct()
    {
        $this->messageManager = new MessageManager();
    }

    public function showInbox(): void {
        $conversations = $this->messageManager->getConversations($_SESSION['userId']);
        $selectedConversation = $this->messageManager->getSelectedConversation($_SESSION['userId'], $_GET['receiver_id'] ?? null);

        if ($selectedConversation) {
            $this->messageManager->markAsRead($_SESSION['userId'], $selectedConversation['conversationPartnerId']);
        }

        $view = new View("inbox");
        $view->render('inbox', ['conversations' => $conversations, 'selectedConversation' => $selectedConversation]);
    }

    public function sendMessage(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content'], $_POST['receiver_id'])) {
            $message = new Message([
                'sender_id' => $_SESSION['userId'],
                'receiver_id' => $_POST['receiver_id'],
                'content' => $_POST['content'],
                'is_read' => 0, // Set 'is_read' to 0 instead of false
                'sent_datetime' => new DateTime()
            ]);

            $this->messageManager->addMessage($message);

            header('Location: ?action=showInbox&receiver_id=' . $_POST['receiver_id']);
        }
    }

}
