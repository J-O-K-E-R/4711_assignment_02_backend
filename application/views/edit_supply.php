<form method="POST" action="/Administrator/save_supply">
    <p>{error}</p>
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
                <td>onHand</td>
                <td>
                    <input class="form-control" name="onHand" type="numeric" style="width:100px;" value="{onHand}"/>
                </td>
            </tr>
            <tr>
                <td>containersPerShipment</td>
                <td>
                    <input class="form-control" name="containersPerShipment" type="numeric" style="width:100px;" value="{containersPerShipment}"/>
                </td>
            </tr>
            <tr>
                <td>containers</td>
                <td>
                    <input class="form-control" name="containers" type="numeric" style="width:100px;" value="{containers}"/>
                </td>
            </tr>
            <tr>
                <td>itemsPerContainer</td>
                <td>
                    <input class="form-control" name="itemsPerContainer" type="numeric" style="width:100px;" value="{itemsPerContainer}"/>
                </td>
            </tr>
            <tr>
                <td>cost</td>
                <td>
                    <input class="form-control" name="cost" type="numeric" style="width:100px;" value="{cost}"/>
                    <input name="id" type="hidden" value="{id}"/>
                </td>
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