<div class="search-section">
  <div class="search-wrapper">
    <form method="get" action="index.php" class="search-form">
      <div class="search-input-group">
        <input type="text" name="search" placeholder="Rechercher" class="search-input">
      </div>
      <div class="radio-group">
        <label><input type="radio" name="field" value="title" checked> Titre</label>
        <label><input type="radio" name="field" value="content"> Contenu</label>
      </div>
      <button type="submit" class="search-button">Rechercher</button>
    </form>
  </div>
</div>

<div class="right-panel">
  <ul>
    <?php foreach ($notes as $note): ?>
      <li>
        <strong><?= htmlspecialchars($note['title']) ?></strong>
        <div class="note-content">
          <div id="rendered-<?= $note['id'] ?>"></div>
          <script>
            const raw<?= $note['id'] ?> = <?= json_encode($note['content'] ?? "") ?>;
            const html<?= $note['id'] ?> = marked.parse(raw<?= $note['id'] ?>);
            document.getElementById('rendered-<?= $note['id'] ?>').innerHTML = DOMPurify.sanitize(html<?= $note['id'] ?>);
          </script>
        </div>
        <small><?= $note['created_at'] ?></small>
        <a href="index.php?delete=<?= $note['id'] ?>">❌ Supprimer</a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>