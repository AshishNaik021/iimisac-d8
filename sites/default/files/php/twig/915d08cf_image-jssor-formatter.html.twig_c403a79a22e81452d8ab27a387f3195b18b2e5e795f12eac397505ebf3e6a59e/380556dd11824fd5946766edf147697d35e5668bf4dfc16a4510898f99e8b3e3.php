<?php

/* modules/jssor/templates/image-jssor-formatter.html.twig */
class __TwigTemplate_a6fac088909887d8c8ac152ce8cfc415d05f1ba2c52ed85e64d464e3dddfadca extends Twig_Template
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
        $tags = array("if" => 19);
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

        // line 18
        echo "<div>
  ";
        // line 19
        if ((isset($context["url"]) ? $context["url"] : null)) {
            // line 20
            echo "    <a href=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
            echo "\">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["image"]) ? $context["image"] : null), "html", null, true));
            echo "</a>
  ";
        } else {
            // line 22
            echo "    ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["image"]) ? $context["image"] : null), "html", null, true));
            echo "
  ";
        }
        // line 24
        echo "  ";
        if ((isset($context["caption"]) ? $context["caption"] : null)) {
            // line 25
            echo "    <div u=\"caption\" t='";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["play_in_transition"]) ? $context["play_in_transition"] : null), "html", null, true));
            echo "' t2='";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["play_out_transition"]) ? $context["play_out_transition"] : null), "html", null, true));
            echo "' class=\"slider__caption\">
      <div class=\"slider__caption--background\">
      </div>
      <div class=\"slider__caption--title\">
        ";
            // line 29
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["caption_text"]) ? $context["caption_text"] : null), "html", null, true));
            echo "
      </div>
    </div>
  ";
        }
        // line 33
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/jssor/templates/image-jssor-formatter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 33,  75 => 29,  65 => 25,  62 => 24,  56 => 22,  48 => 20,  46 => 19,  43 => 18,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation to display a formatted image field.*/
/*  **/
/*  * Available variables:*/
/*  * - image: A collection of image data.*/
/*  * - image_style: An optional image style.*/
/*  * - url: An optional URL the image can be linked to.*/
/*  * - caption: Weither or not to display a caption.*/
/*  * - caption_text: Caption text.*/
/*  **/
/*  * @see template_preprocess_image_jssor_formatter()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* <div>*/
/*   {% if url %}*/
/*     <a href="{{ url }}">{{ image }}</a>*/
/*   {% else %}*/
/*     {{ image }}*/
/*   {% endif %}*/
/*   {% if caption %}*/
/*     <div u="caption" t='{{ play_in_transition }}' t2='{{ play_out_transition }}' class="slider__caption">*/
/*       <div class="slider__caption--background">*/
/*       </div>*/
/*       <div class="slider__caption--title">*/
/*         {{ caption_text }}*/
/*       </div>*/
/*     </div>*/
/*   {% endif %}*/
/* </div>*/
/* */
