{extends file='layout.tpl'}
{block name=title}userList{/block}
{block name=body}

    <div class="container">
        <h1 class="text-center h1-font">Liste des produits</h1>
        <hr class="divider">
        <table class="table table-glass table-hover table-borderless">
            <thead>
            <tr class="table-title">
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Mail</th>
            </tr>
            </thead>
            <tbody>

            {foreach from=$users item=user}
                {$counter = 1}

            <tr>


                <td class="table-cell">{$counter}</td>
                <td class="table-cell">{$user.name}</td>
                <td class="table-cell">{$user.mail}</td>
            </tr>
                {$counter = $counter + 1}
            {/foreach}


            </tbody>
        </table>

    </div>

{/block}