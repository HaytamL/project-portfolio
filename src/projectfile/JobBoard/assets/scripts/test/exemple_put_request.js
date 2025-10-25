const responseApplication = axios.put(baseUrl + "/api/company/update", {
    "company_id": 1,
    "company_name": "Pizzeria de Vito",
}).then(function(response) {
    console.log(response.data)
})