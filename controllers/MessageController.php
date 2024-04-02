<?php

class MessageController
{

    public function showInbox(): void {
        $view = new View('Inbox');
        $view->render('inbox');
    }

}