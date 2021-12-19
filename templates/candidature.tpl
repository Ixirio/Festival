{extends file='layout.tpl'}
{block name=title}Candidature{/block}
{block name=body}

<div class="image">
    <div class="container">

        {*
            Formulaire de candidature, idem que dans register.tpl
        *}
        <form action="candidature" method="post" class="pure-form pure-form-aligned" enctype="multipart/form-data">
        
            <h1>Candidature</h1>

            <fieldset>
                <div class="pure-control-group">
                    <label for="aligned-name">Nom du groupe</label>
                    <input type="text" name="groupeName" placeholder="Nom du groupe"
                           value="{$valeurs.groupeName|escape|default:''}"required=""/>
                    <p class="error">{$messages.groupeName|default:''}</p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-departement">Département</label>
                    <select name="departement" id="aligned-departement">
                    {*
                        Ici on récupère les différents départements contenus dans la table départements de la base de données, et on affiche chacun d'entre comme option
                        dans notre select. On y ajoute une option "autre" pour les étrangers.
                    *}
                        {foreach from=$departements item=depart}
                            <option  value="{$depart['departement_nom']}">{$depart['departement_nom']}</option>
                        {/foreach}
                        <option  value="Autre">Autre</option>
                    </select>
                </div>

                <div class="pure-control-group">
                <label for="aligned-scene">Type de scène</label>
                    <select name="sceneType" id="aligned-scene">
                    {*
                        Ici on récupère les différents types de scènes contenus dans la table scenes de la base de données,
                        et on affiche chacun d'entre comme option dans notre select.
                    *}
                        {foreach from=$scenes item=typedescene}
                            <option value="{$typedescene[0]}">{$typedescene[0]}</option>
                        {/foreach}
                    </select>
                </div>

                <div class="pure-control-group">
                    <p>Représentant du groupe</p>
                    <label for="aligned-name">Nom </label>
                    <input type="text" name="repName" placeholder="Dupont"
                           value="{$valeurs.repName|escape|default:''}"/>
                    <p class="error">{$messages.repName|default:''}</p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-name">Prénom </label>
                    <input type="text" name="repFName" placeholder="Claude"
                           value="{$valeurs.repFName|escape|default:''}"/>
                    <p class="error">{$messages.repFName|default:''}</p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-name">Adresse </label>
                    <input type="text" name="repAddress" placeholder="47 rue des robiniers, New York"
                           value="{$valeurs.repAddress|escape|default:''}"/>
                    <p class="error">{$messages.repAddress|default:''}</p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-name">Code postal </label>
                    <input type="text" name="repPostCode" placeholder="80000"
                           value="{$valeurs.repPostCode|escape|default:''}"/>
                    <p class="error">{$messages.repPostCode|default:''}</p>
                </div>

                <div class="pure-control-group">
                    <label for="email">Adresse e-mail </label>
                    <input type="email" name="repMail" placeholder="claude.dupont@gmail.com"
                           value="{$valeurs.repMail|escape|default:''}"/>
                    <p class="error">{$messages.repMail|default:''}</p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-name">Téléphone </label>
                    <input type="text" name="repPhone" placeholder="0607080910"
                           value="{$valeurs.repPhone|escape|default:''}"/>
                    <p class="error">{$messages.repPhone|default:''}</p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-name">Style Musical </label>
                    <input type="text" name="musicType" placeholder="Rock"
                           value="{$valeurs.musicType|escape|default:''}"/>
                    <p class="error">{$messages.musicType|default:''} </p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-name">Année de création </label>
                    <input type="text" name="yearOfCreation" placeholder="2010"
                           value="{$valeurs.yearOfCreation|escape|default:''}"/>
                    <p class="error">{$messages.yearOfCreation|default:''} </p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-name">Présentation du texte </label>
                    <textarea rows="4" cols="22" name="textPresentation" placeholder="We're no strangers to love"
                              >{$valeurs.textPresentation|escape|default:''}</textarea>
                    <p class="error">{$messages.textPresentation|default:''} </p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-name">Expériences scéniques </label>
                    <textarea rows="4" cols="22" name="scenicExperiences"
                              placeholder="Une fois j'ai joué pour la kermesse de l'école primaire de mon village"
                              >{$valeurs.scenicExperiences|escape|default:''}</textarea>
                    <p class="error">{$messages.scenicExperiences|default:''}</p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-name">Site Internet / Facebook </label>
                    <input type="url" name="website" placeholder="https://monsite.fr"
                           value="{$valeurs.website|escape|default:''}"/>
                    <p class="error">{$messages.website|default:''}</p>
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Soundcloud (Facultatif) </label>
                    <input type="url" name="soundcloud" placeholder="https://soundcloud.com"
                           value="{$valeurs.soundcloud|escape|default:''}"/>
                    <p class="error">{$messages.soundcloud|default:''}</p>
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Youtube (Facultatif) </label>
                    <input type="url" name="youtube" placeholder="https://youtube.com"
                           value="{$valeurs.youtube|escape|default:''}"/>
                    <p class="error">{$messages.youtube|default:''}</p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-memberNumber">Membres du groupe</label>
                    <select name="memberNumber" class="memberNb" id="aligned-memberNumber">
                    {*
                        On génère automatiquement les options du Select.
                        Afin que lorsque l'on charge la page alors qu'il y a déjà des paramètres (valeurs), la valeur choisie précédemment soit sélectionnée de base.

                        Exemple: On remplit le formulaire avec 4 membres, mais la candidature échoue pour une raison x ou y (champ non rempli...),
                        la page se recharge, on veut que la valeur précédemment sélectionnée par l'utilisateur (ici 4) soit sélectionnée de base.
                        Et c'est aussi important pour le remplissage des champs "erreurs" des membres en dessous.
                    *}
                        {for $i=1 to 8}
                            {if $valeurs.memberNumber|intval|escape|default:1 == $i}
                                <option value={$i} selected="selected">{$i}</option>
                            {else}
                                <option value={$i}>{$i}</option>
                            {/if}
                        {/for}
                    </select>

                </div>
                {*
                    Lorsque l'utilisateur choisit un nombre de membres, il décide combien de formulaires seront affichés.
                    Le script va donc générer l'HTML pour afficher le nombre de champs correspondants.

                    Le problème: La gestion des erreurs. Le serveur renvoie la page, avec les paramètres. le navigateur récéptionne, recharge la page, éxecute
                    le JS, etc... Ensuite le JS dit "Il y a 4 membres, je génère le code ET J'AFFICHE LES ERREURS". Mais il est côté client.
                    Les erreurs, elles, sont côté serveur.

                    Solution : Passer TOUTES les erreurs possibles, et si elles sont pas vides (pas d'erreurs), alors les afficher.
                    Ça nous donne le gros bloc ci-dessous pour récupérer les erreurs MAIS on a UN SEUL code pour générer les inputs pour les membres, car les
                    erreurs sont stockées dans un tableau, et les clés d'accès au tableau sont générées avec la boucle for.

                    La solution aurait été de coder 8 fois l'input, avec à chaque fois la variable de l'erreur contenant l'erreur écrite en brut.
                *}
                <div class='form-group col-xs-12 col-md-12 col-lg-10' id="membreInput">
                </div>
                <script>
                    const input = document.querySelector('.memberNb');


                    document.getElementById("membreInput").innerHTML = "";
                    var membreList = document.getElementById('membreInput');
                    var docstyle = membreList.style.display;
                    if (docstyle == 'none') membreList.style.display = '';

                    var i = 1;

                    erreursMemberName = []
                    erreursMemberFName = []
                    erreursMemberInstrument= []

                    valueMemberName = []
                    valueMemberFName = []
                    valueMemberInstrument= []

                    erreursMemberName.push('{$messages.memberName1|escape:javascript|default:''}');
                    erreursMemberName.push('{$messages.memberName2|escape:javascript|default:''}');
                    erreursMemberName.push('{$messages.memberName3|escape:javascript|default:''}');
                    erreursMemberName.push('{$messages.memberName4|escape:javascript|default:''}');
                    erreursMemberName.push('{$messages.memberName5|escape:javascript|default:''}');
                    erreursMemberName.push('{$messages.memberName6|escape:javascript|default:''}');
                    erreursMemberName.push('{$messages.memberName7|escape:javascript|default:''}');
                    erreursMemberName.push('{$messages.memberName8|escape:javascript|default:''}');

                    erreursMemberFName.push('{$messages.memberFName1|escape:javascript|default:''}');
                    erreursMemberFName.push('{$messages.memberFName2|escape:javascript|default:''}');
                    erreursMemberFName.push('{$messages.memberFName3|escape:javascript|default:''}');
                    erreursMemberFName.push('{$messages.memberFName4|escape:javascript|default:''}');
                    erreursMemberFName.push('{$messages.memberFName5|escape:javascript|default:''}');
                    erreursMemberFName.push('{$messages.memberFName6|escape:javascript|default:''}');
                    erreursMemberFName.push('{$messages.memberFName7|escape:javascript|default:''}');
                    erreursMemberFName.push('{$messages.memberFName8|escape:javascript|default:''}');

                    erreursMemberInstrument.push('{$messages.memberInstrument1|escape:javascript|default:''}');
                    erreursMemberInstrument.push('{$messages.memberInstrument2|escape:javascript|default:''}');
                    erreursMemberInstrument.push('{$messages.memberInstrument3|escape:javascript|default:''}');
                    erreursMemberInstrument.push('{$messages.memberInstrument4|escape:javascript|default:''}');
                    erreursMemberInstrument.push('{$messages.memberInstrument5|escape:javascript|default:''}');
                    erreursMemberInstrument.push('{$messages.memberInstrument6|escape:javascript|default:''}');
                    erreursMemberInstrument.push('{$messages.memberInstrument7|escape:javascript|default:''}');
                    erreursMemberInstrument.push('{$messages.memberInstrument8|escape:javascript|default:''}');

                    valueMemberName.push('{$valeurs.memberName1|escape:javascript|default:''}');
                    valueMemberName.push('{$valeurs.memberName2|escape:javascript|default:''}');
                    valueMemberName.push('{$valeurs.memberName3|escape:javascript|default:''}');
                    valueMemberName.push('{$valeurs.memberName4|escape:javascript|default:''}');
                    valueMemberName.push('{$valeurs.memberName5|escape:javascript|default:''}');
                    valueMemberName.push('{$valeurs.memberName6|escape:javascript|default:''}');
                    valueMemberName.push('{$valeurs.memberName7|escape:javascript|default:''}');
                    valueMemberName.push('{$valeurs.memberName8|escape:javascript|default:''}');

                    valueMemberFName.push('{$valeurs.memberFName1|escape:javascript|default:''}');
                    valueMemberFName.push('{$valeurs.memberFName2|escape:javascript|default:''}');
                    valueMemberFName.push('{$valeurs.memberFName3|escape:javascript|default:''}');
                    valueMemberFName.push('{$valeurs.memberFName4|escape:javascript|default:''}');
                    valueMemberFName.push('{$valeurs.memberFName5|escape:javascript|default:''}');
                    valueMemberFName.push('{$valeurs.memberFName6|escape:javascript|default:''}');
                    valueMemberFName.push('{$valeurs.memberFName7|escape:javascript|default:''}');
                    valueMemberFName.push('{$valeurs.memberFName8|escape:javascript|default:''}');

                    valueMemberInstrument.push('{$valeurs.memberInstrument1|escape:javascript|default:''}');
                    valueMemberInstrument.push('{$valeurs.memberInstrument2|escape:javascript|default:''}');
                    valueMemberInstrument.push('{$valeurs.memberInstrument3|escape:javascript|default:''}');
                    valueMemberInstrument.push('{$valeurs.memberInstrument4|escape:javascript|default:''}');
                    valueMemberInstrument.push('{$valeurs.memberInstrument5|escape:javascript|default:''}');
                    valueMemberInstrument.push('{$valeurs.memberInstrument6|escape:javascript|default:''}');
                    valueMemberInstrument.push('{$valeurs.memberInstrument7|escape:javascript|default:''}');
                    valueMemberInstrument.push('{$valeurs.memberInstrument8|escape:javascript|default:''}');

                    for (var i = 1; i <= input.value; i++) {
                        var section = document.createElement('h4');
                        section.style = "margin:20px; width:100%; font-size:20px;"
                        section.innerHTML = "<b>Membre " + i + "</b>"
                        membreList.appendChild(section);

                        var text = document.createElement('div');
                        text.className = "pure-control-group";
                        text.innerHTML = '<label for="aligned-name">Nom </label><input type="text" name="memberName' + i + '" placeholder="Pichard" value = "' + valueMemberName[i - 1] + '" /><p class="error">' + erreursMemberName[i - 1] + '</p> ';
                        membreList.appendChild(text);

                        var text = document.createElement('div');
                        text.className = "pure-control-group";
                        text.innerHTML = '<label for="aligned-name">Prénom </label><input type="text" name="memberFName' + i + '" placeholder="Étienne" value = "' + valueMemberFName[i - 1] + '" /><p class="error">' + erreursMemberFName[i - 1] + '</p> ';
                        membreList.appendChild(text);

                        var text = document.createElement('div');
                        text.className = "pure-control-group";
                        text.innerHTML = '<label for="aligned-name">Instrument(s) </label><input type="text" name="memberInstrument' + i + '" placeholder="Kazoo, flûte à bec" value = "' + valueMemberInstrument[i - 1] + '" /><p class="error">' + erreursMemberInstrument[i - 1] + '</p> ';
                        membreList.appendChild(text);
                    }

                    input.addEventListener('change', (event) => {
                        document.getElementById("membreInput").innerHTML = "";
                        var membreList = document.getElementById('membreInput');
                        var docstyle = membreList.style.display;
                        if (docstyle == 'none') membreList.style.display = '';
                        for (var i = 1; i <= input.value; i++) {

                            var section = document.createElement('h4');
                            section.style = "margin:20px; width:100%; font-size:20px;"
                            section.innerHTML = "<b>Membre " + i + "</b>"
                            membreList.appendChild(section);

                            var text = document.createElement('div');
                            text.className = "pure-control-group";
                            text.innerHTML = '<label for="aligned-name">Nom </label><input type="text" name="memberName' + i + '" placeholder="Pichard" value = "'+valueMemberName[i-1]+'" /><p class="error">'+erreursMemberName[i-1]+'</p> ';
                            membreList.appendChild(text);

                            var text = document.createElement('div');
                            text.className = "pure-control-group";
                            text.innerHTML = '<label for="aligned-name">Prénom </label><input type="text" name="memberFName' + i + '" placeholder="Étienne" value = "'+valueMemberFName[i-1]+'" /><p class="error">'+erreursMemberFName[i-1]+'</p> ';
                            membreList.appendChild(text);

                            var text = document.createElement('div');
                            text.className = "pure-control-group";
                            text.innerHTML = '<label for="aligned-name">Instrument(s) </label><input type="text" name="memberInstrument' + i + '" placeholder="Kazoo, flûte à bec" value = "'+valueMemberInstrument[i-1]+'" /><p class="error">'+erreursMemberInstrument[i-1]+'</p> ';
                            membreList.appendChild(text);
                        }
                    });
                </script>
                <p>Morceaux (Format MP3)</p>
                <input name="audio1" type="file">
                <p class="error">{$messages.audio1|default:''}</p>
                <input name="audio2" type="file">
                <p class="error">{$messages.audio2|default:''}</p>
                <input name="audio3" type="file">
                <p class="error">{$messages.audio3|default:''}</p>

                <p>PDF dossier de presse (facultatif)</p>
                <input name="pdfpresse" type="file">
                <p class="error">{$messages.pdfpresse|default:''}</p>

                <p>Photos du groupe (résolution>300DPI)</p>
                <p>Photo 1</p>
                <input name="photo1" type="file">
                <p class="error">{$messages.photo1|default:''}</p>
                <p>Photo 2</p>
                <input name="photo2" type="file">
                <p class="error">{$messages.photo2|default:''}</p>
                <p>PDF Fiche technique</p>
                <input name="ficheTechnique" type="file">
                <p class="error">{$messages.ficheTechnique|default:''}</p>
                <p>PDF SACEM / PDF contenant la liste des noms, compositeurs et durées des morceaux.</p>
                <input name="sacemPdf" type="file">
                <p class="error">{$messages.sacemPdf|default:''}</p>

                <div class="pure-control-group">
                    <label for="aligned-name">Statut associatif</label>
                    <input type="checkbox" name="statutAssociatif"
                           value="{$valeurs.statutAssociatif|escape|default:''}"/>
                    <p class="error">{$messages.statutAssociatif|default:''}</p>
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Inscrit à la SACEM</label>
                    <input type="checkbox" name="sacem" value="{$valeurs.sacem|escape|default:''}"/>
                    <p class="error">{$messages.sacem|default:''}</p>
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Producteur</label>
                    <input type="checkbox" name="producer" value="{$valeurs.producer|escape|default:''}"/>
                    <p class="error">{$messages.producer|default:''}</p>
                </div>

                <div class="pure-control-group">
                    <button type="submit" class="pure-button pure-button-primary">Valider</button>
                </div>

            </fieldset>
        </form>
    </div>
</div>
{/block}