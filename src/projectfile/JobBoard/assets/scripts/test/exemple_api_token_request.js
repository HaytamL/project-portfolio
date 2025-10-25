const responseApplication = axios.post(baseUrl + "/api/test", {
    "adminToken": $("#jwt-admin-token").val(),
    "data": "banane",
}).then(function(response) {
    console.log(response.data)
})