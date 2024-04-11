<?php
/** @var array $classes */
/** @var array $eleve */
?>
<div class="container mt-5">
    <h2>
        Modifier un élève
    </h2>
    <form method="POST" action="/eleve/edit/<?=$eleve["id"]?>">
        <div class="form-group mb-2">
            <label for="lastname">le nom de l'élève</label>
            <input
                    name="lastname"
                    value="<?=$eleve["nom"]?>"
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
                    value="<?=$eleve["prenom"]?>"
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
                    value="<?=$eleve["email"]?>"
                    class="form-control"
                    id="email"
                    placeholder="Entre l'email l'élève"
                    minlength="2"
                    required
            >
        </div>
        <div class="form-group mb-2">
            <label for="sexe">le genre  de l'éleve</label>
            <select class="form-select" required name="sexe" id="sexe">
                <option <?=$eleve["sexe"] === "m" ? "selected" : ""?> value="m">masculin</option>
                <option <?=$eleve["sexe"] === "f" ? "selected" : ""?> value="f">féminin</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="dateOfBirth">date de naissance de l'élève</label>
            <input
                    name="dateOfBirth"
                    type="date"
                    value="<?=$eleve["date_de_naissance"]?>"
                    class="form-control"
                    id="dateOfBirth"
                    required
            >
        </div>
        <div class="form-group mb-2">
            <label for="classe">la classe de l'éleve</label>
            <br/>
            <select
                    class="form-select"
                    name="classe"
                    id="classe"
                    required
            >
                <?php foreach ($classes as $classe):?>
                    <option
                            value="<?=$classe["id"]?>"
                            <?=$eleve["classe_Id"] === $classe["id"] ? "selected" : ""?>
                    >
                        <?=$classe["libelle"]?>
                    </option>
                <?php endforeach;?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
