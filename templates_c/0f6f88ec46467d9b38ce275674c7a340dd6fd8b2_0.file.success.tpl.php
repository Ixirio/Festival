<?php
/* Smarty version 3.1.39, created on 2021-12-09 13:31:17
  from 'C:\laragon\www\tps\Festival\templates\success.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b20525a67867_90202373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f6f88ec46467d9b38ce275674c7a340dd6fd8b2' => 
    array (
      0 => 'C:\\laragon\\www\\tps\\Festival\\templates\\success.tpl',
      1 => 1639055143,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b20525a67867_90202373 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_151455445961b20525a661c7_78119075', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_124104265261b20525a67040_50029624', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_151455445961b20525a661c7_78119075 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_151455445961b20525a661c7_78119075',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Success<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_124104265261b20525a67040_50029624 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_124104265261b20525a67040_50029624',
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
