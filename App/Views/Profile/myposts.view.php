<?php
/** @var \Framework\Support\LinkGenerator $link */
/** @var array $posts */
?>

<div class="app-container">
    <main class="app-main">
        <!-- Hlavička sekcie s tlačidlom na pridanie -->
        <div class="posts-header">
            <h1>Moje príspevky</h1>
            <a href="<?= $link->url('profile.add') ?>" class="btn-add">+ Pridať príspevok</a>
        </div>

        <div class="post-grid">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="post">

                        <!-- Horná časť s kategóriou a akciami -->
                        <div class="post-header">
                            <?php
                            $categoryName = match ($post->getCategoryId()) {
                                1 => '🚗 ODVOZ',
                                2 => '🎉 EVENTY',
                                default => '📦 POŽIČOVŇA',
                            };
                            ?>
                            <span class="badge category"><?= $categoryName ?></span>
                            <div class="post-actions">
                                <button class="btn-icon favourite">🤍</button>

                                <!-- Trojbodkové menu -->
                                <details class="post-menu-details">
                                    <summary class="btn-icon post-menu-summary">⋮</summary>
                                    <div class="post-dropdown-menu">
                                        <a href="<?= $link->url('profile.edit', ['id' => $post->getId()]) ?>"
                                            class="post-dropdown-item">Upraviť</a>
                                        <form method="post" action="<?= $link->url('profile.delete') ?>" style="margin: 0;">
                                            <input type="hidden" name="id" value="<?= $post->getId() ?>">
                                            <button type="submit" class="post-dropdown-item text-danger"
                                                style="background: none; border: none; width: 100%; text-align: left; cursor: pointer;"
                                                onclick="return confirm('Naozaj chceš vymazať tento príspevok?');">
                                                Zmazať
                                            </button>
                                        </form>
                                    </div>
                                </details>
                            </div>
                        </div>

                        <!-- Obrázok príspevku -->
                        <img src="<?= htmlspecialchars($post->getPhotoPath() ?: 'images/placeholder1.jpg') ?>"
                            alt="Placeholder Image" class="post-image" />

                        <!-- Telo príspevku -->
                        <div class="post-body">
                            <h3 class="post-title"><?= htmlspecialchars($post->getTitle()) ?></h3>

                            <div class="post-meta">
                                <span>📅 <?= htmlspecialchars(date('d M Y', strtotime($post->getDatePlanned()))) ?></span>
                                <?php
                                $time = date('H:i', strtotime($post->getDatePlanned()));
                                if ($time !== '00:00'):
                                    ?>
                                    <span>🕒 <?= htmlspecialchars($time) ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="post-tags">
                                <span class="tag">📍 <?= htmlspecialchars($post->getLocation()) ?></span>
                                <?php if ($post->getCapacity()): ?>
                                    <span class="tag"><?= htmlspecialchars($post->getCapacity()) ?> seats left</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Päta príspevku (autor a cena) -->
                        <div class="post-footer">
                            <div class="author-info">
                                <div class="author-profile-pic">KP</div>
                                <span class="author-name">Karolína P. • FRI</span>
                            </div>
                            <div class="price-tag"><?= htmlspecialchars($post->price ?? '5') ?> €</div>
                        </div>

                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-posts-msg">Zatiaľ nemáš žiadne príspevky.</p>
            <?php endif; ?>
        </div>
    </main>
</div>