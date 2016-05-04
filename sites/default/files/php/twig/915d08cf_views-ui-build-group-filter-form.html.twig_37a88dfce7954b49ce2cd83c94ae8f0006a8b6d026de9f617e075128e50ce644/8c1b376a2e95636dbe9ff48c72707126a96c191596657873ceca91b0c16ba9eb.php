<?php

/* core/themes/stable/templates/admin/views-ui-build-group-filter-form.html.twig */
class __TwigTemplate_faa864208a6b26a97f317ed0cc4fee77a879cabb613df24bec3c710c34b25e89 extends Twig_Template
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
        $filters = array("without" => 40);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array(),
                array('without'),
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

        // line 24
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "form_description", array()), "html", null, true));
        echo "
";
        // line 25
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "expose_button", array()), "html", null, true));
        echo "
";
        // line 26
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "group_button", array()), "html", null, true));
        echo "
<div class=\"views-left-40\">
  ";
        // line 28
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "optional", array()), "html", null, true));
        echo "
  ";
        // line 29
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "remember", array()), "html", null, true));
        echo "
</div>
<div class=\"views-right-60\">
  ";
        // line 32
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "widget", array()), "html", null, true));
        echo "
  ";
        // line 33
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "label", array()), "html", null, true));
        echo "
  ";
        // line 34
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "description", array()), "html", null, true));
        echo "
</div>
";
        // line 40
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without((isset($context["form"]) ? $context["form"] : null), "form_description", "expose_button", "group_button", "optional", "remember", "widget", "label", "description", "add_group", "more"), "html", null, true));
        // line 52
        echo "
";
        // line 53
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["table"]) ? $context["table"] : null), "html", null, true));
        echo "
";
        // line 54
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "add_group", array()), "html", null, true));
        echo "
";
        // line 55
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "more", array()), "html", null, true));
        echo "
";
    }

    public function getTemplateName()
    {
        return "core/themes/stable/templates/admin/views-ui-build-group-filter-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 55,  88 => 54,  84 => 53,  81 => 52,  79 => 40,  74 => 34,  70 => 33,  66 => 32,  60 => 29,  56 => 28,  51 => 26,  47 => 25,  43 => 24,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for Views UI build group filter form.*/
/*  **/
/*  * Available variables:*/
/*  * - form: A render element representing the form. Contains the following:*/
/*  *   - form_description: The exposed filter's description.*/
/*  *   - expose_button: The button to toggle the expose filter form.*/
/*  *   - group_button: Toggle options between single and grouped filters.*/
/*  *   - label: A filter label input field.*/
/*  *   - description: A filter description field.*/
/*  *   - value: The filters available values.*/
/*  *   - optional: A checkbox to require this filter or not.*/
/*  *   - remember: A checkbox to remember selected filter value(s) (per user).*/
/*  *   - widget: Radio Buttons to select the filter widget.*/
/*  *   - add_group: A button to add another row to the table.*/
/*  *   - more: A details element for additional field exposed filter fields.*/
/*  * - table: A rendered table element of the group filter form.*/
/*  **/
/*  * @see template_preprocess_views_ui_build_group_filter_form()*/
/*  *//* */
/* #}*/
/* {{ form.form_description }}*/
/* {{ form.expose_button }}*/
/* {{ form.group_button }}*/
/* <div class="views-left-40">*/
/*   {{ form.optional }}*/
/*   {{ form.remember }}*/
/* </div>*/
/* <div class="views-right-60">*/
/*   {{ form.widget }}*/
/*   {{ form.label }}*/
/*   {{ form.description }}*/
/* </div>*/
/* {#*/
/*   Render the rest of the form elements excluding elements that are rendered*/
/*   elsewhere.*/
/* #}*/
/* {{ form|without(*/
/*     'form_description',*/
/*     'expose_button',*/
/*     'group_button',*/
/*     'optional',*/
/*     'remember',*/
/*     'widget',*/
/*     'label',*/
/*     'description',*/
/*     'add_group',*/
/*     'more'*/
/*   )*/
/* }}*/
/* {{ table }}*/
/* {{ form.add_group }}*/
/* {{ form.more }}*/
/* */
