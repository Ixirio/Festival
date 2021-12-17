<?php
/* Smarty version 3.1.39, created on 2021-12-17 11:16:12
  from 'C:\Users\jules\Desktop\Cours\S3\Web\document_root\Festival\templates\showCandidature.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61bc717c0b01a7_04752241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb110f17608a8fef2ff96fe83ebff7a29a53c24c' => 
    array (
      0 => 'C:\\Users\\jules\\Desktop\\Cours\\S3\\Web\\document_root\\Festival\\templates\\showCandidature.tpl',
      1 => 1639739603,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61bc717c0b01a7_04752241 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_176972013661bc717c0a53f8_57965247', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_93677903661bc717c0a5bc1_70368183', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_176972013661bc717c0a53f8_57965247 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_176972013661bc717c0a53f8_57965247',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Candidature<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_93677903661bc717c0a5bc1_70368183 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_93677903661bc717c0a5bc1_70368183',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="image">
    
    <div class="container">

        
        <?php if ($_smarty_tpl->tpl_vars['utilisateur']->value['admin'] == "1") {?>
            
        <?php } else { ?>
            
            <div class="cadre" style="padding: 0 20px 20px 20px">
                <h1><?php echo $_smarty_tpl->tpl_vars['data']->value['NOM_GROUPE'];?>
</h1>
                <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['PHOTO_1'];?>
" height="300px" width="500px">
                <p><audio controls src="<?php echo $_smarty_tpl->tpl_vars['data']->value['AUDIO_1'];?>
"></audio></p>
                <p><audio controls src="<?php echo $_smarty_tpl->tpl_vars['data']->value['AUDIO_2'];?>
"></audio></p>
                <p><audio controls src="<?php echo $_smarty_tpl->tpl_vars['data']->value['AUDIO_3'];?>
"></audio></p>

                <p>Departement : <?php echo $_smarty_tpl->tpl_vars['data']->value['DEPARTEMENT'];?>
</p>
                <p>Code postal : <?php echo $_smarty_tpl->tpl_vars['data']->value['POSTAL_REP'];?>
</p>
                <p>Style : <?php echo $_smarty_tpl->tpl_vars['data']->value['STYLE'];?>
</p>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['SOUNDCLOUD'] != NULL) {?>
                    <p>Soundcloud : <?php echo $_smarty_tpl->tpl_vars['data']->value['SOUNDCLOUD'];?>
</p>
                <?php }?>
                
                <?php if ($_smarty_tpl->tpl_vars['data']->value['YOUTUBE'] != NULL) {?>
                    <p>Youtube : <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['YOUTUBE'];?>
"> <?php echo $_smarty_tpl->tpl_vars['data']->value['YOUTUBE'];?>
</p>
                <?php }?>
                
                <p>Site : <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['SITE_FACEBOOK'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['SITE_FACEBOOK'];?>
</a></p>

                <p>Expériences : <?php echo $_smarty_tpl->tpl_vars['data']->value['EXP_SCENIQUE'];?>
</p>
                <p>Présentation : <?php echo $_smarty_tpl->tpl_vars['data']->value['PRESENTATION_TXT'];?>
</p>
                
                <h2>Dossier</h2>
                <p><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['SACEM_PDF'];?>
">SetList/Sacem</a></p>
                <p><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['FICHE_TECHNIQUE'];?>
">Fiche technique</a> </p>
                    
            </div>
        <?php }?>

    </div>
</div>
<?php
}
}
/* {/block 'body'} */
}
