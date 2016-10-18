<?php

/* lucky/number.html.twig */
class __TwigTemplate_4bc2aed3dd596c83b9a2472d7db4b1df8cb677afba5c470fcc498332936ec5e7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_811860c7c8eab687f7e44656d674e8e9b803f5b2623d4ffddf31663f8f3941c3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_811860c7c8eab687f7e44656d674e8e9b803f5b2623d4ffddf31663f8f3941c3->enter($__internal_811860c7c8eab687f7e44656d674e8e9b803f5b2623d4ffddf31663f8f3941c3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "lucky/number.html.twig"));

        // line 2
        echo "
<h1>Your lucky number is ";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["number"]) ? $context["number"] : $this->getContext($context, "number")), "html", null, true);
        echo "</h1>
";
        
        $__internal_811860c7c8eab687f7e44656d674e8e9b803f5b2623d4ffddf31663f8f3941c3->leave($__internal_811860c7c8eab687f7e44656d674e8e9b803f5b2623d4ffddf31663f8f3941c3_prof);

    }

    public function getTemplateName()
    {
        return "lucky/number.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 3,  22 => 2,);
    }

    public function getSource()
    {
        return "{# app/Resources/views/lucky/number.html.twig #}

<h1>Your lucky number is {{ number }}</h1>
";
    }
}
