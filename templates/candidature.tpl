{extends file='layout.tpl'}
{block name=title}Candidature{/block}
{block name=body}

    <div class="container">

        <h1>Candidature</h1>

        <form action="candidature" method="post" class="pure-form pure-form-aligned" enctype="multipart/form-data">
            <fieldset>
                <div class="pure-control-group">
                    <label for="aligned-name">Nom du groupe</label>
                    <input type="text" name="groupeName" placeholder="Nom du groupe" value = "{$valeurs.groupName|escape|default:''}" required=""/>
                    {$messages.groupName|default:''}
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
                    <input type="text" name="repName" placeholder="Dupont" value = "{$valeurs.repName|escape|default:''}" />
                    {$messages.repName|default:''}
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Prénom </label>
                    <input type="text" name="repFName" placeholder="Claude" value = "{$valeurs.repFName|escape|default:''}" />
                    {$messages.repFName|default:''}
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Adresse </label>
                    <input type="text" name="repAddress" placeholder="47 rue des robiniers, New York" value = "{$valeurs.repAddress|escape|default:''}" />
                    {$messages.repAddress|default:''}
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Code postal </label>
                    <input type="text" name="repPostCode" placeholder="80000" value = "{$valeurs.repPostCode|escape|default:''}" />
                    {$messages.repPostCode|default:''}
                </div>
                <div class="pure-control-group">
                    <label for="email">Adresse e-mail </label>
                    <input type="text" name="repMail" placeholder="claude.dupont@gmail.com" value = "{$valeurs.repMail|escape|default:''}" />
                    {$messages.repMail|default:''}
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Téléphone </label>
                    <input type="text" name="repPhone" placeholder="0607080910" value = "{$valeurs.repName|escape|default:''}" />
                    {$messages.repPhone|default:''}
                </div>

                <div class="pure-control-group">
                    <label for="aligned-name">Style Musical </label>
                    <input type="text" name="musicType" placeholder="Rock" value = "{$valeurs.musicType|escape|default:''}" />
                    {$messages.musicType|default:''}
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Année de création </label>
                    <input type="text" name="yearOfCreation" placeholder="2010" value = "{$valeurs.yearOfCreation|escape|default:''}" />
                    {$messages.yearOfCreation|default:''}
                </div>

                <div class="pure-control-group">
                    <label for="aligned-name">Présentation du texte </label>
                    <textarea rows="8" cols="50" name="textPresentation" placeholder="We're no strangers to love" value = "{$valeurs.textPresentation|escape|default:''}" ></textarea>
                    {$messages.textPresentation|default:''}
                </div>

        <div class="pure-control-group">
            <label for="aligned-name">Style Musical </label>
            <input type="text" name="musicType" placeholder="Rock" value = "{$valeurs.musicType|escape|default:''}" />
            {$messages.musicType|default:''} 
        </div>
        <div class="pure-control-group">
            <label for="aligned-name">Année de création </label>
            <input type="text" name="yearOfCreation" placeholder="2010" value = "{$valeurs.yearOfCreation|escape|default:''}" />
            {$messages.yearOfCreation|default:''} 
        </div>

        <div class="pure-control-group">
            <label for="aligned-name">Présentation du texte</label>
            <textarea rows="8" cols="50" name="textPresentation" placeholder="We're no strangers to love" value = "{$valeurs.textPresentation|escape|default:''}" ></textarea>
            {$messages.textPresentation|default:''} 
        </div>

        <div class="pure-control-group">
            <label for="aligned-name">Expériences scéniques</label>
            <textarea rows="8" cols="50" name="scenicExperiences" placeholder="Une fois j'ai joué pour la kermesse de l'école primaire de mon village" value = "{$valeurs.scenicExperiences|escape|default:''}" ></textarea>
            {$messages.scenicExperiences|default:''}
        </div>

        <div class="pure-control-group">
            <label for="aligned-name">Site Internet / Facebook </label>
            <input type="url" name="website" placeholder="https://monsite.fr" value = "{$valeurs.website|escape|default:''}" />
            {$messages.website|default:''}
        </div>
        <div class="pure-control-group">
            <label for="aligned-name">Soundcloud (Facultatif) </label>
            <input type="url" name="soundcloud" placeholder="https://soundcloud.com" value = "{$valeurs.soundcloud|escape|default:''}" />
            {$messages.soundcloud|default:''}
        </div>
        <div class="pure-control-group">
            <label for="aligned-name">Youtube (Facultatif) </label>
            <input type="url" name="youtube" placeholder="https://youtube.com" value = "{$valeurs.youtube|escape|default:''}" />
            {$messages.youtube|default:''}
        </div>
        
        <div class="pure-control-group">
            <label for="aligned-memberNumber">Membres du groupe : </label>
            <select name="memberNumber" class="memberNb" id="aligned-memberNumber">
                <option value="1" selected="selected">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
            
        </div>

            <div class='form-group col-xs-12 col-md-12 col-lg-10' id = "membreInput">
                <h4 style="margin: 20px; width: 100%; font-size: 20px;">
                    <b>Membre 1</b>
                </h4>

                <div class="pure-control-group">
                    <label for="aligned-name">Nom </label>
                    <input type="text" name="memberName" placeholder="Pichard" value = "{$valeurs.memberName|escape|default:''}" />
                    {$messages.memberName|default:''}
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Prénom </label>
                    <input type="text" name="memberFName" placeholder="Étienne" value = "{$valeurs.memberFName|escape|default:''}" />
                    {$messages.memberFName|default:''}
                </div>
                <div class="pure-control-group">
                    <label for="aligned-name">Instrument(s) </label>
                    <input type="text" name="memberInstrument" placeholder="Kazoo, flûte à bec" value ="{$valeurs.memberInstrument|escape|default:''}"/>
                </div>
            </div>
            <script>
                const input = document.querySelector('.memberNb');
                input.addEventListener('change', (event) => {
                    document.getElementById("membreInput").innerHTML = "";
                    var membreList = document.getElementById('membreInput');
                    var docstyle = membreList.style.display;
                    if (docstyle == 'none') membreList.style.display = '';
                    for(var i = 1;i<= input.value;i++){

                        var section = document.createElement('h4');
                        section.style = "margin:20px; width:100%; font-size:20px;"
                        section.innerHTML = "<b>Membre "+i + "</b>"
                        membreList.appendChild(section);

                        var text = document.createElement('div');
                        text.className = "pure-control-group";
                        text.innerHTML = '<label for="aligned-name">Nom </label><input type="text" name="memberName" placeholder="Pichard" value = "{$valeurs.memberName|escape|default:''}" />{$messages.memberName|default:''} ';
                        membreList.appendChild(text);

                        var text = document.createElement('div');
                        text.className = "pure-control-group";
                        text.innerHTML = '<label for="aligned-name">Nom </label><input type="text" name="memberFName" placeholder="Étienne" value = "{$valeurs.memberFName|escape|default:''}" />{$messages.memberFName|default:''} ';
                        membreList.appendChild(text);

                        var text = document.createElement('div');
                        text.className = "pure-control-group";
                        text.innerHTML = '<label for="aligned-name">Nom </label><input type="text" name="memberInstrument" placeholder="Kazoo, flûte à bec" value = "{$valeurs.memberInstrument|escape|default:''}" />{$messages.memberInstrument|default:''} ';
                        membreList.appendChild(text);
                    }
                });
            </script>
            <p>Morceaux (Format MP3)</p>
            
            <div class="file-input">
                <input id="audio1" type="file"class="file-input__input"/>
                <label class="file-input__label" for="audio1">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
                            <path fill="currentColor"
                                d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
                            ></path>
                        </svg> 
                    <span>Ajouter un fichier</span>
                </label>
            </div>

            <div class="file-input">
                <input id="audio2" type="file" class="file-input__input"/>
                <label class="file-input__label" for="audio2">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
                            <path fill="currentColor"
                                d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
                            ></path>
                        </svg> 
                    <span>Ajouter un fichier</span>
                </label>
            </div>   
            <div class="file-input">
                <input id="audio3" type="file" class="file-input__input"/>
                <label class="file-input__label" for="audio3">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
                            <path fill="currentColor"
                                d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
                            ></path>
                        </svg> 
                    <span>Ajouter un fichier</span>
                </label>
            </div>          
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
                <input type="checkbox" name="statutAssociatif" value = "{$valeurs.statutAssociatif|escape|default:''}" />
                {$messages.statutAssociatif|default:''}
            </div>
            <div class="pure-control-group">
                <label for="aligned-name">Inscrit à la SACEM</label>
                <input type="checkbox" name="sacem" value = "{$valeurs.sacem|escape|default:''}" />
                {$messages.sacem|default:''}
            </div>
            <div class="pure-control-group">
                <label for="aligned-name">Producteur</label>
                <input type="checkbox" name="producer" value = "{$valeurs.producer|escape|default:''}" />
                {$messages.producer|default:''}
            </div>

            <div class="pure-controls">
                <button type="submit" class="pure-button pure-button-primary">Valider</button>
            </div>
        </fieldset>
        </form>
    </div>
{/block}