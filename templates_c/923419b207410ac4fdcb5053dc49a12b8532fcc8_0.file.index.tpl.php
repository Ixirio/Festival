<?php
/* Smarty version 3.1.39, created on 2021-12-09 13:00:36
  from '/var/www/html/Festival/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b1efe4401260_30424610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '923419b207410ac4fdcb5053dc49a12b8532fcc8' => 
    array (
      0 => '/var/www/html/Festival/templates/index.tpl',
      1 => 1639051088,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b1efe4401260_30424610 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_43765140461b1efe43ffc86_62308778', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19562175161b1efe4400c00_85675289', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_43765140461b1efe43ffc86_62308778 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_43765140461b1efe43ffc86_62308778',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Accueil<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_19562175161b1efe4400c00_85675289 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_19562175161b1efe4400c00_85675289',
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
