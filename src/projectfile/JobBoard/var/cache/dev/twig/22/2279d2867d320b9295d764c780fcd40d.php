<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* admin/index.html.twig */
class __TwigTemplate_e0202a9f42f669a66e2188f228618af4 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "JobBoard - Dashboard!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "    <script src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("scripts/admin/dashboard_advertisement.js"), "html", null, true);
        yield "\" defer></script>
    <script src=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("scripts/admin/dashboard_application.js"), "html", null, true);
        yield "\" defer></script>
    <script src=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("scripts/admin/dashboard_company.js"), "html", null, true);
        yield "\" defer></script>
    <script src=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("scripts/admin/dashboard_user.js"), "html", null, true);
        yield "\" defer></script>
    
    <input class=\"hidden\" type=\"text\" id=\"jwt-admin-token\" value=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["adminToken"]) || array_key_exists("adminToken", $context) ? $context["adminToken"] : (function () { throw new RuntimeError('Variable "adminToken" does not exist.', 11, $this->source); })()), "html", null, true);
        yield "\">
    
    <div class=\"\">
        <div class=\"navbar flex justify-around\">
            <div class=\"flex\">
                <span class=\"my-6 text-4xl italic\">Dashboard</span>
            </div>
        </div>
        <div class=\"flex flex-col justify-center h-full sm:px-6 lg:px-24 2xl:px-86\">
            <div id=\"company-table\" class=\"p-4 mx-4 md:mx-0 my-8 overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic mb-2 self-center\">Entreprises</h1>
                <table class=\"table\">
                    <thead>
                        <tr>
                            <th class=\"p-2 text-center\">Identifiant</th>
                            <th class=\"p-2 text-center\">Nom</th>
                            <th class=\"p-2 text-center\">Modifier</th>
                            <th class=\"p-2 text-center\">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody id=\"companies\">
                    </tbody>    
                </table>
                <div class=\"mt-2 flex gap-2 justify-end\">
                    <button id=\"get-company\" class=\"btn btn-outline\">Afficher</button>
                    <button id=\"hide-company\" class=\"btn btn-outline\">Cacher</button>
                </div>
            </div>
            <div id=\"company-create\" class=\"box-border border-2 rounded-xl p-4 mx-4 md:mx-0 my-8 bg-slate-200 shadow-lg overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic ml-4 mb-2 underline underline-offset-4\">Create Company</h1>
                <form autocomplete=\"off\" class=\"max-w-sm mx-auto\">
                    <div class=\"mb-5\">
                        <label for=\"text\" class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Company name</label>
                        <input value=\"\" type=\"text\" id=\"companyname\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <button type=\"submit\" class=\"text-white bg-black hover:bg-white hover:text-black rounded-lg px-5 py-2.5 text-center\">Register company</button>
                </form>
            </div>
            <div id=\"advertisement-table\" class=\"p-4 mx-4 md:mx-0 mb-8 overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic mb-2 self-center\">Annonces</h1>
                <table class=\"table\">
                    <thead>
                        <tr class=\"\">
                            <th class=\"p-2 text-center\">Identifiant</th>
                            <th class=\"p-2 text-center\">Titre</th>
                            <th class=\"p-2 text-center truncate\">Description</th>
                            <th class=\"p-2 text-center\">Salaire</th>
                            <th class=\"p-2 text-center\">Présence</th>
                            <th class=\"p-2 text-center\">Entreprise</th>
                            <th class=\"p-2 text-center\">Modifier</th>
                            <th class=\"p-2 text-center\">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody id=\"advertisements\">
                    </tbody>    
                </table>
                <div class=\"mt-2 flex gap-2 justify-end\">
                    <button id=\"get-advertisement\" class=\"btn btn-outline\">Afficher</button>
                    <button id=\"hide-advertisement\" class=\"btn btn-outline\">Cacher</button>
                </div>
            </div>
            <div id=\"advertisement-create\" class=\"box-border border-2 rounded-xl p-4 mx-4 md:mx-0 my-8 bg-slate-200 shadow-lg overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic ml-4 mb-2 underline underline-offset-4\">Create Advertisement</h1>
                <form autocomplete=\"off\" class=\"max-w-sm mx-auto\">
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Advertisement Title</label>
                        <input type=\"text\" id=\"adtitle\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Advertisement Description</label>
                        <textarea type=\"text\" id=\"addescription\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required ></textarea>
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Advertisement Salary</label>
                        <input type=\"int\" id=\"adsalary\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Advertisement Workhour</label>
                        <input type=\"int\" id=\"adworkhour\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <select id=\"adcompanyid\"class=\"select appearance-none\" required>
                            <option value=\"\" disabled selected>Select a company</option>
                            <script>
                                axios.get(baseUrl + '/api/company').then(response => {
                                    const companies = response.data;
                                    const select = document.querySelector('.select');
                                    companies.forEach(company => {
                                        const option = document.createElement('option');
                                        option.className = \"text-black bg-white\";
                                        option.value = company.company_id;
                                        option.textContent = company.company_name;
                                        select.appendChild(option);
                                    });
                                });
                            </script>
                        </select>   
                    </div>
                    <button type=\"submit\" class=\"text-white bg-black hover:bg-white hover:text-black rounded-lg px-5 py-2.5 text-center\">Register Advertisement</button>
                </form>
            </div>
            <div id=\"application-table\" class=\"p-4 mx-4 md:mx-0 mb-8 overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic mb-2 self-center\">Candidatures</h1>
                <table class=\"table\">
                    <thead>
                        <tr class=\"\">
                            <th class=\"p-2 text-center\">Identifiant</th>
                            <th class=\"p-2 text-center\">Identifiant Utilisateur</th>
                            <th class=\"p-2 text-center\">Identifiant Annonce</th>
                            <th class=\"p-2 text-center truncate\">Message</th>
                            <th class=\"p-2 text-center\">Prénom</th>
                            <th class=\"p-2 text-center\">Nom de famille</th>
                            <th class=\"p-2 text-center\">Email</th>
                            <th class=\"p-2 text-center\">Téléphone</th>
                            <th class=\"p-2 text-center\">Modifier</th>
                            <th class=\"p-2 text-center\">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody id=\"applications\">
                    </tbody>    
                </table>
                <div class=\"mt-2 flex gap-2 justify-end\">
                    <button id=\"get-application\" class=\"btn btn-outline\">Afficher</button>
                    <button id=\"hide-application\" class=\"btn btn-outline\">Cacher</button>
                </div>
            </div>
            <div id=\"application-create\" class=\"box-border border-2 rounded-xl p-4 mx-4 md:mx-0 my-8 bg-slate-200 shadow-lg overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic ml-4 mb-2 underline underline-offset-4\">Create Application</h1>
                <form autocomplete=\"off\" class=\"max-w-sm mx-auto\">
                    <div class=\"mb-5\">
                        <select id=\"appuserid\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\" required>
                            <option value=\"\">Select User</option>
                            <script>
                                axios.get(baseUrl + '/api/user').then(response => {
                                    const users = response.data;
                                    const selectUser = document.getElementById('appuserid');
                                    users.forEach(user => {
                                        const optionUser = document.createElement('option');
                                        optionUser.className = \"text-black bg-white\";
                                        optionUser.value = user.user_id;
                                        optionUser.textContent = user.user_firstname + ' ' + user.user_lastname + ' ID :' + user.user_id;
                                        selectUser.appendChild(optionUser);
                                    });
                                });
                            </script>
                        </select>
                    </div>
                    <div class=\"mb-5\">
                        <select id=\"appadvertisementid\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\" required>
                            <option value=\"\">Select Advertisement</option>
                            <script>
                                axios.get(baseUrl + '/api/advertisement').then(response => {
                                    const advertisements = response.data;
                                    const selectAdvertisement = document.getElementById('appadvertisementid');
                                    advertisements.forEach(advertisement => {
                                        const optionAdvertisement = document.createElement('option');
                                        optionAdvertisement.className = \"text-black bg-white\";
                                        optionAdvertisement.value = advertisement.advertisement_id;
                                        optionAdvertisement.textContent = advertisement.advertisement_title + ' ID :' + advertisement.advertisement_id;
                                        selectAdvertisement.appendChild(optionAdvertisement);
                                    });
                                });
                            </script>
                        </select>
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Application message</label>
                        <textarea type=\"text\" id=\"appmessage\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required></textarea>
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Application firstname</label>
                        <input type=\"text\" id=\"appfirstname\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Application lastname</label>
                        <input type=\"text\" id=\"applastname\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Application email</label>
                        <input type=\"email\" id=\"appemail\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Application phone</label>
                        <input type=\"int\" id=\"appphone\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"/>
                    </div>
                    <button type=\"submit\" class=\"text-white bg-black hover:bg-white hover:text-black rounded-lg px-5 py-2.5 text-center\">Register Application</button>
                </form>
            </div>
            <div id=\"user-table\" class=\"p-4 mx-4 md:mx-0 mb-8 overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic ml-4 mb-2 self-center\">Utilisateurs</h1>
                <table class=\"table\">
                    <thead>
                        <tr class=\"\">
                            <th class=\"p-2 text-center\">Identifiant</th>
                            <th class=\"p-2 text-center\">Email</th>
                            <th class=\"p-2 text-center\">Prénom</th>
                            <th class=\"p-2 text-center\">Nom de famille</th>
                            <th class=\"p-2 text-center\">Téléphone</th>
                            <th class=\"p-2 text-center\">Modifier</th>
                            <th class=\"p-2 text-center\">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody id=\"users\">
                    </tbody>    
                </table>
                <div class=\"mt-2 flex gap-2 justify-end\">
                    <button id=\"get-user\" class=\"btn btn-outline\">Afficher</button>
                    <button id=\"hide-user\" class=\"btn btn-outline\">Cache</button>
                </div>
            </div>
            <div id=\"user-create\" class=\"box-border border-2 rounded-xl p-4 mx-4 md:mx-0 my-8 bg-slate-200 shadow-lg overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic ml-4 mb-2 underline underline-offset-4\">Create User</h1>
                <form autocomplete=\"off\" class=\"max-w-sm mx-auto\">
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Firstname</label>
                        <input type=\"text\" id=\"userfirstname\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 t  ext-sm font-medium text-gray-900 dark:text-white\">Name</label>
                        <input type=\"text\" id=\"username\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Email</label>
                        <input type=\"email\" id=\"useremail\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Phone</label>
                        <input type=\"int\" id=\"userphone\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"/>
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Password</label>
                        <input type=\"int\" id=\"userpassword\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\" required/>
                    </div>                    
                    <button type=\"submit\" class=\"text-white bg-black hover:bg-white hover:text-black rounded-lg px-5 py-2.5 text-center\">Register User</button>
                </form>
            </div>
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  118 => 11,  113 => 9,  109 => 8,  105 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}JobBoard - Dashboard!{% endblock %}

{% block body %}
    <script src=\"{{ asset('scripts/admin/dashboard_advertisement.js') }}\" defer></script>
    <script src=\"{{ asset('scripts/admin/dashboard_application.js') }}\" defer></script>
    <script src=\"{{ asset('scripts/admin/dashboard_company.js') }}\" defer></script>
    <script src=\"{{ asset('scripts/admin/dashboard_user.js') }}\" defer></script>
    
    <input class=\"hidden\" type=\"text\" id=\"jwt-admin-token\" value=\"{{ adminToken }}\">
    
    <div class=\"\">
        <div class=\"navbar flex justify-around\">
            <div class=\"flex\">
                <span class=\"my-6 text-4xl italic\">Dashboard</span>
            </div>
        </div>
        <div class=\"flex flex-col justify-center h-full sm:px-6 lg:px-24 2xl:px-86\">
            <div id=\"company-table\" class=\"p-4 mx-4 md:mx-0 my-8 overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic mb-2 self-center\">Entreprises</h1>
                <table class=\"table\">
                    <thead>
                        <tr>
                            <th class=\"p-2 text-center\">Identifiant</th>
                            <th class=\"p-2 text-center\">Nom</th>
                            <th class=\"p-2 text-center\">Modifier</th>
                            <th class=\"p-2 text-center\">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody id=\"companies\">
                    </tbody>    
                </table>
                <div class=\"mt-2 flex gap-2 justify-end\">
                    <button id=\"get-company\" class=\"btn btn-outline\">Afficher</button>
                    <button id=\"hide-company\" class=\"btn btn-outline\">Cacher</button>
                </div>
            </div>
            <div id=\"company-create\" class=\"box-border border-2 rounded-xl p-4 mx-4 md:mx-0 my-8 bg-slate-200 shadow-lg overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic ml-4 mb-2 underline underline-offset-4\">Create Company</h1>
                <form autocomplete=\"off\" class=\"max-w-sm mx-auto\">
                    <div class=\"mb-5\">
                        <label for=\"text\" class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Company name</label>
                        <input value=\"\" type=\"text\" id=\"companyname\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <button type=\"submit\" class=\"text-white bg-black hover:bg-white hover:text-black rounded-lg px-5 py-2.5 text-center\">Register company</button>
                </form>
            </div>
            <div id=\"advertisement-table\" class=\"p-4 mx-4 md:mx-0 mb-8 overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic mb-2 self-center\">Annonces</h1>
                <table class=\"table\">
                    <thead>
                        <tr class=\"\">
                            <th class=\"p-2 text-center\">Identifiant</th>
                            <th class=\"p-2 text-center\">Titre</th>
                            <th class=\"p-2 text-center truncate\">Description</th>
                            <th class=\"p-2 text-center\">Salaire</th>
                            <th class=\"p-2 text-center\">Présence</th>
                            <th class=\"p-2 text-center\">Entreprise</th>
                            <th class=\"p-2 text-center\">Modifier</th>
                            <th class=\"p-2 text-center\">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody id=\"advertisements\">
                    </tbody>    
                </table>
                <div class=\"mt-2 flex gap-2 justify-end\">
                    <button id=\"get-advertisement\" class=\"btn btn-outline\">Afficher</button>
                    <button id=\"hide-advertisement\" class=\"btn btn-outline\">Cacher</button>
                </div>
            </div>
            <div id=\"advertisement-create\" class=\"box-border border-2 rounded-xl p-4 mx-4 md:mx-0 my-8 bg-slate-200 shadow-lg overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic ml-4 mb-2 underline underline-offset-4\">Create Advertisement</h1>
                <form autocomplete=\"off\" class=\"max-w-sm mx-auto\">
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Advertisement Title</label>
                        <input type=\"text\" id=\"adtitle\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Advertisement Description</label>
                        <textarea type=\"text\" id=\"addescription\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required ></textarea>
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Advertisement Salary</label>
                        <input type=\"int\" id=\"adsalary\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Advertisement Workhour</label>
                        <input type=\"int\" id=\"adworkhour\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <select id=\"adcompanyid\"class=\"select appearance-none\" required>
                            <option value=\"\" disabled selected>Select a company</option>
                            <script>
                                axios.get(baseUrl + '/api/company').then(response => {
                                    const companies = response.data;
                                    const select = document.querySelector('.select');
                                    companies.forEach(company => {
                                        const option = document.createElement('option');
                                        option.className = \"text-black bg-white\";
                                        option.value = company.company_id;
                                        option.textContent = company.company_name;
                                        select.appendChild(option);
                                    });
                                });
                            </script>
                        </select>   
                    </div>
                    <button type=\"submit\" class=\"text-white bg-black hover:bg-white hover:text-black rounded-lg px-5 py-2.5 text-center\">Register Advertisement</button>
                </form>
            </div>
            <div id=\"application-table\" class=\"p-4 mx-4 md:mx-0 mb-8 overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic mb-2 self-center\">Candidatures</h1>
                <table class=\"table\">
                    <thead>
                        <tr class=\"\">
                            <th class=\"p-2 text-center\">Identifiant</th>
                            <th class=\"p-2 text-center\">Identifiant Utilisateur</th>
                            <th class=\"p-2 text-center\">Identifiant Annonce</th>
                            <th class=\"p-2 text-center truncate\">Message</th>
                            <th class=\"p-2 text-center\">Prénom</th>
                            <th class=\"p-2 text-center\">Nom de famille</th>
                            <th class=\"p-2 text-center\">Email</th>
                            <th class=\"p-2 text-center\">Téléphone</th>
                            <th class=\"p-2 text-center\">Modifier</th>
                            <th class=\"p-2 text-center\">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody id=\"applications\">
                    </tbody>    
                </table>
                <div class=\"mt-2 flex gap-2 justify-end\">
                    <button id=\"get-application\" class=\"btn btn-outline\">Afficher</button>
                    <button id=\"hide-application\" class=\"btn btn-outline\">Cacher</button>
                </div>
            </div>
            <div id=\"application-create\" class=\"box-border border-2 rounded-xl p-4 mx-4 md:mx-0 my-8 bg-slate-200 shadow-lg overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic ml-4 mb-2 underline underline-offset-4\">Create Application</h1>
                <form autocomplete=\"off\" class=\"max-w-sm mx-auto\">
                    <div class=\"mb-5\">
                        <select id=\"appuserid\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\" required>
                            <option value=\"\">Select User</option>
                            <script>
                                axios.get(baseUrl + '/api/user').then(response => {
                                    const users = response.data;
                                    const selectUser = document.getElementById('appuserid');
                                    users.forEach(user => {
                                        const optionUser = document.createElement('option');
                                        optionUser.className = \"text-black bg-white\";
                                        optionUser.value = user.user_id;
                                        optionUser.textContent = user.user_firstname + ' ' + user.user_lastname + ' ID :' + user.user_id;
                                        selectUser.appendChild(optionUser);
                                    });
                                });
                            </script>
                        </select>
                    </div>
                    <div class=\"mb-5\">
                        <select id=\"appadvertisementid\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\" required>
                            <option value=\"\">Select Advertisement</option>
                            <script>
                                axios.get(baseUrl + '/api/advertisement').then(response => {
                                    const advertisements = response.data;
                                    const selectAdvertisement = document.getElementById('appadvertisementid');
                                    advertisements.forEach(advertisement => {
                                        const optionAdvertisement = document.createElement('option');
                                        optionAdvertisement.className = \"text-black bg-white\";
                                        optionAdvertisement.value = advertisement.advertisement_id;
                                        optionAdvertisement.textContent = advertisement.advertisement_title + ' ID :' + advertisement.advertisement_id;
                                        selectAdvertisement.appendChild(optionAdvertisement);
                                    });
                                });
                            </script>
                        </select>
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Application message</label>
                        <textarea type=\"text\" id=\"appmessage\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required></textarea>
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Application firstname</label>
                        <input type=\"text\" id=\"appfirstname\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Application lastname</label>
                        <input type=\"text\" id=\"applastname\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Application email</label>
                        <input type=\"email\" id=\"appemail\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Application phone</label>
                        <input type=\"int\" id=\"appphone\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"/>
                    </div>
                    <button type=\"submit\" class=\"text-white bg-black hover:bg-white hover:text-black rounded-lg px-5 py-2.5 text-center\">Register Application</button>
                </form>
            </div>
            <div id=\"user-table\" class=\"p-4 mx-4 md:mx-0 mb-8 overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic ml-4 mb-2 self-center\">Utilisateurs</h1>
                <table class=\"table\">
                    <thead>
                        <tr class=\"\">
                            <th class=\"p-2 text-center\">Identifiant</th>
                            <th class=\"p-2 text-center\">Email</th>
                            <th class=\"p-2 text-center\">Prénom</th>
                            <th class=\"p-2 text-center\">Nom de famille</th>
                            <th class=\"p-2 text-center\">Téléphone</th>
                            <th class=\"p-2 text-center\">Modifier</th>
                            <th class=\"p-2 text-center\">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody id=\"users\">
                    </tbody>    
                </table>
                <div class=\"mt-2 flex gap-2 justify-end\">
                    <button id=\"get-user\" class=\"btn btn-outline\">Afficher</button>
                    <button id=\"hide-user\" class=\"btn btn-outline\">Cache</button>
                </div>
            </div>
            <div id=\"user-create\" class=\"box-border border-2 rounded-xl p-4 mx-4 md:mx-0 my-8 bg-slate-200 shadow-lg overflow-auto flex flex-col\">
                <h1 class=\"text-2xl italic ml-4 mb-2 underline underline-offset-4\">Create User</h1>
                <form autocomplete=\"off\" class=\"max-w-sm mx-auto\">
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Firstname</label>
                        <input type=\"text\" id=\"userfirstname\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 t  ext-sm font-medium text-gray-900 dark:text-white\">Name</label>
                        <input type=\"text\" id=\"username\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Email</label>
                        <input type=\"email\" id=\"useremail\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"required />
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Phone</label>
                        <input type=\"int\" id=\"userphone\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\"/>
                    </div>
                    <div class=\"mb-5\">
                        <label class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">Password</label>
                        <input type=\"int\" id=\"userpassword\" class=\"shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light\" required/>
                    </div>                    
                    <button type=\"submit\" class=\"text-white bg-black hover:bg-white hover:text-black rounded-lg px-5 py-2.5 text-center\">Register User</button>
                </form>
            </div>
        </div>
    </div>
{% endblock %}
", "admin/index.html.twig", "/home/haytam/epitech/projetJBdepot/T-WEB-501-STG_14/templates/admin/index.html.twig");
    }
}
