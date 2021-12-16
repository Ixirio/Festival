{extends file='layout.tpl'}
{block name=title}Login{/block}
{block name=body}

<div class="image">
    <div class="container">

        {*
    
        Formulaire de connexion, idem que dans register.tpl

        *}

        <form action="login" method="post" class="pure-form pure-form-stacked">
        
            <h1>Login</h1>
            
            <fieldset>
                <div class="pure-control-group">
                    <label for="aligned-login">Email</label>
                    <input id="centered" type="text" name="login" id="aligned-login" placeholder="mail/pseudo" value="{$valeurs.login|escape|default:''}" required=""/>
                    {$messages.login|default:''}
                </div>
                <div class="pure-control-group">
                    <label for="aligned-password">Mot de passe</label>
                    <input type="password" name="password" id="aligned-password" placeholder="Mot de passe" required=""/>
                    {$messages.password|default:''}
                </div>
                <div class="pure-control-group">
                    <button type="submit" class="pure-button pure-button-primary">Envoyer</button>
                </div>
            </fieldset>
        </form>

    </div>
</div>
{/block}