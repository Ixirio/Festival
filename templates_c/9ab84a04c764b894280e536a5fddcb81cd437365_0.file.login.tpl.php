<?php
/* Smarty version 3.1.39, created on 2021-12-09 13:19:05
  from '/var/www/html/Festival/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b1f4395fcb04_27198900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ab84a04c764b894280e536a5fddcb81cd437365' => 
    array (
      0 => '/var/www/html/Festival/templates/login.tpl',
      1 => 1639052017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b1f4395fcb04_27198900 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_180811177561b1f4395f4bf2_16993282', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8228315561b1f4395f5d34_70326683', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_180811177561b1f4395f4bf2_16993282 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_180811177561b1f4395f4bf2_16993282',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Login<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_8228315561b1f4395f5d34_70326683 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_8228315561b1f4395f5d34_70326683',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h1>Login</h1>
<div id='main'>


    <form action="login" method="post" class="pure-form pure-form-stacked">
        <fieldset>
            <div class="pure-control-group">
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['login'])===null||$tmp==='' ? '' : $tmp);?>

                <label for="aligned-login">Email</label>
                <input type="text" name="login" id="aligned-login" placeholder="mail/pseudo" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['login'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
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
