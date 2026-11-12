<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var array $posts */
?>

<div class="app-container">
    <main class="app-main">
        <!-- Hlavička sekcie s tlačidlom na pridanie -->
        <div class="posts-header">
            <h1>Moje príspevky</h1>
            <a href="<?= $link->url('post.add') ?>" class="btn-add">+ Pridať príspevok</a>
        </div>

        <div class="post-grid">
            <?php if (!empty($posts)) : ?>
                <?php foreach ($posts as $post) : ?>
                    <div class="post">
                                                        
                        <!-- Horná časť s kategóriou a akciami -->
                        <div class="post-header">
                            <?php
                                $categoryName = match ($post->getCategoryId()) {
                                    1 => '🚗 ODVOZ',
                                    2 => '🎉 EVENTY',
                                    3 => '📦 POŽIČOVŇA',
                                };
    ?>
                            <span class="badge category"><?= $categoryName ?></span>
                            <div class="post-actions">
                                <button class="btn-icon favourite">🤍</button>

                                <!-- Trojbodkové menu -->
                                <details class="post-menu-details">
                                    <summary class="btn-icon post-menu-summary">⋮</summary>
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
                        </div>

                        <a href="<?= $link->url('post.detail', ['id' => $post->getId()]) ?>" class="post-link">
                            <!-- Obrázok príspevku -->
                            <img src="<?= htmlspecialchars($post->getPhotoPath() ?: 'images/placeholder1.jpg') ?>"
                                alt="Post Image" class="post-image" />

                            <!-- Telo príspevku -->
                            <div class="post-body">
                                <h3 class="post-title"><?= htmlspecialchars($post->getTitle()) ?></h3>

                                <div class="post-meta">
                                    <span>📅 <?= htmlspecialchars(date('d M Y', strtotime($post->getDatePlanned()))) ?></span>
                                    <?php
                                    $time = date('H:i', strtotime($post->getDatePlanned()));
                                    if ($time !== '00:00') :
                                        ?>
                                        <span>🕒 <?= htmlspecialchars($time) ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="post-tags">
                                    <span class="tag">📍 <?= htmlspecialchars($post->getLocation()) ?></span>
                                    <?php if ($post->getCapacity()) : ?>
                                        <span class="tag"><?= htmlspecialchars($post->getCapacity()) ?> miest</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>

                        <!-- Päta príspevku (autor a cena) -->
                        <div class="post-footer">
                            <div class="author-info">
                                <div class="author-profile-pic">KP</div>
                                <span class="author-name">Karolína P. • FRI</span>
                            </div>
                            <div class="price-tag"><?= $post->getPrice() !== null ? htmlspecialchars($post->getPrice()) : '-' ?> €</div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="no-posts-msg">Zatiaľ nemáš žiadne príspevky.</p>
            <?php endif; ?>
        </div>
    </main>
</div>