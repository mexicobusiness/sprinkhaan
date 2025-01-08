<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* themes/custom/sph/templates/layout/html.html.twig */
class __TwigTemplate_ae302d30690b4a9cb2564773184b12d0 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 28
        yield "
<!DOCTYPE html>
<html";
        // line 30
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["html_attributes"] ?? null), "html", null, true);
        yield ">
  <head>
    <meta name=\"google-site-verification\" content=\"\" />
    ";
        // line 33
        if ((($context["meta_term"] ?? null) == true)) {
            // line 34
            yield "      <meta name=\"title\" content=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["term_name"] ?? null), "html", null, true);
            yield " - ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, ($context["head_title"] ?? null), " | "));
            yield "\" />
      <meta name=\"description\" content=\"";
            // line 35
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["term_description"] ?? null), "html", null, true);
            yield "\" />
      <meta name=\"keywords\" content=\"";
            // line 36
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["term_keywords"] ?? null), "html", null, true);
            yield "\" />
    ";
        }
        // line 38
        yield "
    <meta http-equiv=\"refresh\" content=\"3600\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"/themes/sph/images/MBN_Icon_Web-32px.png\" />
    <link rel=\"icon\" type=\"image/png\" sizes=\"152x152\" href=\"/themes/sph/images/MBN_Icon_Web-152px.png\" />
    <link rel=\"icon\" type=\"image/png\" sizes=\"192x192\" href=\"/themes/sph/images/MBI_Icons_MBN192px.png\" />
    <link rel=\"apple-touch-icon\" type=\"image/png\" sizes=\"192x192\" href=\"/themes/sph/images/MBI_Icons_MBN192px.png\" />

    <head-placeholder token=\"";
        // line 45
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">
    ";
        // line 46
        if ((($context["meta_term"] ?? null) == true)) {
            // line 47
            yield "    <title>";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["term_name"] ?? null), "html", null, true);
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, ($context["head_title"] ?? null), " | "));
            yield "</title>
    ";
        } else {
            // line 49
            yield "    <title>";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, ($context["head_title"] ?? null), " | "));
            yield "</title>
    ";
        }
        // line 51
        yield "    <css-placeholder token=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">
    <js-placeholder token=\"";
        // line 52
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-xxx');</script>
    <!-- End Google Tag Manager -->

  </head>

  ";
        // line 65
        $context["body_classes"] = [((        // line 66
($context["logged_in"] ?? null)) ? ("user-logged-in") : ("")), (( !        // line 67
($context["root_path"] ?? null)) ? ("path-frontpage") : (("path-" . \Drupal\Component\Utility\Html::getClass(($context["root_path"] ?? null))))), ((CoreExtension::getAttribute($this->env, $this->source,         // line 68
($context["path_info"] ?? null), "args", [], "any", false, false, true, 68)) ? (("path-" . CoreExtension::getAttribute($this->env, $this->source, ($context["path_info"] ?? null), "args", [], "any", false, false, true, 68))) : ("")), ((        // line 69
($context["node_type"] ?? null)) ? (("page-node-type-" . \Drupal\Component\Utility\Html::getClass(($context["node_type"] ?? null)))) : ("")), ((        // line 70
($context["db_offline"] ?? null)) ? ("db-offline") : ("")), ((( !CoreExtension::getAttribute($this->env, $this->source,         // line 71
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 71) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 71))) ? ("no-sidebars") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 72
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 72) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 72))) ? ("sidebar-first") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 73
($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 73) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 73))) ? ("sidebar-second") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 74
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 74) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 74))) ? ("both-sidebars") : (""))];
        // line 77
        yield "  <body";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["body_classes"] ?? null)], "method", false, false, true, 77), "html", null, true);
        yield ">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-xxx\"
    height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    ";
        // line 83
        if ((($context["redirects"] ?? null) == true)) {
            // line 84
            yield "    <div style=\"display: none;\">
    ";
        }
        // line 86
        yield "      ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["page_top"] ?? null), "html", null, true);
        yield "
      ";
        // line 87
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["page"] ?? null), "html", null, true);
        yield "
      ";
        // line 88
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["page_bottom"] ?? null), "html", null, true);
        yield "
    ";
        // line 89
        if ((($context["redirects"] ?? null) == true)) {
            // line 90
            yield "    </div>
    ";
        }
        // line 92
        yield "    <js-bottom-placeholder token=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">
  </body>
</html>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["html_attributes", "meta_term", "term_name", "head_title", "term_description", "term_keywords", "placeholder_token", "logged_in", "root_path", "path_info", "node_type", "db_offline", "page", "attributes", "redirects", "page_top", "page_bottom"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/sph/templates/layout/html.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  167 => 92,  163 => 90,  161 => 89,  157 => 88,  153 => 87,  148 => 86,  144 => 84,  142 => 83,  132 => 77,  130 => 74,  129 => 73,  128 => 72,  127 => 71,  126 => 70,  125 => 69,  124 => 68,  123 => 67,  122 => 66,  121 => 65,  106 => 52,  101 => 51,  95 => 49,  87 => 47,  85 => 46,  81 => 45,  72 => 38,  67 => 36,  63 => 35,  56 => 34,  54 => 33,  48 => 30,  44 => 28,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/sph/templates/layout/html.html.twig", "/home/oksm/sites/sprinkhaan/themes/custom/sph/templates/layout/html.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 33, "set" => 65);
        static $filters = array("escape" => 30, "safe_join" => 34, "clean_class" => 67);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
                ['escape', 'safe_join', 'clean_class'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
