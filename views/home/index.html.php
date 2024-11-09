<div class="dashboard-header">
    <h1>Catalogue des Médias</h1>
    <div class="search-bar">
        <form name="search" action="#" method="POST">
            <select name="search">
                <option value="all" default>Tous</option>
                <option value="available">Disponibles</option>
                <option value="movie">Films</option>
                <option value="book">Livres</option>
                <option value="album">Albums</option>
            </select>
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>

<div class="media-grid">
    <?php foreach ($medias as $media) {
        $title = $media->getTitle();
        $author = $media->getAuthor();
        $available = $media->getAvailable();
        ?>
        <div class="media-card" data-theme="light">
            <img src="TODO:path/to/<?= $title ?> Poster" alt="<?= $title ?> Poster" class="media-image">
            <div class="media-content">
                <div class="media-title"><?= $title ?></div>
                <div class="media-author">
                    <i class="fas fa-user"></i>
                    <?= htmlspecialchars($author) ?>
                </div>
                <div class="media-status">
                    <div class="round <?= $media->getAvailable() ? 'available' : 'notAvailable' ?>">
                    </div>
                    <?= $media->getAvailable() ? 'Disponible' : 'Indisponible' ?>
                </div>
                <?php if (isset($_SESSION['user'])) { ?>
                    <form action="/changeAvailable" method="POST">
                        <input type="hidden" name="media_id" value="<?php echo $media->getId(); ?>">
                        <button
                            type="submit"
                            class="btn btn-primary"><?= $media->getAvailable() ? 'Emprunter' : 'Rendre' ?></button>
                    </form>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>



<style>
    /* Main Content */
    main {
        flex: 1;
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        width: 100%;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .search-bar {
        display: flex;
        gap: 1rem;
        align-items: center;
        width: 50%;
    }
    .search-bar form{
        display: flex;
width: 100%;
gap: 1rem;
    }

    .search-bar input {
        padding: 0.5rem 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 300px;
    }

    .media-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 2fr));
        gap: 2rem;
    }

    .media-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .media-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .media-image {;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 200px;
        object-fit: cover;
        background-color: #242a36;
    }

    .media-content {
        padding: 1rem;
    }

    .media-title {
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: var(--text-color);
    }

    .media-author {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .media-status {
        display: inline-block;
        color: #666;
        padding: 0.25rem 0.5rem;
        border-radius: 3px;
        font-size: 0.8rem;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 10px;"
    }

    .status-available {
        background-color: #2ecc71;
        color: white;
    }

    .status-unavailable {
        background-color: var(--accent-color);
        color: white;
    }
    .round{
        border-radius: 100%;
        width: 10px;
        height: 10px;
    }
    .round.notAvailable{
        background: #ff0101;
    }
    .round.available{
        background: #04ff01;
    }
    
</style>