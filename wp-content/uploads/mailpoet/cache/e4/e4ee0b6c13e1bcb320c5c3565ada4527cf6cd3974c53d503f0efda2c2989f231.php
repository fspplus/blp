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

/* newsletter/templates/blocks/social/settingsStyles.hbs */
class __TwigTemplate_c0d158b1ec1d35805e21a353022e62aa129b96306e674bfd2b7827918e2c9a85 extends \MailPoetVendor\Twig\Template
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
        echo "{{#each availableSets}}
    <div class=\"mailpoet_social_icon_set{{#ifCond ../activeSet '==' this }} mailpoet_active_icon_set{{/ifCond}}\" data-setName=\"{{ this }}\">
    {{#each ../availableSocialIcons}}<img src=\"{{lookup (lookup ../../socialIconSets ../this) this}}\" />{{/each}}
    </div>
{{/each}}
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/social/settingsStyles.hbs";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/social/settingsStyles.hbs", "/var/www/uat.koreaversikamu.co.id/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/social/settingsStyles.hbs");
    }
}
