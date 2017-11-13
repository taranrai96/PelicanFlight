<h1>Fleet # {id}</h1>
<form role="form" action="/mtceFleet/submit" method="post">
    {fvehicleID}
    {fmodel}
    {fseats}
    {freach}
    {fcruise}
    {ftakeoff}
    {fhourly}
    <br/>
    {zsubmit}
</form>
<a href="/mtceFleet/cancel"><input type="button" value="Cancel the current edit"/></a>
<a href="/mtceFleet/delete"><input type="button" value="Delete this todo item"/></a>
    {error}
