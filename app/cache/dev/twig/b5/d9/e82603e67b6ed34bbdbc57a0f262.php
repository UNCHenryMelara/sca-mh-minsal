<?php

/* MinSalSidPlaAdminBundle:Default:rolFormTemplate.html.twig */
class __TwigTemplate_b5d9e82603e67b6ed34bbdbc57a0f262 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("MinSalSidPlaBundle:Default:index.html.twig");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "
<form action=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("MinSalSidPlaAdminBundle_crearRol"), "html");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, 'form'));
        echo ">
    ";
        // line 5
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, 'form'));
        echo "
    <input type=\"submit\" />
</form>

";
    }

    public function getTemplateName()
    {
        return "MinSalSidPlaAdminBundle:Default:rolFormTemplate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}