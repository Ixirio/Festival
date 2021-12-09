<?php
/* Smarty version 3.1.39, created on 2021-12-09 13:41:21
  from '/var/www/html/Festival/templates/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b1f9715720c1_17807188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '027494244b248b895318e804824c9bdafb9fe26b' => 
    array (
      0 => '/var/www/html/Festival/templates/register.tpl',
      1 => 1639053533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b1f9715720c1_17807188 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_208883914561b1f97155fbd8_19576276', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13791579561b1f9715629f3_33250238', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_208883914561b1f97155fbd8_19576276 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_208883914561b1f97155fbd8_19576276',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_13791579561b1f9715629f3_33250238 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_13791579561b1f9715629f3_33250238',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id='main'>

    <h1>Inscription</h1>

    
    <form action="register" method="post" class="pure-form pure-form-stacked">
        <fieldset>
            <div class="pure-control-group">
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['name'])===null||$tmp==='' ? '' : $tmp);?>

                <label for="aligned-name">Pseudo</label>
                <input type="text" name="name" id="aligned-name" placeholder="Pseudo" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
"/>
            </div>
            <div class="pure-control-group">
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['mail'])===null||$tmp==='' ? '' : $tmp);?>

                <label for="aligned-email">Email</label>
                <input type="email" name="mail" id="aligned-mail" placeholder="Email" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['mail'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
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
