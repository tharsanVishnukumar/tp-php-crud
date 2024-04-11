<?php
    /** @var array $diplome */
?>

<div class="container mt-5">
    <h2>
        Modifier le diplôme
    </h2>

    <form method="POST" action="<?="/diplome/edit/".$diplome['id']?>">
        <div class="form-group mb-2">
            <label for="diplome-name">Nom de la classe</label>
            <input
                    name="diplome-name"
                    type="text"
                    class="form-control"
                    id="diplome-name"
                    placeholder="Entre le nom de la classe"
                    value="<?=$diplome['libelle']?>"
            />
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>

