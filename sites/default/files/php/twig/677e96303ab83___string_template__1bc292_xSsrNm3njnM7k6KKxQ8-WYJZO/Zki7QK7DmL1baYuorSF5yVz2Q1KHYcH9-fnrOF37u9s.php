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

/* __string_template__1bc292dc78e4a89b9cf385594151451a */
class __TwigTemplate_9763a0b99d25320c7f3d470b33bc41c6 extends Template
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
        yield "<div class=\"lang\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["langcode"] ?? null), "html", null, true);
        yield "</div>
";
        // line 2
        if ((($context["langcode"] ?? null) == "Dutch")) {
            // line 3
            yield "  <div class=\"faq-btn\">Veelgestelde Vragen</div>
  <div class=\"faq-tit\">Vragen En <span class=\"green\">Antwoorden</span>  </div>
  <div class=\"faq-desc\">Heb je vragen over NTC De Sprinkhaan? In deze sectie vind je antwoorden op de meest voorkomende vragen van ouders en studenten. Van cursusinformatie tot inschrijvingsprocedures, wij zijn er om je te helpen!</div>
";
        } else {
            // line 7
            yield "  <div class=\"faq-btn\">Preguntas frecuentes</div>
  <div class=\"faq-tit\">Preguntas y <span class=\"green\">respuestas</span>  </div>
  <div class=\"faq-desc\">¿Tiene preguntas sobre NTC De Sprinkhaan? En esta sección encontrará respuestas a las preguntas más comunes de padres y estudiantes. Desde información del curso hasta procedimientos de registro, ¡estamos aquí para ayudar!</div>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["langcode"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__1bc292dc78e4a89b9cf385594151451a";
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
        return array (  57 => 7,  51 => 3,  49 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "__string_template__1bc292dc78e4a89b9cf385594151451a", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 2);
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
