{extends file='layout.tpl'}
{block name=title}Candidature{/block}
{block name=body}

<div class="image">
    
    <div class="container">


        <div class="cadre">
            <h1>{$data.NOM_GROUPE}</h1>
            <img src="{$data.PHOTO_1}" height="300px" width="500px">
            <p><audio controls src="{$data.AUDIO_1}"></audio></p>
            <p><audio controls src="{$data.AUDIO_2}"></audio></p>
            <p><audio controls src="{$data.AUDIO_3}"></audio></p>

            <p>Departement : {$data.DEPARTEMENT}</p>
            <p>Code postal : {$data.POSTAL_REP}</p>
            <p>Style : {$data.STYLE}</p>
            {if $data.SOUNDCLOUD != NULL}
                <p>Soundcloud : {$data.SOUNDCLOUD}</p>
            {/if}
            
            {if $data.YOUTUBE != NULL}
                <p>Youtube : <a href="{$data.YOUTUBE}"> {$data.YOUTUBE}</p>
            {/if}
            
            <p>Site : <a href="{$data.SITE_FACEBOOK}">{$data.SITE_FACEBOOK}</a></p>

            <p>Expériences : {$data.EXP_SCENIQUE}</p>
            <p>Présentation : {$data.PRESENTATION_TXT}</p>
            
            <h2>Dossier</h2>
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