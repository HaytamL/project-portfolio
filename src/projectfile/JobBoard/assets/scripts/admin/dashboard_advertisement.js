let advertisement_loaded = false;
const get_advertisement_button = document.getElementById("get-advertisement");
const hide_advertisement_button = document.getElementById("hide-advertisement");

const PAGE_SIZE_AD = 5;
let advertisementsData = [];
let currentPageAd = 1;

function createPaginationContainerIfNeededAd() {
    if (document.getElementById('advertisements-pagination')) return;

    const tbodyad = document.getElementById('advertisements');
    if (!tbodyad) return;

    const tablead = tbodyad.closest('table');
    const pagerad = document.createElement('div');
    pagerad.id = 'advertisements-pagination';
    pagerad.className = 'mt-4 flex items-center justify-center space-x-2';
    if (tablead && tablead.parentNode) {
        tablead.parentNode.insertBefore(pagerad, tablead.nextSibling);
    } else {
        document.body.appendChild(pagerad);
    }
}

function renderAdvertisements(page = 1) {
    const tbodyad = document.getElementById('advertisements');
    if (!tbodyad) return;

    const totalad = advertisementsData.length;
    const totalPagesad = Math.max(1, Math.ceil(totalad / PAGE_SIZE_AD));

    if (page < 1) page = 1;
    if (page > totalPagesad) page = totalPagesad;
    currentPage = page;

    const startad = (page - 1) * PAGE_SIZE_AD;
    const endad = startad + PAGE_SIZE_AD;
    const slicead = advertisementsData.slice(startad, endad);

    if (slicead.length === 0) {
        tbodyad.innerHTML = `<tr><td colspan="10" class="text-center p-4">Pas d'annonce</td></tr>`;
    } else {
        tbodyad.innerHTML = '';
        slicead.forEach(function(element) {
            tbodyad.innerHTML += `
                    <tr class="p-2 text-center">
                        <td class="">${element.advertisement_id}</td>
                        <td class="">${element.advertisement_title}</td>
                        <td class="">${element.advertisement_description}</td>
                        <td class="">${element.advertisement_salary}</td>
                        <td class="">${element.advertisement_workhours}</td>
                        <td class="">${element.company.company_name}</td>
                        <td class=""><button class="btn btn-ghost btn-edit" data-id="${element.advertisement_id}">Editer</button></td>
                        <td class=""><button class="btn btn-ghost btn-delete" data-id="${element.advertisement_id}">Supprimer</button></td>
                    </tr>
                `;
        });
    }

    createPaginationContainerIfNeededAd();
    const pagerAd = document.getElementById('advertisements-pagination');
    if (!pagerAd) return;
    let controls = '';

    if (page > 1) {
        controls += `<button data-page="${page - 1}" class="page-btn px-3 py-1 bg-white border rounded hover:bg-black hover:text-white">Précédent</button>`;
    }

    for (let p = 1; p <= totalPagesad; p++) {
        const activeClassAd = p === page ? 'bg-black text-white' : 'bg-white text-gray-700 hover:bg-black hover:text-white';
        controls += `<button data-page="${p}" class="page-btn px-3 py-1 rounded ${activeClassAd}">${p}</button>`;
    }

    if (page < totalPagesad) {
        controls += `<button data-page="${page + 1}" class="page-btn px-3 py-1 bg-white border rounded hover:bg-black hover:text-white">Suivant</button>`;
    }

    pagerAd.innerHTML = controls;

    const pageButtonsAd = pagerAd.getElementsByClassName('page-btn');
    for (let i = 0; i < pageButtonsAd.length; i++) {
        pageButtonsAd[i].addEventListener('click', function(e) {
            const pad = parseInt(this.getAttribute('data-page'));
            renderAdvertisements(pad);
        });
    }

    const deleteButtonsAd = tbodyad.getElementsByClassName('btn-delete');
    for (let i = 0; i < deleteButtonsAd.length; i++) {
        deleteButtonsAd[i].addEventListener('click', function(e) {
            const advertisementId = this.getAttribute('data-id');
            axios.delete(baseUrl + '/api/advertisement/' + advertisementId + '/delete',{ data : { "adminToken": $("#jwt-admin-token").val(),} }).then(function() {
                advertisementsData = advertisementsData.filter(a => String(a.advertisement_id) !== String(advertisementId));
                const newTotalPagesAd = Math.max(1, Math.ceil(advertisementsData.length / PAGE_SIZE_AD));
                if (currentPageAd > newTotalPagesAd) currentPageAd = newTotalPagesAd;
                renderAdvertisements(currentPageAd);
            })
            .catch(function(error) {
                console.error(error);
            });
        });
    }
    const modifyButtonsAd = tbodyad.getElementsByClassName('btn-edit');
    for (let i = 0; i < modifyButtonsAd.length; i++) {
        modifyButtonsAd[i].addEventListener('click', function () {
            const advertisementId = this.getAttribute('data-id');
            const advertisement = advertisementsData.find(ad => String(ad.advertisement_id) === String(advertisementId));
            document.getElementById('edit-ad-id').value = advertisement.advertisement_id;
            document.getElementById('edit-ad-title').value = advertisement.advertisement_title;
            document.getElementById('edit-ad-description').value = advertisement.advertisement_description;
            document.getElementById('edit-ad-salary').value = advertisement.advertisement_salary;
            document.getElementById('edit-ad-workhours').value = advertisement.advertisement_workhours;

            document.getElementById('modal-advertisement').classList.remove('hidden');
        });
    }
}

function getAdvertisements() {
    if (advertisement_loaded) return;

    axios.get(baseUrl + '/api/advertisement').then(function(response) {
        advertisementsData = response.data || [];
        renderAdvertisements(1);
    })
    .catch(function(error) {
        throw new Error('Error : ' + error);
    });

    advertisement_loaded = true;
}
function hideAdvertisements(){
    document.getElementById("advertisements").innerHTML = "";
    document.getElementById("advertisements-pagination").innerHTML="";
    advertisement_loaded = false;
    
}

get_advertisement_button.addEventListener('click', getAdvertisements);
hide_advertisement_button.addEventListener('click', hideAdvertisements);

const advertisementForm = document.querySelector("#advertisement-create form");
const divAdvertisement = document.getElementById("advertisement-create");

advertisementForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const title = document.getElementById("adtitle").value;
    const description = document.getElementById("addescription").value;
    const salary = document.getElementById("adsalary").value;
    const workhours = document.getElementById("adworkhour").value;
    const companyId = document.getElementById("adcompanyid").value;

    try {
        const response = await axios.post(baseUrl + '/api/advertisement/create', {
            "adminToken": $("#jwt-admin-token").val(),
            advertisement_title: title,
            advertisement_description: description,
            advertisement_salary: salary,
            advertisement_workhours: workhours,
            company_id: companyId
        });
        if (response.data.success) {
            const msg = document.createElement("p");
            msg.id = "advertisementcreated";
            msg.className = "font-bold";
            msg.textContent = "Advertisement created";
            divAdvertisement.appendChild(msg);
            advertisementForm.reset();

        } else {
            divAdvertisement.innerHTML+=(`<p id='advertisementcreated' class='font-bold'>Error: ${response.data.error}</p>`);
        }
    } catch (error) {
        divAdvertisement.innerHTML+="<p id='advertisementcreated' class='font-bold'>Error</p>";
    }
    setTimeout(ClearBoxAdvertisement, 3000);
});
function ClearBoxAdvertisement(){
    const delDivAdvertisement = document.getElementById("advertisementcreated");
    if (delDivAdvertisement) {
        delDivAdvertisement.remove();
    }
    if (advertisement_loaded==true){
        hideAdvertisements();
        getAdvertisements();
    }
}

function createAdvertisementModal() {
    if (document.getElementById('modal-advertisement')) return;

    const modal = document.createElement('div');
    modal.id = 'modal-advertisement';
    modal.className = 'fixed inset-0 flex items-center justify-center z-50 backdrop-blur-md bg-black/40 hidden';

    modal.innerHTML = `
        <div class="bg-white p-6 rounded shadow-xl w-[90%] max-w-xl relative">
            <button id="close-advertisement-modal" class="absolute top-2 right-2 text-xl font-bold">×</button>
            <h2 class="text-xl font-semibold mb-4">Modifier l'annonce</h2>
            <form id="advertisement-edit-form" class="space-y-4">
                <input type="hidden" id="edit-ad-id" />
                <div>
                    <label for="edit-ad-title">Titre</label>
                    <input type="text" id="edit-ad-title" class="input w-full" required />
                </div>
                <div>
                    <label for="edit-ad-description">Description</label>
                    <textarea id="edit-ad-description" class="input w-full" required></textarea>
                </div>
                <div>
                    <label for="edit-ad-salary">Salaire</label>
                    <input type="number" id="edit-ad-salary" class="input w-full" required />
                </div>
                <div>
                    <label for="edit-ad-workhours">Heures</label>
                    <input type="number" id="edit-ad-workhours" class="input w-full" required />
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-white hover:text-black border border-black">Modifier</button>
                </div>
            </form>
        </div>
    `;

    document.body.appendChild(modal);

    document.getElementById('close-advertisement-modal').addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    const editForm = document.getElementById('advertisement-edit-form');
    editForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const id = document.getElementById('edit-ad-id').value;
        const title = document.getElementById('edit-ad-title').value;
        const description = document.getElementById('edit-ad-description').value;
        const salary = document.getElementById('edit-ad-salary').value;
        const workhours = document.getElementById('edit-ad-workhours').value;

        try {
            const response = await axios.put(baseUrl + '/api/advertisement/update', {
                "adminToken": $("#jwt-admin-token").val(),
                advertisement_id: id,
                advertisement_title: title,
                advertisement_description: description,
                advertisement_salary: salary,
                advertisement_workhours: workhours
            });

            if (response.data.success) {
                modal.classList.add('hidden');
                hideAdvertisements();
                getAdvertisements();
            } else {
                alert('Erreur : ' + response.data.error);
            }
        } catch (error) {
            console.error(error);
            alert('Erreur lors de la modification');
        }
    });
}
createAdvertisementModal();