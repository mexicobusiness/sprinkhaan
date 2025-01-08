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

/* themes/custom/sph/templates/layout/page.html.twig */
class __TwigTemplate_5cd63dbcba176fe7676cb5d9665f9118 extends Template
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
        // line 1
        yield "<div id=\"page\">
    ";
        // line 2
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header_first", [], "any", false, false, true, 2)) {
            // line 3
            yield "        <div id=\"header\">
            ";
            // line 4
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header_first", [], "any", false, false, true, 4)) {
                // line 5
                yield "                <div class=\"header-first\">
                    <div class=\"container\">
                        ";
                // line 7
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header_first", [], "any", false, false, true, 7), "html", null, true);
                yield "
                    </div>
                </div>
            ";
            }
            // line 11
            yield "        </div>
    ";
        }
        // line 13
        yield "    ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header_second", [], "any", false, false, true, 13)) {
            // line 14
            yield "        <div class=\"header-third sticky\">
            ";
            // line 15
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header_second", [], "any", false, false, true, 15), "html", null, true);
            yield "
        </div>
    ";
        }
        // line 18
        yield "    <div id=\"main-content\">
        <div class=\"column-second\">
            ";
        // line 20
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "region_top", [], "any", false, false, true, 20)) {
            // line 21
            yield "                <div class=\"region-top\">
                    ";
            // line 22
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "region_top", [], "any", false, false, true, 22), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 25
        yield "            <div class=\"region-center\">
                ";
        // line 26
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 26)) {
            // line 27
            yield "                    <div class=\"column-left\">
                        <div class=\"content-top\">
                            ";
            // line 29
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content_top", [], "any", false, false, true, 29), "html", null, true);
            yield "
                        </div>
                        <div class=\"content-center\">
                            ";
            // line 32
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 32), "html", null, true);
            yield "
                        </div>                    
                        <div class=\"content-middle\">
                            ";
            // line 35
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom", [], "any", false, false, true, 35), "html", null, true);
            yield "
                        </div> 
                    </div>
                ";
        }
        // line 39
        yield "            </div>
        </div>
    </div>
    ";
        // line 42
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 42)) {
            // line 43
            yield "        <div id=\"footer\">
            <div class=\"container\">
                ";
            // line 45
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 45), "html", null, true);
            yield "
            </div>
        </div>
    ";
        }
        // line 49
        yield "</div>



";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/sph/templates/layout/page.html.twig";
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
        return array (  142 => 49,  135 => 45,  131 => 43,  129 => 42,  124 => 39,  117 => 35,  111 => 32,  105 => 29,  101 => 27,  99 => 26,  96 => 25,  90 => 22,  87 => 21,  85 => 20,  81 => 18,  75 => 15,  72 => 14,  69 => 13,  65 => 11,  58 => 7,  54 => 5,  52 => 4,  49 => 3,  47 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/sph/templates/layout/page.html.twig", "/home/oksm/sites/sprinkhaan/themes/custom/sph/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 2);
        static $filters = array("escape" => 7);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
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
