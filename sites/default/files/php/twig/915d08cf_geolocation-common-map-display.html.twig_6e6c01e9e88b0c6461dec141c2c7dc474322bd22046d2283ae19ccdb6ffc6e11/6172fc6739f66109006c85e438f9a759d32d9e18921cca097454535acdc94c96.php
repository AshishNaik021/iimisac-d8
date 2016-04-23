<?php

/* modules/geolocation/templates/geolocation-common-map-display.html.twig */
class __TwigTemplate_ec1942c0f1b1263efe32f2b422bd1a4bca86d2125ec8bf279047e9b30679d104 extends Twig_Template
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
        $tags = array("if" => 1, "for" => 3);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'for'),
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

        // line 1
        echo "<div id=\"";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true));
        echo "\" class=\"geolocation-common-map\" ";
        if (( !twig_test_empty($this->getAttribute((isset($context["centre"]) ? $context["centre"] : null), "lat", array())) &&  !twig_test_empty($this->getAttribute((isset($context["centre"]) ? $context["centre"] : null), "lng", array())))) {
            echo " data-centre-lat=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["centre"]) ? $context["centre"] : null), "lat", array()), "html", null, true));
            echo "\" data-centre-lng=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["centre"]) ? $context["centre"] : null), "lng", array()), "html", null, true));
            echo "\" ";
        }
        echo ">
    <div class=\"geolocation-common-map-locations\">
    ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["locations"]) ? $context["locations"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
            // line 4
            echo "        ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["location"], "html", null, true));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 6
        echo "    </div>
    <div class=\"geolocation-common-map-container\"></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/geolocation/templates/geolocation-common-map-display.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 6,  61 => 4,  57 => 3,  43 => 1,);
    }
}
/* <div id="{{ id }}" class="geolocation-common-map" {% if centre.lat is not empty and centre.lng is not empty %} data-centre-lat="{{ centre.lat }}" data-centre-lng="{{ centre.lng }}" {% endif %}>*/
/*     <div class="geolocation-common-map-locations">*/
/*     {%  for location in locations %}*/
/*         {{ location }}*/
/*     {% endfor %}*/
/*     </div>*/
/*     <div class="geolocation-common-map-container"></div>*/
/* </div>*/
/* */
