<h1>Flights Information</h1>
<table>
	<tr>
		<th>Aircraft Code</th>
		<th>Departure Time</th>
		<th>Arrival Time</th>
		<th>Base</th>
		<th>Dest</th>
	</tr>
    {trip}
		<tr>
			<td data-original-title="Aircraft Code: {vehicleID}"  data-container="body" 
			data-toggle="tooltip" data-placement="bottom">{flightID}</td>
			<td data-original-title="Departure Time: {departureTime}"  data-container="body" 
			data-toggle="tooltip" data-placement="bottom">{departureTime}</td>
			<td data-original-title="Arrival Time: {arrivalTime}"  data-container="body" 
			data-toggle="tooltip" data-placement="bottom">{arrivalTime}</td>
			<td data-original-title="Departure: {base}"  data-container="body" 
			data-toggle="tooltip" data-placement="bottom">{base}</td>
			<td data-original-title="Arrival: {dest}"  data-container="body" 
			data-toggle="tooltip" data-placement="bottom">{dest}</td>
		</tr>	
    {/trip}
</table>