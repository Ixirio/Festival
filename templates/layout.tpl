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
        <a href="#">Accueil</a>
        <a href="#">Infos festival</a>
        <a href="#">test</a>
        {* connexion / inscription / espace user / espace admin *}
        <span>
        <a href="#">connexion</a>
        | 
        <a href="#">inscription</a>
        </span>

    </div>
{/block}
{block name=body}Contenu générique{/block}
</body>
</html>