<?php

/* @core/helpers.twig */
class __TwigTemplate_200670f565ac3461da8a154a48c81f73abce27d1ff419980277b9bfd4909fd6d extends Twig_SupTwg_Template
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
    }

    // line 1
    public function getshowTooltip($__message__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "message" => $__message__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    <i class=\"fa fa-question supsystic-tooltip\" title=\"";
            echo ($context["message"] ?? null);
            echo "\"></i>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@core/helpers.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_SupTwg_Source("", "@core/helpers.twig", "/www/wwwroot/www.lovemv.tv/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Core/views/helpers.twig");
    }
}
