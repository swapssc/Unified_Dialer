// fetch('https://weather-forecast-api.p.rapidapi.com/%7Blocation%7D', options)
// 	.then(response => response.json())
// 	.then(response => console.log(response))
// 	.catch(err => console.error(err));

showAll.addEventListener('click',function()
{
allEmployees();
})
function allEmployees()
{
	var xmlhttp = new XMLHttpRequest();
	var url = "	https://dummy.restapiexample.com/api/v1/employees";
	xmlhttp.open('GET' ,url,true);
	xmlhttp.onload = function()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			allData = JSON.parse(this.responseText);

		}
		dataStore = "";
		for(single in allData.data)
		{
			dataStore += ` <div class="col-3">
			<div class="card text-black bg-primary mb-3">
			  <div class="card body">
				<p> <strong> Name</strong> ${allData.data[single].employee_name}</p>
				<span><strong> Age:</strong> ${allData.data[single].employee_age}</span>
			</div>
			</div>
		  </div>`
		}
		
		
		allList.innerHTML = dataStore;
		console.log(allData);
	}
	xmlhttp.send();

}