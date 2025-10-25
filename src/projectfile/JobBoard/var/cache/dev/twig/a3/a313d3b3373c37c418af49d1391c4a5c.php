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

/* profile/index.html.twig */
class __TwigTemplate_736364b63ba50f0f548721ac2e31d3fc extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "profile/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "profile/index.html.twig"));

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

        yield "JobBoard - Mon profil";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("scripts/profile/profilManager.js"), "html", null, true);
        yield "\" defer></script>

<input class=\"hidden\" type=\"text\" value=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["profileToken"]) || array_key_exists("profileToken", $context) ? $context["profileToken"] : (function () { throw new RuntimeError('Variable "profileToken" does not exist.', 8, $this->source); })()), "html", null, true);
        yield "\" id=\"jwt-profile-token\">

<main class=\"w-full sm:px-6 lg:px-24 2xl:px-86 my-16 overflow-hidden\">
    <div class=\"border-2 bg-slate-500 rounded-4xl p-8\">
        <div class=\"flex flex-col items-center my-4\">
            <img src=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/placeholder.jpg"), "html", null, true);
        yield "\" alt=\"Image de profil\" class=\"w-48 h-48 rounded-full\">
        </div>
        <div class=\"flex flex-col items-center my-4\">
            <h1 class=\"text-6xl italic text-white\">Bienvenue ";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 16, $this->source); })()), "user", [], "any", false, false, false, 16), "firstname", [], "any", false, false, false, 16), "html", null, true);
        yield "</h1>
            <p id=\"userId\" data-user-id=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "user", [], "any", false, false, false, 17), "id", [], "any", false, false, false, 17), "html", null, true);
        yield "\" class=\"hidden\"></p>
        </div>
        <div class=\"flex flex-col gap-2 items-center mb-8 text-white\">
            <p class=\"text-xl mx-2\" id=\"user-lastname\">Nom : ";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "user", [], "any", false, false, false, 20), "lastname", [], "any", false, false, false, 20), "html", null, true);
        yield "</p>
            <p class=\"text-xl mx-2\" id=\"user-firstname\">Prénom : ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 21, $this->source); })()), "user", [], "any", false, false, false, 21), "firstname", [], "any", false, false, false, 21), "html", null, true);
        yield "</p>
            <p class=\"text-xl mx-2\">Email : ";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 22, $this->source); })()), "user", [], "any", false, false, false, 22), "email", [], "any", false, false, false, 22), "html", null, true);
        yield "</p>
            <p class=\"text-xl mx-2\" id=\"user-phone\">Téléphone : ";
        // line 23
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 23), "phone", [], "any", true, true, false, 23) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 23, $this->source); })()), "user", [], "any", false, false, false, 23), "phone", [], "any", false, false, false, 23)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 23, $this->source); })()), "user", [], "any", false, false, false, 23), "phone", [], "any", false, false, false, 23), "html", null, true)) : ("Non renseigné"));
        yield "</p>

        </div>
        <div class=\"flex justify-center\">
            <a class=\"link btn mx-2\" id=\"modifyUser\">Modifier</a>
            <a class=\"link btn mx-2\" href=\"";
        // line 28
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">Déconnection</a>
        </div>
        <div id=\"modalHolder\"></div>

        <div class=\"flex flex-row\">
            <button class=\"btn btn-sm m-4\" id=\"showApp\">Voir mes candidatures</button>
            <button class=\"btn btn-sm m-4\" id=\"hideApp\">Cacher mes candidatures</button>
        </div>

        <div id=\"application-card\" class=\"flex flex-row flex-wrap\">
            
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
        return "profile/index.html.twig";
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
        return array (  150 => 28,  142 => 23,  138 => 22,  134 => 21,  130 => 20,  124 => 17,  120 => 16,  114 => 13,  106 => 8,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}JobBoard - Mon profil{% endblock %}

{% block body %}
<script src=\"{{asset(\"scripts/profile/profilManager.js\")}}\" defer></script>

<input class=\"hidden\" type=\"text\" value=\"{{ profileToken }}\" id=\"jwt-profile-token\">

<main class=\"w-full sm:px-6 lg:px-24 2xl:px-86 my-16 overflow-hidden\">
    <div class=\"border-2 bg-slate-500 rounded-4xl p-8\">
        <div class=\"flex flex-col items-center my-4\">
            <img src=\"{{asset(\"img/placeholder.jpg\")}}\" alt=\"Image de profil\" class=\"w-48 h-48 rounded-full\">
        </div>
        <div class=\"flex flex-col items-center my-4\">
            <h1 class=\"text-6xl italic text-white\">Bienvenue {{ app.user.firstname }}</h1>
            <p id=\"userId\" data-user-id=\"{{ app.user.id }}\" class=\"hidden\"></p>
        </div>
        <div class=\"flex flex-col gap-2 items-center mb-8 text-white\">
            <p class=\"text-xl mx-2\" id=\"user-lastname\">Nom : {{ app.user.lastname }}</p>
            <p class=\"text-xl mx-2\" id=\"user-firstname\">Prénom : {{ app.user.firstname }}</p>
            <p class=\"text-xl mx-2\">Email : {{ app.user.email }}</p>
            <p class=\"text-xl mx-2\" id=\"user-phone\">Téléphone : {{ app.user.phone ?? \"Non renseigné\"}}</p>

        </div>
        <div class=\"flex justify-center\">
            <a class=\"link btn mx-2\" id=\"modifyUser\">Modifier</a>
            <a class=\"link btn mx-2\" href=\"{{ path(\"app_logout\") }}\">Déconnection</a>
        </div>
        <div id=\"modalHolder\"></div>

        <div class=\"flex flex-row\">
            <button class=\"btn btn-sm m-4\" id=\"showApp\">Voir mes candidatures</button>
            <button class=\"btn btn-sm m-4\" id=\"hideApp\">Cacher mes candidatures</button>
        </div>

        <div id=\"application-card\" class=\"flex flex-row flex-wrap\">
            
        </div>     
    </div>
</main>
{% endblock %}
", "profile/index.html.twig", "/home/haytam/epitech/projetJBdepot/T-WEB-501-STG_14/templates/profile/index.html.twig");
    }
}
