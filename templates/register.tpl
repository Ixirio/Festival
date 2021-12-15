{extends file='layout.tpl'}
{block name=title}Inscription{/block}
{block name=body}
<div class="container">

    <h1>Inscription</h1>
    
    <form action="register" method="post" class="pure-form pure-form-stacked">
        <fieldset>
            <div class="pure-control-group">
                {$messages.name|default:''}
                <label for="aligned-name">Pseudo</label>
                <input type="text" name="name" id="aligned-name" placeholder="Pseudo" value="{$valeurs.name|escape|default:''}" required=""/>
            </div>
            <div class="pure-control-group">
                {$messages.mail|default:''}
                <label for="aligned-email">Email</label>
                <input type="email" name="mail" id="aligned-mail" placeholder="Email" value="{$valeurs.mail|escape|default:''}" required=""/>
            </div>
            <div class="pure-control-group">
                {$messages.password|default:''}
                <label for="aligned-password">Mot de passe</label>
                <input type="password" name="password" id="aligned-password" placeholder="Mot de passe" required=""/>
            </div>
            <div class="pure-controls">
                <button type="submit" class="pure-button pure-button-primary">Envoyer</button>
            </div>
        </fieldset>
    </form>
    
</div>
{/block}