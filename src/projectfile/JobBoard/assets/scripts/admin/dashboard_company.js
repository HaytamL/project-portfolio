let companies_loaded = false;
const get_company_button = document.getElementById("get-company");
const hide_company_button = document.getElementById("hide-company");

const company_button = document.getElementById("company-button");

const PAGE_SIZE_COMP = 5;
let companiesData = [];
let currentPageComp = 1;

function createPaginationContainerIfNeededComp() {
    if (document.getElementById('companies-pagination')) return;

    const tbodycomp = document.getElementById('companies');
    if (!tbodycomp) return;

    const tablecomp = tbodycomp.closest('table');
    const pagercomp = document.createElement('div');
    pagercomp.id = 'companies-pagination';
    pagercomp.className = 'mt-1 flex items-center justify-center space-x-2';
    if (tablecomp && tablecomp.parentNode) {
        tablecomp.parentNode.insertBefore(pagercomp, tablecomp.nextSibling);
    } else {
        document.body.appendChild(pagercomp);
    }
}

function renderCompanies(page = 1) {
    const tbodycomp = document.getElementById('companies');
    if (!tbodycomp) return;

    const total = companiesData.length;
    const totalPages = Math.max(1, Math.ceil(total / PAGE_SIZE_COMP));

    if (page < 1) page = 1;
    if (page > totalPages) page = totalPages;
    currentPageComp = page;

    const start = (page - 1) * PAGE_SIZE_COMP;
    const end = start + PAGE_SIZE_COMP;
    const slice = companiesData.slice(start, end);

    if (slice.length === 0) {
        tbodycomp.innerHTML = `<tr><td colspan="10" class="text-center p-4">Pas d'entreprise enregistrée.</td></tr>`;
    } else {
        tbodycomp.innerHTML = '';
        slice.forEach(function(element) {
            tbodycomp.innerHTML += `
                <tr class="p-2 text-center">
                    <td class="">${element.company_id}</td>
                    <td class="">${element.company_name}</td>
                    <td class=""><button  class="btn btn-ghost btn-edit" data_id="${element.company_id}">Editer</button></td>
                    <td class=""><button class="btn btn-ghost btn-delete" data_id="${element.company_id}">Supprimer</button></td>
                </tr>
            `;
        });
    }

    createPaginationContainerIfNeededComp();
    const pagercomp = document.getElementById('companies-pagination');
    if (!pagercomp) return;
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

    pagercomp.innerHTML = controls;

    const pageButtonsComp = pagercomp.getElementsByClassName('page-btn');
    for (let i = 0; i < pageButtonsComp.length; i++) {
        pageButtonsComp[i].addEventListener('click', function(e) {
            const p = parseInt(this.getAttribute('data-page'));
            renderCompanies(p);
        });
    }

    const deleteButtonsComp = tbodycomp.getElementsByClassName('btn-delete');
    for (let i = 0; i < deleteButtonsComp.length; i++) {
        deleteButtonsComp[i].addEventListener('click', function(e) {
            const companyId = this.getAttribute('data_id');
            axios.delete(baseUrl + '/api/company/' + companyId + '/delete', { data : { "adminToken": $("#jwt-admin-token").val(),}}).then(function() {
                    companiesData = companiesData.filter(a => String(a.company_id) !== String(companyId));
                    const newTotalPages = Math.max(1, Math.ceil(companiesData.length / PAGE_SIZE_COMP));
                    if (currentPageComp > newTotalPages) currentPageComp = newTotalPages;
                    renderCompanies(currentPageComp);
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    }

    const modifyButtonsComp = tbodycomp.getElementsByClassName('btn-edit');

    for (let i = 0; i < modifyButtonsComp.length; i++) {
        modifyButtonsComp[i].addEventListener('click', function () {
            const companyId = this.getAttribute('data_id');
            const company = companiesData.find(c => String(c.company_id) === String(companyId));
            document.getElementById('edit-company-id').value = company.company_id;
            document.getElementById('edit-company-name').value = company.company_name;
            
            document.getElementById('modal-company').classList.remove('hidden');
        });
    }

}


function getCompanies() {
    if (companies_loaded) return;

    axios.get(baseUrl + '/api/company').then(function(response) {
        companiesData = response.data || [];
        renderCompanies(1);
    }).catch(function(error) {
        throw new Error('Error : ' + error);
    });

    companies_loaded = true;
}

function hideCompanies(){
    document.getElementById("companies").innerHTML = "";
    document.getElementById("companies-pagination").innerHTML="";
    companies_loaded = false;
    
}


get_company_button.addEventListener("click", getCompanies);
hide_company_button.addEventListener("click", hideCompanies);

const companyForm = document.querySelector("#company-create form");
const divCompany = document.getElementById("company-create");

companyForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const companyName = document.getElementById("companyname").value;

    try {
        const response = await axios.post(baseUrl+"/api/company/create", {
            company_name: companyName,
            "adminToken": $("#jwt-admin-token").val(),
        });
        if (response.data.success) {
            const msg = document.createElement("p");
            msg.id = "companycreated";
            msg.className = "font-bold";
            msg.textContent = "Company created";
            divCompany.appendChild(msg);
            companyForm.reset();
            
        } else {
            divCompany.innerHTML+=("Error: " + response.data.error);
        }
    } catch (error) {
        divCompany.innerHTML+="Error";
    }
    setTimeout(ClearBox, 3000);
});
function ClearBox(){
    const delDivCompany = document.getElementById("companycreated");
    if (delDivCompany) {
        delDivCompany.remove();
    }
    if (companies_loaded==true){
        hideCompanies();
        getCompanies();
    }
}

function createCompanyModal() {
    if (document.getElementById('modal-company')) return;

    const modal = document.createElement('div');
    modal.id = 'modal-company';
    modal.className = 'fixed inset-0 flex items-center justify-center z-50 backdrop-blur-md bg-black/40 hidden';

    modal.innerHTML = `
        <div class="bg-white p-6 rounded shadow-xl w-[90%] max-w-md relative">
            <button id="close-company-modal" class="absolute top-2 right-2 text-xl font-bold">×</button>
            <h2 class="text-xl font-semibold mb-4">Modifier l'entreprise</h2>
            <form id="company-edit-form" class="space-y-4">
                <input type="hidden" id="edit-company-id" />
                <div>
                    <label for="edit-company-name">Nom de l'entreprise</label>
                    <input type="text" id="edit-company-name" class="input w-full" required />
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-white hover:text-black border border-black">Modifier</button>
                </div>
            </form>
        </div>
    `;

    document.body.appendChild(modal);

    document.getElementById('close-company-modal').addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    document.getElementById('company-edit-form').addEventListener('submit', async (e) => {
        e.preventDefault();

        const companyId = document.getElementById('edit-company-id').value;
        const companyName = document.getElementById('edit-company-name').value;

        try {
            const response = await axios.put(baseUrl + '/api/company/update', {
                "adminToken": $("#jwt-admin-token").val(),
                company_id: companyId,
                company_name: companyName
            });

            if (response.data.success) {
                document.getElementById('modal-company').classList.add('hidden');
                hideCompanies();
                getCompanies();
            } else {
                alert('Erreur : ' + response.data.error);
            }
        } catch (error) {
            console.error(error);
            alert("Erreur lors de la modification.");
        }
    });
}

createCompanyModal();
