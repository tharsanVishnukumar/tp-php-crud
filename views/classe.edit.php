<?php
    /** @var array $classe */
?>

<div class="container mt-5">
    <h2>
        Modifier la classe
    </h2>

    <form method="POST" action="<?="/classe/edit/".$classe['id']?>">
        <div class="form-group mb-2">
            <label for="classe-name">Nom de la classe</label>
            <input
                    name="classe-name"
                    type="text"
                    class="form-control"
                    id="classe-name"
                    placeholder="Entre le nom de la classe"
                    value="<?=$classe['libelle']?>"
            />
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>

