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

/* form/template_selection.html */
class __TwigTemplate_27ce3d00ee6ceb2ca7b2aef9e4141ee4c595dcd239fc7c2bef161c5f0522bb2e extends \MailPoetVendor\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'after_css' => [$this, 'block_after_css'],
            'container' => [$this, 'block_container'],
            'translations' => [$this, 'block_translations'],
            'after_javascript' => [$this, 'block_after_javascript'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html", "form/template_selection.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_after_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo $this->extensions['MailPoet\Twig\Assets']->generateStylesheet("mailpoet-form-editor.css");
        echo "
";
    }

    // line 7
    public function block_container($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "
<script type=\"text/javascript\">
  var mailpoet_beacon_articles = [
    '5e43d3ec2c7d3a7e9ae79da9',
  ];
</script>

<div class=\"block-editor\">
  <div id=\"mailpoet_form_edit_templates\">
  </div>
</div>

<script>
  ";
        // line 22
        echo "  var mailpoet_templates = ";
        echo json_encode(($context["templates"] ?? null));
        echo ";
  var mailpoet_form_edit_url =
    \"";
        // line 24
        echo admin_url("admin.php?page=mailpoet-form-editor&id=");
        echo "\";
  ";
        // line 26
        echo "</script>

<style id=\"mailpoet-form-editor-form-styles\"></style>
";
    }

    // line 31
    public function block_translations($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo $this->extensions['MailPoet\Twig\I18n']->localize(["heading" => $this->extensions['MailPoet\Twig\I18n']->translate("Select form template"), "blankTemplate" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Blank template", "the first item in the templates selection list"), "fixedBarCategory" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Fixed bar", "This is a text on a widget that leads to settings for form placement - form type is fixed bar"), "slideInCategory" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Slide–in", "This is a text on a widget that leads to settings for form placement - form type is slide in"), "popupCategory" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Pop up", "This is a text on a widget that leads to settings for form placement - form type is pop up, it will be displayed on page in a small modal window"), "belowPagesCategory" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Below pages", "This is a text on a widget that leads to settings for form placement"), "othersCategory" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Others (widget)", "Placement of the form using theme widget"), "select" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Select", "Verb"), "selectTemplate" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Select a template", "Form template selection heading"), "createFormError" => $this->extensions['MailPoet\Twig\I18n']->translate("Sorry, there was an error, please try again later.")]);
        // line 43
        echo "
";
    }

    // line 46
    public function block_after_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 47
        echo $this->extensions['MailPoet\Twig\Assets']->generateJavascript("form_editor.js");
        echo "
";
    }

    public function getTemplateName()
    {
        return "form/template_selection.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 47,  106 => 46,  101 => 43,  99 => 32,  95 => 31,  88 => 26,  84 => 24,  78 => 22,  63 => 8,  59 => 7,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "form/template_selection.html", "/var/www/uat.koreaversikamu.co.id/wp-content/plugins/mailpoet/views/form/template_selection.html");
    }
}
