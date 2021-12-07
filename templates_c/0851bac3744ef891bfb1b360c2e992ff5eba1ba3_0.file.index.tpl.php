<?php
/* Smarty version 3.1.39, created on 2021-12-03 14:44:11
  from 'C:\Users\jules\Desktop\Cours\S3\Web\document_root\festival\site\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61aa2d3b0d5b45_26379202',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0851bac3744ef891bfb1b360c2e992ff5eba1ba3' => 
    array (
      0 => 'C:\\Users\\jules\\Desktop\\Cours\\S3\\Web\\document_root\\festival\\site\\templates\\index.tpl',
      1 => 1638542443,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61aa2d3b0d5b45_26379202 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_29966964961aa2d3b0d42d8_68275865', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_157871461261aa2d3b0d54f6_19225449', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_29966964961aa2d3b0d42d8_68275865 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_29966964961aa2d3b0d42d8_68275865',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Accueil<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_157871461261aa2d3b0d54f6_19225449 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_157871461261aa2d3b0d54f6_19225449',
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
