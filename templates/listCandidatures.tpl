{extends file='layout.tpl'}
{block name=title}Candidature Liste{/block}
{block name=body}


<div class="container">

    <h1 style="text-align: center">Liste des candidatures</h1>
    <hr>
    <table class="pure-table">
        {* Création des colonnes du tableau *}
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Details</th>
            <th scope="col">Nom</th>
            <th scope="col">Département</th>
            <th scope="col">Nombre membres</th>
            <th scope="col">Style</th>
            <th scope="col">Création</th>
            <th scope="col">Description</th>
            <th scope="col">Experiences</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        
        {$counter = 1}
        {foreach from=$candidatures item=candidature}
            
            {*
                On affiche ici un tableau contenant chaque candidature. Pour que l'affichage soit plus clair, on utilise l'opérateur modulo
                pour qu'une fois sur deux on affiche un fond au tableau.
            *}

            {if $counter mod 2 == 1}
                <tr class="pure-table-odd">

                    <td>{$counter}</td>
                    <td><a href="http://localhost/Festival/showCandidature?id={$candidature.ID_CANDIDATURE}">Détails</a></td>
                    <td>{$candidature.NOM_GROUPE}</td>
                    <td>{$candidature.DEPARTEMENT}</td>
                    <td>{$candidature.NB_MEMBRES}</td>
                    <td>{$candidature.STYLE}</td>
                    <td>{$candidature.ANNEE_CREATION}</td>
                    <td>{$candidature.PRESENTATION_TXT}</td>
                    <td>{$candidature.EXP_SCENIQUE}</td>
                    <td><a href="http://localhost/Festival/deleteCandidature?id={$candidature.ID_CANDIDATURE}">Supprimer</a></td>

                </tr>
            {else}
                <tr>

                    <td>{$counter}</td>
                    <td><a href="http://localhost/Festival/showCandidature?id={$candidature.ID_CANDIDATURE}">Détails</a></td>
                    <td>{$candidature.NOM_GROUPE}</td>
                    <td>{$candidature.DEPARTEMENT}</td>
                    <td>{$candidature.NB_MEMBRES}</td>
                    <td>{$candidature.STYLE}</td>
                    <td>{$candidature.ANNEE_CREATION}</td>
                    <td>{$candidature.PRESENTATION_TXT}</td>
                    <td>{$candidature.EXP_SCENIQUE}</td>
                    <td><a href="http://localhost/Festival/deleteCandidature?id={$candidature.ID_CANDIDATURE}">Supprimer</a></td>

                </tr>
            {/if}
            {$counter = $counter + 1}
        {/foreach}


        </tbody>
    </table>

</div>
{/block}