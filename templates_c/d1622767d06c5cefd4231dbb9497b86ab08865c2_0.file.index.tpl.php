<?php
/* Smarty version 3.1.39, created on 2021-12-09 13:28:51
  from 'C:\laragon\www\tps\Festival\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b204938677c1_69952488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1622767d06c5cefd4231dbb9497b86ab08865c2' => 
    array (
      0 => 'C:\\laragon\\www\\tps\\Festival\\templates\\index.tpl',
      1 => 1639046449,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b204938677c1_69952488 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9890633261b20493866121_58561339', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_86411107361b20493867197_82438407', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_9890633261b20493866121_58561339 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_9890633261b20493866121_58561339',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Accueil<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_86411107361b20493867197_82438407 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_86411107361b20493867197_82438407',
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
