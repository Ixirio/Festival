<?php
/* Smarty version 3.1.39, created on 2021-12-14 13:33:23
  from 'C:\laragon\www\tps\Festival\templates\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b89d2399c722_28898392',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f02b3729b862087eb248f91b3a706b1a5f5499be' => 
    array (
      0 => 'C:\\laragon\\www\\tps\\Festival\\templates\\layout.tpl',
      1 => 1639488796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b89d2399c722_28898392 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_207348656561b89d23990480_50598023', 'title');
?>
</title>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_94376687961b89d2399b4a7_13624743', 'head');
?>

</head>
<body>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_62784639161b89d2399bbb8_09899177', 'menu');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_29330215661b89d2399c1f5_24998217', 'body');
?>

</body>
</html><?php }
/* {block 'title'} */
class Block_207348656561b89d23990480_50598023 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_207348656561b89d23990480_50598023',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Page Title<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_94376687961b89d2399b4a7_13624743 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_94376687961b89d2399b4a7_13624743',
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
class Block_62784639161b89d2399bbb8_09899177 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'menu' => 
  array (
    0 => 'Block_62784639161b89d2399bbb8_09899177',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="nav">
        <a href="./">Accueil</a>
        <a href="candidature">Candidature</a>
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
class Block_29330215661b89d2399c1f5_24998217 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_29330215661b89d2399c1f5_24998217',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Contenu générique<?php
}
}
/* {/block 'body'} */
}
