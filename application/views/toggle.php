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

        <form action="Toggle" method="post">
        <div class="row">
        <label class="heading">Choose your role :</label>
        </div>
        <div class="row">
        <input name="radio" type="radio" value="administrator">Administrator
        </div>
        <div class="row">
        <input name="radio" type="radio" value="user">User
        </div>
        <div class="row">
        <input name="radio" type="radio" value="guest">Guest
        </div>
        <div class="row">
        <input type="submit" value="Set Role">
        </div>
        
        </form>
    </div>
</div>