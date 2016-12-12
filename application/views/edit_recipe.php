<form method="POST" action="/Administrator/save_recipe">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Recipe Name</td>
                <td>
                    <input class="form-control" name="name" style="width:200px;"/>
                </td>
            </tr>
            {supplies}
            <tr>
                <td>Number of: {name}s</td>
                <td>
                    <input class="form-control" name="{id}" type="numeric" value="0" style="width:200px;"/>
                </td>
            </tr>
            {/supplies}
            <tr>
                <td>
                    <button type="submit" class="btn btn-default btn-danger btn-sm">Save</button>
                    <a class="btn btn-default" role="button" href="/administrator/">Cancel</a>
                </td>
                <td></td>
                <input name="id" type="hidden" value="{id}"/>
            </tr>
        </tbody>
    </table>
</form>
