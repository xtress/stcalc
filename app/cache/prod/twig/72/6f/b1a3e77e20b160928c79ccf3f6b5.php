<?php

/* ::base.html.twig */
class __TwigTemplate_726fb1a3e77e20b160928c79ccf3f6b5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body style=\"width:960px; text-align: center\">
        ";
        // line 14
        $this->displayBlock('body', $context, $blocks);
        // line 15
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 21
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "            
            <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            
        ";
    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
    }

    // line 15
    public function block_javascripts($context, array $blocks = array())
    {
        // line 16
        echo "            
            <script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("steamcalc/js/jquery-ui-1.9.2.custom.min.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
            
        ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 18,  83 => 17,  80 => 16,  77 => 15,  72 => 14,  65 => 8,  62 => 7,  53 => 5,  47 => 21,  44 => 15,  35 => 11,  33 => 6,  29 => 5,  23 => 1,  129 => 62,  122 => 57,  118 => 55,  108 => 50,  102 => 47,  99 => 46,  97 => 45,  88 => 39,  81 => 35,  74 => 31,  68 => 27,  64 => 26,  61 => 25,  59 => 6,  49 => 17,  42 => 14,  40 => 11,  31 => 4,  28 => 3,);
    }
}
