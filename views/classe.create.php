<div class="container mt-5">
    <h2>
        Crée une classe
    </h2>
    <form method="POST" action="/classe/create">
        <div class="form-group mb-2">
            <label for="classe-name">Nom de la classe</label>
            <input name="classe-name" type="text" class="form-control" id="classe-name"  placeholder="Entre le nom de la classe" required minlength="2">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
