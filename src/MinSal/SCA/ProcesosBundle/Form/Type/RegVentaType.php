<?php
namespace MinSal\SCA\ProcesosBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use MinSal\SCA\AdminBundle\EntityDao\AlcoholDao;
use MinSal\SCA\AdminBundle\Form\Type\AlcoholType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


/**
 * Estructura para formulario de Registro de Ventas
 *
 * @author Daniel E. Diaz
 */
class RegVentaType extends AbstractType {
    private $doctrine;
    
    public function __construct($doctrine){
        $this->doctrine = $doctrine;
    }
    
    
    /**
     * Utilizado en Symfony 2.1
     * 
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions1(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'MinSal\SCA\ProcesosBundle\Entity\RegVenta'
        ));
    }
    
    /**
     * Utilizado en Symfony 2.0
     * @param array $options
     * @return type
     */
    public function getDefaultOptions(array $options){
        return array(
            'data_class' => 'MinSal\SCA\ProcesosBundle\Entity\RegVenta'
        );
    }
    
    public function buildForm(FormBuilder $builder, array $opciones){
        $builder->add('RegVentaId', 'hidden');
        
        /*$builder->add('alcohol', 'entity', array(
            'class'=>'MinSalSCAAdminBundle:Alcohol',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                        ->where('u.auditDeleted = false');
            },
            'property'=> 'alcNombre',
            'expanded'=>false,
            'multiple'=>false,
            //'em'=> 'doctrine.orm.entity_manager'
        ));/**/
        $builder->add('alcohol', 'choice', array(
            'choices' => $this->getAlcoholes(),
            'required' => true,
            'expanded' => false,
            'multiple' => false,
            'empty_value' => 'Debe Seleccionar un Alcohol'
        ));
        $builder->add('regveFecha', null, array('label' => 'Fecha'));
        $builder->add('regveNIT', null, array('label' => 'NIT'));
        $builder->add('regveNombre', null, array('label' => 'Nombre Específico'));
        $builder->add('regveMinsal', null, array('label' => 'Registro Usuario (MINSAL)'));
        $builder->add('regvedgii', null, array('label' => 'Numero Registro DGII'));
        $builder->add('regveLitros', null, array('label' => 'Grado'));
        $builder->add('regveGrado',  null, array('label' => 'Cuota (Lts)'));
        
    }

    public function getName(){
        return 'RegVenta';
    }
    
    private function getAlcoholes(){
        $alcoholDao = new AlcoholDao($this->doctrine);
        $alcoholes = $alcoholDao->getAlcoholes();
        
        $lista = array();
        
        foreach($alcoholes as $alc){
            $lista[$alc['alcId']] = $alc['alcNombre'];
        }
        
        return $lista;
    }
}

?>
