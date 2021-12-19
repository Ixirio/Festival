{extends file='layout.tpl'}
{block name=title}Candidature{/block}
{block name=body}

<div class="image">
    <div class="container">
        <div class="cadre" style="padding: 0 20px 20px 20px">
            <h1>{$data.NOM_GROUPE}</h1>
            {* Affichage de la première photo du groupe *}
            <img src="{$data.PHOTO_1}" height="300px" width="500px">

            <p>Departement : {$data.DEPARTEMENT}</p>
            <p>Code postal : {$data.POSTAL_REP}</p>

            <p>Type de scene : {$data.TYPE_SCENE}</p>
            <p>Style : {$data.STYLE}</p>
            <p>Année de création : {$data.ANNEE_CREATION}</p>

            <h2>Morceaux : </h2>
            {* Affichage des fichiers audio *}
            <p><audio controls src="{$data.AUDIO_1}"></audio></p>
            <p><audio controls src="{$data.AUDIO_2}"></audio></p>
            <p><audio controls src="{$data.AUDIO_3}"></audio></p>

        
            <h2>Membres : </h2>
            {* Affichage de tout les membres *}
            <table class="pure-table pure-table-bordered">
                {* Création des colonnes du tableau *}
                <thead>
                    <tr class="table-title">
                        <th scope="col">Numéro</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Instrument</th>
                    </tr>
                </thead>
                <tbody>
                    {for $i = 1 to $data.NB_MEMBRES}
                    

                        {if $i mod 2 == 1}

                            <tr class="pure-table-odd">
                                <td>{$i}</td>
                                <td>{$data['NOM_MEMBRE_'|cat:$i]}</td>
                                <td>{$data['PRENOM_MEMBRE_'|cat:$i]}</td>
                                <td>{$data['INSTRUMENT_MEMBRE_'|cat:$i]}</td>
                            </tr>
                        {else}
                            <tr>
                                <td>{$i}</td>
                                <td>{$data['NOM_MEMBRE_'|cat:$i]}</td>
                                <td>{$data['PRENOM_MEMBRE_'|cat:$i]}</td>
                                <td>{$data['INSTRUMENT_MEMBRE_'|cat:$i]}</td>
                            </tr>
                        {/if}
                    {/for}
                </tbody>
            </table>

            <h2>Liens : </h2>

            <p>Site : <a href="{$data.SITE_FACEBOOK}">{$data.SITE_FACEBOOK}</a></p>

            {* Affichage du lien soundcloud et de la chaîne Youtube, s'il y en a *}
            {if $data.SOUNDCLOUD != NULL}
                <p>Soundcloud : {$data.SOUNDCLOUD}</p>
            {/if}
            
            {if $data.YOUTUBE != NULL}
                <p>Youtube : <a href="{$data.YOUTUBE}"> {$data.YOUTUBE}</a></p>
            {/if}

            <p>Mail : {$data.MAIL_REP}</p>


            <p>Expériences : {$data.EXP_SCENIQUE}</p>
            <p>Présentation : {$data.PRESENTATION_TXT}</p>
            {* Liens pour visionner les pdf *}
            <h2>Dossier</h2>
            <p><a href="{$data.SACEM_PDF}">SetList/Sacem</a></p>
            <p><a href="{$data.FICHE_TECHNIQUE}">Fiche technique</a> </p>
            
            <img src="{$data.PHOTO_2}" height="300px" width="500px">
                
        </div>
    </div>
</div>
{/block}