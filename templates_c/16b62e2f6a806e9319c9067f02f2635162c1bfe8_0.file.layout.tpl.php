<?php
/* Smarty version 3.1.39, created on 2021-12-09 10:20:26
  from 'C:\Users\jules\Desktop\Cours\S3\Web\document_root\Festival\templates\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b1d86a9d3106_07367744',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16b62e2f6a806e9319c9067f02f2635162c1bfe8' => 
    array (
      0 => 'C:\\Users\\jules\\Desktop\\Cours\\S3\\Web\\document_root\\Festival\\templates\\layout.tpl',
      1 => 1639045128,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b1d86a9d3106_07367744 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_86407875661b1d86a9d12e5_91439925', 'title');
?>
</title>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_86466470761b1d86a9d1c61_64909853', 'head');
?>

</head>
<body>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_170831750961b1d86a9d23e9_46139919', 'menu');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_133729478161b1d86a9d2c27_03202161', 'body');
?>

</body>
</html><?php }
/* {block 'title'} */
class Block_86407875661b1d86a9d12e5_91439925 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_86407875661b1d86a9d12e5_91439925',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Page Title<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_86466470761b1d86a9d1c61_64909853 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_86466470761b1d86a9d1c61_64909853',
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
class Block_170831750961b1d86a9d23e9_46139919 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'menu' => 
  array (
    0 => 'Block_170831750961b1d86a9d23e9_46139919',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="nav">
        <a href="#">Accueil</a>
        <a href="#">Infos festival</a>
        <a href="#">test</a>
                <span>
        <a href="#">connexion</a>
        | 
        <a href="#">inscription</a>
        </span>

    </div>
<?php
}
}
/* {/block 'menu'} */
/* {block 'body'} */
class Block_133729478161b1d86a9d2c27_03202161 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_133729478161b1d86a9d2c27_03202161',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Contenu générique<?php
}
}
/* {/block 'body'} */
}
