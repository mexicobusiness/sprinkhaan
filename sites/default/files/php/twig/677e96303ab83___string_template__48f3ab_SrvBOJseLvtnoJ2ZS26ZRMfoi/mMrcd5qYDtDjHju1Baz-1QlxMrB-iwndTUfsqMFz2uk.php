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

/* __string_template__48f3ab8a0ccc897b2722212b623e25b5 */
class __TwigTemplate_f055cf252c63b8f714e1a06cb261dd13 extends Template
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
        yield "<div class=\"testimoniales-fot\">
";
        // line 2
        if (($context["field_image"] ?? null)) {
            // line 3
            yield "  <img src=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_image"] ?? null), "html", null, true);
            yield "\" alt=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($context["title"] ?? null));
            yield "\">
";
        } else {
            // line 5
            yield "    <img src=\"/themes/custom/sph/images/icono_no_foto.png\" alt=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($context["title"] ?? null));
            yield "\">
";
        }
        // line 7
        yield "</div>
<div class=\"testimoniales-tit\">";
        // line 8
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($context["title"] ?? null));
        yield "</div>
<div class=\"testimoniales-est\">
  ";
        // line 10
        $context["k"] = Twig\Extension\CoreExtension::trim(($context["field_estrellas"] ?? null));
        // line 11
        yield "  ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, ($context["k"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 12
            yield "    <div>&#9733;</div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        yield "</div>
<div class=\"testimoniales-tes\">";
        // line 15
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["body"] ?? null), "html", null, true);
        yield "</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["field_image", "title", "field_estrellas", "body"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__48f3ab8a0ccc897b2722212b623e25b5";
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
        return array (  88 => 15,  85 => 14,  78 => 12,  73 => 11,  71 => 10,  66 => 8,  63 => 7,  57 => 5,  49 => 3,  47 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "__string_template__48f3ab8a0ccc897b2722212b623e25b5", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 2, "set" => 10, "for" => 11);
        static $filters = array("escape" => 3, "raw" => 3, "trim" => 10);
        static $functions = array("range" => 11);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['escape', 'raw', 'trim'],
                ['range'],
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
