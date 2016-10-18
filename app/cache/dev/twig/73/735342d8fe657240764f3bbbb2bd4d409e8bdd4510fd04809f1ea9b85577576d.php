<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_151164f603868838a2d2d59a57cebac9b52d45660e3853066656ad9430277d59 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b433237dfed385595371ccacabb9a73aa417bd32df7818ceea602010329db8e3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b433237dfed385595371ccacabb9a73aa417bd32df7818ceea602010329db8e3->enter($__internal_b433237dfed385595371ccacabb9a73aa417bd32df7818ceea602010329db8e3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b433237dfed385595371ccacabb9a73aa417bd32df7818ceea602010329db8e3->leave($__internal_b433237dfed385595371ccacabb9a73aa417bd32df7818ceea602010329db8e3_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_c178d848e5f2cf443ad19d191190c04e65364bdac265acfab39a44a2b3aa4329 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c178d848e5f2cf443ad19d191190c04e65364bdac265acfab39a44a2b3aa4329->enter($__internal_c178d848e5f2cf443ad19d191190c04e65364bdac265acfab39a44a2b3aa4329_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_c178d848e5f2cf443ad19d191190c04e65364bdac265acfab39a44a2b3aa4329->leave($__internal_c178d848e5f2cf443ad19d191190c04e65364bdac265acfab39a44a2b3aa4329_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_bd28165bc5484a5bda932d9c89db610babb707432d6cfd8efa23ab2ff0a092c5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bd28165bc5484a5bda932d9c89db610babb707432d6cfd8efa23ab2ff0a092c5->enter($__internal_bd28165bc5484a5bda932d9c89db610babb707432d6cfd8efa23ab2ff0a092c5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_bd28165bc5484a5bda932d9c89db610babb707432d6cfd8efa23ab2ff0a092c5->leave($__internal_bd28165bc5484a5bda932d9c89db610babb707432d6cfd8efa23ab2ff0a092c5_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_85cc1e13148eec2d7892eb794100cd0bd1945373796353de86acdf46f3ee3517 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_85cc1e13148eec2d7892eb794100cd0bd1945373796353de86acdf46f3ee3517->enter($__internal_85cc1e13148eec2d7892eb794100cd0bd1945373796353de86acdf46f3ee3517_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_85cc1e13148eec2d7892eb794100cd0bd1945373796353de86acdf46f3ee3517->leave($__internal_85cc1e13148eec2d7892eb794100cd0bd1945373796353de86acdf46f3ee3517_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 33,  114 => 32,  108 => 28,  106 => 27,  102 => 25,  96 => 24,  88 => 21,  82 => 17,  80 => 16,  75 => 14,  70 => 13,  64 => 12,  54 => 9,  48 => 6,  45 => 5,  42 => 4,  36 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
";
    }
}
