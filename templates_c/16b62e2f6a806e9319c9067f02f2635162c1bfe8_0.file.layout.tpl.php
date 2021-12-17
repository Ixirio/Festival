<?php
/* Smarty version 3.1.39, created on 2021-12-17 11:16:12
  from 'C:\Users\jules\Desktop\Cours\S3\Web\document_root\Festival\templates\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61bc717c184645_28705576',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16b62e2f6a806e9319c9067f02f2635162c1bfe8' => 
    array (
      0 => 'C:\\Users\\jules\\Desktop\\Cours\\S3\\Web\\document_root\\Festival\\templates\\layout.tpl',
      1 => 1639739314,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61bc717c184645_28705576 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19696810161bc717c181db6_78848122', 'title');
?>
</title>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_47929085761bc717c182421_05618584', 'head');
?>

</head>
<body>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_165904094761bc717c182af0_64688437', 'menu');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_58136632161bc717c1841e0_34938364', 'body');
?>

</body>
</html><?php }
/* {block 'title'} */
class Block_19696810161bc717c181db6_78848122 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_19696810161bc717c181db6_78848122',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Page Title<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_47929085761bc717c182421_05618584 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_47929085761bc717c182421_05618584',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
    <style>
        #main,footer{ padding:1em }
    </style>
    <link rel="stylesheet" href="templates\style.css">
    <?php
}
}
/* {/block 'head'} */
/* {block 'menu'} */
class Block_165904094761bc717c182af0_64688437 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'menu' => 
  array (
    0 => 'Block_165904094761bc717c182af0_64688437',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="nav">
        <a href="./">Accueil</a>
        <?php if ((isset($_smarty_tpl->tpl_vars['utilisateur']->value))) {?>
            <a href="candidature">Candidature</a>
        <?php } else { ?>
            <a href="login">Candidature</a>
        <?php }?>
        <div style="display: flex;">
        <?php if ((isset($_smarty_tpl->tpl_vars['utilisateur']->value))) {?>
    
            <a href="logout">Déconnexion</a>
        <?php } else { ?>
            <a href="login">Connexion</a> <p> | </p> <a href="register">Inscription</a>
        <?php }?>
        
        </div>

    </div>
<?php
}
}
/* {/block 'menu'} */
/* {block 'body'} */
class Block_58136632161bc717c1841e0_34938364 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_58136632161bc717c1841e0_34938364',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Contenu générique<?php
}
}
/* {/block 'body'} */
}
