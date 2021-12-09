<?php
/* Smarty version 3.1.39, created on 2021-12-09 13:04:15
  from '/var/www/html/Festival/templates/layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b1f0bfd6b826_52892008',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ea1deaf0af012aeb3ad164002722d627ed94e9d' => 
    array (
      0 => '/var/www/html/Festival/templates/layout.tpl',
      1 => 1639051450,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b1f0bfd6b826_52892008 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_85241221561b1f0bfd63f71_85334699', 'title');
?>
</title>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5029251961b1f0bfd67200_61588982', 'head');
?>

</head>
<body>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_173926603761b1f0bfd68aa8_09888313', 'menu');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_82471378661b1f0bfd6a5e7_50685665', 'body');
?>

</body>
</html><?php }
/* {block 'title'} */
class Block_85241221561b1f0bfd63f71_85334699 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_85241221561b1f0bfd63f71_85334699',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Page Title<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_5029251961b1f0bfd67200_61588982 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_5029251961b1f0bfd67200_61588982',
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
class Block_173926603761b1f0bfd68aa8_09888313 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'menu' => 
  array (
    0 => 'Block_173926603761b1f0bfd68aa8_09888313',
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
class Block_82471378661b1f0bfd6a5e7_50685665 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_82471378661b1f0bfd6a5e7_50685665',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Contenu générique<?php
}
}
/* {/block 'body'} */
}
