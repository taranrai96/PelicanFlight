<h1>Flight # {id}</h1>
<form role="form" action="/mtceFlight/submit" method="post">
    {fflightID}
    {fvehicleID}
    {fdepartureTime}
    {farrivalTime}
    {fbase}
    {fdest}
    <br/>
    {zsubmit}
</form>
<a href="/mtceFlight/cancel"><input type="button" value="Cancel the current edit"/></a>
<a href="/mtceFlight/delete"><input type="button" value="Delete this todo item"/></a>
    {error}
