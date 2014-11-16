<?php

/* ::layout.html.twig */
class __TwigTemplate_c3a13890839a5b93ec9206821dda85a20ade934c5a90a142c5d0442681438b8d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'container' => array($this, 'block_container'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html class=\"js\" lang=\"fr\" xmlns:og=\"http://opengraphprotocol.org/schema/\" xmlns:fb=\"http://www.facebook.com/2008/fbml\"><head>
        <meta charset=\"utf-8\">

        <title>Todo list zouhaier</title>

    ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "     
  <body itemscope=\"\" itemtype=\"http://schema.org/Article\">
      ";
        // line 15
        $this->displayBlock('body', $context, $blocks);
        // line 43
        echo "      </body>
      ";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "     <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/base.css"), "html", null, true);
        echo "\"> 
     <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\"> 
     
     <script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js\"></script>
     <script type=\"text/javascript\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/main.js"), "html", null, true);
        echo "\"></script>
    ";
    }

    // line 15
    public function block_body($context, array $blocks = array())
    {
        // line 16
        echo "    <div>          
        <div class=\"container\">
            <div class=\"homepage-search clearfix\">
             <header class=\"site-header\" style=\"margin-bottom: 4%;\">
        
        </header>
        
        
      <section id=\"todoapp\">
        <header id=\"header\">
          <h1>TodoList</h1>
          ";
        // line 27
        $this->displayBlock('container', $context, $blocks);
        // line 28
        echo "        </header>
        ";
        // line 29
        $this->displayBlock('content', $context, $blocks);
        // line 31
        echo "
      </section>

 </div>
        </div>


        <footer class=\"\">
        </footer>

    </div>
        ";
    }

    // line 27
    public function block_container($context, array $blocks = array())
    {
    }

    // line 29
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  106 => 29,  101 => 27,  86 => 31,  84 => 29,  81 => 28,  79 => 27,  66 => 16,  63 => 15,  51 => 8,  46 => 7,  43 => 6,  36 => 15,  32 => 13,  30 => 6,  23 => 1,  57 => 11,  45 => 10,  38 => 43,  34 => 5,  31 => 4,  28 => 3,);
    }
}
