<?php

declare(strict_types=1);

/** @var array<string, mixed> $page */
/** @var string $basePath */

$basePath = '';
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '/index.php';
$baseDir = str_replace('\\', '/', dirname($scriptName));
if ($baseDir !== '.' && $baseDir !== '/') {
    $basePath = $baseDir;
}

$assetUrl = static function (string $path) use ($basePath): string {
    return ($basePath !== '' ? $basePath : '') . '/' . ltrim($path, '/');
};

$submittedBanner = $page['submitted']
    ? 'Your demo settings were captured locally. Edit the form to update the preview.'
    : 'Use the form to preview how a small PHP interaction can slot into the starter shell.';
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string) $page['title']) ?></title>
    <meta name="description" content="<?= htmlspecialchars((string) $page['description']) ?>">
    <meta name="theme-color" content="#EDECEC">
    <link rel="stylesheet" href="<?= htmlspecialchars($assetUrl('assets/css/styles.css')) ?>">
    <script defer src="<?= htmlspecialchars($assetUrl('assets/js/app.js')) ?>"></script>
</head>
<body>
    <div class="page-bg"></div>
    <div class="page-shell">
        <header class="site-header">
            <a class="brand" href="<?= htmlspecialchars($assetUrl('index.php')) ?>">
                <span class="brand-mark" aria-hidden="true"></span>
                <span><?= htmlspecialchars((string) $page['site_name']) ?></span>
            </a>

            <button class="nav-toggle md:hidden" type="button" data-nav-toggle aria-expanded="false" aria-controls="mobile-nav">
                Menu
            </button>

            <nav class="site-nav" aria-label="Primary">
                <a href="#overview">Overview</a>
                <a href="#features">Features</a>
                <a href="#files">Files</a>
            </nav>
        </header>

        <nav id="mobile-nav" class="mobile-nav" data-mobile-nav hidden aria-label="Mobile">
            <a href="#overview">Overview</a>
            <a href="#features">Features</a>
            <a href="#files">Files</a>
        </nav>

        <main>
            <section id="overview" class="hero-grid">
                <article class="shell-card hero-card">
                    <p class="eyebrow">PHP starter</p>
                    <h1>Mobile-first foundation with Tailwind CLI, HTML, CSS, and JavaScript.</h1>
                    <p class="lede">
                        This skeleton mirrors the structure of the calculator reference, but keeps the implementation generic so you can swap in your own business logic quickly.
                    </p>

                    <div class="hero-actions">
                        <a class="button button--primary" href="#features">See the structure</a>
                        <a class="button button--secondary" href="#files">View the file map</a>
                    </div>

                    <?php if ($page['submitted']): ?>
                        <div class="notice notice--success">
                            <?= htmlspecialchars($submittedBanner) ?>
                        </div>
                    <?php else: ?>
                        <div class="notice">
                            <?= htmlspecialchars($submittedBanner) ?>
                        </div>
                    <?php endif; ?>

                    <dl class="stats-grid">
                        <?php foreach ($page['stats'] as $stat): ?>
                            <div class="stat-card">
                                <dt><?= htmlspecialchars((string) $stat['label']) ?></dt>
                                <dd><?= htmlspecialchars((string) $stat['value']) ?></dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                </article>

                <aside class="shell-card preview-card">
                    <div class="card-heading">
                        <p class="eyebrow">Live preview</p>
                        <h2>Project snapshot</h2>
                    </div>

                    <div class="preview-panel" data-demo-preview>
                        <div class="preview-item">
                            <span>Project name</span>
                            <strong data-preview-field="project_name"><?= htmlspecialchars((string) $page['form']['project_name']) ?></strong>
                        </div>
                        <div class="preview-item">
                            <span>Launch window</span>
                            <strong data-preview-field="launch_window"><?= htmlspecialchars((string) $page['form']['launch_window']) ?></strong>
                        </div>
                        <div class="preview-item">
                            <span>Team size</span>
                            <strong data-preview-field="team_size"><?= htmlspecialchars((string) $page['form']['team_size']) ?></strong>
                        </div>
                        <div class="preview-item">
                            <span>Priority</span>
                            <strong data-preview-field="priority"><?= htmlspecialchars((string) $page['form']['priority']) ?></strong>
                        </div>
                    </div>

                    <form class="demo-form" method="post" action="<?= htmlspecialchars($assetUrl('index.php')) ?>" data-demo-form>
                        <label>
                            <span>Project name</span>
                            <input type="text" name="project_name" value="<?= htmlspecialchars((string) $page['form']['project_name']) ?>" autocomplete="off">
                        </label>

                        <label>
                            <span>Launch window</span>
                            <select name="launch_window">
                                <?php foreach (['This week', 'This month', 'Next quarter'] as $option): ?>
                                    <option value="<?= htmlspecialchars($option) ?>" <?= $page['form']['launch_window'] === $option ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($option) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </label>

                        <label>
                            <span>Team size</span>
                            <select name="team_size">
                                <?php foreach (['Solo', 'Small team', 'Cross-functional'] as $option): ?>
                                    <option value="<?= htmlspecialchars($option) ?>" <?= $page['form']['team_size'] === $option ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($option) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </label>

                        <label>
                            <span>Priority</span>
                            <select name="priority">
                                <?php foreach (['MVP first', 'Polish later', 'Accessibility first'] as $option): ?>
                                    <option value="<?= htmlspecialchars($option) ?>" <?= $page['form']['priority'] === $option ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($option) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </label>

                        <label>
                            <span>Notes</span>
                            <textarea name="notes" rows="4"><?= htmlspecialchars((string) $page['form']['notes']) ?></textarea>
                        </label>

                        <button class="button button--primary button--full" type="submit">Save demo settings</button>
                    </form>
                </aside>
            </section>

            <section id="features" class="section-block">
                <div class="section-heading">
                    <p class="eyebrow">Features</p>
                    <h2>What is included out of the box</h2>
                </div>

                <div class="feature-grid">
                    <?php foreach ($page['features'] as $feature): ?>
                        <article class="shell-card feature-card">
                            <h3><?= htmlspecialchars((string) $feature['title']) ?></h3>
                            <p><?= htmlspecialchars((string) $feature['description']) ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>

            <section id="files" class="section-block">
                <div class="section-heading">
                    <p class="eyebrow">Agents map</p>
                    <h2>Plain-English file responsibilities</h2>
                </div>

                <div class="file-grid">
                    <?php foreach ($page['file_map'] as $file => $description): ?>
                        <article class="shell-card file-card">
                            <h3><?= htmlspecialchars((string) $file) ?></h3>
                            <p><?= htmlspecialchars((string) $description) ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
