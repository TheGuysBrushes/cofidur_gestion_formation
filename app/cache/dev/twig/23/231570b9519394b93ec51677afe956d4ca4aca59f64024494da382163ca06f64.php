<?php

/* base.html.twig */
class __TwigTemplate_c9ac68aac3616b6fa96c2cf140f13b44b981ac18841465270f2dcea98eb35888 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ef264529a8591ac5c45fc0367391d7e365b3e28f6c9bb734d9de63df7a6b58db = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ef264529a8591ac5c45fc0367391d7e365b3e28f6c9bb734d9de63df7a6b58db->enter($__internal_ef264529a8591ac5c45fc0367391d7e365b3e28f6c9bb734d9de63df7a6b58db_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_ef264529a8591ac5c45fc0367391d7e365b3e28f6c9bb734d9de63df7a6b58db->leave($__internal_ef264529a8591ac5c45fc0367391d7e365b3e28f6c9bb734d9de63df7a6b58db_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_86be1f7ae6dbe31506e31497574315e3b76c6988ce772333ec42c7af3b294743 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_86be1f7ae6dbe31506e31497574315e3b76c6988ce772333ec42c7af3b294743->enter($__internal_86be1f7ae6dbe31506e31497574315e3b76c6988ce772333ec42c7af3b294743_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_86be1f7ae6dbe31506e31497574315e3b76c6988ce772333ec42c7af3b294743->leave($__internal_86be1f7ae6dbe31506e31497574315e3b76c6988ce772333ec42c7af3b294743_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_de4fc4d93784cc113fa4c6db345f21a08f0e48735d25571d7cbbc2a887bd585f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_de4fc4d93784cc113fa4c6db345f21a08f0e48735d25571d7cbbc2a887bd585f->enter($__internal_de4fc4d93784cc113fa4c6db345f21a08f0e48735d25571d7cbbc2a887bd585f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_de4fc4d93784cc113fa4c6db345f21a08f0e48735d25571d7cbbc2a887bd585f->leave($__internal_de4fc4d93784cc113fa4c6db345f21a08f0e48735d25571d7cbbc2a887bd585f_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_3cc29d47d17a3eefa8137e5e62bf53f403411be55de224a844274a1d2539b645 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3cc29d47d17a3eefa8137e5e62bf53f403411be55de224a844274a1d2539b645->enter($__internal_3cc29d47d17a3eefa8137e5e62bf53f403411be55de224a844274a1d2539b645_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_3cc29d47d17a3eefa8137e5e62bf53f403411be55de224a844274a1d2539b645->leave($__internal_3cc29d47d17a3eefa8137e5e62bf53f403411be55de224a844274a1d2539b645_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_de466ead3168aeec2b23a6e4076a8c6d50abb1bc0fd2da8d3e148eaafcadfd0d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_de466ead3168aeec2b23a6e4076a8c6d50abb1bc0fd2da8d3e148eaafcadfd0d->enter($__internal_de466ead3168aeec2b23a6e4076a8c6d50abb1bc0fd2da8d3e148eaafcadfd0d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_de466ead3168aeec2b23a6e4076a8c6d50abb1bc0fd2da8d3e148eaafcadfd0d->leave($__internal_de466ead3168aeec2b23a6e4076a8c6d50abb1bc0fd2da8d3e148eaafcadfd0d_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }

    public function getSource()
    {
        return "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
";
    }
}
