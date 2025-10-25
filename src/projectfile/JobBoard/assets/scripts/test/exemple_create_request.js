const responseApplication = axios.post(baseUrl + "/api/application/create", {
    "advertisement_id": 1,
    "application_message": "Bonjour c'est la hess",
    "application_firstname": "Victor",
    "application_lastname": "Haytam",
    "application_email": "victor.haytam@gmail.com",
    "application_phone": "0612345678",
}).then(function(response) {
    console.log(response.data)
})