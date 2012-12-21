<?php

/* MinSalSidPlaUsersBundle:Usuarios:showUsuariosSinRol.html.twig */
class __TwigTemplate_7094c843a7eca690fb4c782cc84da26c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        $this->displayBlock('body', $context, $blocks);
    }

    public function block_body($context, array $blocks = array())
    {
        // line 2
        echo "<script type=\"text/javascript\">
      \$(document).ready(function(){
        \$('#editarUsuarioButton').button();


        var myGrid = \$('#tabUsuario');        
        myGrid.jqGrid({ 
          url: 'consultarUsuarioSinRolJSON',
          datatype:'json',
          altRows:true,
          colNames:['Codigo','ID Usuario','Nombre','Unidad','Rol'],
          colModel:[
            { name:'codigo', index: 'codigo', width:40,editable:false,editoptions:{size:15}  },
            { name:'idusuario', index: 'idusuario',width:50,editable:false},
            { name:'nombre', index: 'nombre',width:100,editable:true,edittype:\"text\",editoptions: {readonly:\"readonly\"}},
            { name:'unidad', index: 'unidad',width:300,editable:true,edittype:\"text\",editoptions: {readonly:\"readonly\",size:50}},
            { name:'rol', index: 'rol', width:50,editable:true,editoptions:{size:30},edittype:\"select\",align:\"center\",editoptions: {value:\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, 'roles'), "html");
        echo "\"}}
           ],            
          rowNum:10,
          rowList:[10,20,30],
          multiselect: false,
          loadonce:true,
          pager: jQuery('#pager'),
          viewrecords: true,          
          caption: 'Usuarios sin Rol',
          height: \"100%\",
          editurl:'editarUsuarioSinRol'
           
        });
        
         myGrid.jqGrid('navGrid','#pager',{edit:false,add:false,del:false,search:false,refresh:false,
             beforeRefresh: function() {myGrid.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}}
         ).hideCol('codigo');
         
      /* Funcion para regargar los JQGRID luego de agregar y editar*/
      function despuesAgregarEditar() {
        myGrid.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
        return[true,'']; //no error
      }         

   //editar
    \$(\"#editarUsuarioButton\").click(function(){
          var gr = jQuery('#tabUsuario').jqGrid('getGridParam','selrow');
          if( gr != null )
             jQuery(\"#tabUsuario\").jqGrid('editGridRow',gr,
            {closeAfterEdit:true,editCaption: \"Editando Usuario\",
             height:200,align:'center',reloadAfterSubmit:true,width:550,
             processData: \"Cargando...\",afterSubmit:despuesAgregarEditar,
             bottominfo:\"Campos marcados con (*) son obligatorios\", onclickSubmit: function(rp_ge, postdata) {
                    alert(\"Usuario editado con exito!\");
                ;}
        });
          else alert(\"Por favor seleccione una fila para editar!\"); 
          });
 
  //fin          
          
      });
    </script>
                <table id=\"tabUsuario\" class=\"scroll\" align=\"center\"></table>
                <div id=\"pager\" class=\"scroll\"></div>
  
";
    }

    public function getTemplateName()
    {
        return "MinSalSidPlaUsersBundle:Usuarios:showUsuariosSinRol.html.twig";
    }

    public function isTraitable()
    {
        return true;
    }
}
