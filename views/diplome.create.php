<div class="container mt-5">
    <h2>
        Crée un diplome
    </h2>
    <form method="POST" action="/diplome/create">
        <div class="form-group mb-2">
            <label for="diplome-name">Nom de la diplome</label>
            <input name="diplome-name" type="text" class="form-control" id="diplome-name"  placeholder="Entre le nom de la diplôme" required minlength="2">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
