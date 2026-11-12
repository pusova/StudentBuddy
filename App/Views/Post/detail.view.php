<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Post $post */
/** @var array $comments*/

?>

<div class="post-detail-wrapper">
    <article class="post-detail-card">
        
        <!-- Horná lišta s kategóriou a akciami -->
        <header class="post-detail-header">
            <?php
                $categoryName = match ($post->getCategoryId()) {
                    1 => '🚗 ODVOZ',
                    2 => '🎉 EVENTY',
                    3 => '📦 POŽIČOVŇA',
                };
            ?>
            <span class="category-badge"><?= $categoryName ?></span>
            <div class="post-detail-actions">
                <details class="post-menu-details">
                    <summary class="icon-button menu-trigger">⋮</summary>
                    <div class="post-dropdown-menu">
                        <a href="<?= $link->url('post.edit', ['id' => $post->getId()]) ?>"
                            class="post-dropdown-item">Upraviť</a>
                        <form method="post" action="<?= $link->url('post.delete') ?>">
                            <input type="hidden" name="id" value="<?= $post->getId() ?>">
                            <button type="submit" class="post-dropdown-item text-danger">
                                Zmazať
                            </button>
                        </form>
                    </div>
                </details>
            </div>
        </header>

        <!-- Obrázok príspevku -->
        <div class="post-detail-image-container">
            <img src="<?= htmlspecialchars($post->getPhotoPath() ?: 'images/placeholder1.jpg') ?>"
                alt="Post Image" class="post-detail-image">
        </div>

        <!-- Hlavné informácie o príspevku -->
        <div class="post-detail-content">
            <h1 class="post-detail-title"><?= htmlspecialchars($post->getTitle()) ?></h1>
            <p class="post-detail-description">
                <?= htmlspecialchars($post->getDescription()) ?>
            </p>

            <div class="post-detail-meta">
                <span>📅 <?= htmlspecialchars(date('d M Y', strtotime($post->getDatePlanned()))) ?></span>
                <span>🕒 <?= htmlspecialchars(date('H:i', strtotime($post->getDatePlanned()))) ?></span>
            </div>

            <div class="post-detail-tags">
                <span class="info-tag">📍 <?= htmlspecialchars($post->getLocation()) ?></span>
                <span class="info-tag"><?= htmlspecialchars($post->getCapacity()) ?> seats left</span>
            </div>
        </div>

        <!-- Päta karty (autor a cena) -->
        <div class="post-detail-footer">
            <div class="author-box">
                <div class="author-avatar">KP</div>
                <span class="author-details">Karolína P. • FRI</span>
            </div>
            <div class="price-badge"><?= $post->getPrice() !== null ? htmlspecialchars($post->getPrice()) : '-' ?> €</div>
        </div>

        <!-- Sekcia komentárov -->
        <section class="comments-section">
            
            <h2 class="comments-heading">Comments (<?= $comments !== null ? count($comments) : 0 ?>)</h2>

            <div class="comments-list">
                <?php if (count($comments) === 0) : ?>
                    <p class="no-comments">No comments yet. Be the first to comment!</p>
                <?php else : ?>
                    <?php foreach ($comments as $comment) : ?>
                        <div class="comment-body">
                            <!-- Hidden checkbox placed at the top level of comment-body -->
                            <input type="checkbox" id="edit-toggle-<?= $comment->getId() ?>" class="edit-toggle-checkbox">

                            <div class="comment-header">
                                <div class="comment-author-avatar">KP</div>
                                <span class="comment-author">Karolína P.</span>
                                <div class="comment-actions">
                                    <details class="comment-menu-details">
                                        <summary class="icon-button comment-menu-trigger">⋮</summary>
                                        <div class="comment-dropdown-menu">
                                            <!-- Label acts as the Edit button and toggles the checkbox above -->
                                            <label for="edit-toggle-<?= $comment->getId() ?>" class="comment-dropdown-item">Edit</label>
                                            
                                            <form method="post" action="<?= $link->url('post.deleteComment', ['id' => $comment->getId()]) ?>" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                                <input type="hidden" name="id" value="<?= $comment->getId() ?>">
                                                <button type="submit" class="comment-dropdown-item text-danger">Delete</button>
                                            </form>
                                        </div>
                                    </details>
                                </div>
                            </div>

                            <!-- Normal Comment Text -->
                            <p class="comment-text"><?= htmlspecialchars($comment->getContent()) ?></p>

                            <!-- Hidden Edit Form -->
                            <form method="post" action="<?= $link->url('post.editComment', ['id' => $comment->getId()]) ?>" class="comment-edit-form">
                                <input type="hidden" name="id" value="<?= $comment->getId() ?>">
                                <textarea name="content" required><?= htmlspecialchars($comment->getContent()) ?></textarea>
                                <div class="edit-form-actions">
                                    <button type="submit" class="btn-save">Save</button>
                                    <label for="edit-toggle-<?= $comment->getId() ?>" class="btn-cancel">Cancel</label>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- Formulár na pridanie komentára -->
            <form method="post" action="<?= $link->url('post.comment', ['id' => $post->getId()]) ?>" class="comment-form">
                <input type="text" name="content" class="comment-input" placeholder="Write a comment..." required>
                <button type="submit" class="comment-submit-button">Post</button>
            </form>
        </section>
    </article>
</div>