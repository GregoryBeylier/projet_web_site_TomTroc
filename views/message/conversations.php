<?php require __DIR__ . '/../templates/header.php'; ?>

<div class="messaging_container">

    <div class="conversations_sidebar">
        <h1 class="conversations_title">Messagerie</h1>

        <?php foreach ($conversations as $conversation): ?>
            <a href="index.php?controller=message&action=conversations&id=<?= $conversation->getId() ?>"
                class="conversation_item <?= ($otherId == $conversation->getId()) ? 'active' : '' ?>">
                <img src="/<?= htmlspecialchars($conversation->getProfilePhoto() ?? 'picture/users/default_profile.png') ?>"
                    alt="photo" class="conversation_avatar">
                <div class="conversation_info">
                    <div class="conversation_info_top">
                        <span class="conversation_pseudo"><?= htmlspecialchars($conversation->getPseudo()) ?></span>
                        <span class="conversation_time">15:43</span>
                    </div>
                    <span class="conversation_preview">
                        <?= htmlspecialchars($conversation->getLastMessage() ?? '') ?>
                    </span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="thread_container">
        <?php if ($otherUser): ?>

            <div class="thread_header">
                <img src="/<?= htmlspecialchars($otherUser->getProfilePhoto() ?? 'picture/users/default_profile.png') ?>"
                    alt="photo" class="conversation_avatar">
                <span class="thread_pseudo"><?= htmlspecialchars($otherUser->getPseudo()) ?></span>
            </div>

            <div class="thread_messages">
                <?php foreach ($messages as $message): ?>
                    <div class="message_bubble <?= ($message->getSenderId() == $_SESSION['user_id']) ? 'message_sent' : 'message_received' ?>">
                        <?php if ($message->getSenderId() != $_SESSION['user_id']): ?>
                            <div class="message_received_wrapper">
                                <div class="message_meta">
                                    <img src="/<?= htmlspecialchars($otherUser->getProfilePhoto() ?? 'picture/users/default_profile.png') ?>"
                                        alt="photo" class="message_avatar">
                                    <span class="message_time"><?= date('H:i d.m', strtotime($message->getCreatedAt())) ?></span>
                                </div>
                                <div class="message_content">
                                    <p><?= htmlspecialchars($message->getContent()) ?></p>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="message_content">
                                <span class="message_time"><?= date('H:i d.m', strtotime($message->getCreatedAt())) ?></span>
                                <p><?= htmlspecialchars($message->getContent()) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <form action="index.php?controller=message&action=send" method="post" class="thread_form">
                <input type="hidden" name="receiver_id" value="<?= $otherId ?>">
                <input type="hidden" name="redirect_to" value="conversations">
                <input type="text" name="content" placeholder="Tapez votre message ici" class="thread_input" required>
                <button type="submit" class="thread_send_btn">Envoyer</button>
            </form>

        <?php else: ?>
            <div class="thread_empty">
                <p>Sélectionnez une conversation</p>
            </div>
        <?php endif; ?>
    </div>

</div>

<?php require __DIR__ . '/../templates/footer.php'; ?>