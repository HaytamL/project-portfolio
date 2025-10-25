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

/* registration/register.html.twig */
class __TwigTemplate_39b34031cea60fc30805f48c257817e9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

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

        yield "JobBoard - Création de compte";
        
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
        yield "<div class=\"w-full min-h-200 bg-white flex items-center justify-center\">
    <div class=\"w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 bg-black text-white overflow-hidden\">
        <div class=\"relative hidden md:block\">
            <img class=\"absolute inset-0 w-full h-full object-cover\" src=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/placeholder_company.jpg"), "html", null, true);
        yield "\" alt=\"logo\" >
        </div>
        <div class=\"flex items-center justify-center px-6 py-12\">
            <div class=\"w-full\">
                <h1 class=\"text-xl font-bold tracking-tight md:text-2xl mb-6 text-center\">Créer un compte</h1>
                ";
        // line 14
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 14, $this->source); })()), 'errors');
        yield "
                ";
        // line 15
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 15, $this->source); })()), 'form_start');
        yield "
                    <div class=\"mb-4\">
                        <label for=\"email\" class=\"block mb-1 text-white\">Adresse mail</label>
                        <div>";
        // line 18
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 18, $this->source); })()), "email", [], "any", false, false, false, 18), 'widget');
        yield "</div>
                    </div>
                    <div class=\"mb-4\">
                        <label class=\"block mb-1 text-white\">Prénom</label>
                        <div>";
        // line 22
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 22, $this->source); })()), "firstname", [], "any", false, false, false, 22), 'widget');
        yield "</div>
                    </div>
                    <div class=\"mb-4\">
                        <label class=\"block mb-1 text-white\">Nom</label>
                        <div>";
        // line 26
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 26, $this->source); })()), "lastname", [], "any", false, false, false, 26), 'widget');
        yield "</div>
                    </div>
                    <div class=\"mb-4\">
                        <label class=\"block mb-1 text-white\">Mot de passe</label>
                        <div>";
        // line 30
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 30, $this->source); })()), "plainPassword", [], "any", false, false, false, 30), 'widget');
        yield "</div>
                    </div>
                    <div class=\"mb-4\">
                        <label class=\"block mb-1 text-white\">Conditions d'utilisation</label>
                        ";
        // line 34
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 34, $this->source); })()), "agreeTerms", [], "any", false, false, false, 34), 'widget');
        yield "
                    </div>
                    <div class=\"mb-4\">
                        <p class=\"text-white font-bold text-center\">Vous avez déjà un compte ?<br><a href=\"login\" class=\"underline hover:text-blue-500 font-medium\">Se connecter</a></p>
                    </div>
                    <div>
                        <button type=\"submit\" class=\"btn\">Créer un compte</button>
                    </div>
                ";
        // line 42
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 42, $this->source); })()), 'form_end');
        yield "
            </div>
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
        return "registration/register.html.twig";
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
        return array (  162 => 42,  151 => 34,  144 => 30,  137 => 26,  130 => 22,  123 => 18,  117 => 15,  113 => 14,  105 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}JobBoard - Création de compte{% endblock %}

{% block body %}
<div class=\"w-full min-h-200 bg-white flex items-center justify-center\">
    <div class=\"w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 bg-black text-white overflow-hidden\">
        <div class=\"relative hidden md:block\">
            <img class=\"absolute inset-0 w-full h-full object-cover\" src=\"{{ asset('img/placeholder_company.jpg') }}\" alt=\"logo\" >
        </div>
        <div class=\"flex items-center justify-center px-6 py-12\">
            <div class=\"w-full\">
                <h1 class=\"text-xl font-bold tracking-tight md:text-2xl mb-6 text-center\">Créer un compte</h1>
                {{ form_errors(registrationForm) }}
                {{ form_start(registrationForm) }}
                    <div class=\"mb-4\">
                        <label for=\"email\" class=\"block mb-1 text-white\">Adresse mail</label>
                        <div>{{ form_widget(registrationForm.email) }}</div>
                    </div>
                    <div class=\"mb-4\">
                        <label class=\"block mb-1 text-white\">Prénom</label>
                        <div>{{ form_widget(registrationForm.firstname) }}</div>
                    </div>
                    <div class=\"mb-4\">
                        <label class=\"block mb-1 text-white\">Nom</label>
                        <div>{{ form_widget(registrationForm.lastname) }}</div>
                    </div>
                    <div class=\"mb-4\">
                        <label class=\"block mb-1 text-white\">Mot de passe</label>
                        <div>{{ form_widget(registrationForm.plainPassword) }}</div>
                    </div>
                    <div class=\"mb-4\">
                        <label class=\"block mb-1 text-white\">Conditions d'utilisation</label>
                        {{ form_widget(registrationForm.agreeTerms) }}
                    </div>
                    <div class=\"mb-4\">
                        <p class=\"text-white font-bold text-center\">Vous avez déjà un compte ?<br><a href=\"login\" class=\"underline hover:text-blue-500 font-medium\">Se connecter</a></p>
                    </div>
                    <div>
                        <button type=\"submit\" class=\"btn\">Créer un compte</button>
                    </div>
                {{ form_end(registrationForm) }}
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "registration/register.html.twig", "/home/haytam/epitech/projetJBdepot/T-WEB-501-STG_14/templates/registration/register.html.twig");
    }
}
