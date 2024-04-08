<?php /* Cette page sert à afficher les differentes conversations de l'utilisateur et les messages associés */ ?>
<?php if (isset($_SESSION['userId']) && isset($conversations) && isset($selectedConversation)):
    ?>

    <div class="inboxPage">

        <div class="bgOverflow">

            <div class="inboxPageContent">

                <div class="conversationSide">
                    <div class="conversationSideTitle"><h2> Messagerie </h2></div>
                    <div class="conversations">
<!--                        TODO conversation selection color-->
                        <?php
                        foreach ($conversations as $otherUserId => $conversation) {
                            $lastMessage = $conversation['lastMessage'];
                            $conversationPartnerId =  UserManager::getUsernameByOwnerId(($conversation['conversationPartnerId']));
                            $time = $conversation['time'];
                            $last_message = $conversation['last_message'];
                            ?>
                            <a href="?action=showInbox&receiver_id=<?= $conversation['conversationPartnerId'] ?>" class="conversation <?php echo $selectedConversation == $otherUserId ? 'selected' : '' ?>">
                                <img src="<?php echo UserManager::getProfilePictureByOwnerId($conversation['conversationPartnerId']); ?>">
                                <div class="conversationInfos">
                                    <div class="conversationInfoTop">
                                        <h3 class="conversationPseudo"> <?php echo $conversationPartnerId; ?> </h3>
                                        <h3 class="conversationTime"> <?php echo $time; ?> </h3>
                                    </div>
                                    <div class="conversationInfoBot">
                                        <h4> <?php echo $last_message; ?> </h4>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>

                <div class="messageSide">
                    <div class="messageTop">
                        <img src="<?php echo UserManager::getProfilePictureByOwnerId($selectedConversation['receiver_id']); ?>">
                        <h2> <?php echo UserManager::getUsernameByOwnerId($selectedConversation['receiver_id']); ?> </h2>
                    </div>
                    <div class="messages">
                        <?php foreach ($selectedConversation['messages'] as $message): ?>
                            <div class="<?php echo $message->getSenderId() == $_SESSION['userId'] ? 'messageSentBox' : 'messageReceivedBox' ?>">
                                <div class="messageSentInfos">
                                    <h3> <?php echo $message->getSentDatetime()->format('Y-m-d H:i:s'); ?> </h3>
                                </div>
                                <div class="messageSentContent">
                                    <h4> <?php echo $message->getContent(); ?> </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="messageBot">
                        <form action="?action=sendMessage" method="post">
                            <input type="hidden" name="receiver_id" value="<?php echo $selectedConversation['receiver_id']; ?>">
                            <input type="text" name="content" placeholder="Ecrivez un message...">
                            <button type="submit" class="mainButton"> Envoyer </button>
                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div>
<?php endif; ?>