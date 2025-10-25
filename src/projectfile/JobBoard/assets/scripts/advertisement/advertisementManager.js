class AdvertisementManager {
    advertisements = {};

    advertisementContainer = "#advertisement-container";

    advertisementCardsContainer = "#advertisement-cards-container";

    advertisementContainerForm = "#advertisement-container-form";

    currentlyApplyingAdvertisementId = null;

    currentPage = 1;

    advertsOnPage = 12;

    constructor() {}

    getAdvertisements() {
        return this.advertisements
    }

    getAdvertsOnPage() {
        return this.advertsOnPage
    }

    getCurrentPage() {
        return this.currentPage
    }

    setCurrentPage(pageNumber) {
        this.currentPage = pageNumber
    }

    getCurrentlyApplyingAdvertisementId() {
        return this.currentlyApplyingAdvertisementId
    }

    async refreshAdvertisements() {
        const response = await axios.get(baseUrl + "/api/advertisement")

        if (response.data) {
            this.advertisements = response.data

            return response.data
        } else {
            return false
        }
    }

    async displayAdvertisements() {
        $(this.advertisementContainerForm).hide()
        $(this.advertisementContainer).show()

        // Paginator current page
        $("#advertisement-page-current").html(this.currentPage)

        // Paginator Back
        if (this.currentPage == 1) {
            $("#advertisement-page-back").hide()
        } else {
            $("#advertisement-page-back").show()
        }

        $(this.advertisementCardsContainer).html(`
            <div class="w-full flex items-center justify-center">
                <span class="loading loading-bars loading-4xl"></span>
            </div>
        `)
        
        const response = await axios.get(baseUrl + "/api/advertisement");

        const responseApplications = await axios.get(baseUrl + "/api/myapplications")
        let applications = responseApplications.data

        console.log(applications.applications)

        // Paginator Next
        if ((this.currentPage + 1) > Math.round((response.data.length / this.advertsOnPage) + 0.5)) {
            $("#advertisement-page-next").hide()
        } else {
            $("#advertisement-page-next").show()
        }

        let adverts = response.data.slice(((this.currentPage - 1) * this.advertsOnPage))

        let containerContent = ""

        let limit = 0

        for (const advert of adverts) {
            if (limit < this.advertsOnPage) {
                const disabledAttr = applications.applications.includes(advert.advertisement_id) ? "btn-disabled" : "";

                console.log(disabledAttr + " for id " + advert.advertisement_id)

                containerContent += `
                    <div class="w-full shadow-sm rounded-lg flex flex-col gap-6 p-6 md:w-45/100 lg:w-95/300">
                        <div class="w-full flex flex-col">
                            <h3 class="font-bold text-xl">${advert.advertisement_title}</h3>
                            
                            <p class="italic font-lg font-medium">${advert.company.company_name}</p>
                        </div>
                        
                        <div class="w-full flex items-center justify-between">
                            <button class="btn rounded-lg bg-base-100 hover:bg-black hover:text-white" onclick="modal${advert.advertisement_id}.showModal()">Détails</button>
                            
                            <dialog id="`+ "modal" + advert.advertisement_id +`" class="modal">
                                <div class="modal-box flex flex-col gap-4">
                                    <h3 class="font-bold text-xl">${advert.advertisement_title}</h3>
                                    
                                    <p class="italic font-lg font-medium">${advert.company.company_name}</p>
            
                                    <p class="font-light">${advert.advertisement_description}</p>
            
            
                                    <div class="w-full flex items-center justify-between">
                                        <p class="font-medium">${advert.advertisement_workhours}h/semaine</p>
                                        
                                        <p class="font-medium">${advert.advertisement_salary.toLocaleString('fr-FR', {style: 'currency',currency: 'EUR',})}/An</p>
                                    </div>
                                    
                                    <div class="modal-action">
                                        <form method="dialog">
                                            <button class="btn rounded-lg bg-base-100 hover:bg-black hover:text-white">Fermer</button>
                                        </form>
                                    </div>
                                </div>
                            </dialog>
            
                            <button  id="button-apply-${advert.advertisement_id}" onclick="advertisementManager.showApplyForm(${advert.advertisement_id})" class="btn rounded-lg bg-base-100 hover:bg-black hover:text-white ` + disabledAttr + `">Postuler</button>
                        </div>
                    </div>
                    `
                }

                limit = limit + 1
            }


        $(this.advertisementCardsContainer).html("")
        
        $(this.advertisementCardsContainer).html(containerContent)
        
        $(this.advertisementContainerForm).hide()
        $(this.advertisementContainer).show()
    }

    async showApplyForm(advertId) {
        this.currentlyApplyingAdvertisementId = advertId

        const response = await axios.get(baseUrl + "/api/advertisement/" + advertId);
        const advertData = response.data

        const responseUser = await axios.get(baseUrl + "/api/myuser");
        const userData = responseUser.data

        if (userData.sucess == true) {
            $("#advertform-title").html(advertData.advertisement_title)
            $("#advertform-description").html(advertData.advertisement_description)
            $("#advertform-workhours").html(advertData.advertisement_workhours + "h/semaine")
            $("#advertform-salary").html(advertData.advertisement_salary.toLocaleString('fr-FR', {style: 'currency',currency: 'EUR',}) + "/An")
    
            // Setting the default data
            $("#advertform-firstname").val(userData.user_firstname)
            $("#advertform-lastname").val(userData.user_lastname)
            $("#advertform-email").val(userData.user_email)
            $("#advertform-phone").val(userData.user_phone)
            $("#advertform-message").val("")
            
            $(this.advertisementContainer).hide()
            $(this.advertisementContainerForm).show()
        } else {
            window.location.href = baseUrl + "/login";
        }
    }
}

let advertisementManager = new AdvertisementManager()

advertisementManager.displayAdvertisements()

// Refresh
$("#advertisement-page-current").click(function() {
    advertisementManager.displayAdvertisements()
})

// Pagination Back Page
$("#advertisement-page-back").click(function() {
    const currentPage = advertisementManager.getCurrentPage()

    if (currentPage > 1) {
        let newPage = currentPage - 1

        advertisementManager.setCurrentPage(newPage)
        advertisementManager.displayAdvertisements()
    }
})

// Pagination Next Page
$("#advertisement-page-next").click(async function() {
    const currentPage = advertisementManager.getCurrentPage()

    const response = await axios.get(baseUrl + "/api/advertisement")
    const advertData = response.data

    const numberPages = (advertData.length / advertisementManager.getAdvertsOnPage())

    if ((currentPage + 1) <= Math.round(numberPages + 0.5)) {
        let newPage = currentPage + 1

        advertisementManager.setCurrentPage(newPage)
        advertisementManager.displayAdvertisements()
    }
})

// Back
$("#advertform-back").click(function() {
    advertisementManager.displayAdvertisements()
})

// Apply button
$("#advertform-apply").click(function() {
    axios.post(baseUrl + "/api/application/create", {
        "advertisement_id": advertisementManager.getCurrentlyApplyingAdvertisementId(),
        "application_firstname": $("#advertform-firstname").val(),
        "application_lastname": $("#advertform-lastname").val(),
        "application_email": $("#advertform-email").val(),
        "application_phone": $("#advertform-phone").val(),
        "application_message": $("#advertform-message").val(),
        "adminToken": $("#jwt-user-token").val(),
    }).then(function (response) {
        advertisementManager.displayAdvertisements()
    })
})