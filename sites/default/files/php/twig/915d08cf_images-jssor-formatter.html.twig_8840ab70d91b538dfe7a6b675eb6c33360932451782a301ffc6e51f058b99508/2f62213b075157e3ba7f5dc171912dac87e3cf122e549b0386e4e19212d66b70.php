<?php

/* modules/jssor/templates/images-jssor-formatter.html.twig */
class __TwigTemplate_25c992c453418555f87aa43f6fcc9a38c6b234a28f4324edfc7dcea462d7c43f extends Twig_Template
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
        $tags = array("if" => 21);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if'),
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
        echo "<div ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
        echo " style=\"position: relative; margin: 0 auto; top: 0; left: 0; width: 1300px; height: 600px; overflow: hidden;\">

  <!-- Slides Container -->
  <div data-u=\"slides\" style=\"cursor: move; position: absolute; left: 0; top: 0; width: 1300px; height: 600px; overflow: hidden;\">
    ";
        // line 18
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["children"]) ? $context["children"] : null), "html", null, true));
        echo "
  </div>

  ";
        // line 21
        if ((isset($context["arrownavigator"]) ? $context["arrownavigator"] : null)) {
            // line 22
            echo "    <!-- Arrows navigator -->
    <span data-u=\"arrowleft\" class=\"jssora01l\"></span>
    <span data-u=\"arrowright\" class=\"jssora01r\"></span>
  ";
        }
        // line 26
        echo "
  ";
        // line 27
        if ((isset($context["bulletnavigator"]) ? $context["bulletnavigator"] : null)) {
            // line 28
            echo "    <!-- Bullets navigator -->
    <div u=\"navigator\" class=\"jssorb01\" style=\"position: absolute; bottom: 16px; right: 6px;\">
      <div u=\"prototype\" style=\"position: absolute; width: 16px; height: 16px;\"></div>
    </div>
  ";
        }
        // line 33
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/jssor/templates/images-jssor-formatter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 33,  70 => 28,  68 => 27,  65 => 26,  59 => 22,  57 => 21,  51 => 18,  43 => 14,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: HTML attributes for the containing element.*/
/*  * - children: The rendered child elements of the container.*/
/*  * - arrownavigator: Weither or not use arrows navigator.*/
/*  * - bulletnavigator: Weither or not use bullets navigator.*/
/*  **/
/*  * @see template_preprocess_images_jssor_formatter()*/
/*  *//* */
/* #}*/
/* <div {{ attributes.addClass(classes) }} style="position: relative; margin: 0 auto; top: 0; left: 0; width: 1300px; height: 600px; overflow: hidden;">*/
/* */
/*   <!-- Slides Container -->*/
/*   <div data-u="slides" style="cursor: move; position: absolute; left: 0; top: 0; width: 1300px; height: 600px; overflow: hidden;">*/
/*     {{ children }}*/
/*   </div>*/
/* */
/*   {% if arrownavigator %}*/
/*     <!-- Arrows navigator -->*/
/*     <span data-u="arrowleft" class="jssora01l"></span>*/
/*     <span data-u="arrowright" class="jssora01r"></span>*/
/*   {% endif %}*/
/* */
/*   {% if bulletnavigator %}*/
/*     <!-- Bullets navigator -->*/
/*     <div u="navigator" class="jssorb01" style="position: absolute; bottom: 16px; right: 6px;">*/
/*       <div u="prototype" style="position: absolute; width: 16px; height: 16px;"></div>*/
/*     </div>*/
/*   {% endif %}*/
/* */
/* </div>*/
/* */
