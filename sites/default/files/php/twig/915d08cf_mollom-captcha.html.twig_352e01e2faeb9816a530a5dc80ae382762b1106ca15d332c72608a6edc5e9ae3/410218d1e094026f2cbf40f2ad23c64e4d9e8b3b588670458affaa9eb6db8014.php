<?php

/* modules/mollom/templates/mollom-captcha.html.twig */
class __TwigTemplate_3685c8ba050d6d5df3316f2dc90200844b8cd694db525d9b6b2885ec037e11f2 extends Twig_Template
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
        $tags = array("if" => 4);
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

        // line 4
        echo "<label for=\"edit-mollom-captcha-input\"";
        if ((isset($context["captcha_required"]) ? $context["captcha_required"] : null)) {
            echo " class=\"form-required\"";
        }
        echo ">Verification</label>
<span class=\"mollom-captcha-container\">
  ";
        // line 6
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "refresh", array()), "html", null, true));
        echo "
  ";
        // line 7
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "captcha_display", array()), "html", null, true));
        echo "
  <span class=\"mollom-captcha-instructions\">";
        // line 8
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["instructions"]) ? $context["instructions"] : null), "html", null, true));
        echo "  ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["switch"]) ? $context["switch"] : null), "html", null, true));
        echo "</span>
  ";
        // line 9
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "captcha_input", array()), "html", null, true));
        echo "
</span>
";
    }

    public function getTemplateName()
    {
        return "modules/mollom/templates/mollom-captcha.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 9,  59 => 8,  55 => 7,  51 => 6,  43 => 4,);
    }
}
/* {#*/
/* The Mollom Captcha element.*/
/* #}*/
/* <label for="edit-mollom-captcha-input"{% if captcha_required %} class="form-required"{% endif %}>Verification</label>*/
/* <span class="mollom-captcha-container">*/
/*   {{ element.refresh }}*/
/*   {{ element.captcha_display }}*/
/*   <span class="mollom-captcha-instructions">{{ instructions }}  {{ switch }}</span>*/
/*   {{ element.captcha_input }}*/
/* </span>*/
/* */
