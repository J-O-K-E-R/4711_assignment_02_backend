<h1>Administrator Page</h1>
<br>
<br>

<div class=table-responsive>
  <h2>Create a new Recipe item</h2>
  <form method="POST" action="/Administrator/save_recipe">
    <table class="table">
        <tbody>
            <tr>
              <td>Recipe Name</td>
              <td></td>
              <td><input class="form-control" name="name" style="width:200px;"/></td>
            </tr>
            <tr>
              <td>Recipe directions</td>
              <td></td>
              <td><input class="form-control" name="recipe" style="width:400px;"/></td>
            </tr>
            <tr>
              <td>Amount made</td>
              <td><input class="form-control" name="numberYielded" type="numeric" style="width:100px;"/></td>
            </tr>
            //{supplies}
            <tr>
              //<td>{name}</td>
              <td></td>
              <td><input class="form-control" name="{name}" style="width:100px;" value="0"/></td>
            </tr>
            //{/supplies}
            <tr>
              <td><button type="submit" class="btn btn-default btn-danger btn-sm">Add</button></td>
              <td></td>
              <td></td>
            </tr>
        </tbody>
    </table>
  </form>
</div>
