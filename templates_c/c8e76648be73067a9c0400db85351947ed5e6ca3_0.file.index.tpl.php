<?php
/* Smarty version 3.1.39, created on 2021-12-07 14:57:12
  from 'C:\Users\jules\Desktop\Cours\S3\Web\document_root\festival\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61af7648c68736_08640515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8e76648be73067a9c0400db85351947ed5e6ca3' => 
    array (
      0 => 'C:\\Users\\jules\\Desktop\\Cours\\S3\\Web\\document_root\\festival\\templates\\index.tpl',
      1 => 1638889022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61af7648c68736_08640515 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_192035485361af7648c678a4_25764654', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_26976441861af7648c682a6_94759740', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_192035485361af7648c678a4_25764654 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_192035485361af7648c678a4_25764654',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Accueil<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_26976441861af7648c682a6_94759740 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_26976441861af7648c682a6_94759740',
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
