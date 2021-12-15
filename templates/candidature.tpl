{extends file='layout.tpl'}
{block name=title}Candidature{/block}
{block name=body}
<h1>Candidature</h1>
<div id='main'>
<p>
   <form action="candidature" method="post" class="pure-form pure-form-stacked">
    <fieldset>
        <div class="pure-control-group">
            <label for="aligned-name">Nom du groupe</label>
            <input type="text" name="groupeName" placeholder="Nom du groupe" value = "{$valeurs.groupName|escape|default:''}" />
            {$messages.groupName|default:''} 
        </div>



        Département d'origine :
        <select name="departement" id="departement">
            {foreach from=$departements item=depart}
                <option value="{$depart['departement_nom']}">{$depart['departement_nom']}</option>
            {/foreach}
        </select>
        Type de scène :
        <select name="sceneType" id="sceneType">
            <option value="tribute">Tribute</option>
            <option value="acoustique_folk">Acoustique, Folk</option>
            <option value="amplifie_rock">Amplifié, Rock</option>
        </select>

        <p>Représentant du groupe :
            <div class="pure-control-group">
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

            <br>
            <br>

        </fieldset>
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
                <textarea rows="8" cols="50" name="textPresentation" placeholder="We're no strangers to love
You know the rules and so do I
A full commitment's what I'm thinking of
You wouldn't get this from any other guy
I just wanna tell you how I'm feeling
Gotta make you understand
Never gonna give you up
Never gonna let you down..." value = "{$valeurs.textPresentation|escape|default:''}" ></textarea>
        {$messages.textPresentation|default:''} 
        </div>

        <div class="pure-control-group">
                <label for="aligned-name">Expériences scéniques </label>
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
        Membres du groupe :
        <select name="memberNumber" class="memberNb" id="memberNumberSelect">
            <option value="1" selected="selected">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>



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
        <form action="envoi" method="post" enctype="multipart/form-data">
        Morceaux (Format MP3)
        <input name="audio1" type="file">
        <input name="audio2" type="file">       
        <input name="audio3" type="file">    
        PDF dossier de presse (facultatif)   
        <input name="pdfpresse" type="file">  
        Photos du groupe (résolution>300DPI) 
        <input name="photo1" type="file">     
        <input name="photo2" type="file">
        PDF Fiche technique
        <input name="fichetechnique" type="file">
        Document SACEM PDF / PDF contenant la liste des noms, compositeurs et durées des morceaux.      
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
            
        </div>
        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Valider</button>
        </div>
    </fieldset>
</form>
</p>
</div>
{/block}