<?php
/* Smarty version 3.1.39, created on 2021-12-14 13:53:06
  from 'C:\laragon\www\tps\Festival\templates\candidature.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61b8a1c2318566_79875016',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98c3e1f222577bd0c9b09928c30e6cfac4a9faaa' => 
    array (
      0 => 'C:\\laragon\\www\\tps\\Festival\\templates\\candidature.tpl',
      1 => 1639489983,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b8a1c2318566_79875016 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_214664194261b8a1c22f8b52_65850898', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_164645996061b8a1c22f9cc8_90258448', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_214664194261b8a1c22f8b52_65850898 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_214664194261b8a1c22f8b52_65850898',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Candidature<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_164645996061b8a1c22f9cc8_90258448 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_164645996061b8a1c22f9cc8_90258448',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h1>Candidature</h1>
<div id='main'>
<p>
   <form action="candidature" method="post" class="pure-form pure-form-stacked">
    <fieldset>
        <div class="pure-control-group">
            <label for="aligned-name">Nom du groupe</label>
            <input type="text" name="groupeName" placeholder="Nom du groupe" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['groupName'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['groupName'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>
                Département d'origine :
        <select name="departement" id="departement">
            <option value="somme">Somme</option>
            <option value="picardie">Picardie</option>
            <option value="">ça va être long je crois on doit le faire via une base de données</option>
            <option value="">La terre du milieu</option>
            <option value="">Tatouine</option>
            <option value="">Grand line</option>
            <option value="">Namek</option>
        </select>
        Type de scène :
        <select name="sceneType" id="sceneType">
            <option value="tribute">Tribute</option>
            <option value="acoustique_folk">Acoustique, Folk</option>
            <option value="amplifie_rock">Amplifié, Rock</option>
        </select>

        <p>Représentant du groupe :
            <div class="pure-control-group">
                <label for="aligned-name">Nom </label>
                <input type="text" name="repName" placeholder="Dupont" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['repName'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['repName'])===null||$tmp==='' ? '' : $tmp);?>
 
            </div>
            <div class="pure-control-group">
                <label for="aligned-name">Prénom </label>
                <input type="text" name="repFName" placeholder="Claude" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['repFName'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['repFName'])===null||$tmp==='' ? '' : $tmp);?>
 
            </div>
            <div class="pure-control-group">
                <label for="aligned-name">Adresse </label>
                <input type="text" name="repAddress" placeholder="47 rue des robiniers, New York" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['repAddress'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['repAddress'])===null||$tmp==='' ? '' : $tmp);?>
 
            </div>
            <div class="pure-control-group">
                <label for="aligned-name">Code postal </label>
                <input type="text" name="repPostCode" placeholder="80000" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['repPostCode'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['repPostCode'])===null||$tmp==='' ? '' : $tmp);?>
 
            </div>
            <div class="pure-control-group">
                <label for="email">Adresse e-mail </label>
                <input type="text" name="repMail" placeholder="claude.dupont@gmail.com" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['repMail'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['repMail'])===null||$tmp==='' ? '' : $tmp);?>

            </div>
            <div class="pure-control-group">
                <label for="aligned-name">Téléphone </label>
                <input type="text" name="repPhone" placeholder="0607080910" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['repName'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['repPhone'])===null||$tmp==='' ? '' : $tmp);?>
 
            </div>

            <br>
            <br>

        </p>
        <div class="pure-control-group">
            <label for="aligned-name">Style Musical </label>
            <input type="text" name="musicType" placeholder="Rock" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['musicType'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['musicType'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>
        <div class="pure-control-group">
            <label for="aligned-name">Année de création </label>
            <input type="text" name="yearOfCreation" placeholder="2010" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['yearOfCreation'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['yearOfCreation'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>

        <div class="pure-control-group">
                <label for="aligned-name">Présentation du texte </label>
                <textarea rows="8" cols="50" name="textPresentation" placeholder="We're no strangers to love
You know the rules and so do I
A full commitment's what I'm thinking of
You wouldn't get this from any other guy
I just wanna tell you how I'm feeling
Gotta make you understand
Never gonna give you up
Never gonna let you down..." value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['textPresentation'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" ></textarea>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['textPresentation'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>

        <div class="pure-control-group">
                <label for="aligned-name">Expériences scéniques </label>
                <textarea rows="8" cols="50" name="scenicExperiences" placeholder="Une fois j'ai joué pour la kermesse de l'école primaire de mon village" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['scenicExperiences'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" ></textarea>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['scenicExperiences'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>

        <div class="pure-control-group">
                <label for="aligned-name">Site Internet / Facebook </label>
                <input type="url" name="website" placeholder="https://monsite.fr" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['website'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['website'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>
        <div class="pure-control-group">
                <label for="aligned-name">Soundcloud (Facultatif) </label>
                <input type="url" name="soundcloud" placeholder="https://soundcloud.com" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['soundcloud'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['soundcloud'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>
        <div class="pure-control-group">
                <label for="aligned-name">Youtube (Facultatif) </label>
                <input type="url" name="youtube" placeholder="https://youtube.com" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['youtube'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['youtube'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>
        Membres du groupe :
        <select name="memberNumber" id="memberNumberSelect">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
                <div class="pure-control-group">
                <label for="aligned-name">Nom </label>
                <input type="text" name="memberName" placeholder="Pichard" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['memberName'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['memberName'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>
        <div class="pure-control-group">
                <label for="aligned-name">Prénom </label>
                <input type="text" name="memberFName" placeholder="Étienne" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['memberFName'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['memberFName'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>
        <div class="pure-control-group">
                <label for="aligned-name">Instrument(s) </label>
                <input type="text" name="memberInstrument" placeholder="Kazoo, flûte à bec" value ="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['memberInstrument'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
"/>
        </div>
                <form action="envoi" method="post" enctype="multipart/form-data">
        Morceaux (Format MP3)
        <input name="audio1" type="file">
        <input name="audio2" type="file">       
        <input name="audio3" type="file">    
        PDF dossier de presse (facultatif)   
        <input name="pdfpresse" type="file">  
        Photos du groupe (résolution>300DPI) 
        <input name="photo1" type="file">     
        <input name="photo2" type="file">
        PDF Fiche technique
        <input name="fichetechnique" type="file">
        Document SACEM PDF / PDF contenant la liste des noms, compositeurs et durées des morceaux.      
        <input name="docSacem" type="file">

        <div class="pure-control-group">
            <label for="aligned-name">Statut associatif</label>
            <input type="checkbox" name="statutAssociatif" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['statutAssociatif'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['statutAssociatif'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>
        <div class="pure-control-group">
            <label for="aligned-name">Inscrit à la SACEM</label>
            <input type="checkbox" name="sacem" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['sacem'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['sacem'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>
        <div class="pure-control-group">
            <label for="aligned-name">Producteur</label>
            <input type="checkbox" name="producer" value = "<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['producer'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" />
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['producer'])===null||$tmp==='' ? '' : $tmp);?>
 
        </div>
            
        </div>
        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Valider</button>
        </div>
    </fieldset>
</form>
</p>
</div>
<?php
}
}
/* {/block 'body'} */
}
