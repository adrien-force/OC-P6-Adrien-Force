<?php /* Cette page sert à afficher les differentes conversations de l'utilisateur et les messages associés */ ?>
<?php if (isset($_SESSION['userId']) && isset($conversations) && isset($selectedConversation)):
    ?>

    <div class="inboxPage">

        <div class="bgOverflow">

            <div class="inboxPageContent">

                <div class="conversationSide">
                    <div class="conversationSideTitle"><h2> Messagerie </h2></div>
                    <div class="conversations">
                        <?php
                        foreach ($conversations as $otherUserId => $conversation) {
                            ?>
                            <a href="?action=showInbox&receiver_id=<?= $conversation['conversationPartnerId'] ?>" class="conversation <?php if (isset($_GET['receiver_id'])) { echo $conversation['conversationPartnerId'] == $_GET['receiver_id'] ? 'selected' : '' ;}?>">
                                <img src="<?php echo UserManager::getProfilePictureByOwnerId($conversation['conversationPartnerId']); ?>" alt="Photo de profil de <?= UserManager::getUsernameByOwnerId($conversation['conversationPartnerId'])?>">
                                <div class="conversationInfos">
                                    <div class="conversationInfoTop">
                                        <h3 class="conversationPseudo"> <?php echo UserManager::getUsernameByOwnerId(($conversation['conversationPartnerId'])); ?> </h3>
                                        <h3 class="conversationTime"> <?php echo $conversation['time']; ?> </h3>
                                    </div>
                                    <div class="conversationInfoBot">
                                        <h4 class="lastMessage"> <?php echo $conversation['lastMessage']; ?> </h4>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>

                <div class="messageSide">
                    <div class="messageTop">
                        <img src="<?php echo UserManager::getProfilePictureByOwnerId($selectedConversation['receiver_id']); ?>" alt="Photo de profil de <?= UserManager::getUsernameByOwnerId($conversation['conversationPartnerId'])?>">
                        <h2> <?php echo UserManager::getUsernameByOwnerId($selectedConversation['receiver_id']); ?> </h2>
                    </div>
                    <div class="messages">
                        <?php foreach ($selectedConversation['messages'] as $message): ?>
                            <div class="<?php echo $message->getSenderId() == $_SESSION['userId'] ? 'messageSentBox' : 'messageReceivedBox' ?>">
                                <div class="messageSentInfos">
                                    <h3> <?php echo $message->getSentDatetime()->format('d.m H:i'); ?> </h3>
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