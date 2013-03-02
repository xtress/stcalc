<?php

/* SteamCoreBundle:Default:games.html.twig */
class __TwigTemplate_eeaa07706fbef0b84ab25ce23bfa96b8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
    <table class=\"table table-bordered\">
        
        <thead>
            
            <th></th>
            <th>
                ";
        // line 11
        echo $this->env->getExtension('translator')->getTranslator()->trans("CB_STEAM_GAME_NAME", array(), "messages");
        // line 12
        echo "            </th>
            <th>
                Store link
            </th>
            <th>
                Current price (";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "store"), "method"), "html", null, true);
        echo " store)
            </th>
            
        </thead>
        
        <tbody>
            
            ";
        // line 24
        if ((array_key_exists("games", $context) && ((isset($context["games"]) ? $context["games"] : $this->getContext($context, "games")) != null))) {
            // line 25
            echo "                
                ";
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["games"]) ? $context["games"] : $this->getContext($context, "games")));
            foreach ($context['_seq'] as $context["_key"] => $context["game"]) {
                // line 27
                echo "
                    <tr>

                        <td>
                            <img src=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "logo"), "html", null, true);
                echo "\" />
                        </td>

                        <td>
                            ";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "name"), "html", null, true);
                echo "
                        </td>

                        <td>
                            <a href=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "storeLink"), "html", null, true);
                echo "\">
                                Store link
                            </a>
                        </td>

                        <td>
                            ";
                // line 45
                if (($this->getAttribute((isset($context["game"]) ? $context["game"] : null), "price", array(), "any", true, true) && ($this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "price") != null))) {
                    // line 46
                    echo "                                
                                ";
                    // line 47
                    echo $this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "price");
                    echo "
                                
                            ";
                }
                // line 50
                echo "                        </td>

                    </tr>

                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['game'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 55
            echo "                
            ";
        }
        // line 57
        echo "            
        </tbody>
        
    </table>
    
    ";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["price"]) ? $context["price"] : $this->getContext($context, "price")), "html", null, true);
        echo "

";
    }

    public function getTemplateName()
    {
        return "SteamCoreBundle:Default:games.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 62,  122 => 57,  118 => 55,  108 => 50,  102 => 47,  99 => 46,  97 => 45,  88 => 39,  81 => 35,  74 => 31,  68 => 27,  64 => 26,  61 => 25,  59 => 24,  49 => 17,  42 => 12,  40 => 11,  31 => 4,  28 => 3,);
    }
}
