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

/* __string_template__0d353004ec977d221252e778553e6047 */
class __TwigTemplate_90546ec44d1b92b0e4d15e52404e9dc0 extends Template
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
            yield "  <div class=\"news-btn\">Nieuws</div>
  <div class=\"news-tit\">Laatste Updates Van NTC <span class=\"green\">De Sprinkhaan</span>  </div>
  <div class=\"news-desc\">Onze taalkampen bieden kinderen de kans om op een speelse manier hun taalvaardigheden te verbeteren. Door middel van interactieve lessen, culturele activiteiten en samenwerkingen leren ze de Nederlandse taal in een stimulerende omgeving. Ideaal voor alle niveaus, van beginners tot gevorderden.</div>
";
        } else {
            // line 7
            yield "  <div class=\"news-btn\">Noticias</div>
  <div class=\"news-tit\">Últimas actualizaciones de NTC <span class=\"green\">De Sprinkhaan</span>  </div>
  <div class=\"news-desc\">Nuestros campamentos de idiomas ofrecen a los niños la oportunidad de mejorar sus habilidades lingüísticas de forma lúdica. A través de lecciones interactivas, actividades culturales y colaboraciones, aprenden el idioma holandés en un ambiente estimulante. Ideal para todos los niveles, desde principiantes hasta avanzados.</div>
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
        return "__string_template__0d353004ec977d221252e778553e6047";
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
        return new Source("", "__string_template__0d353004ec977d221252e778553e6047", "");
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
