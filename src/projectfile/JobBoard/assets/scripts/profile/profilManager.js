class ProfilerManager{
    

    constructor(){};

    getApplications(){
        return this.applications;
    }

    async refreshApplications() {
        const response = await axios.get(baseUrl + "/api/application");
        if(response.data){
            this.applications = response.data;
            return response.data;
        } else {
            return false;
        }
    }
   

    async displayApplication() {
        const twigUserId = document.getElementById("userId");
        const currentId = twigUserId.getAttribute("data-user-id");
        const response = await axios.get(baseUrl + "/api/application");
        const user = await axios.get(baseUrl + "/api/user/"+currentId);
        const applications = response.data.filter(app => app.user_id === user.data.user_id);

        const card = document.getElementById("application-card");
        card.innerHTML="";

        for(const app of applications){
            try {
                const response = await axios.get(baseUrl + "/api/advertisement/" + app.advertisement_id);
                const advertResponse = response.data;
                const advertTitle = advertResponse.advertisement_title;
                const CompanyTitle = advertResponse.company.company_name;
                const advertWorkhours = advertResponse.advertisement_workhours;
                const advertSalary = advertResponse.advertisement_salary;

                card.innerHTML += `
                    <div class="application-card-item bg-white p-4 border mb-1 mx-1 rounded-lg shadow-md">
                        <h3 class="font-bold text-xl">${advertTitle}</h3>
                        <p class="italic font-lg font-medium">${CompanyTitle}</p>
                        <p class="font-light">"${app.application_message}"</p>
                    </div>
                `;

            } catch(error) {
                console.error("Erreur en récupérant l'annonce : ", error);
            }
        }      

    }

    hideApplication(){
        const card = document.getElementById("application-card");
        card.innerHTML="";
    }

    async modifyUser(){
        const currentId = document.getElementById("userId").getAttribute("data-user-id");
        axios.get(baseUrl + "/api/user/" + currentId).then(response => {
            const userData = response.data;
            const userFirstName = userData.user_firstname;
            const userLastName = userData.user_lastname;
            const userMail = userData.user_email;
            const userTel = (userData.user_phone === null ? "Non renseigné" : userData.user_phone);
           

            const modalHolder = document.getElementById("modalHolder");
            modalHolder.innerHTML = `
                <dialog id="modalModifyUser" class="modal">
                        <div class="modal-box flex flex-col gap-4 justify-around">
                            <div class="flex flex-col justify-around>
                                <div class="flex flex-row gap-4 justify-center">
                                    <form class="flex flex-col gap-2">
                                        <label for="firstName">Nom : </label>
                                        <input type="text" id="firstName" name="firstName" value="`+userFirstName+`" class="p-1"><br>                             
                                        <label for="lastName">Prénom : </label>
                                        <input type="text" id="lastName" name="lastName" value="`+userLastName+`" class="p-1"><br>                                                                  
                                        <label for="tel">Téléphone : </label>
                                        <input type="tel" id="tel" name="tel" value="`+userTel+`" class="p-1"><br>                              
                                    </form>
                                    <div>
                                        <button class="btn" id="sendUpdate">Modifier</button>
                                    </div>
                                </div>
                                <div class="modal-action">
                                    <form method="dialog">
                                    <button class="btn rounded-lg bg-base-100 hover:bg-black hover:text-white">Fermer</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
            `

            const sendUpdateButton = document.getElementById("sendUpdate");
            sendUpdateButton.addEventListener("click", async () => {
                const updatedFirstName = document.getElementById("firstName").value;
                const updatedLastName = document.getElementById("lastName").value;
                const updatedTel = document.getElementById("tel").value;

                axios.put(baseUrl + "/api/user/update", {
                    "user_id": currentId,
                    "user_firstname": updatedFirstName,
                    "user_lastname": updatedLastName,
                    "user_phone": updatedTel,
                    "adminToken": $("#jwt-profile-token").val(),
                }).then(function(response) {
                    document.getElementById("user-firstname").textContent = "Prénom : " + updatedFirstName;
                    document.getElementById("user-lastname").textContent = "Nom : " + updatedLastName;
                    document.getElementById("user-phone").textContent = "Téléphone : " + (updatedTel || "Non renseigné");
                    const modal = document.getElementById("modalModifyUser");
                    modal.close();
                }).catch(function(error) {
                    console.error("Erreur lors de la mise à jour :", error);
                });

            })

            const modal = document.getElementById("modalModifyUser");
            modal.showModal();

        });
    }
}

const showAppliButton = document.getElementById("showApp");
const hideAppliButton = document.getElementById("hideApp");
const modifyUserButton = document.getElementById("modifyUser");
const profilerManager = new ProfilerManager();

showAppliButton.addEventListener("click", () => {
    profilerManager.displayApplication();
})

hideAppliButton.addEventListener("click", () => {
    profilerManager.hideApplication();
})

modifyUserButton.addEventListener("click", () => {
    profilerManager.modifyUser();
})


