<?php

use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\Error\LoaderError;
use MailPoetVendor\Twig\Error\RuntimeError;
use MailPoetVendor\Twig\Extension\SandboxExtension;
use MailPoetVendor\Twig\Markup;
use MailPoetVendor\Twig\Sandbox\SecurityError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedTagError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFilterError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFunctionError;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\Template;

/* form/templatesLegacy/settings/label_within.hbs */
class __TwigTemplate_e1052477d2f10511c3f17c93c00c07a721752be011ab05e51c074d46f24197d4 extends \MailPoetVendor\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<p class=\"clearfix\">
  <label>";
        // line 2
        echo $this->extensions['MailPoet\Twig\I18n']->translate("Display label within input:");
        echo "</label>
  <span class=\"group\">
    <label>
      <input class=\"mailpoet_radio\" type=\"radio\" name=\"params[label_within]\" value=\"1\" {{#if params.label_within}}checked=\"checked\"{{/if}} />";
        // line 5
        echo $this->extensions['MailPoet\Twig\I18n']->translate("Yes");
        echo "
    </label>
    <label>
      <input class=\"mailpoet_radio\" type=\"radio\" name=\"params[label_within]\" value=\"\" {{#unless params.label_within}}checked=\"checked\"{{/unless}} />";
        // line 8
        echo $this->extensions['MailPoet\Twig\I18n']->translate("No");
        echo "
    </label>
  </span>
</p>";
    }

    public function getTemplateName()
    {
        return "form/templatesLegacy/settings/label_within.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 8,  46 => 5,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "form/templatesLegacy/settings/label_within.hbs", "/var/www/bucketlistplan.co.id/web/wp-content/plugins/mailpoet/views/form/templatesLegacy/settings/label_within.hbs");
    }
}
