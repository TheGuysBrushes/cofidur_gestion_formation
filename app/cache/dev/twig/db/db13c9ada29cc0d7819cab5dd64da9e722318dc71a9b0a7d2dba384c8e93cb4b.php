<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_42ff93b23866f33cbc967fd2f41136b363ca4693bf55e336e962ffba18172e78 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
        $__internal_30080c8daece04e24b2937751494b12bad1dd86b376454cd0625dabd67d76b3e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_30080c8daece04e24b2937751494b12bad1dd86b376454cd0625dabd67d76b3e->enter($__internal_30080c8daece04e24b2937751494b12bad1dd86b376454cd0625dabd67d76b3e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_30080c8daece04e24b2937751494b12bad1dd86b376454cd0625dabd67d76b3e->leave($__internal_30080c8daece04e24b2937751494b12bad1dd86b376454cd0625dabd67d76b3e_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_c0d65d43721f201d87755adf01b4eb26117b2ff6e5cf6962a0cd54c380f5c5af = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c0d65d43721f201d87755adf01b4eb26117b2ff6e5cf6962a0cd54c380f5c5af->enter($__internal_c0d65d43721f201d87755adf01b4eb26117b2ff6e5cf6962a0cd54c380f5c5af_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_c0d65d43721f201d87755adf01b4eb26117b2ff6e5cf6962a0cd54c380f5c5af->leave($__internal_c0d65d43721f201d87755adf01b4eb26117b2ff6e5cf6962a0cd54c380f5c5af_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_d1fab86b8c39f59a2a26e529053cc4e04f1583677466a018ce50ab4da73b612a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d1fab86b8c39f59a2a26e529053cc4e04f1583677466a018ce50ab4da73b612a->enter($__internal_d1fab86b8c39f59a2a26e529053cc4e04f1583677466a018ce50ab4da73b612a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_d1fab86b8c39f59a2a26e529053cc4e04f1583677466a018ce50ab4da73b612a->leave($__internal_d1fab86b8c39f59a2a26e529053cc4e04f1583677466a018ce50ab4da73b612a_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_58be63d62e5dd1fe04b83dfa5fd0a708acafc0054e017df00c2810666c293446 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_58be63d62e5dd1fe04b83dfa5fd0a708acafc0054e017df00c2810666c293446->enter($__internal_58be63d62e5dd1fe04b83dfa5fd0a708acafc0054e017df00c2810666c293446_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_58be63d62e5dd1fe04b83dfa5fd0a708acafc0054e017df00c2810666c293446->leave($__internal_58be63d62e5dd1fe04b83dfa5fd0a708acafc0054e017df00c2810666c293446_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
";
    }
}
