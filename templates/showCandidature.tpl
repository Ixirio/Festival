{extends file='layout.tpl'}
{block name=title}Candidature{/block}
{block name=body}

<div class="image">
    
    <div class="container">


        <div class="cadre">
            <h1>{$data.NOM_GROUPE}<h1>
            <img src="{$data.PHOTO_1}" height="300px" width="500px">
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
            <p><a href="{$data.SACEM_PDF}">SetList/Sacem</a></p>
            <p><a href="{$data.FICHE_TECHNIQUE}">Fiche technique : </a> </p>
                
        </div>
        {if $utilisateur.admin = "1"}
            {*afficher toutes les candidatures*}
        {else}
            
        {/if}

    </div>
</div>
{/block}