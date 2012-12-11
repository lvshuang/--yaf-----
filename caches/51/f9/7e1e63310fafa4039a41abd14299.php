<?php

/* index/index.twig */
class __TwigTemplate_51f97e1e63310fafa4039a41abd14299 extends Twig_Template
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
        // line 1
        echo "<div class=\"container\" style=\"margin-top: 200px;\">

\t\t\t<h1>Coming soon .................";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["viewPath"]) ? $context["viewPath"] : null), "html", null, true);
        echo "</h1>

</div>
\t";
    }

    public function getTemplateName()
    {
        return "index/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 3,  17 => 1,);
    }
}
