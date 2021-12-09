<?php
/* Smarty version 3.1.39, created on 2021-12-09 13:46:17
  from '/var/www/html/Festival/templates/success.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b1fa99426b56_00125453',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fece7c9b93d5f5b43db93022388e213b5b15e5f' => 
    array (
      0 => '/var/www/html/Festival/templates/success.tpl',
      1 => 1639053946,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b1fa99426b56_00125453 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_137301164661b1fa99425928_47442427', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_30812539061b1fa994262e0_29177769', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_137301164661b1fa99425928_47442427 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_137301164661b1fa99425928_47442427',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Success<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_30812539061b1fa994262e0_29177769 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_30812539061b1fa994262e0_29177769',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id='main'>
<h1>Inscription Réussie</h1>
<p>Félicitation !</p>
</div>
<?php
}
}
/* {/block 'body'} */
}
