<?php

/* MinSalSidPlaAdminBundle:Opciones:showAllOpciones.html.twig */
class __TwigTemplate_8025ffca7c8b212d81c3297447305361 extends Twig_Template
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

        // line 2
        $this->displayBlock('body', $context, $blocks);
    }

    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "    <script type=\"text/javascript\">
      \$(document).ready(function(){
       \$('#agregarOpcionesButton').button();
        \$('#editarOpcionesButton').button();
        \$('#eliminarOpcionesButton').button();
        var myGrid = \$('#theGrid');        
        myGrid.jqGrid({    
          url: 'consultarOpc',
          datatype:'json',
          altRows:true,          
          colNames:['Id','Nombre', 'Descripcion', 'Enlace', 'Padre'],
          colModel:[            
            { name:'id', index: 'id', width:15,editable:false,editoptions:{size:10},sorttype:'int',searchtype:\"integer\", searchrules:{\"required\":true, \"number\":true, \"maxValue\":2000000}   },
            { name:'nombre', index: 'nombre', width:150,editable:true,editoptions:{size:40,maxlength:50},formoptions:{rowpos:1, label: \"Nombre\", elmprefix:\"(*)\"},editrules:{required:true}  },
            { name:'descripcion', index: 'descripcion', width:300,editable:true,editoptions:{size:70,maxlength:100},formoptions:{ rowpos:2, label: \"Descripcion\",elmprefix:\"   \"},editrules:{required:false}  },
            { name:'enlace', index: 'enlace', width:300,editable:true,editoptions:{size:70,maxlength:150},formoptions:{ rowpos:3, label: \"Enlace\", elmprefix:\"(*)\"},editrules:{required:true}  } ,
            { name:'opcpadre', index: 'opcpadre', width:50,editable:true,editoptions:{size:40} ,formoptions:{rowpos:4, label: \"Padre\"} } ],
          rowNum:10,
          rowList:[10,20,30],//Lo cambie porque necesitaba ver las demas opciones y no m surben los botones de la siguiente pagina
          multiselect: false,
          loadonce:true,
          sortname: 'id',
          sortorder: \"asc\",
          pager: jQuery('#pager'),
          viewrecords: true,          
          caption: 'Opciones del sistema',
          height: \"100%\",
          editCaption: \"Editar Opcion\",
          addCaption: \"Agregar Opcion\",
          editurl:'manttOpcEdicion'            
        });
        
        myGrid.jqGrid('navGrid','#pager',
        {add:false,edit:false,del:false,beforeRefresh: function() {\$(\"#theGrid\").jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}},
        {},//search
        {} //view
        
        );
        
     function despuesAgregarEditar() {
        \$(\"#theGrid\").jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
        return[true,'']; //no error
     }   
        
        
      //agregar
  \$(\"#agregarOpcionesButton\").click(function(){
        jQuery('#theGrid').jqGrid('editGridRow',\"new\",
             {
              width: 650,height:200,
              bottominfo:\"Campos marcados con (*) son obligatorios\", 
              afterSubmit:despuesAgregarEditar,
              closeAfterAdd:true,
              closeOnEscape: true,
              align:'center',
              onclickSubmit: function(rp_ge, postdata){
                                  alert(\"datos guardados con exito!\");                                  
                                 }
              }
              );
        });
    
    
         //editar
    \$(\"#editarOpcionesButton\").click(function(){
          var gr = jQuery('#theGrid').jqGrid('getGridParam','selrow');
          if( gr != null )
             jQuery('#theGrid').jqGrid('editGridRow',gr,
               { width: 600,height:200,
                  afterSubmit:despuesAgregarEditar,
                  reloadAfterSubmit:true,
                  closeOnEscape: true,
                  bottominfo:\"Campos marcados con (*) son obligatorios\",
                  align:'center',
                  onclickSubmit: function(rp_ge, postdata) {
                              alert(\"Opciones del Sistema editadas con exito!\");
                   },
                       closeAfterEdit:true   
                       });
             else alert(\"Por favor seleccione una fila para editar!\"); 
          });
    
    
    
    
        //eliminar
    \$(\"#eliminarOpcionesButton\").click(function(){
         var grs = jQuery('#theGrid').jqGrid('getGridParam','selrow');
         if( grs != null ) 
             jQuery('#theGrid').jqGrid('delGridRow',grs,
                 {
                msg: \"Desea Eliminar las Opciones del Sistema?\",
                caption:\"Eliminando Opciones del Sistema\",
                width:550,height:160,
                reloadAfterSubmit:true,
                align:'center',
                onclickSubmit: function(rp_ge, postdata) {
                           alert(\"Opciones del Sistema eliminadas con exito!\");
                        }
               
             }); 
             else alert(\"Por favor seleccione una fila para borrar!\"); 
           }); 
  //fin
      
      });
      
       //define handler for 'editSubmit' event
    var fn_editSubmit=function(response,postdata){
     var json=response.responseText; //in my case response text form server is \"{sc:true,msg:''}\"
     var result=eval(\"(\"+json+\")\"); //create js object from server reponse
     return [result.sc,result.msg,null]; 
    }  

    
   
    
    </script>
      <div id=\"grid_wrapper\" class=\"ui-corner-all floatLeft\">
        <table id=\"theGrid\" class=\"scroll\" ></table> 
        <div id=\"pager\"  class=\"scroll\" style=\"text-align:center;\"></div>
        <br></br>
       <input type=\"button\" id=\"agregarOpcionesButton\" value=\"  Agregar  \" />
       <input type=\"button\" id=\"editarOpcionesButton\" value=\"   Editar   \" />
       <input type=\"button\" id=\"eliminarOpcionesButton\" value=\"  Eliminar  \" />
      </div>

    
";
    }

    public function getTemplateName()
    {
        return "MinSalSidPlaAdminBundle:Opciones:showAllOpciones.html.twig";
    }

    public function isTraitable()
    {
        return true;
    }
}
