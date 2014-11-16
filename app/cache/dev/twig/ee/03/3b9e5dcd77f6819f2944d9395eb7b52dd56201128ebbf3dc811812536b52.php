<?php

/* ztnUtilisateurBundle:Security:login.html.twig */
class __TwigTemplate_ee033b9e5dcd77f6819f2944d9395eb7b52dd56201128ebbf3dc811812536b52 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        // line 4
        echo "
<form id=\"login\" action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\" class=\"form-login\">
    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />
    <table>
        <tr>
            <td><label class=\"control-label\" for=\"username\">email:</label></td>
            <td><input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" required=\"required\" /></td>
        </tr>
        <tr>
            <td><label class=\"control-label\" for=\"password\">mot de passe</label></td>
            <td><input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" /></td>
        </tr>
        
    </table>
    <input type=\"submit\" class=\"submit\" id=\"_submit\" name=\"_submit\" value=\"connexion\" />
    <input type=\"button\" class=\"submit\" onclick=\"window.location.href='";
        // line 19
        echo $this->env->getExtension('routing')->getPath("ztn_utilisateur_registration_register");
        echo "'\" name=\"_submit\" value=\"inscrire\" />
</form>
";
    }

    public function getTemplateName()
    {
        return "ztnUtilisateurBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 19,  45 => 10,  38 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
