<!-- gross.  Organized into tables for easy layouts. -->

<div class="span10 offset1">
    <table>
    {recipesRow}
    <tr>
    <td>{name}</td><td>{description}&nbsp;</td><td><input type="submit" value="edit"></td><td><input type="submit" value="delete"></td>
    </tr>
    {/recipesRow}
    </table>
    <input type="submit" value="Add">
    <br><br>
    <table>
    {stockRow}
    <tr>
    <td>{name}&nbsp;</td><td>Price: {price}&nbsp;</td><td>Quantity: {quantity}&nbsp;&nbsp;</td><td><input type="submit" value="edit"></td><td><input type="submit" value="delete"></td>
    </tr>
    {/stockRow}
    </table>
    <input type="submit" value="Add">
    <br><br>
    <table>
    {suppliesRow}
    <tr>
    <td>{name}</td><td>On hand:{on hand}</td><td>Containers/shipment: {containerspership}&nbsp;</td><td>Containers: {containers}&nbsp;</td><td>Items/container: {itemspercontainer}&nbsp;</td><td>Cost: {cost}&nbsp;&nbsp;</td><td><input type="submit" value="edit"></td><td><input type="submit" value="delete"></td>
    </tr>
    {/suppliesRow}
    </table>
    <input type="submit" value="Add">
    <br><br>
</div>