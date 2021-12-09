{extends file='layout.tpl'}
{block name=title}Login{/block}
{block name=body}
<h1>Login</h1>
<div id='main'>


    <form action="login" method="post" class="pure-form pure-form-stacked">
        <fieldset>
            <div class="pure-control-group">
                {$messages.email|default:''}
                <label for="aligned-email">Email</label>
                <input type="email" name="email" id="aligned-email" placeholder="Email" value="{$valeurs.email|escape|default:''}"/>
            </div>
            <div class="pure-control-group">
                {$messages.password|default:''}
                <label for="aligned-password">Mot de passe</label>
                <input type="password" name="password" id="aligned-password" placeholder="Mot de passe" />
            </div>
            <div class="pure-controls">
                <button type="submit" class="pure-button pure-button-primary">Envoyer</button>
            </div>
        </fieldset>
    </form>

</div>
{/block}