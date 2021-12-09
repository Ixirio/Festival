<?php
/* Smarty version 3.1.39, created on 2021-12-09 13:00:47
  from '/var/www/html/Festival/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b1efefcd76c0_64362835',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ab84a04c764b894280e536a5fddcb81cd437365' => 
    array (
      0 => '/var/www/html/Festival/templates/login.tpl',
      1 => 1639051088,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b1efefcd76c0_64362835 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_149678890761b1efefcc8045_19809405', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_193786501661b1efefcc96e9_81442692', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_149678890761b1efefcc8045_19809405 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_149678890761b1efefcc8045_19809405',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Login<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_193786501661b1efefcc96e9_81442692 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_193786501661b1efefcc96e9_81442692',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h1>Login</h1>
<div id='main'>


    <form action="login" method="post" class="pure-form pure-form-stacked">
        <fieldset>
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
