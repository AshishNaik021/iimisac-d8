<?php

/* modules/mollom/templates/mollom-captcha-image.html.twig */
class __TwigTemplate_c5aea8ff3025a4e6ab9b082c7245ae38ee16c1c6a536efd4acf376d34c72ddce extends Twig_Template
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
        echo "

<span class=\"mollom-captcha-content mollom-image-captcha\">";
        // line 17
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["captcha_output"]) ? $context["captcha_output"] : null), "html", null, true));
        echo "</span>
";
    }

    public function getTemplateName()
    {
        return "modules/mollom/templates/mollom-captcha-image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 17,  43 => 15,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Provide the HTML output for the CAPTCHA image display.*/
/*  **/
/*  * Available variables:*/
/*  * - $captcha_url:  The CAPTCHA image to present based*/
/*  * - $audio_enabled: boolean indicates if audio CAPTCHAs are enabled*/
/*  *   for this site.*/
/*  * @see template_preprocess()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* */
/* */
/* <span class="mollom-captcha-content mollom-image-captcha">{{ captcha_output }}</span>*/
/* */
