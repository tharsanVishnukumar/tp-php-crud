<?php
/** @var array $eleve */
/** @var array $diplomes */
/** @var array $diplomes_posseder */
?>
<div class="container mt-5">
    <h2>
        Ajouter un Diplôme a <?=$eleve["sexe"] === "m" ? "M" : "Mme" ?>. <?=$eleve["nom"]?> <?=$eleve["prenom"]?>
    </h2>
    <div class="my-4">
        <form action="<?="/diplome/eleve/".$eleve["id"]?>" method="POST">
            <select class="form-select mb-2" required name="diplome" id="diplome" >

                <?php
                    if(count($diplomes) > 0):
                ?>
                    <option value="" selected>sélection un diplôme</option>
                    <?php foreach ($diplomes as $diplome):?>
                        <option value="<?=$diplome["id"]?>">
                            <?=$diplome["libelle"]?>
                        </option>
                    <?php endforeach;?>
                <?php else:?>
                    <option value="" selected >aucun diplôme disponible</option>
                <?php endif;?>

            </select>
            <button type="submit" class="btn btn-primary">Ajouter le diplôme</button>
        </form>
    </div>
    <h2>
        Tous les diplômes détenus par <?=$eleve["sexe"] === "m" ? "M" : "Mme" ?>. <?=$eleve["nom"]?> <?=$eleve["prenom"]?>
    </h2>
    <?php if(count($diplomes_posseder) > 0):?>
        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">diplome id</th>
                <th scope="col">Libellé</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($diplomes_posseder as $diplome):?>
                <tr>
                    <th scope="row">
                        <?=$diplome["diplome_id"]?>
                    </th>
                    <td>
                        <?=$diplome["diplome_libelle"]?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-link">
<!--                            /diplome/[:diplome]/eleve/[:eleveid]/delete-->
                            <a href="<?="/diplome/".$diplome["diplome_id"]."/eleve/".$eleve["id"]."/delete"?>">Supprimer</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php else: ?>
        <h4 class="text-center">aucune diplome à afficher</h4>
    <?php endif;?>
</div>
