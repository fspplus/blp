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

/* form/front_end_form.html */
class __TwigTemplate_2fcbf757e4bde879a4db38744843bdbe6e56562a15923b74e1e860a2e852c84e extends \MailPoetVendor\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "  ";
        if (($context["before_widget"] ?? null)) {
            // line 3
            echo "    ";
            echo ($context["before_widget"] ?? null);
            echo "
  ";
        }
        // line 5
        echo "
  ";
        // line 6
        if (($context["title"] ?? null)) {
            // line 7
            echo "    ";
            echo ($context["before_title"] ?? null);
            echo ($context["title"] ?? null);
            echo ($context["after_title"] ?? null);
            echo "
  ";
        }
        // line 9
        echo "
  <div class=\"
    mailpoet_form_popup_overlay
    ";
        // line 12
        if ((($context["animation"] ?? null) != "")) {
            // line 13
            echo "      mailpoet_form_overlay_animation_";
            echo \MailPoetVendor\twig_escape_filter($this->env, ($context["animation"] ?? null), "html", null, true);
            echo "
      mailpoet_form_overlay_animation
    ";
        }
        // line 16
        echo "  \"></div>
  <div
    id=\"";
        // line 18
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["form_html_id"] ?? null), "html", null, true);
        echo "\"
    class=\"
      mailpoet_form
      mailpoet_form_";
        // line 21
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["form_type"] ?? null), "html", null, true);
        echo "
      mailpoet_form_position_";
        // line 22
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["position"] ?? null), "html", null, true);
        echo "
      mailpoet_form_animation_";
        // line 23
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["animation"] ?? null), "html", null, true);
        echo "
    \"
    ";
        // line 25
        if (($context["is_preview"] ?? null)) {
            // line 26
            echo "      data-is-preview=\"1\"
      data-editor-url=\"";
            // line 27
            echo \MailPoetVendor\twig_escape_filter($this->env, ($context["editor_url"] ?? null), "html", null, true);
            echo "\"
    ";
        }
        // line 29
        echo "  >
    ";
        // line 30
        if ((((($context["form_type"] ?? null) == "popup") || (($context["form_type"] ?? null) == "fixed_bar")) || (($context["form_type"] ?? null) == "slide_in"))) {
            // line 31
            echo "      <img
        class=\"mailpoet_form_close_icon\"
        alt=\"close\"
        width=20
        height=20
        src='";
            // line 36
            echo $this->extensions['MailPoet\Twig\Assets']->generateImageUrl((("form_close_icon/" . ($context["close_button_icon"] ?? null)) . ".svg"));
            echo "'
      >
    ";
        }
        // line 39
        echo "    ";
        echo ($context["styles"] ?? null);
        echo "
    <form
      target=\"_self\"
      method=\"post\"
      action=\"";
        // line 43
        echo admin_url("admin-post.php?action=mailpoet_subscription_form");
        echo "\"
      class=\"mailpoet_form mailpoet_form_form mailpoet_form_";
        // line 44
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["form_type"] ?? null), "html", null, true);
        echo "\"
      novalidate
      data-delay=\"";
        // line 46
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["delay"] ?? null), "html", null, true);
        echo "\"
      data-exit-intent-enabled=\"";
        // line 47
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["enableExitIntent"] ?? null), "html", null, true);
        echo "\"
      data-font-family=\"";
        // line 48
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["fontFamily"] ?? null), "html", null, true);
        echo "\"
    >
      <input type=\"hidden\" name=\"data[form_id]\" value=\"";
        // line 50
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["form_id"] ?? null), "html", null, true);
        echo "\" />
      <input type=\"hidden\" name=\"token\" value=\"";
        // line 51
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["token"] ?? null), "html", null, true);
        echo "\" />
      <input type=\"hidden\" name=\"api_version\" value=\"";
        // line 52
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["api_version"] ?? null), "html", null, true);
        echo "\" />
      <input type=\"hidden\" name=\"endpoint\" value=\"subscribers\" />
      <input type=\"hidden\" name=\"mailpoet_method\" value=\"subscribe\" />

      ";
        // line 56
        echo ($context["html"] ?? null);
        echo "
      <div class=\"mailpoet_message\">
        <p class=\"mailpoet_validate_success\"
        ";
        // line 59
        if ( !($context["success"] ?? null)) {
            // line 60
            echo "        style=\"display:none;\"
        ";
        }
        // line 62
        echo "        >";
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["form_success_message"] ?? null), "html", null, true);
        echo "
        </p>
        <p class=\"mailpoet_validate_error\"
        ";
        // line 65
        if ( !($context["error"] ?? null)) {
            // line 66
            echo "        style=\"display:none;\"
        ";
        }
        // line 68
        echo "        >";
        if (($context["error"] ?? null)) {
            // line 69
            echo "        ";
            echo $this->extensions['MailPoet\Twig\I18n']->translate("An error occurred, make sure you have filled all the required fields.");
            echo "
        ";
        }
        // line 71
        echo "        </p>
      </div>
    </form>
  </div>

  ";
        // line 76
        if (($context["after_widget"] ?? null)) {
            // line 77
            echo "    ";
            echo ($context["after_widget"] ?? null);
            echo "
  ";
        }
    }

    public function getTemplateName()
    {
        return "form/front_end_form.html";
    }

    public function getDebugInfo()
    {
        return array (  220 => 77,  218 => 76,  211 => 71,  205 => 69,  202 => 68,  198 => 66,  196 => 65,  189 => 62,  185 => 60,  183 => 59,  177 => 56,  170 => 52,  166 => 51,  162 => 50,  157 => 48,  153 => 47,  149 => 46,  144 => 44,  140 => 43,  132 => 39,  126 => 36,  119 => 31,  117 => 30,  114 => 29,  109 => 27,  106 => 26,  104 => 25,  99 => 23,  95 => 22,  91 => 21,  85 => 18,  81 => 16,  74 => 13,  72 => 12,  67 => 9,  59 => 7,  57 => 6,  54 => 5,  48 => 3,  45 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "form/front_end_form.html", "/home/u5816397/public_html/subdomain_bs/hanwha/wp-content/plugins/mailpoet/views/form/front_end_form.html");
    }
}
