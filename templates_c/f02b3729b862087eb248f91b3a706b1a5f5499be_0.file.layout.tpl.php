<?php
/* Smarty version 3.1.39, created on 2021-12-09 13:28:51
  from 'C:\laragon\www\tps\Festival\templates\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b204938a4470_75070673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f02b3729b862087eb248f91b3a706b1a5f5499be' => 
    array (
      0 => 'C:\\laragon\\www\\tps\\Festival\\templates\\layout.tpl',
      1 => 1639055143,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b204938a4470_75070673 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_131044723961b204938a2968_67007035', 'title');
?>
</title>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_168863386361b204938a30d3_54778123', 'head');
?>

</head>
<body>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_213681928861b204938a3737_60589037', 'menu');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_81449349061b204938a3fc5_62881576', 'body');
?>

</body>
</html><?php }
/* {block 'title'} */
class Block_131044723961b204938a2968_67007035 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_131044723961b204938a2968_67007035',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Page Title<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_168863386361b204938a30d3_54778123 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_168863386361b204938a30d3_54778123',
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
class Block_213681928861b204938a3737_60589037 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'menu' => 
  array (
    0 => 'Block_213681928861b204938a3737_60589037',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="nav">
        <a href="./">Accueil</a>
        <a href="./">Infos festival</a>
        <a href="./">test</a>
                <span>
        <a href="login">connexion</a>
        | 
        <a href="register">inscription</a>
        </span>

    </div>
<?php
}
}
/* {/block 'menu'} */
/* {block 'body'} */
class Block_81449349061b204938a3fc5_62881576 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_81449349061b204938a3fc5_62881576',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Contenu générique<?php
}
}
/* {/block 'body'} */
}
