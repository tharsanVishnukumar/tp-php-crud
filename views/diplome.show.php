<?php
/** @var array $diplomes */
?>
<div class="container mt-5">
    <h2>
        Toutes les diplômes
    </h2>

    <div class="d-flex justify-content-end align-items-center">
        <a href="/diplome/create">
            <button class="btn btn-primary my-1">
                créer une nouvelle diplôme
            </button>
        </a>
    </div>

    <?php if(count($diplomes) > 0):?>
        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Libellé</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($diplomes as $diplome):?>
                <tr>
                    <th scope="row">
                        <?=$diplome["id"]?>
                    </th>
                    <td>
                        <?=$diplome["libelle"]?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-link">
                            <a href="<?="/diplome/edit/".$diplome["id"]?>">Modifier</a>
                        </button><button type="button" class="btn btn-link">
                            <a href="<?="/diplome/delete/".$diplome["id"]?>">Supprimer</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php else: ?>
        <h4 class="text-center">aucune diplômes à afficher</h4>
    <?php endif;?>
</div>

