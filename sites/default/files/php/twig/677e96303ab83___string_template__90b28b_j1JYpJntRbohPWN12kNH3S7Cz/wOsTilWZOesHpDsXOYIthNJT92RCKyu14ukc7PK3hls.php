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

/* __string_template__90b28b50c37627ba118916a9b60af0d4 */
class __TwigTemplate_6d96a270a2676ed8517b9046ca60bf45 extends Template
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
            yield "  <div class=\"team-btn\">Team</div>
  <div class=\"team-tit\">Ons <span class=\"green\">Team</span>  </div>
  <div class=\"team-desc\">Maak kennis met de geweldige mensen achter NTC De Sprinkhaan! Ons team van toegewijde docenten en medewerkers zet zich in om een inspirerende en leerzame omgeving te creëren voor onze studenten. Hier vind je alle leden van ons team, hun kwalificaties en hun passie voor taal en cultuur.</div>
";
        } else {
            // line 7
            yield "  <div class=\"team-btn\">Equipo</div>
  <div class=\"team-tit\">Nuestro <span class=\"green\">Equipo</span>  </div>
  <div class=\"team-desc\">¡Conozca a la gran gente detrás de NTC De Sprinkhaan! Nuestro equipo de maestros y personal dedicados está comprometido a crear un ambiente educativo e inspirador para nuestros estudiantes. Aquí encontrará a todos los miembros de nuestro equipo, sus calificaciones y su pasión por el idioma y la cultura.</div>
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
        return "__string_template__90b28b50c37627ba118916a9b60af0d4";
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
        return new Source("", "__string_template__90b28b50c37627ba118916a9b60af0d4", "");
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
