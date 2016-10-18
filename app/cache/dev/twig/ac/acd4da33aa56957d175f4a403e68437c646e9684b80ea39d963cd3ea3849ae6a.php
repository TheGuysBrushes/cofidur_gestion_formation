<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_f11e198149fe02ca912192e4aaa89c6925804a953375728520c94f680b519dfa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_83bfe95320a9a5440a67f2051a289be6cbd2160383e87faeb18791d67b801a71 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_83bfe95320a9a5440a67f2051a289be6cbd2160383e87faeb18791d67b801a71->enter($__internal_83bfe95320a9a5440a67f2051a289be6cbd2160383e87faeb18791d67b801a71_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_83bfe95320a9a5440a67f2051a289be6cbd2160383e87faeb18791d67b801a71->leave($__internal_83bfe95320a9a5440a67f2051a289be6cbd2160383e87faeb18791d67b801a71_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_db54f5b72f42bf9da884c47ffabcff5300fa37f01d14e1c9f8bc7ff7c02dbc82 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_db54f5b72f42bf9da884c47ffabcff5300fa37f01d14e1c9f8bc7ff7c02dbc82->enter($__internal_db54f5b72f42bf9da884c47ffabcff5300fa37f01d14e1c9f8bc7ff7c02dbc82_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpFoundationExtension')->generateAbsoluteUrl($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_db54f5b72f42bf9da884c47ffabcff5300fa37f01d14e1c9f8bc7ff7c02dbc82->leave($__internal_db54f5b72f42bf9da884c47ffabcff5300fa37f01d14e1c9f8bc7ff7c02dbc82_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_d0e0b75324084bb3f25255238c22b93ace7ffdd84164041ff03f8e8f98be4307 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d0e0b75324084bb3f25255238c22b93ace7ffdd84164041ff03f8e8f98be4307->enter($__internal_d0e0b75324084bb3f25255238c22b93ace7ffdd84164041ff03f8e8f98be4307_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_d0e0b75324084bb3f25255238c22b93ace7ffdd84164041ff03f8e8f98be4307->leave($__internal_d0e0b75324084bb3f25255238c22b93ace7ffdd84164041ff03f8e8f98be4307_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_158299f9f3d3b0b3ac644a967ead4beeb47df63c7270f4e29d59d9858714d2d5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_158299f9f3d3b0b3ac644a967ead4beeb47df63c7270f4e29d59d9858714d2d5->enter($__internal_158299f9f3d3b0b3ac644a967ead4beeb47df63c7270f4e29d59d9858714d2d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_158299f9f3d3b0b3ac644a967ead4beeb47df63c7270f4e29d59d9858714d2d5->leave($__internal_158299f9f3d3b0b3ac644a967ead4beeb47df63c7270f4e29d59d9858714d2d5_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <link href=\"{{ absolute_url(asset('bundles/framework/css/exception.css')) }}\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
";
    }
}
