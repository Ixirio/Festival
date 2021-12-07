<?php
/* Smarty version 3.1.39, created on 2021-12-07 15:02:22
  from 'C:\Users\jules\Desktop\Cours\S3\Web\document_root\festival\templates\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61af777eadf805_42127076',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f47e6df2c47e20b88b358d4acd5e4955e45e8acd' => 
    array (
      0 => 'C:\\Users\\jules\\Desktop\\Cours\\S3\\Web\\document_root\\festival\\templates\\layout.tpl',
      1 => 1638889285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61af777eadf805_42127076 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21016007661af777eadd135_03767943', 'title');
?>
</title>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_104287347961af777eade557_81456238', 'head');
?>

</head>
<body>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_213174938261af777eadebc9_53310601', 'menu');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_170134028661af777eadf218_80140159', 'body');
?>

</body>
</html><?php }
/* {block 'title'} */
class Block_21016007661af777eadd135_03767943 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_21016007661af777eadd135_03767943',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Page Title<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_104287347961af777eade557_81456238 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_104287347961af777eade557_81456238',
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
class Block_213174938261af777eadebc9_53310601 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'menu' => 
  array (
    0 => 'Block_213174938261af777eadebc9_53310601',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="nav">
        <a href="#">Accueil</a>
        <a href="#">Infos festival</a>
        <a href="#">test</a>
                <a href="#" id="gauche">connexion</a>

    </div>
<?php
}
}
/* {/block 'menu'} */
/* {block 'body'} */
class Block_170134028661af777eadf218_80140159 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_170134028661af777eadf218_80140159',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Contenu générique<?php
}
}
/* {/block 'body'} */
}
