<?php
/* Smarty version 3.1.39, created on 2021-12-03 14:44:59
  from 'C:\Users\jules\Desktop\Cours\S3\Web\document_root\festival\site\templates\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61aa2d6bab4894_03078093',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23b035927af2dc80183d9c22ca7fedffce2c027c' => 
    array (
      0 => 'C:\\Users\\jules\\Desktop\\Cours\\S3\\Web\\document_root\\festival\\site\\templates\\layout.tpl',
      1 => 1638542695,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61aa2d6bab4894_03078093 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_34100685361aa2d6bab2881_32222293', 'title');
?>
</title>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_140058789861aa2d6bab3943_36301626', 'head');
?>

</head>
<body>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_61597059561aa2d6bab3eb1_34320345', 'menu');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_169658704461aa2d6bab4452_35464668', 'body');
?>

</body>
</html><?php }
/* {block 'title'} */
class Block_34100685361aa2d6bab2881_32222293 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_34100685361aa2d6bab2881_32222293',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Page Title<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_140058789861aa2d6bab3943_36301626 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_140058789861aa2d6bab3943_36301626',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
    <link rel="stylesheet" href="templates/style.css">
    <?php
}
}
/* {/block 'head'} */
/* {block 'menu'} */
class Block_61597059561aa2d6bab3eb1_34320345 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'menu' => 
  array (
    0 => 'Block_61597059561aa2d6bab3eb1_34320345',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div clas="nav">
        <div class="left">
            <a href="#">Accueil</a>
            <a href="#">Infos festival</a>
            <a href="#">test</a>
        </div>
        <div class="right">
                        <a href="#">connexion</a>
        </div>

    </div>
<?php
}
}
/* {/block 'menu'} */
/* {block 'body'} */
class Block_169658704461aa2d6bab4452_35464668 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_169658704461aa2d6bab4452_35464668',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Contenu générique<?php
}
}
/* {/block 'body'} */
}
