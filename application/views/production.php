<style type="text/css">
#left {
  float: left;
  display: block;
}
#right {
  float: right;
  display: block;
}
#row {
  border-bottom: 3px solid black;
}
</style>
<div class="row">
    <div class="span8 offset1">
        <h2>Recipes</h2>
        <form action="production" method="POST">
          <div class="row">
            {recipes}
            <div id="row">
              <div id="left" class="span4"><b>{name}</b>: {description}</div>
              <div id="right"><input type="number" name="{name}" align="right" style="width:50%;" value="0" min="0" max="99"></div>
              <br><br><br>
            </div>
            {/recipes}
          </div>
          <input type="submit" value="Submit">
        </form>
    </div>
</div>
