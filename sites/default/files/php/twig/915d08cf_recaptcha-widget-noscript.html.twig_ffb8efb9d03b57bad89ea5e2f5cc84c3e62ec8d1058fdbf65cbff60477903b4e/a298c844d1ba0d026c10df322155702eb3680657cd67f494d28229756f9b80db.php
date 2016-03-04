<?php

/* modules/recaptcha/templates/recaptcha-widget-noscript.html.twig */
class __TwigTemplate_afaa52db8183776472b7800f838d7307db7f161bba54e2d6ef8aef63decb599c extends Twig_Template
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

        // line 17
        echo "
<noscript>
  <div style=\"width: 302px; height: 352px;\">
    <div style=\"width: 302px; height: 352px; position: relative;\">
      <div style=\"width: 302px; height: 352px; position: absolute;\">
        <iframe src=\"";
        // line 22
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
        echo "\" frameborder=\"0\" scrolling=\"no\" style=\"width: 302px; height:352px; border-style: none;\"></iframe>
      </div>
      <div style=\"width: 250px; height: 80px; position: absolute; border-style: none; bottom: 21px; left: 25px; margin: 0px; padding: 0px; right: 25px;\">
        <textarea id=\"g-recaptcha-response\" name=\"g-recaptcha-response\" class=\"g-recaptcha-response\" style=\"width: 250px; height: 80px; border: 1px solid #c1c1c1; margin: 0px; padding: 0px; resize: none;\" value=\"\"></textarea>
      </div>
    </div>
  </div>
</noscript>
";
    }

    public function getTemplateName()
    {
        return "modules/recaptcha/templates/recaptcha-widget-noscript.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 22,  43 => 17,);
    }
}
/* {#*/
/* /***/
/*  * @file recaptcha-widget-noscript.tpl.php*/
/*  * Default theme implementation to present the reCAPTCHA noscript code.*/
/*  **/
/*  * Available variables:*/
/*  * - sitekey: Google web service site key.*/
/*  * - language: Current site language code.*/
/*  * - url: Google web service API url.*/
/*  **/
/*  * @see template_preprocess()*/
/*  * @see template_preprocess_recaptcha_widget_noscript()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* */
/* <noscript>*/
/*   <div style="width: 302px; height: 352px;">*/
/*     <div style="width: 302px; height: 352px; position: relative;">*/
/*       <div style="width: 302px; height: 352px; position: absolute;">*/
/*         <iframe src="{{ url }}" frameborder="0" scrolling="no" style="width: 302px; height:352px; border-style: none;"></iframe>*/
/*       </div>*/
/*       <div style="width: 250px; height: 80px; position: absolute; border-style: none; bottom: 21px; left: 25px; margin: 0px; padding: 0px; right: 25px;">*/
/*         <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 80px; border: 1px solid #c1c1c1; margin: 0px; padding: 0px; resize: none;" value=""></textarea>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* </noscript>*/
/* */
