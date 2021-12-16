{extends file='layout.tpl'}
{block name=title}Inscription{/block}
{block name=body}

<div class="image">
    <div class="container">

        <h1>Inscription</h1>
        
        {*
    
        Formulaire d'enregistrement, la méthode post permet de dire au formulaire que le contenu des champs du formulaire sera envoyé au fichier routes.php
        On fait aussi en sorte que s'il y a eu des erreurs lors du remplissage du formulaire, les messages d'erreurs soient affichés après l'input correspondant au message d'erreur. 
        De plus, le contenu que l'utilisateur a renseigné dans les inputs sera conservé si la page est ré-affichée, excepté pour le mot de passe pour des soucis de sécurité.

        *}

        <form action="register" method="post" class="pure-form pure-form-stacked">
            <fieldset>
                <div class="pure-control-group">
                    <label for="aligned-name">Pseudo</label>
                    <input type="text" name="name" id="aligned-name" placeholder="Pseudo" value="{$valeurs.name|escape|default:''}" required=""/>
                    {$messages.name|default:''}
                </div>
                <div class="pure-control-group">
                    <label for="aligned-email">Email</label>
                    <input type="email" name="mail" id="aligned-mail" placeholder="Email" value="{$valeurs.mail|escape|default:''}" required=""/>
                    {$messages.mail|default:''}
                </div>
                <div class="pure-control-group">
                    <label for="aligned-password">Mot de passe</label>
                    <input type="password" name="password" id="aligned-password" placeholder="Mot de passe" required=""/>
                    {$messages.password|default:''}
                </div>
                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">Envoyer</button>
                </div>
            </fieldset>
        </form>
        
    </div>
</div>
{/block}