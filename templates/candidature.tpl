{extends file='layout.tpl'}
{block name=title}Candidature{/block}
{block name=body}

    <div class="container">

        <h1>Candidature</h1>

        <form action="candidature" method="post" class="pure-form pure-form-aligned" enctype="multipart/form-data">
            <fieldset>
                <div class="pure-control-group">
                    <label for="aligned-name">Nom du groupe</label>
                    <input type="text" name="groupeName" placeholder="Nom du groupe"
                           value="{$valeurs.groupeName|escape|default:''}"required=""/>
                    <p class="error">{$messages.groupeName|default:''}</p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-departement">Département :</label>
                    <select name="departement" id="aligned-departement">
                        {foreach from=$departements item=depart}
                            <option  value="{$depart['departement_nom']}">{$depart['departement_nom']}</option>
                        {/foreach}
                    </select>
                </div>

                <div class="pure-control-group">
                <label for="aligned-scene">Type de scène :</label>
                    <select name="sceneType" id="aligned-scene">
                        <option value="tribute">Tribute</option>
                        <option value="acoustique_folk">Acoustique, Folk</option>
                        <option value="amplifie_rock">Amplifié, Rock</option>
                    </select>
                </div>

                <div class="pure-control-group">
                    <p>Représentant du groupe : </p>
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
                    <input type="text" name="repMail" placeholder="claude.dupont@gmail.com"
                           value="{$valeurs.repMail|escape|default:''}"/>
                    <p class="error">{$messages.repMail|default:''}</p>
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Téléphone </label>
                    <input type="text" name="repPhone" placeholder="0607080910"
                           value="{$valeurs.repName|escape|default:''}"/>
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
                    <textarea rows="8" cols="50" name="textPresentation" placeholder="We're no strangers to love"
                              >{$valeurs.textPresentation|escape|default:''}</textarea>
                    <p class="error">{$messages.textPresentation|default:''} </p>
                </div>

                <div class="pure-control-group">
                    <label for="aligned-name">Expériences scéniques </label>
                    <textarea rows="8" cols="50" name="scenicExperiences"
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
                    <label for="aligned-memberNumber">Membres du groupe : </label>
                    <select name="memberNumber" class="memberNb" id="aligned-memberNumber">
                        {for $i=1 to 8}
                            {if $valeurs.memberNumber|intval|escape|default:1 == $i}

                                <option value={$i} selected="selected">{$i}</option>
                            {else}
                                <option value={$i}>{$i}</option>
                            {/if}
                        {/for}
                    </select>

                </div>

                <div class='form-group col-xs-12 col-md-12 col-lg-10' id="membreInput">
                    <!--
                <h4 style="margin: 20px; width: 100%; font-size: 20px;">
                    <b>Membre 1</b>
                </h4>

                <div class="pure-control-group">
                    <label for="aligned-name">Nom </label>
                    <input type="text" name="memberName1" placeholder="Pichard" value = "{$valeurs.memberName|escape|default:''}" />
                    <p class="error">{$messages['memberName1']|default:''}</p>
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Prénom </label>
                    <input type="text" name="memberFName1" placeholder="Étienne" value = "{$valeurs.memberFName|escape|default:''}" />
                    <p class="error">{$messages.memberFName1|default:''}</p>
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Instrument(s) </label>
                    <input type="text" name="memberInstrument1" placeholder="Kazoo, flûte à bec" value ="{$valeurs.memberInstrument|escape|default:''}"/>
                    <p class="error">{$messages.memberInstrument1|default:''}</p>
                </div>
                -->
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

                    console.log(erreursMemberName);
                    console.log(erreursMemberFName);
                    console.log(erreursMemberInstrument);
                    console.log(valueMemberName);
                    console.log(valueMemberFName);
                    console.log(valueMemberInstrument);

                    console.log(erreursMemberName[i])

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
                <p>Photos du groupe (résolution>300DPI)</p>
                <input name="photo1" type="file">
                <input name="photo2" type="file">
                <p>PDF Fiche technique</p>
                <input name="fichetechnique" type="file">
                <p>Document SACEM PDF / PDF contenant la liste des noms, compositeurs et durées des morceaux.</p>
                <input name="docSacem" type="file">

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

                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">Valider</button>
                </div>

            </fieldset>
        </form>
    </div>
{/block}