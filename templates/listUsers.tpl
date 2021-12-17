{extends file='layout.tpl'}
{block name=title}userList{/block}
{block name=body}

<div class="image">

    <div class="container" style="color: #fff;">
        <h1>Liste des inscrits</h1>
        <hr>
        <table class="pure-table pure-table-bordered">
            <thead>
            <tr class="table-title">
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Mail</th>
            </tr>
            </thead>
            <tbody>

            {$counter = 1}

            {foreach from=$users item=user}

                <tr class="pure-table-odd">
                    <td>{$counter}</td>
                    <td>{$user.name}</td>
                    <td>{$user.mail}</td>
                </tr>
                {$counter = $counter + 1}
            {/foreach}


            </tbody>
        </table>

    </div>
</div>

{/block}