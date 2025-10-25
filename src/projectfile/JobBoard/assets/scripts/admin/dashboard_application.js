let application_loaded = false;
const get_application_button = document.getElementById("get-application");
const hide_application_button = document.getElementById("hide-application");


const PAGE_SIZE_APP = 5;
let applicationsData = [];
let currentPage = 1;

function createPaginationContainerIfNeeded() {
    if (document.getElementById('applications-pagination')) return;

    const tbody = document.getElementById('applications');
    if (!tbody) return;

    const table = tbody.closest('table');
    const pager = document.createElement('div');
    pager.id = 'applications-pagination';
    pager.className = 'mt-4 flex items-center justify-center space-x-2';
    if (table && table.parentNode) {
        table.parentNode.insertBefore(pager, table.nextSibling);
    } else {
        document.body.appendChild(pager);
    }
}

function renderApplications(page = 1) {
    const tbody = document.getElementById('applications');
    if (!tbody) return;

    const total = applicationsData.length;
    const totalPages = Math.max(1, Math.ceil(total / PAGE_SIZE_APP));

    if (page < 1) page = 1;
    if (page > totalPages) page = totalPages;
    currentPage = page;

    const start = (page - 1) * PAGE_SIZE_APP;
    const end = start + PAGE_SIZE_APP;
    const slice = applicationsData.slice(start, end);

    if (slice.length === 0) {
        tbody.innerHTML = `<tr><td colspan="10" class="text-center p-4">Pas de candidature</td></tr>`;
    } else {
        tbody.innerHTML = '';
        slice.forEach(function(element) {
            const userId = element.user_id == null ? 'Non connecté' : element.user_id;
            const AppPhone = element.application_phone == null || element.application_phone === '' ? 'Non renseigné' : element.application_phone;
            tbody.innerHTML += `
                <tr class="p-2 text-center">
                    <td class="">${element.application_id}</td>
                    <td class="">${userId}</td>
                    <td class="">${element.advertisement_id}</td>
                    <td class="">${element.application_message}</td>
                    <td class="">${element.application_firstname}</td>
                    <td class="">${element.application_lastname}</td>
                    <td class="">${element.application_email}</td>
                    <td class="">${AppPhone}</td>
                    <td class=""><button class="btn btn-ghost btn-edit" data-id="${element.application_id}">Editer</button></td>
                    <td class=""><button class="btn btn-ghost btn-delete" data-id="${element.application_id}">Supprimer</button></td>
                </tr>
            `;
        });
    }

    createPaginationContainerIfNeeded();
    const pager = document.getElementById('applications-pagination');
    if (!pager) return;
    let controls = '';

    if (page > 1) {
        controls += `<button data-page="${page - 1}" class="page-btn px-3 py-1 bg-white border rounded hover:bg-black hover:text-white">Précédent</button>`;
    }

    for (let p = 1; p <= totalPages; p++) {
        const activeClass = p === page ? 'bg-black text-white' : 'bg-white text-gray-700 hover:bg-black hover:text-white';
        controls += `<button data-page="${p}" class="page-btn px-3 py-1 rounded ${activeClass}">${p}</button>`;
    }

    if (page < totalPages) {
        controls += `<button data-page="${page + 1}" class="page-btn px-3 py-1 bg-white border rounded hover:bg-black hover:text-white">Suivant</button>`;
    }

    pager.innerHTML = controls;

    const pageButtons = pager.getElementsByClassName('page-btn');
    for (let i = 0; i < pageButtons.length; i++) {
        pageButtons[i].addEventListener('click', function(e) {
            const p = parseInt(this.getAttribute('data-page'));
            renderApplications(p);
        });
    }

    const deleteButtons = tbody.getElementsByClassName('btn-delete');
    for (let i = 0; i < deleteButtons.length; i++) {
        deleteButtons[i].addEventListener('click', function(e) {
            const applicationId = this.getAttribute('data-id');
            axios.delete(baseUrl + '/api/application/' + applicationId + '/delete', { data : { "adminToken": $("#jwt-admin-token").val(),}}).then(function() {
                applicationsData = applicationsData.filter(a => String(a.application_id) !== String(applicationId));
                const newTotalPages = Math.max(1, Math.ceil(applicationsData.length / PAGE_SIZE_APP));
                if (currentPage > newTotalPages) currentPage = newTotalPages;
                renderApplications(currentPage);
            })
            .catch(function(error) {
                console.error(error);
            });
        });
    }
    const modifyButtons = tbody.getElementsByClassName('btn-edit');
    for (let i = 0; i < modifyButtons.length; i++) {
        modifyButtons[i].addEventListener('click', function () {
            const applicationId = this.getAttribute('data-id');
            const app = applicationsData.find(a => String(a.application_id) === String(applicationId));
            document.getElementById('edit-application-id').value = app.application_id;
            document.getElementById('edit-app-userid').value = app.user_id ?? '';
            document.getElementById('edit-app-advid').value = app.advertisement_id ?? '';
            document.getElementById('edit-app-message').value = app.application_message ?? '';
            document.getElementById('edit-app-firstname').value = app.application_firstname ?? '';
            document.getElementById('edit-app-lastname').value = app.application_lastname ?? '';
            document.getElementById('edit-app-email').value = app.application_email ?? '';
            document.getElementById('edit-app-phone').value = app.application_phone ?? '';

            document.getElementById('modal-application').classList.remove('hidden');
        });
    }

}

function getApplications() {
    if (application_loaded) return;

    axios.get(baseUrl + '/api/application')
        .then(function(response) {
            applicationsData = response.data || [];
            renderApplications(1);
        })
        .catch(function(error) {
            throw new Error('Error : ' + error);
        });

    application_loaded = true;
}

function hideApplication(){
    document.getElementById("applications").innerHTML = "";
    document.getElementById("applications-pagination").innerHTML="";
    application_loaded = false;
    
}

get_application_button.addEventListener("click", getApplications);
hide_application_button.addEventListener("click", hideApplication);
const applicationForm = document.querySelector("#application-create form");
const divApplication = document.getElementById("application-create");

applicationForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const userId = document.getElementById("appuserid").value;
    const advertisementId = document.getElementById("appadvertisementid").value;
    const applicationMessage = document.getElementById("appmessage").value;
    const applicationFirstname = document.getElementById("appfirstname").value;
    const applicationLastname = document.getElementById("applastname").value;
    const applicationEmail = document.getElementById("appemail").value;
    const applicationPhone = document.getElementById("appphone").value;
    try {
        const response = await axios.post(baseUrl + '/api/application/create', {
            "adminToken": $("#jwt-admin-token").val(),
            user_id: userId,
            advertisement_id: advertisementId,
            application_message: applicationMessage,
            application_firstname: applicationFirstname,
            application_lastname: applicationLastname,
            application_email: applicationEmail,
            application_phone: applicationPhone
        });
        if (response.data.success) {
            const msg = document.createElement("p");
            msg.id = "applicationcreated";
            msg.className = "font-bold";
            msg.textContent = "Application created";
            divApplication.appendChild(msg);
            applicationForm.reset();

        } else {
            divApplication.innerHTML+=(`<p id='applicationcreated' class='font-bold'>Error: ${response.data.error}</p>`);
        }
    } catch (error) {
        divApplication.innerHTML+="<p id='applicationcreated' class='font-bold'>Error</p>";
    }
    setTimeout(ClearBoxApplication, 3000);
});

function ClearBoxApplication(){
    const delDivApplication = document.getElementById("applicationcreated");
    if (delDivApplication) {
        delDivApplication.remove();
    }
    if (application_loaded==true){
        hideApplication();
        getApplications();
    }
}
function createApplicationModal() {
    if (document.getElementById('modal-application')) return;

    const modal = document.createElement('div');
    modal.id = 'modal-application';
    modal.className = 'fixed inset-0 flex items-center justify-center z-50 backdrop-blur-md bg-black/40 hidden';

    modal.innerHTML = `
        <div class="bg-white p-6 rounded shadow-xl w-[90%] max-w-2xl relative">
            <button id="close-application-modal" class="absolute top-2 right-2 text-xl font-bold">×</button>
            <h2 class="text-xl font-semibold mb-4">Modifier la candidature</h2>
            <form id="application-edit-form" class="space-y-4 grid grid-cols-2 gap-4">
                <input type="hidden" id="edit-application-id" />
                <div>
                    <label>User ID</label>
                    <input type="text" id="edit-app-userid" class="input w-full" readonly/>
                </div>
                <div>
                    <label>Advertisement ID</label>
                    <input type="text" id="edit-app-advid" class="input w-full" readonly/>
                </div>
                <div class="col-span-2">
                    <label>Message</label>
                    <textarea id="edit-app-message" class="input w-full" rows="3"></textarea>
                </div>
                <div>
                    <label>Prénom</label>
                    <input type="text" id="edit-app-firstname" class="input w-full" />
                </div>
                <div>
                    <label>Nom</label>
                    <input type="text" id="edit-app-lastname" class="input w-full" />
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" id="edit-app-email" class="input w-full" />
                </div>
                <div>
                    <label>Téléphone</label>
                    <input type="text" id="edit-app-phone" class="input w-full" />
                </div>
                <div class="col-span-2 flex justify-end">
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-white hover:text-black border border-black">Modifier</button>
                </div>
            </form>
        </div>
    `;

    document.body.appendChild(modal);

    document.getElementById('close-application-modal').addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    document.getElementById('application-edit-form').addEventListener('submit', async (e) => {
        e.preventDefault();
        const applicationId = document.getElementById('edit-application-id').value;
        let userId = document.getElementById('edit-app-userid').value;
        if (userId==null || userId==""){
            userId="Non renseigné";
        }
        const AdId = document.getElementById('edit-app-advid').value;
        const updatedApp = {
            "adminToken": $("#jwt-admin-token").val(),
            application_id: applicationId,
            user_id: userId,
            advertisement_id: AdId,
            application_message: document.getElementById('edit-app-message').value,
            application_firstname: document.getElementById('edit-app-firstname').value,
            application_lastname: document.getElementById('edit-app-lastname').value,
            application_email: document.getElementById('edit-app-email').value,
            application_phone: document.getElementById('edit-app-phone').value,
        };

        try {
            const response = await axios.put(baseUrl + '/api/application/update', updatedApp);
            if (response.data.success) {
                document.getElementById('modal-application').classList.add('hidden');
                hideApplication();
                getApplications();
            } else {
                alert('Erreur : ' + response.data.error);
            }
        } catch (error) {
            console.error(error);
            alert("Erreur lors de la modification.");
        }
    });
}
createApplicationModal();