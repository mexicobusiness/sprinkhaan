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

/* __string_template__3fc3cf75588af7f58f14e78b5faf83f5 */
class __TwigTemplate_1c00efb121ed7e5bdc710dbab2bf1dd2 extends Template
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
        yield "<div class=\"cultura-img\"><img src=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_image"] ?? null), "html", null, true);
        yield "\" alt=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
        yield "\"></div>
<div class=\"cultura-main-row\">
  <div class=\"cultura-tit\">";
        // line 3
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
        yield "</div>
  <div class=\"cultura-dat\">";
        // line 4
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_fecha"] ?? null), "html", null, true);
        yield "</div>
  <div class=\"cultura-sho\">";
        // line 5
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_short_description"] ?? null), "html", null, true);
        yield "</div>
  <a href=\"";
        // line 6
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["view_node"] ?? null), "html", null, true);
        yield "\"><div class=\"cultura-reg\">
  ";
        // line 7
        if ((($context["langcode"] ?? null) == "Dutch")) {
            // line 8
            yield "  Schrijf je nu in!
  ";
        } else {
            // line 10
            yield "  Regístrate ahora!
  ";
        }
        // line 12
        yield "  </div></a>
</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["field_image", "title", "field_fecha", "field_short_description", "view_node", "langcode"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__3fc3cf75588af7f58f14e78b5faf83f5";
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
        return array (  78 => 12,  74 => 10,  70 => 8,  68 => 7,  64 => 6,  60 => 5,  56 => 4,  52 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "__string_template__3fc3cf75588af7f58f14e78b5faf83f5", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 7);
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
