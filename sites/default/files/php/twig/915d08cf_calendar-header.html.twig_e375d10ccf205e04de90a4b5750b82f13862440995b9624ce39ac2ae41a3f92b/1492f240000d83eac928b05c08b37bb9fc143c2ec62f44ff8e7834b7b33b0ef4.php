<?php

/* modules/calendar/templates/calendar-header.html.twig */
class __TwigTemplate_80f6c4a5953e970f3d794aae4b9365ccb3486a3bc9c2a1cccae044734344651f extends Twig_Template
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

        // line 15
        echo "<h3>";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
        echo "</h3>
";
    }

    public function getTemplateName()
    {
        return "modules/calendar/templates/calendar-header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 15,);
    }
}
/* {#/***/
/* * @file*/
/* * Template to display a calendar header.*/
/* * Be default called by CalendarHeader area.*/
/* **/
/* * Available variables:*/
/* * - title: Header Title.*/
/* * - empty: Whether there are any results.*/
/* * - granularity: whether this is week, day, month or year display.*/
/* **/
/* * @ingroup themeable*/
/* *//* */
/* #}*/
/* {# @todo Finish Header if this the way to go. #}*/
/* <h3>{{ title }}</h3>*/
/* */
