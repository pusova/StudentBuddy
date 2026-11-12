<?php

/** @var \App\Models\Post $post */
/** @var Framework\Support\LinkGenerator $link */
?>

<div class="app-container">
    <main class="app-main">
        <h1 class="form-main-title"><?= $post->getId() ? 'Upraviť príspevok' : 'Nový príspevok' ?></h1>

        <form method="post" action="<?= $link->url('post.save') ?>" class="post-form">

            <!-- Skryté ID pre rozlíšenie editácie -->
            <input type="hidden" name="id" value="<?= $post->getId() ?>">

            <!-- Kategória -->
            <div class="form-group">
                <label for="category_id" class="form-label">Kategória</label>
                <select class="form-input" name="category_id" id="category_id" required>
                    <option value="1" <?= $post->getCategoryId() == 1 ? 'selected' : '' ?>>🚗 Odvoz</option>
                    <option value="2" <?= $post->getCategoryId() == 2 ? 'selected' : '' ?>>🎉 Eventy</option>
                    <option value="3" <?= $post->getCategoryId() == 3 ? 'selected' : '' ?>>📦 Požičovňa</option>
                </select>
            </div>

            <!-- Nadpis / Názov -->
            <div class="form-group">
                <label for="title" class="form-label">Názov príspevku</label>
                <input type="text" class="form-input" name="title" id="title" value="<?= e($post->getTitle()) ?>" required>
            </div>

            <!-- Popis -->
            <div class="form-group">
                <label for="description" class="form-label">Popis</label>
                <textarea class="form-input form-textarea" name="description" id="description" rows="4" required><?= e($post->getDescription()) ?></textarea>
            </div>

            <!-- Lokalita -->
            <div class="form-group">
                <label for="location" class="form-label">Lokalita</label>
                <input type="text" class="form-input" name="location" id="location" value="<?= e($post->getLocation()) ?>" required>
            </div>

            <!-- Plánovaný dátum a čas -->
            <div class="form-group">
                <label for="date_planned" class="form-label">Plánovaný dátum a čas</label>
                <input type="datetime-local" class="form-input" name="date_planned" id="date_planned" value="<?= e($post->getDatePlanned()) ?>">
            </div>

            <!-- Kapacita / Voľné miesta -->
            <div class="form-group">
                <label for="capacity" class="form-label">Kapacita (voľné miesta)</label>
                <input type="number" class="form-input" name="capacity" id="capacity" value="<?= e($post->getCapacity()) ?>">
            </div>

            <!-- Cesta k fotke / Placeholder -->
            <div class="form-group">
                <label for="photo_path" class="form-label">URL obrázka (nepovinné)</label>
                <input type="text" class="form-input" name="photo_path" id="photo_path" value="<?= e($post->getPhotoPath()) ?>">
            </div>

            <!-- Cena -->
            <div class="form-group">
                <label for="price" class="form-label">Cena (nepovinné)</label>
                <input type="number" step="0.01" class="form-input" name="price" id="price" value="<?= e($post->getPrice()) ?>">
            </div>

            <button type="submit" class="form-submit-btn">Uložiť príspevok</button>
        </form>
    </main>
</div>