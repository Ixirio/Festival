<html>
<head>
    <title>{block name=title}Default Page Title{/block}</title>
    {block name=head}
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
    <style>
        #main,footer{ padding:1em }
    </style>
    <link rel="stylesheet" href="templates\style.css">
    {/block}
</head>
<body>
{block name=menu}
    <div class="nav">
        <a href="./">Accueil</a>
        <a href="candidature">Candidature</a>
        <div style="display: flex;">
        {if isset($utilisateur)}
            
            {if $utilisateur.admin = "1"}
                {*<a href="./">Admin</a>*}
            {else}
                {*<a href="./">userSet</a>*}
            {/if}
            
                <a href="profil">Profil</a> <p> | </p> <a href="logout">Deconnexion</a>
        {else}
                <a href="login">Connexion</a> <p> | </p> <a href="register">Inscription</a>
        {/if}
        
        </div>

    </div>
{/block}
{block name=body}Contenu générique{/block}
</body>
</html>