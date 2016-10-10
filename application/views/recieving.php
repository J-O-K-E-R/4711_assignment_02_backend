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
        <h2>Supplies to recieve</h2>
        <form action="recieving" method="POST">
            <div class="row">
              {supplies}
              <div id="row">
                <div id="left" class="span4"><b>{name} x{items per container}:</b></div>
                <div id="right"><input type="number" style="width:50%" name="{name}" value="0" min="0" max="99"></div>
                <br><br><br>
              </div>
              {/supplies}
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
