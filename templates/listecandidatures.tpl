{extends file='layout.tpl'}
{block name=title}Liste candidatures{/block}
{block name=body}
    {foreach from=$candidature item=candidat}
        <option  value="{$candidature['departement_nom']}">{$candidat['departement_nom']}</option>
    {/foreach}
{/block}