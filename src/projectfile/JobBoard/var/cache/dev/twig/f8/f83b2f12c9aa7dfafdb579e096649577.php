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

/* base.html.twig */
class __TwigTemplate_4f66a5ef5e5f72dafa2eb5c8bc06b2e8 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
        <link rel=\"icon\" href=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/jobboard.jpg"), "html", null, true);
        yield "\" />

        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"/>

        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
        
        <link href=\"https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap\" rel=\"stylesheet\">
        
        ";
        // line 15
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 21
        yield "            
        ";
        // line 22
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 29
        yield "    </head>
    <body class=\"color-base-100 min-h-svh flex flex-col max-w-screen\">
        <header class=\"bg-black flex items-center justify-between w-full overflow-hidden h-18 px-5 sm:h-20 sm:px-6 lg:px-24 2xl:px-86\">
            <div class=\"h-3/5 flex items-center gap-6\">
                <a class=\"h-full flex flex-col items-center justify-center\" href=\"";
        // line 33
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">
                    <figure class=\"h-full flex flex-col items-center justify-center overflow-hidden\">
                        <img class=\"h-full invert rounded-lg\" src=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/jobboard.jpg"), "html", null, true);
        yield "\" alt=\"Logo du site\">
                    </figure>
                </a>

                <a class=\"link italic text-white font-medium hidden sm:block\" href=\"";
        // line 39
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Accueil</a>

                <a class=\"link italic text-white font-medium\" href=\"";
        // line 41
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_advertisement");
        yield "\">Annonces</a>

                ";
        // line 43
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 44
            yield "                    <a class=\"link italic text-white font-medium hidden sm:block\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin");
            yield "\">Administration</a>
                ";
        }
        // line 46
        yield "            </div>

            
            ";
        // line 49
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 49, $this->source); })()), "user", [], "any", false, false, false, 49)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 50
            yield "                <a class=\"h-3/5 bg-white link rounded-lg flex flex-col items-center justify-center px-4 py-1 sm:px-6 sm:py-2\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
            yield "\">
                    <p class=\"font-medium italic\">Mon profil</p>
                </a>
            ";
        } else {
            // line 54
            yield "                <a class=\"h-3/5 bg-white link rounded-lg flex flex-col items-center justify-center px-4 py-1 sm:px-6 sm:py-2\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\">
                    <p class=\"font-medium italic\">Connexion</p>
                </a>
            ";
        }
        // line 58
        yield "        </header>

        ";
        // line 60
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 61
        yield "
        <footer class=\"w-full bg-white flex flex-col items-center justify-center h-128 sm:px-6 lg:px-24 2xl:px-86\">
            <div class=\"bg-black w-full h-full flex flex-col items-center text-white rounded-4xl gap-6 px-6 overflow-hidden lg:px-12\">
                <div class=\"h-1/2 w-full flex flex-col items-center justify-around lg:items-start\">
                    <figure class=\"h-3/4 flex items-center justify-center overflow-hidden\">
                        <img class=\"h-full\" src=\"";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/jobboard.jpg"), "html", null, true);
        yield "\" alt=\"Logo du site\">
                    </figure>

                    <div class=\"w-full flex items-center justify-center gap-6 lg:justify-start\">
                        <a class=\"bg-white unselectable rounded-xl px-4 py-1 text-black hover:bg-slate-100\" href=\"https://github.com/CN-Works/\">
                            <p>Victor</p>
                        </a>
    
                        <a class=\"bg-white unselectable rounded-xl px-4 py-1 text-black hover:bg-slate-100\" href=\"https://github.com/HaytamL\">
                            <p>Haytam</p>
                        </a>
    
                        <a class=\"bg-white unselectable rounded-xl px-4 py-1 text-black hover:bg-slate-100\" href=\"https://github.com/Hector-boopy\">
                            <p>Hector</p>
                        </a>
                    </div>
                </div>

                <div class=\"h-1/2 w-full flex items-center justify-center lg:justify-start\">
                    <div class=\"w-3/9 h-full flex flex-col items-center justify-center gap-3 lg:items-start\">
                        <p class=\"font-bold text-lg italic\">Plan du site</p>

                        <a class=\"link text-slate-100 text-sm\" href=\"https://github.com/CN-Works/\">Annonces</a>
                        <a class=\"link text-slate-100 text-sm\" href=\"";
        // line 89
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin");
        yield "\">Gestion</a>
                        <a class=\"link text-slate-100 text-sm\" href=\"";
        // line 90
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\">Profil</a>
                    </div>

                    <div class=\"w-3/9 h-full flex flex-col items-center justify-center gap-3 lg:items-start\">
                        <p class=\"font-bold text-lg italic\">Contacts</p>

                        <a class=\"link text-slate-100 text-sm\" href=\"https://github.com/CN-Works/\">Victor</a>
                        <a class=\"link text-slate-100 text-sm\" href=\"https://github.com/HaytamL\">Haytam</a>
                        <a class=\"link text-slate-100 text-sm\" href=\"https://github.com/Hector-boopy\">Hector</a>
                    </div>

                    <div class=\"w-3/9 h-full flex flex-col items-center justify-center gap-3 lg:items-start\">
                        <p class=\"font-bold text-lg italic\">Utilisateur</p>

                        <a class=\"link text-slate-100 text-sm\" href=\"";
        // line 104
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">Connexion</a>
                        <a class=\"link text-slate-100 text-sm\" href=\"";
        // line 105
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\">Créer un compte</a>
                        <a class=\"link text-slate-100 text-sm\" href=\"";
        // line 106
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">Déconnexion</a> 
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
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

        yield "Welcome!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 15
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 16
        yield "            <link href=\"https://cdn.jsdelivr.net/npm/daisyui\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"https://cdn.jsdelivr.net/npm/daisyui@5.1.29/theme/lofi.css\" rel=\"stylesheet\" type=\"text/css\" />

            <link rel=\"stylesheet\" href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("styles/app.css"), "html", null, true);
        yield "\">
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 22
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 23
        yield "            <script src=\"https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4\"></script>
            <script src=\"https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js\"></script>
            <script src=\"https://code.jquery.com/jquery-3.7.1.min.js\"></script>
            
            <script src=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("scripts/baseUrl.js"), "html", null, true);
        yield "\"></script>
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 60
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  313 => 60,  300 => 27,  294 => 23,  281 => 22,  268 => 19,  263 => 16,  250 => 15,  227 => 5,  208 => 106,  204 => 105,  200 => 104,  183 => 90,  179 => 89,  153 => 66,  146 => 61,  144 => 60,  140 => 58,  132 => 54,  124 => 50,  122 => 49,  117 => 46,  111 => 44,  109 => 43,  104 => 41,  99 => 39,  92 => 35,  87 => 33,  81 => 29,  79 => 22,  76 => 21,  74 => 15,  62 => 6,  58 => 5,  52 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Welcome!{% endblock %}</title>
        <link rel=\"icon\" href=\"{{ asset(\"img/jobboard.jpg\") }}\" />

        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"/>

        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
        
        <link href=\"https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap\" rel=\"stylesheet\">
        
        {% block stylesheets %}
            <link href=\"https://cdn.jsdelivr.net/npm/daisyui\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"https://cdn.jsdelivr.net/npm/daisyui@5.1.29/theme/lofi.css\" rel=\"stylesheet\" type=\"text/css\" />

            <link rel=\"stylesheet\" href=\"{{ asset('styles/app.css') }}\">
        {% endblock %}
            
        {% block javascripts %}
            <script src=\"https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4\"></script>
            <script src=\"https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js\"></script>
            <script src=\"https://code.jquery.com/jquery-3.7.1.min.js\"></script>
            
            <script src=\"{{ asset('scripts/baseUrl.js') }}\"></script>
        {% endblock %}
    </head>
    <body class=\"color-base-100 min-h-svh flex flex-col max-w-screen\">
        <header class=\"bg-black flex items-center justify-between w-full overflow-hidden h-18 px-5 sm:h-20 sm:px-6 lg:px-24 2xl:px-86\">
            <div class=\"h-3/5 flex items-center gap-6\">
                <a class=\"h-full flex flex-col items-center justify-center\" href=\"{{ path(\"app_home\")}}\">
                    <figure class=\"h-full flex flex-col items-center justify-center overflow-hidden\">
                        <img class=\"h-full invert rounded-lg\" src=\"{{ asset(\"img/jobboard.jpg\") }}\" alt=\"Logo du site\">
                    </figure>
                </a>

                <a class=\"link italic text-white font-medium hidden sm:block\" href=\"{{ path(\"app_home\")}}\">Accueil</a>

                <a class=\"link italic text-white font-medium\" href=\"{{ path(\"app_advertisement\")}}\">Annonces</a>

                {% if is_granted('ROLE_ADMIN') %}
                    <a class=\"link italic text-white font-medium hidden sm:block\" href=\"{{ path(\"app_admin\")}}\">Administration</a>
                {% endif %}
            </div>

            
            {% if app.user %}
                <a class=\"h-3/5 bg-white link rounded-lg flex flex-col items-center justify-center px-4 py-1 sm:px-6 sm:py-2\" href=\"{{ path(\"app_profile\")}}\">
                    <p class=\"font-medium italic\">Mon profil</p>
                </a>
            {% else %}
                <a class=\"h-3/5 bg-white link rounded-lg flex flex-col items-center justify-center px-4 py-1 sm:px-6 sm:py-2\" href=\"{{ path(\"app_login\")}}\">
                    <p class=\"font-medium italic\">Connexion</p>
                </a>
            {% endif %}
        </header>

        {% block body %}{% endblock %}

        <footer class=\"w-full bg-white flex flex-col items-center justify-center h-128 sm:px-6 lg:px-24 2xl:px-86\">
            <div class=\"bg-black w-full h-full flex flex-col items-center text-white rounded-4xl gap-6 px-6 overflow-hidden lg:px-12\">
                <div class=\"h-1/2 w-full flex flex-col items-center justify-around lg:items-start\">
                    <figure class=\"h-3/4 flex items-center justify-center overflow-hidden\">
                        <img class=\"h-full\" src=\"{{ asset(\"img/jobboard.jpg\")}}\" alt=\"Logo du site\">
                    </figure>

                    <div class=\"w-full flex items-center justify-center gap-6 lg:justify-start\">
                        <a class=\"bg-white unselectable rounded-xl px-4 py-1 text-black hover:bg-slate-100\" href=\"https://github.com/CN-Works/\">
                            <p>Victor</p>
                        </a>
    
                        <a class=\"bg-white unselectable rounded-xl px-4 py-1 text-black hover:bg-slate-100\" href=\"https://github.com/HaytamL\">
                            <p>Haytam</p>
                        </a>
    
                        <a class=\"bg-white unselectable rounded-xl px-4 py-1 text-black hover:bg-slate-100\" href=\"https://github.com/Hector-boopy\">
                            <p>Hector</p>
                        </a>
                    </div>
                </div>

                <div class=\"h-1/2 w-full flex items-center justify-center lg:justify-start\">
                    <div class=\"w-3/9 h-full flex flex-col items-center justify-center gap-3 lg:items-start\">
                        <p class=\"font-bold text-lg italic\">Plan du site</p>

                        <a class=\"link text-slate-100 text-sm\" href=\"https://github.com/CN-Works/\">Annonces</a>
                        <a class=\"link text-slate-100 text-sm\" href=\"{{ path(\"app_admin\") }}\">Gestion</a>
                        <a class=\"link text-slate-100 text-sm\" href=\"{{ path(\"app_profile\") }}\">Profil</a>
                    </div>

                    <div class=\"w-3/9 h-full flex flex-col items-center justify-center gap-3 lg:items-start\">
                        <p class=\"font-bold text-lg italic\">Contacts</p>

                        <a class=\"link text-slate-100 text-sm\" href=\"https://github.com/CN-Works/\">Victor</a>
                        <a class=\"link text-slate-100 text-sm\" href=\"https://github.com/HaytamL\">Haytam</a>
                        <a class=\"link text-slate-100 text-sm\" href=\"https://github.com/Hector-boopy\">Hector</a>
                    </div>

                    <div class=\"w-3/9 h-full flex flex-col items-center justify-center gap-3 lg:items-start\">
                        <p class=\"font-bold text-lg italic\">Utilisateur</p>

                        <a class=\"link text-slate-100 text-sm\" href=\"{{ path(\"app_login\") }}\">Connexion</a>
                        <a class=\"link text-slate-100 text-sm\" href=\"{{ path(\"app_register\") }}\">Créer un compte</a>
                        <a class=\"link text-slate-100 text-sm\" href=\"{{ path(\"app_logout\") }}\">Déconnexion</a> 
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
", "base.html.twig", "/home/haytam/epitech/projetJBdepot/T-WEB-501-STG_14/templates/base.html.twig");
    }
}
