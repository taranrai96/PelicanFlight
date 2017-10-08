<h1>Flights Information</h1>
<table>
	<tr>
		<th>Aircraft Code</th>
		<th>Departure</th>
		<th>Arrival</th>
		<th>Departure Time</th>
		<th>Arrival Time</th>
	</tr>
    {trip}
		<tr>
			<td data-original-title="Aircraft Code: {vehicleID}"  data-container="body" 
			data-toggle="tooltip" data-placement="bottom">{FlightID}</td>
			<td data-original-title="Departure Time: {departureTime}"  data-container="body" 
			data-toggle="tooltip" data-placement="bottom">{base}</td>
			<td data-original-title="Arrival Time: {arrivalTime}"  data-container="body" 
			data-toggle="tooltip" data-placement="bottom">{dest}</td>
			<td data-original-title="Departure: {base}"  data-container="body" 
			data-toggle="tooltip" data-placement="bottom">{departureTime}</td>
			<td data-original-title="Arrival: {dest}"  data-container="body" 
			data-toggle="tooltip" data-placement="bottom">{arrivalTime}</td>
		</tr>	
    {/trip}
</table>