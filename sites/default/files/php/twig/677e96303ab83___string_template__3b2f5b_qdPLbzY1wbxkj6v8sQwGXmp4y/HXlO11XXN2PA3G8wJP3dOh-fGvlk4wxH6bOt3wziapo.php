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

/* __string_template__3b2f5b53df4969e2b6e9051f9787bd41 */
class __TwigTemplate_120b3d4de1f9f94f95c76e17ebcd964a extends Template
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
        yield "<div class=\"camp-image\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_image"] ?? null), "html", null, true);
        yield "</div>
<div class=\"camp-title\">";
        // line 2
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
        yield "</div>
<div class=\"camp-date\">";
        // line 3
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_fecha"] ?? null), "html", null, true);
        yield " | ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_fecha_final"] ?? null), "html", null, true);
        yield "</div>
<div class=\"camp-sdesc\">";
        // line 4
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_short_description"] ?? null), "html", null, true);
        yield "</div>
<a href=\"";
        // line 5
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["view_node"] ?? null), "html", null, true);
        yield "\"><div class=\"camp-btn\">
  ";
        // line 6
        if ((($context["langcode"] ?? null) == "Dutch")) {
            // line 7
            yield "  Schrijf je nu in!
  ";
        } else {
            // line 9
            yield "  Regístrate ahora!
  ";
        }
        // line 11
        yield "</div></a>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["field_image", "title", "field_fecha", "field_fecha_final", "field_short_description", "view_node", "langcode"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__3b2f5b53df4969e2b6e9051f9787bd41";
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
        return array (  77 => 11,  73 => 9,  69 => 7,  67 => 6,  63 => 5,  59 => 4,  53 => 3,  49 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "__string_template__3b2f5b53df4969e2b6e9051f9787bd41", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 6);
        static $filters = array("escape" => 1);
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
