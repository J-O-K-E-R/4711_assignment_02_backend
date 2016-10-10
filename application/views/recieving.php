<div class="row">
    <div class="span8 offset1">
        <h2>Supplies to recieve</h2>
        <form action="recieving" method="POST">
            <div class="row">
                {supplies}
                <div class="span4"><b>{name} x{items per container}:</b></div>
                <input type="number" name="{name}" value="0" min="0" max="99">
                {/supplies}
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
