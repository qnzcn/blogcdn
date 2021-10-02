<?php

/* 404.twig */
class __TwigTemplate_5cd27c77f7b8881c2e6346518160a88353c33f4f43c59583aea0db5772d4fb90 extends Twig_SupTwg_Template
{
    public function __construct(Twig_SupTwg_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"wrap\">
\t<h1>The page you requested is not found</h1>
\t<div>Method <strong>";
        // line 3
        echo Twig_SupTwg_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
        echo "</strong> does not exists in controller <strong>";
        echo Twig_SupTwg_escape_filter($this->env, ($context["controller"] ?? null), "html", null, true);
        echo "</strong></div>
</div>";
    }

    public function getTemplateName()
    {
        return "404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_SupTwg_Source("", "404.twig", "/www/wwwroot/www.lovemv.tv/wp-content/plugins/gallery-by-supsystic/app/templates/404.twig");
    }
}
