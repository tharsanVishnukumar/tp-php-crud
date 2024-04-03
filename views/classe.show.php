<?php
/** @var array $classes */
?>
<div class="container mt-5">
    <h2>
        Toutes les classes
    </h2>

    <div class="d-flex justify-content-end align-items-center">
        <a href="/classe/create">
            <button class="btn btn-primary my-1">
                créer une nouvelle classe
            </button>
        </a>
    </div>

    <?php if(count($classes)):?>
        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Libellé</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($classes as $classe):?>
                <tr>
                    <th scope="row">
                        <?=$classe["id"]?>
                    </th>
                    <td>
                        <?=$classe["libelle"]?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-link">
                            <a href="<?="/classe/edit/".$classe["id"]?>">Modifier</a>
                        </button><button type="button" class="btn btn-link">
                            <a href="<?="/classe/delete/".$classe["id"]?>">Supprimer</a>
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

