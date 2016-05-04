<?php

/* core/themes/classy/templates/views/views-view-summary-unformatted.html.twig */
class __TwigTemplate_f50e32c7d6df11e88c514cf409078b0da2b8610b15836d12e4d4ca8beb728ce9 extends Twig_Template
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
        $tags = array("for" => 21, "if" => 23);
        $filters = array("without" => 26);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('for', 'if'),
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

        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rows"]) ? $context["rows"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 22
            echo "  ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "inline", array())) ? ("<span") : ("<div"))));
            echo " class=\"views-summary views-summary-unformatted\">
  ";
            // line 23
            if ($this->getAttribute($context["row"], "separator", array())) {
                // line 24
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["row"], "separator", array()), "html", null, true));
            }
            // line 26
            echo "  <a href=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["row"], "url", array()), "html", null, true));
            echo "\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without($this->getAttribute($this->getAttribute($context["row"], "attributes", array()), "addClass", array(0 => (($this->getAttribute($context["row"], "active", array())) ? ("is-active") : (""))), "method"), "href"), "html", null, true));
            echo ">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["row"], "link", array()), "html", null, true));
            echo "</a>
  ";
            // line 27
            if ($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "count", array())) {
                // line 28
                echo "    (";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["row"], "count", array()), "html", null, true));
                echo ")
  ";
            }
            // line 30
            echo "  ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "inline", array())) ? ("</span>") : ("</div>"))));
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/views/views-view-summary-unformatted.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 30,  68 => 28,  66 => 27,  57 => 26,  54 => 24,  52 => 23,  47 => 22,  43 => 21,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for unformatted summary links.*/
/*  **/
/*  * Available variables:*/
/*  * - rows: The rows contained in this view.*/
/*  *   - url: The URL to this row's content.*/
/*  *   - count: The number of items this summary item represents.*/
/*  *   - separator: A separator between each row.*/
/*  *   - attributes: HTML attributes for a row.*/
/*  *   - active: A flag indicating whether the row is active.*/
/*  * - options: Flags indicating how each row should be displayed. This contains:*/
/*  *   - count: A flag indicating whether the row's 'count' should be displayed.*/
/*  *   - inline: A flag indicating whether the item should be wrapped in an inline*/
/*  *     or block level HTML element.*/
/*  **/
/*  * @see template_preprocess_views_view_summary_unformatted()*/
/*  *//* */
/* #}*/
/* {% for row in rows  %}*/
/*   {{ options.inline ? '<span' : '<div' }} class="views-summary views-summary-unformatted">*/
/*   {% if row.separator -%}*/
/*     {{ row.separator }}*/
/*   {%- endif %}*/
/*   <a href="{{ row.url }}"{{ row.attributes.addClass(row.active ? 'is-active')|without('href') }}>{{ row.link }}</a>*/
/*   {% if options.count %}*/
/*     ({{ row.count }})*/
/*   {% endif %}*/
/*   {{ options.inline ? '</span>' : '</div>' }}*/
/* {% endfor %}*/
/* */
