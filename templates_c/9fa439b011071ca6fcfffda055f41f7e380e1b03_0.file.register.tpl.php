<?php
/* Smarty version 3.1.39, created on 2021-12-07 15:49:07
  from 'C:\Users\jules\Desktop\Cours\S3\Web\document_root\festival\templates\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61af827359a6d8_48560726',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fa439b011071ca6fcfffda055f41f7e380e1b03' => 
    array (
      0 => 'C:\\Users\\jules\\Desktop\\Cours\\S3\\Web\\document_root\\festival\\templates\\register.tpl',
      1 => 1638892146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61af827359a6d8_48560726 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_83828575661af82735912b9_29727940', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_120155947461af8273591a49_48170834', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_83828575661af82735912b9_29727940 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_83828575661af82735912b9_29727940',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_120155947461af8273591a49_48170834 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_120155947461af8273591a49_48170834',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id='main'>

    <h1>Inscription</h1>

    
    <form action="register" method="post" class="pure-form pure-form-stacked">
        <fieldset>
            <div class="pure-control-group">
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['pseudo'])===null||$tmp==='' ? '' : $tmp);?>

                <label for="aligned-name">Pseudo</label>
                <input type="text" name="pseudo" id="aligned-name" placeholder="Pseudo" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['pseudo'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
"/>
            </div>
            <div class="pure-control-group">
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['email'])===null||$tmp==='' ? '' : $tmp);?>

                <label for="aligned-email">Email</label>
                <input type="email" name="email" id="aligned-email" placeholder="Email" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['email'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
"/>
            </div>
            <div class="pure-control-group">
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['password'])===null||$tmp==='' ? '' : $tmp);?>

                <label for="aligned-password">Mot de passe</label>
                <input type="password" name="password" id="aligned-password" placeholder="Mot de passe" />
            </div>
            <div class="pure-controls">
                <button type="submit" class="pure-button pure-button-primary">Envoyer</button>
            </div>
        </fieldset>
    </form>
    
</div>
<?php
}
}
/* {/block 'body'} */
}
