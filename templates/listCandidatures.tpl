{extends file='layout.tpl'}
{block name=title}Candidature{/block}
{block name=body}

    <div class="container">
        <h1 class="text-center h1-font">Liste des produits</h1>
        <hr class="divider">
        <table class="table table-glass table-hover table-borderless">
            <thead>
            <tr class="table-title">
                <th scope="col">Id</th>
                <th scope="col">Details</th>
                <th scope="col">Nom</th>
                <th scope="col">Photo</th>
                <th scope="col">Supprimer</th>
            </tr>
            </thead>
            <tbody>

            {foreach from=$candidatures item=candidature}
                {$counter = 1}

            <tr>


                <td class="table-cell">{$counter}</td>
                <td class="table-cell"><a
                            href="http://localhost/Festival/showCandidature?id={$candidature.ID_CANDIDATURE}">Détails</a></td>

                <td class="table-cell">{$candidature.NOM_GROUPE}</td>
                <td class="table-cell"><img src="{$candidature.PHOTO_1}" width="50" height="50"></td>

                <td class="table-cell"><a
                            href="http://localhost/Festival/deleteCandidature?id={$candidature.ID_CANDIDATURE}">Supprimer</a></td>

            </tr>
                {$counter = $counter + 1}
            {/foreach}


            </tbody>
        </table>

    </div>

{/block}