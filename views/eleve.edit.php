<?php
/** @var array $classes */
?>
<div class="container mt-5">
    <h2>
        Modifier un élève
    </h2>
    <form method="POST" action="/eleve/create">
        <div class="form-group mb-2">
            <label for="lastname">le nom de l'élève</label>
            <input
                    name="lastname"
                    type="text"
                    class="form-control"
                    id="lastname"
                    placeholder="Entre le nom l'élève"
                    minlength="2"
                    required
            >
        </div>
        <div class="form-group mb-2">
            <label for="firstname">le prénom de l'élève</label>
            <input
                    name="firstname"
                    type="text"
                    class="form-control"
                    id="firstname"
                    placeholder="Entre le prénom l'élève"
                    minlength="2"
                    required
            >
        </div>
        <div class="form-group mb-2">
            <label for="email">l'email de l'élève</label>
            <input
                    name="email"
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Entre l'email l'élève"
                    minlength="2"
                    required
            >
        </div>
        <div class="form-group mb-2">
            <label for="dateOfBirth">date de naissance de l'élève</label>
            <input
                    name="dateOfBirth"
                    type="date"
                    class="form-control"
                    id="dateOfBirth"
                    required
            >
        </div>
        <div class="form-group mb-2">
            <label for="classe">la classe de l'éleve</label>
            <select class="form-select" required name="classe" id="classe">
                <option selected>sélection un classe</option>
                <?php foreach ($classes as $classe):?>
                    <option value="<?=$classe["id"]?>">
                        <?=$classe["libelle"]?>
                    </option>
                <?php endforeach;?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>