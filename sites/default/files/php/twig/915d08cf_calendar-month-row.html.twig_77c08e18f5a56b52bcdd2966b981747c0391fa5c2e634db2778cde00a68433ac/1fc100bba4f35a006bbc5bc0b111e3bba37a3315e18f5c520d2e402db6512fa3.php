<?php

/* modules/calendar/templates/calendar-month-row.html.twig */
class __TwigTemplate_0db642dd013789814be6e551700b7216a19649e06a5d85cd5576c54b0212902a extends Twig_Template
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
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array(),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 14
        echo "<tr class=\"";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["class"]) ? $context["class"] : null), "html", null, true));
        echo "\" iehint=\"";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["iehint"]) ? $context["iehint"] : null), "html", null, true));
        echo "\">
  ";
        // line 15
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["inner"]) ? $context["inner"] : null), "html", null, true));
        echo "
</tr>
";
    }

    public function getTemplateName()
    {
        return "modules/calendar/templates/calendar-month-row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 15,  43 => 14,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Template to display a row*/
/*  **/
/*  * Available variables:*/
/*  * - inner: The rendered string of the row's contents.*/
/*  * - class*/
/*  * - iehint*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* <tr class="{{ class }}" iehint="{{ iehint }}">*/
/*   {{ inner }}*/
/* </tr>*/
/* */
