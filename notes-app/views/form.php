    <h2>Ajouter une note</h2>
    
    <div class="left-panel">
      <div class="notebook">
        <form method="POST" action="index.php?route=notes.store">
          <input type="text" name="title" placeholder="Titre" required>
          <!-- <textarea name="content" placeholder="Contenu" required></textarea> -->
          <textarea id="content" name="content"></textarea>
          <button type="submit">Ajouter</button>
        </form>
      </div>
    </div>
    <script>
      const mde = new SimpleMDE({
        element: document.getElementById("content"),
        placeholder: "Écris ta note en Markdown…",
        spellChecker: false, // plus discret pour débuter
        status: false, // cache la barre de statut
        autosave: {
          enabled: true,
          uniqueId: "notes-app-content",
          delay: 1000
        },
        toolbar: ["bold", "italic", "heading", "|", "quote", "unordered-list", "ordered-list", "|", "link", "preview", "guide"]
      });
    </script>