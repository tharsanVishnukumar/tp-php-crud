<?php
/** @var array $eleves */
?>
<div class="container mt-5">
    <h2>
        Toutes les élèves
    </h2>

    <div class="d-flex justify-content-end align-items-center">
        <a href="/eleve/create">
            <button class="btn btn-primary my-1">
                créer une nouvelle élève
            </button>
        </a>
    </div>

    <?php if(count($eleves)):?>
        <table class="table text-start">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">nom</th>
                <th scope="col">prenom</th>
                <th scope="col">email</th>
                <th scope="col">date de naissance</th>
                <th scope="col">classe</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($eleves as $eleve):?>
                <tr>
                    <th scope="row">
                        <?=$eleve["eleve_id"]?>
                    </th>
                    <td>
                        <?=$eleve["nom"]?>
                    </td>
                    <td>
                        <?=$eleve["prenom"]?>
                    </td>
                    <td>
                        <?=$eleve["email"]?>
                    </td>
                    <td>
                        <?=$eleve["date_de_naissance"]?>
                    </td>
                    <td>
                        <?=$eleve["classe_libelle"]?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-link">
                            <a href="<?="/eleve/edit/".$eleve["eleve_id"]?>">Modifier</a>
                        </button><button type="button" class="btn btn-link">
                            <a href="<?="/eleve/delete/".$eleve["eleve_id"]?>">Supprimer</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php else: ?>
        <h4 class="text-center">aucune classes à afficher</h4>
    <?php endif;?>
</div>

