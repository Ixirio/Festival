<?php
/* Smarty version 3.1.39, created on 2021-12-09 10:20:26
  from 'C:\Users\jules\Desktop\Cours\S3\Web\document_root\Festival\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b1d86a94a359_42776870',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02206ff6b78c9317ee25f3bb0e65b61576c68ff6' => 
    array (
      0 => 'C:\\Users\\jules\\Desktop\\Cours\\S3\\Web\\document_root\\Festival\\templates\\index.tpl',
      1 => 1639045128,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b1d86a94a359_42776870 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_128870949761b1d86a926239_56038474', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_88714992961b1d86a941437_58262764', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_128870949761b1d86a926239_56038474 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_128870949761b1d86a926239_56038474',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Accueil<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_88714992961b1d86a941437_58262764 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_88714992961b1d86a941437_58262764',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id='main'>

    <h1>Home</h1>
    
</div>
<?php
}
}
/* {/block 'body'} */
}
