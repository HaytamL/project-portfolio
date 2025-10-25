let user_loaded = false;
const get_user_button = document.getElementById("get-user");
const hide_user_button = document.getElementById("hide-user");

const PAGE_SIZE_USER = 5;
let usersData = [];
let currentPageUser = 1;

function createPaginationContainerIfNeededUser() {
    if (document.getElementById('users-pagination')) return;

    const tbodyuser = document.getElementById('users');
    if (!tbodyuser) return;

    const tableuser = tbodyuser.closest('table');
    const pageruser = document.createElement('div');
    pageruser.id = 'users-pagination';
    pageruser.className = 'mt-4 flex items-center justify-center space-x-2';
    if (tableuser && tableuser.parentNode) {
        tableuser.parentNode.insertBefore(pageruser, tableuser.nextSibling);
    } else {
        document.body.appendChild(pageruser);
    }
}

function renderUsers(page = 1) {
    const tbodyuser = document.getElementById('users');
    if (!tbodyuser) return;

    const totalUsers = usersData.length;
    const totalPagesUser = Math.max(1, Math.ceil(totalUsers / PAGE_SIZE_USER));

    if (page < 1) page = 1;
    if (page > totalPagesUser) page = totalPagesUser;
    currentPageUser = page;

    const startUser = (page - 1) * PAGE_SIZE_USER;
    const endUser = startUser + PAGE_SIZE_USER;
    const sliceUser = usersData.slice(startUser, endUser);

    if (sliceUser.length === 0) {
        tbodyuser.innerHTML = `<tr><td colspan="10" class="text-center p-4">Pas de candidature</td></tr>`;
    } else {
        tbodyuser.innerHTML = '';
        sliceUser.forEach(function(element) {
            const UserPhone = element.user_phone == null || element.user_phone === '' ? 'Non renseigné' : element.user_phone;
            tbodyuser.innerHTML += `
                        <tr class="p-2 text-center">
                            <td class="">${element.user_id}</td>
                            <td class="">${element.user_email}</td>
                            <td class="">${element.user_firstname}</td>
                            <td class="">${element.user_lastname}</td>
                            <td class="">${UserPhone}</td>
                            <td class=""><button class="btn btn-ghost btn-edit" data-id="${element.user_id}">Editer</button></td>
                            <td class=""><button class="btn btn-ghost btn-delete" data-id="${element.user_id}">Supprimer</button></td>
                        </tr>
                    `;
        });
    }

    createPaginationContainerIfNeededUser();
    const pageruser = document.getElementById('users-pagination');
    if (!pageruser) return;
    let controls = '';

    if (page > 1) {
        controls += `<button data-page="${page - 1}" class="page-btn px-3 py-1 bg-white border rounded hover:bg-black hover:text-white">Précédent</button>`;
    }

    for (let p = 1; p <= totalPagesUser; p++) {
        const activeClass = p === page ? 'bg-black text-white' : 'bg-white text-gray-700 hover:bg-black hover:text-white';
        controls += `<button data-page="${p}" class="page-btn px-3 py-1 rounded ${activeClass}">${p}</button>`;
    }

    if (page < totalPagesUser) {
        controls += `<button data-page="${page + 1}" class="page-btn px-3 py-1 bg-white border rounded hover:bg-black hover:text-white">Suivant</button>`;
    }

    pageruser.innerHTML = controls;

    const pageButtonsUser = pageruser.getElementsByClassName('page-btn');
    for (let i = 0; i < pageButtonsUser.length; i++) {
        pageButtonsUser[i].addEventListener('click', function(e) {
            const p = parseInt(this.getAttribute('data-page'));
            renderUsers(p);
        });
    }

    const deleteButtonsUser = tbodyuser.getElementsByClassName('btn-delete');
    for (let i = 0; i < deleteButtonsUser.length; i++) {
        deleteButtonsUser[i].addEventListener('click', function(e) {
            const UserId = this.getAttribute('data-id');
            axios.delete(baseUrl + '/api/user/' + UserId + '/delete', { data : { "adminToken": $("#jwt-admin-token").val(),}}).then(function() {
                usersData = usersData.filter(a => String(a.user_id) !== String(UserId));
                const newTotalPagesUser = Math.max(1, Math.ceil(usersData.length / PAGE_SIZE_USER));
                if (currentPageUser > newTotalPagesUser) currentPageUser = newTotalPagesUser;
                renderUsers(currentPageUser);
            })
            .catch(function(error) {
                console.error(error);
            });
        });
    }
    const modifyButtonsUser = tbodyuser.getElementsByClassName('btn-edit');
    for (let i = 0; i < modifyButtonsUser.length; i++) {
        modifyButtonsUser[i].addEventListener('click', function () {
            const userId = this.getAttribute('data-id');
            const user = usersData.find(u => String(u.user_id) === String(userId));
            document.getElementById('edit-user-id').value = user.user_id;
            document.getElementById('edit-user-email').value = user.user_email || '';
            document.getElementById('edit-user-firstname').value = user.user_firstname || '';
            document.getElementById('edit-user-lastname').value = user.user_lastname || '';

            document.getElementById('modal-user').classList.remove('hidden');
        });
    }

}

function getUsers() {
    if (user_loaded) return;

    axios.get(baseUrl + '/api/user').then(function(response) {
        usersData = response.data || [];
        renderUsers(1);
    })
    .catch(function(error) {
        throw new Error('Error : ' + error);
    });

    user_loaded = true;
}
function hideUsers(){
    document.getElementById("users").innerHTML = "";
    document.getElementById("users-pagination").innerHTML="";
    user_loaded = false;
    
}

get_user_button.addEventListener('click', getUsers);
hide_user_button.addEventListener('click', hideUsers);

const userForm = document.querySelector("#user-create form");
const divUser = document.getElementById("user-create");

userForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const email = document.getElementById("useremail").value;
    const firstname = document.getElementById("userfirstname").value;
    const lastname = document.getElementById("username").value;
    const phone = document.getElementById("userphone").value;
    const password = document.getElementById("userpassword").value;
    const roles=""
    try {
        const response = await axios.post(baseUrl + '/api/user/create', {
            "adminToken": $("#jwt-admin-token").val(),
            user_email: email,
            user_firstname: firstname,
            user_lastname: lastname,
            user_phone: phone,
            user_password: password,
            user_roles:roles
        });
        if (response.data.success) {
            const msg = document.createElement("p");
            msg.id = "usercreated";
            msg.className = "font-bold";
            msg.textContent = "User created";
            divUser.appendChild(msg);
            userForm.reset();
        } else {
            divUser.innerHTML+=(`<p id='usercreated' class='font-bold'>Error: ${response.data.error}</p>`);
        }
    } catch (error) {
        divUser.innerHTML+="<p id='usercreated' class='font-bold'>Error</p>";
    }
    setTimeout(ClearBoxUser, 3000);
});

function ClearBoxUser(){
    const delDivUser = document.getElementById("usercreated");
    if (delDivUser) {
        delDivUser.remove();
    }
    if (user_loaded==true){
        hideUsers();
        getUsers();
    }
}
function createUserModal() {
    if (document.getElementById('modal-user')) return;

    const modal = document.createElement('div');
    modal.id = 'modal-user';
    modal.className = 'fixed inset-0 flex items-center justify-center z-50 backdrop-blur-md bg-black/40 hidden';

    modal.innerHTML = `
        <div class="bg-white p-6 rounded shadow-xl w-[90%] max-w-2xl relative">
            <button id="close-user-modal" class="absolute top-2 right-2 text-xl font-bold">×</button>
            <h2 class="text-xl font-semibold mb-4">Modifier l'utilisateur</h2>
            <form id="user-edit-form" class="space-y-4 grid grid-cols-2 gap-4">
                <input type="hidden" id="edit-user-id" />
                <div>
                    <label>Email</label>
                    <input type="email" id="edit-user-email" class="input w-full" />
                </div>
                <div>
                    <label>Prénom</label>
                    <input type="text" id="edit-user-firstname" class="input w-full" />
                </div>
                <div>
                    <label>Nom</label>
                    <input type="text" id="edit-user-lastname" class="input w-full" />
                </div>
                <div>
                    <label>Phone</label>
                    <input type="text" id="edit-user-phone" class="input w-full" />
                </div>
                <div class="col-span-2 flex justify-end">
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-white hover:text-black border border-black">Modifier</button>
                </div>
            </form>
        </div>
    `;

    document.body.appendChild(modal);

    document.getElementById('close-user-modal').addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    document.getElementById('user-edit-form').addEventListener('submit', async (e) => {
        e.preventDefault();

        const userId = document.getElementById('edit-user-id').value;
        const updatedUser = {
            "adminToken": $("#jwt-admin-token").val(),
            user_id: userId,
            user_email: document.getElementById('edit-user-email').value,
            user_firstname: document.getElementById('edit-user-firstname').value,
            user_lastname: document.getElementById('edit-user-lastname').value,
            user_phone: document.getElementById('edit-user-phone').value,
        };

        try {
            const response = await axios.put(baseUrl + '/api/user/update', updatedUser);
            if (response.data.success) {
                document.getElementById('modal-user').classList.add('hidden');
                hideUsers();
                getUsers();
            } else {
                alert('Erreur : ' + response.data.error);
            }
        } catch (error) {
            console.error(error);
            alert("Erreur lors de la modification.");
        }
    });
}
createUserModal();