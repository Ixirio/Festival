{extends file='layout.tpl'}
{block name=title}Login{/block}
{block name=body}

<div class="image">
    <div class="container">

        <h1>Login</h1>

        <form action="login" method="post" class="pure-form pure-form-stacked">
            <fieldset>
                <div class="pure-control-group">
                    <label for="aligned-login">Email</label>
                    <input type="text" name="login" id="aligned-login" placeholder="mail/pseudo" value="{$valeurs.login|escape|default:''}" required=""/>
                    {$messages.login|default:''}
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