<form method="POST" action="/Administrator/save_stock">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Name</td>
                <td>
                    <input class="form-control" name="name" style="width:200px;" value="{name}"/>
                </td>
            </tr>
            <tr>
                <td>Price</td>
                <td>
                    <input class="form-control" name="price" type="numeric" style="width:100px;" value="{price}"/>
                </td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>
                    <input class="form-control" name="quantity" style="width:100px;" value="{quantity}"/>
                </td>
                <input name="id" type="hidden" value="{id}"/>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-default btn-danger btn-sm">Save</button>
                    <a class="btn btn-default" role="button" href="/administrator/">Cancel</a>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</form>