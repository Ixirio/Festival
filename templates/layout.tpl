<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{block name=title}Default Page Title{/block}</title>
    {block name=head}
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css"
              integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ"
              crossorigin="anonymous">
        <style>
            #main, footer {
                padding: 1em
            }
        </style>
        <link rel="stylesheet" href="templates\style.css">
    {/block}
</head>
{*
    
    Ce template est la navbar du site. C'est dans ce template qu'on décide ce qui est affiché,
    en fonction de si l'utilisateur est connecté ou non, et s'il est admin ou non.

*}
<body>
{block name=menu}
    <div class="nav">
        <a href="./">Accueil</a>

        {if isset($utilisateur)}
            <a href="candidature">Candidature</a>
            {if $utilisateur['admin'] == 1}
                <a href="listCandidatures">Liste Candidatures</a>
                <a href="listUsers">Liste Users</a>
            {/if}
            <div style="display: flex;">
                <a href="logout">Déconnexion</a>
            </div>
        {else}
            <a href="login">Candidature</a>
            <div style="display: flex;">
                <a href="login">Connexion</a>
                <p> | </p> <a href="register">Inscription</a>
            </div>
        {/if}
    </div>
{/block}
{block name=body}Contenu générique{/block}
</body>
</html>