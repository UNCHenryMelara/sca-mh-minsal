<?php

/*

  SIDPLA - MINSAL
  Copyright (C) 2011  Bruno González   e-mail: bagonzalez.sv EN gmail.com
  Copyright (C) 2011  Universidad de El Salvador

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.


 */

/**
 * Description of AccionAdminEmpleadosController
 *
 * @author Daniel E. Diaz
 */

namespace MinSal\SCA\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use MinSal\SCA\AdminBundle\EntityDao\EmpleadoDao;
use MinSal\SCA\AdminBundle\Entity\Empleado;
use MinSal\SCA\AdminBundle\Entity\UnidadOrganizativa;

class AccionAdminEmpleadosController extends Controller {
    /*
     * Mantenimineto de Empleados.
     * 
     */

    public function mattEmpleadosAction() {
        $opciones = $this->getRequest()->getSession()->get('opciones');
        return $this->render('MinSalSCAAdminBundle:Empleado:manttEmpleados.html.twig', array('opciones' => $opciones));
    }

    public function consultarEmpleadosJSONAction() {
       $request = $this->getRequest();
        $empleadoDao = new EmpleadoDao($this->getDoctrine());
        $empleados = $empleadoDao->getEmpleados();

        $numfilas = count($empleados);

        $emple = new Empleado();
        $i = 0;

        foreach ($empleados as $emple) {

            $rows[$i]['id'] = $emple->getIdUsuario();
            $rows[$i]['cell'] = array($emple->getIdUsuario(),
            	$emple->getUserName(),
                $emple->getUserPrimerNombre(),
                $emple->getUserSegundoNombre(),
                $emple->getUserApellidos(),
                $emple->getUserDui(),
                $emple->getUserNit(),
                $emple->getUserInternoTipo(),
                $emple->getUserCargo(),
                $emple->getEmail(),
                $emple->getUserTelefono(),
				$emple->getPassword());
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ',' ', ' ', ' ', ' ', ' ', ' ');
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';


        $response = new Response($jsonresponse);
        return $response;
    }

    /*
     * Mantenimiento de empleados
     * Eliminar, agregar, editar
     * 
     */

    public function manttEmpleadoEdicionAction() {

        $request = $this->getRequest();

        $dui = $request->get('dui');
        $nombrePrimero = $request->get('nombrePrimero');
        $nombreSegundo = $request->get('nombreSegundo');
        $primerApellido = $request->get('primerApellido');
        $segundoApellido = $request->get('segundoApellido');
        $email=$request->get('email');
       

        $id = $request->get('id');
        $operacion = $request->get('oper');

        $empleadoDao = new EmpleadoDao($this->getDoctrine());

        if ($operacion == 'edit') {
            $empleadoDao->editEmpleado($dui, $nombrePrimero, $nombreSegundo, $primerApellido, $segundoApellido, $id, $unidadAsignada,$email);
        }

        if ($operacion == 'del') {
            $empleadoDao->delEmpleado($id);
        }

        if ($operacion == 'add') {
            $empleadoDao->addEmpleado($dui, $nombrePrimero, $nombreSegundo, $primerApellido, $segundoApellido, $unidadAsignada,$email);
        }

        return new Response("{sc:true,msg:''}");
    }

}

?>
