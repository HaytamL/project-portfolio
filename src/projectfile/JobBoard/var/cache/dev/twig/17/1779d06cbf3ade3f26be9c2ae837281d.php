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

/* advertisement/index.html.twig */
class __TwigTemplate_4880ecf2b40a1964ec22426df00c86a4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "advertisement/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "advertisement/index.html.twig"));

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

        yield "JobBoard - Annonces";
        
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
        yield "<script src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("scripts/advertisement/advertisementManager.js"), "html", null, true);
        yield "\" defer></script>

";
        // line 8
        if ((($tmp =  !(null === (isset($context["userToken"]) || array_key_exists("userToken", $context) ? $context["userToken"] : (function () { throw new RuntimeError('Variable "userToken" does not exist.', 8, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 9
            yield "    <input type=\"text\" class=\"hidden\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["userToken"]) || array_key_exists("userToken", $context) ? $context["userToken"] : (function () { throw new RuntimeError('Variable "userToken" does not exist.', 9, $this->source); })()), "html", null, true);
            yield "\" id=\"jwt-user-token\">
";
        }
        // line 11
        yield "

<main class=\"w-full bg-base-100\">
    ";
        // line 15
        yield "    <div id=\"advertisement-container-form\" class=\"w-full min-h-svh flex items-center justify-center\">

        <div class=\"w-full flex flex-col items-center gap-12 lg:w-5/10 p-12 rounded-4xl\">
            <p class=\"text-2xl italic font-extrabold\">Annonce</p>

            <div class=\"w-full flex flex-col gap-6\">
                <h2 id=\"advertform-title\" class=\"underline text-xl\"></h2>
        
                <p id=\"advertform-description\" class=\"italic font-lg font-medium\"></p>

                <div class=\"w-full flex items-center justify-between\">
                    <p id=\"advertform-workhours\" class=\"font-medium\"></p>
                    
                    <p id=\"advertform-salary\" class=\"font-medium\"></p>
                </div>
            </div>

            <p class=\"text-2xl italic font-bold\">Candidature</p>

            <div class=\"w-full flex flex-col items-center gap-6\">
                <fieldset class=\"fieldset w-full xl:w-1/2\">
                    <legend class=\"fieldset-legend\">Prénom</legend>
                    <input id=\"advertform-firstname\" type=\"text\" class=\"input w-full\" disabled/>
                </fieldset>

                <fieldset class=\"fieldset w-full xl:w-1/2\">
                    <legend class=\"fieldset-legend\">Nom de famille</legend>
                    <input id=\"advertform-lastname\" type=\"text\" class=\"input w-full\" disabled/>
                </fieldset>

                <fieldset class=\"fieldset w-full xl:w-1/2\">
                    <legend class=\"fieldset-legend\">Addresse email</legend>
                    <input id=\"advertform-email\" type=\"text\" class=\"input w-full\" disabled/>
                </fieldset>

                <fieldset class=\"fieldset w-full xl:w-1/2\">
                    <legend class=\"fieldset-legend\">Numéro de téléphone</legend>
                    <input id=\"advertform-phone\" type=\"text\" class=\"input w-full\" disabled/>
                </fieldset>

                <fieldset class=\"fieldset w-full xl:w-1/2\">
                    <legend class=\"fieldset-legend\">Message</legend>
                    <textarea id=\"advertform-message\" class=\"textarea h-24 w-full\" placeholder=\"Message\"></textarea>
                </fieldset>
            </div>

            <div class=\"w-full flex items-center justify-between\">
                <button id=\"advertform-back\" class=\"btn\">Retour</button>
    
                <button id=\"advertform-apply\" class=\"btn\">Postuler</button>
            </div>
        </div>
    </div>

    <div id=\"advertisement-container\" class=\"w-full min-h-svh flex flex-col items-center justify-center gap-6 sm:px-6 lg:px-24 2xl:px-86\">

        <h1 class=\"text-3xl\">Annonces</h1>

        <div id=\"advertisement-cards-container\" class=\"w-full flex flex-col items-between py-4 md:flex-row md:items-center md:justify-between md:flex-wrap\">
        </div>

        <div class=\"w-full bg-base-100 h-6 my-6 flex items-center justify-center gap-4\">
            <button class=\"join-item btn btn-outline\" id=\"advertisement-page-back\">Précédent</button>
            <button class=\"join-item btn btn-outline\" id=\"advertisement-page-current\"></button>
            <button class=\"join-item btn btn-outline\" id=\"advertisement-page-next\">Suivant</button>
        </div>
    </div>
</main>
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
        return "advertisement/index.html.twig";
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
        return array (  119 => 15,  114 => 11,  108 => 9,  106 => 8,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}JobBoard - Annonces{% endblock %}

{% block body %}
<script src=\"{{ asset(\"scripts/advertisement/advertisementManager.js\")}}\" defer></script>

{% if userToken is not null %}
    <input type=\"text\" class=\"hidden\" value=\"{{ userToken }}\" id=\"jwt-user-token\">
{% endif %}


<main class=\"w-full bg-base-100\">
    {# <button id=\"createApplication\">Postuler</button> #}
    <div id=\"advertisement-container-form\" class=\"w-full min-h-svh flex items-center justify-center\">

        <div class=\"w-full flex flex-col items-center gap-12 lg:w-5/10 p-12 rounded-4xl\">
            <p class=\"text-2xl italic font-extrabold\">Annonce</p>

            <div class=\"w-full flex flex-col gap-6\">
                <h2 id=\"advertform-title\" class=\"underline text-xl\"></h2>
        
                <p id=\"advertform-description\" class=\"italic font-lg font-medium\"></p>

                <div class=\"w-full flex items-center justify-between\">
                    <p id=\"advertform-workhours\" class=\"font-medium\"></p>
                    
                    <p id=\"advertform-salary\" class=\"font-medium\"></p>
                </div>
            </div>

            <p class=\"text-2xl italic font-bold\">Candidature</p>

            <div class=\"w-full flex flex-col items-center gap-6\">
                <fieldset class=\"fieldset w-full xl:w-1/2\">
                    <legend class=\"fieldset-legend\">Prénom</legend>
                    <input id=\"advertform-firstname\" type=\"text\" class=\"input w-full\" disabled/>
                </fieldset>

                <fieldset class=\"fieldset w-full xl:w-1/2\">
                    <legend class=\"fieldset-legend\">Nom de famille</legend>
                    <input id=\"advertform-lastname\" type=\"text\" class=\"input w-full\" disabled/>
                </fieldset>

                <fieldset class=\"fieldset w-full xl:w-1/2\">
                    <legend class=\"fieldset-legend\">Addresse email</legend>
                    <input id=\"advertform-email\" type=\"text\" class=\"input w-full\" disabled/>
                </fieldset>

                <fieldset class=\"fieldset w-full xl:w-1/2\">
                    <legend class=\"fieldset-legend\">Numéro de téléphone</legend>
                    <input id=\"advertform-phone\" type=\"text\" class=\"input w-full\" disabled/>
                </fieldset>

                <fieldset class=\"fieldset w-full xl:w-1/2\">
                    <legend class=\"fieldset-legend\">Message</legend>
                    <textarea id=\"advertform-message\" class=\"textarea h-24 w-full\" placeholder=\"Message\"></textarea>
                </fieldset>
            </div>

            <div class=\"w-full flex items-center justify-between\">
                <button id=\"advertform-back\" class=\"btn\">Retour</button>
    
                <button id=\"advertform-apply\" class=\"btn\">Postuler</button>
            </div>
        </div>
    </div>

    <div id=\"advertisement-container\" class=\"w-full min-h-svh flex flex-col items-center justify-center gap-6 sm:px-6 lg:px-24 2xl:px-86\">

        <h1 class=\"text-3xl\">Annonces</h1>

        <div id=\"advertisement-cards-container\" class=\"w-full flex flex-col items-between py-4 md:flex-row md:items-center md:justify-between md:flex-wrap\">
        </div>

        <div class=\"w-full bg-base-100 h-6 my-6 flex items-center justify-center gap-4\">
            <button class=\"join-item btn btn-outline\" id=\"advertisement-page-back\">Précédent</button>
            <button class=\"join-item btn btn-outline\" id=\"advertisement-page-current\"></button>
            <button class=\"join-item btn btn-outline\" id=\"advertisement-page-next\">Suivant</button>
        </div>
    </div>
</main>
{% endblock %}
", "advertisement/index.html.twig", "/home/haytam/epitech/projetJBdepot/T-WEB-501-STG_14/templates/advertisement/index.html.twig");
    }
}
