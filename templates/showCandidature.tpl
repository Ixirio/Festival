{extends file='layout.tpl'}
{block name=title}Accueil{/block}
{block name=body}

<div class="image">
    
    <div class="container">

        {if $utilisateur.admin = "1"}
            {*afficher toutes les candidatures*}
        {else}
            <div style="display: flex;">
                <div>
                    <img src="{$data.PHOTO_1}">
                </div>
                <div>
                    <h1>{$data.NOM_GROUPE}<h1>
                    {*Afficher n fichiers audio*}

                    <p>Departement : {$data.DEPARTEMENT}</p>
                    <p>Code postal : {$data.POSTAL_REP}</p>
                    <p>Style : {$data.STYLE}</p>
                    <p>Soundcloud : {$data.SOUNDCLOUD}</p> {*tester si il y en a un*}
                    <p>Youtube : {$data.YOUTUBE}</p> {*tester si il y en a un*}
                    <p>Site : {$data.SITE_FACEBOOK}</p> {*tester si il y en a un*}
                    <p>Expériences : {$data.EXP_SCENIQUE}</p>
                    <p>Présentation : {$data.PRESENTATION_TXT}</p>
                    
                    <h2>Dossier<h2>
                    <p>SetList/Sacem : {$data.SACEM_PDF}</p>
                    <p>Fiche technique : {$data.FICHE_TECHNIQUE} </p>
                    
                </div>
            </div>
        {/if}

    </div>
</div>
{/block}