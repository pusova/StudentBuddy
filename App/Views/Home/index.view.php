<?php

/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="app-container">
    <aside class="filters-panel" id="filtersPanel">
        <div class="hide-filters">
            <button class="filter-button" title="Hide filters">
                Hide Filters
            </button>
        </div>
        <div class="filter-group">
            <h3>Category</h3>
            <label><input type="checkbox" checked /> All</label>
            <label><input type="checkbox" /> ODVOZ</label>
            <label><input type="checkbox" /> POŽIČOVŇA</label>
            <label><input type="checkbox" /> EVENTY</label>
        </div>

        <div class="filter-group">
            <h3>Location</h3>
            <label><input type="checkbox" /> Veľký Diel</label>
            <label><input type="checkbox" /> Hliny</label>
            <label><input type="checkbox" /> FPEDAS</label>
        </div>

        <div class="filter-group">
            <h3>Availability</h3>
            <label><input type="checkbox" checked /> Available Only</label>
        </div>

        <button class="reset-filter-btn">Reset Filter</button>
    </aside>

    <!-- Hlavný obsahový priestor -->
    <main class="app-main">
        <section class="hero-section">
            <h2>Tvoj kampus, prepojený.</h2>
            <p>
                Zdieľaj jazdu, požičaj, čo potrebuješ, alebo sa spoznaj nových ľudí.
            </p>
        </section>

        <div class="feed-controls">
            <div class="filter-container">
                <button class="filter-button" title="Show filters">
                    Show filters
                </button>
            </div>
            <div class="bottom-row">
                <div class="active-filters">
                    <span class="filter-tag">Všetko <button>×</button></span>
                    <span class="filter-tag">Dostupné <button>×</button></span>
                </div>
                <div class="sort-container" title="Sort by">
                    <label for="sort">Zoradiť podľa:</label>
                    <select id="sort">
                        <option>Newest</option>
                        <option>Oldest</option>
                        <option>Price: ^</option>
                        <option>Price: v</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="post-grid">
                <div class="post">
                    <div class="post-header">
                        <span class="badge category">
                            🚗 ODVOZ
                        </span>
                        <div class="post-actions">
                            <button class="btn-icon favourite">🤍</button>
                            <button class="btn-icon">⋮</button>
                        </div>
                    </div>

                    <img src="images\placeholder1.jpg" alt="Placeholder Image" class="post-image" />

                    <div class="post-body">
                        <h3 class="post-title">Odvoz Žilina ➔ Bratislava</h3>

                        <div class="post-meta">
                            <span>📅 16 Oct 2026</span>
                            <span>🕒 15:30</span>
                        </div>

                        <div class="post-tags">
                            <span class="tag">📍 Žilina</span>
                            <span class="tag">2 seats left</span>
                        </div>
                    </div>

                    <div class="post-footer">
                        <div class="author-info">
                            <div class="author-profile-pic">PM</div>
                            <span class="author-name">Peter M. • FRI</span>
                        </div>
                        <div class="price-tag">5 €</div>
                    </div>
                </div>

                <div class="post">
                    <div class="post-header">
                        <span class="badge category">
                            📚 POŽIČOVŇA
                        </span>
                        <div class="post-actions">
                            <button class="btn-icon favourite">🤍</button>
                            <button class="btn-icon">⋮</button>
                        </div>
                    </div>

                    <img src="images\placeholder1.jpg" alt="Placeholder Image" class="post-image" />

                    <div class="post-body">
                        <h3 class="post-title">Požičanie bicykla</h3>

                        <div class="post-meta">
                            <span>📅 18 Oct 2026</span>
                            <span>🕒 10:00</span>
                        </div>

                        <div class="post-tags">
                            <span class="tag">📍 FPEDAS</span>
                            <span class="tag">Available</span>
                        </div>
                    </div>

                    <div class="post-footer">
                        <div class="author-info">
                            <div class="author-profile-pic">LK</div>
                            <span class="author-name">Lukáš K. • FRI</span>
                        </div>
                        <div class="price-tag">2 € / day</div>
                    </div>
            </div>
        </div>
    </main>
</div>