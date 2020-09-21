<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
/**
 * Programas Controller
 *
 * @property \App\Model\Table\ProgramasTable $Programas
 *
 * @method \App\Model\Entity\Programa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProgramasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */


    public function pro()
    {
   
         $connection = ConnectionManager::get('default');
         $connection2 = ConnectionManager::get('test');

        $data6 = $connection->execute('SELECT detalles.det_item as item ,detalles.det_monto as monto,detalles.det_mes as mes from detalles');
        $results4 = $connection->execute('call reset_cosa()');
          foreach ($data6 as $data6)
        {  $wea1=$data6['item'];
           $wea2=$data6['mes'];
           $wea3=$data6['monto'];
           $connection->execute("SELECT cosa('$wea1','$wea2','$wea3') ");
          }


         $data = $connection2->execute('SELECT auxiliar.razon_social as auxiliar,auxiliar.nombres as nombres,solicitud_pago.solicitud_pago_id,programa.nombre as programa,tipo_agrupacion.descripcion as tipo_agru,agrupacion_item.descripcion as agrupacion,
agrupacion_item.codigo as cod_agr,item.descripcion as item,item.codigo as cod_item,detalle_solicitud_pago.monto as monto,estado_solicitud.descripcion as estado,solicitud_pago.justificacion_pago,centro_primario.nombre as centro_primario,forma_pago.descripcion as forma_pago,tipo_solicitud_pago.descripcion as tipo_solicitud,tipo_documento_pago.descripcion as tipo_doc_pago,
users.name as nombre,month(solicitud_pago.fecha_solicitud) as fecha_solicitud_pago,detalle_solicitud_pago.fecha_documento as fecha_documento,solicitud_pago.created_at as fecha_creacion_solicitud
FROM  rendiciones_funfa.programa,rendiciones_funfa.forma_pago,rendiciones_funfa.tipo_solicitud_pago,
rendiciones_funfa.users,rendiciones_funfa.auxiliar,
rendiciones_funfa.estado_solicitud,rendiciones_funfa.solicitud_pago
LEFT JOIN rendiciones_funfa.centro_primario ON centro_primario.centro_primario_id = solicitud_pago.centro_primario_id
LEFT JOIN rendiciones_funfa.detalle_solicitud_pago ON solicitud_pago.solicitud_pago_id=detalle_solicitud_pago.solicitud_pago_id 
LEFT JOIN rendiciones_funfa.item ON item.item_id=detalle_solicitud_pago.item_id 
LEFT JOIN rendiciones_funfa.agrupacion_item ON item
.agrupacion_item_id=agrupacion_item.agrupacion_item_id
LEFT JOIN rendiciones_funfa.tipo_agrupacion ON tipo_agrupacion.tipo_agrupacion_id=agrupacion_item.tipo_agrupacion_id
LEFT JOIN rendiciones_funfa.tipo_documento_pago ON tipo_documento_pago.tipo_documento_pago_id=detalle_solicitud_pago.tipo_documento_pago_id
where  estado_solicitud.estado_solicitud_id=solicitud_pago.estado_solicitud_id AND
programa.programa_id=solicitud_pago.programa_id AND
forma_pago.forma_pago_id=solicitud_pago.forma_pago_id AND
estado_solicitud.estado_solicitud_id in (5,7,8,9)  and 
solicitud_pago.programa_id in (3,4,6)  and
year(solicitud_pago.fecha_solicitud)=2020 and
solicitud_pago.tipo_solicitud_pago_id=tipo_solicitud_pago.tipo_solicitud_pago_id AND
auxiliar.auxiliar_id=solicitud_pago.auxiliar_id AND
users.id=solicitud_pago.user_solicitante_id 
order by users.name asc,solicitud_pago.solicitud_pago_id asc');
         $results = $connection->execute('call reset()');
         $results3 = $connection->execute('call reset_ren()');
          foreach ($data as $data)
        {  $wea1=$data['cod_item'];
           $wea2=$data['fecha_solicitud_pago'];
           $wea3=$data['monto'];
           $connection->execute("SELECT test('$wea1','$wea2','$wea3') ");
           $connection->execute("SELECT test2('$wea1','$wea2','$wea3') ");

          }
         $data2 = $connection2->execute("SELECT cosa3.codigo,cosa3.monto,cosa3.programa,cosa3.centro_primario,cosa3.estado,cosa3.fecha_trans from
(select * from
(SELECT  detalle_rendicion_fondo.detalle_rendicion_fondo_id,item.codigo,item.descripcion,detalle_rendicion_fondo.monto,solicitud_fondo.solicitud_fondo_id,programa.nombre as programa,centro_primario.nombre as centro_primario,tipo_solicitud_fondo.descripcion as tipo_sol_fondo,estado_solicitud.descripcion as estado,
solicitud_fondo.gastos_programaticos,solicitud_fondo.gastos_administracion,solicitud_fondo.gastos_inversion,solicitud_fondo.justificacion_gasto,users.name as usuario_solicitante,
month(solicitud_fondo.fecha_transferencia) as fecha_trans,solicitud_fondo.fecha_solicitud as fecha_solicitud,solicitud_fondo.created_at as fecha_creacion_solicitud
FROM rendiciones_funfa.tipo_solicitud_fondo,rendiciones_funfa.users,rendiciones_funfa.programa,rendiciones_funfa.centro_primario,rendiciones_funfa.estado_solicitud,rendiciones_funfa.rendicion_fondo,rendiciones_funfa.detalle_rendicion_fondo,
rendiciones_funfa.solicitud_fondo, rendiciones_funfa.item 
where solicitud_fondo.tipo_solicitud_fondo_id=tipo_solicitud_fondo.tipo_solicitud_fondo_id and
users.id=solicitud_fondo.user_solicitante_id and
programa.programa_id=solicitud_fondo.programa_id and
solicitud_fondo.programa_id in (3,4,6)  and 
item.codigo in(34,44,'1.4.1.13')and
estado_solicitud.descripcion='Transferida' and
centro_primario.nombre not LIKE 'Control de Gestión & TI'and
centro_primario.nombre not LIKE 'Casa Central' and
centro_primario.centro_primario_id=solicitud_fondo.centro_primario_id and
solicitud_fondo.solicitud_fondo_id = rendicion_fondo.solicitud_fondo_id and
rendicion_fondo.rendicion_fondo_id = detalle_rendicion_fondo.rendicion_fondo_id and
item.item_id = detalle_rendicion_fondo.item_id and
estado_solicitud.estado_solicitud_id=solicitud_fondo.estado_solicitud_id 
group by detalle_rendicion_fondo.detalle_rendicion_fondo_id asc
order by  detalle_rendicion_fondo.detalle_rendicion_fondo_id asc) cosa
union all
select * from
(SELECT  detalle_rendicion_fondo.detalle_rendicion_fondo_id,item.codigo,item.descripcion,detalle_rendicion_fondo.monto,solicitud_fondo.solicitud_fondo_id,programa.nombre as programa,centro_primario.nombre as centro_primario,tipo_solicitud_fondo.descripcion as tipo_sol_fondo,estado_solicitud.descripcion as estado,
solicitud_fondo.gastos_programaticos,solicitud_fondo.gastos_administracion,solicitud_fondo.gastos_inversion,solicitud_fondo.justificacion_gasto,users.name as usuario_solicitante,
month(solicitud_fondo.fecha_transferencia) as fecha_trans,solicitud_fondo.fecha_solicitud as fecha_solicitud,solicitud_fondo.created_at as fecha_creacion_solicitud
FROM rendiciones_funfa.tipo_solicitud_fondo,rendiciones_funfa.users,rendiciones_funfa.programa,rendiciones_funfa.centro_primario,rendiciones_funfa.estado_solicitud,rendiciones_funfa.rendicion_fondo,rendiciones_funfa.detalle_rendicion_fondo,
rendiciones_funfa.solicitud_fondo, rendiciones_funfa.item 
where solicitud_fondo.tipo_solicitud_fondo_id=tipo_solicitud_fondo.tipo_solicitud_fondo_id and
users.id=solicitud_fondo.user_solicitante_id and
programa.programa_id=solicitud_fondo.programa_id and
solicitud_fondo.programa_id in (3,4,6)  and 
item.codigo!=34 and
item.codigo!=44 and
item.codigo!='1.4.1.13'and
estado_solicitud.descripcion='Transferida' and
centro_primario.centro_primario_id=solicitud_fondo.centro_primario_id and
solicitud_fondo.solicitud_fondo_id = rendicion_fondo.solicitud_fondo_id and
rendicion_fondo.rendicion_fondo_id = detalle_rendicion_fondo.rendicion_fondo_id and
item.item_id = detalle_rendicion_fondo.item_id and
estado_solicitud.estado_solicitud_id=solicitud_fondo.estado_solicitud_id 
group by detalle_rendicion_fondo.detalle_rendicion_fondo_id asc
order by  detalle_rendicion_fondo.detalle_rendicion_fondo_id asc) cosa2)cosa3
order by cosa3.solicitud_fondo_id asc ");

         foreach ($data2 as $data2)
        {  $wea4=$data2['codigo'];
           $wea5=$data2['fecha_trans'];
           $wea6=$data2['monto'];
           $connection->execute("SELECT test('$wea4','$wea5','$wea6') ");
           $connection->execute("SELECT test2('$wea4','$wea5','$wea6') ");

          }


         $results2 = $connection->execute('call reset_2()'); 
         $data3 = $connection2->execute('SELECT  solicitud_fondo.solicitud_fondo_id,detalle_centro_secundario_item.detalle_centro_secundario_item_id,detalle_centro_secundario_item.monto as monto_secundario,detalle_centro_secundario_item.detalle as detalle_secundario,item.codigo as codigo_item,item.descripcion as nombre_item,programa.nombre as programa,centro_primario.nombre as centro_primario,tipo_solicitud_fondo.descripcion as tipo_sol_fondo,estado_solicitud.descripcion as estado,
solicitud_fondo.gastos_programaticos,solicitud_fondo.gastos_administracion,solicitud_fondo.gastos_inversion,solicitud_fondo.justificacion_gasto,users.name as usuario_solicitante,
solicitud_fondo.fecha_transferencia,month(solicitud_fondo.fecha_solicitud) as fecha_solicitud,solicitud_fondo.created_at as fecha_creacion_solicitud
FROM rendiciones_funfa.tipo_solicitud_fondo,rendiciones_funfa.users,rendiciones_funfa.programa,rendiciones_funfa.centro_primario,rendiciones_funfa.estado_solicitud,
rendiciones_funfa.item ,rendiciones_funfa.detalle_centro_secundario ,rendiciones_funfa.detalle_centro_secundario_item ,rendiciones_funfa.solicitud_fondo 
where solicitud_fondo.tipo_solicitud_fondo_id=tipo_solicitud_fondo.tipo_solicitud_fondo_id and
users.id=solicitud_fondo.user_solicitante_id and
programa.programa_id=solicitud_fondo.programa_id and
centro_primario.centro_primario_id=solicitud_fondo.centro_primario_id and
detalle_centro_secundario.solicitud_fondo_id = solicitud_fondo.solicitud_fondo_id and
detalle_centro_secundario.detalle_centro_secundario_id = detalle_centro_secundario_item.detalle_centro_secundario_id and
item.item_id =  detalle_centro_secundario_item.item_id and
solicitud_fondo.programa_id in (3,4,6)  and 
estado_solicitud.estado_solicitud_id=solicitud_fondo.estado_solicitud_id 
order by solicitud_fondo_id asc');

         foreach ($data3 as $data3)
        {  $wea7=$data3['codigo_item'];
           $wea8=$data3['fecha_solicitud'];
           $wea9=$data3['monto_secundario'];
           $connection->execute("SELECT soli('$wea7','$wea8','$wea9') ");

          }
  

          $data3 = $connection2->execute('SELECT cosa.* from
(select * from (SELECT solicitud_fondo.solicitud_fondo_id,detalle_gasto_administracion.detalle_gasto_administracion_id,detalle_gasto_administracion.monto as monto_administrativo,detalle_gasto_administracion.detalle as detalle_gasto_administrativo,item.codigo as cod_item,item.descripcion as nombre_item,programa.nombre as programa,centro_primario.nombre as centro_primario,tipo_solicitud_fondo.descripcion as tipo_sol_fondo,estado_solicitud.descripcion as estado,
solicitud_fondo.gastos_programaticos,solicitud_fondo.gastos_administracion,solicitud_fondo.gastos_inversion,solicitud_fondo.justificacion_gasto,users.name as usuario_solicitante,
solicitud_fondo.fecha_transferencia,month(solicitud_fondo.fecha_solicitud) as fecha_solicitud,solicitud_fondo.created_at as fecha_creacion_solicitud
FROM rendiciones_funfa.tipo_solicitud_fondo,rendiciones_funfa.users,rendiciones_funfa.programa,rendiciones_funfa.centro_primario,rendiciones_funfa.estado_solicitud,
rendiciones_funfa.item,rendiciones_funfa.detalle_gasto_administracion,rendiciones_funfa.solicitud_fondo 
where solicitud_fondo.tipo_solicitud_fondo_id=tipo_solicitud_fondo.tipo_solicitud_fondo_id and
users.id=solicitud_fondo.user_solicitante_id and
programa.programa_id=solicitud_fondo.programa_id and
centro_primario.centro_primario_id=solicitud_fondo.centro_primario_id and
detalle_gasto_administracion.solicitud_fondo_id = solicitud_fondo.solicitud_fondo_id and
item.item_id = detalle_gasto_administracion.item_id and
item.codigo=34 and
centro_primario.nombre not LIKE "Control de Gestión & TI" and
centro_primario.nombre not LIKE "Casa Central" and
solicitud_fondo.programa_id in (3,4,6)  and 
estado_solicitud.estado_solicitud_id=solicitud_fondo.estado_solicitud_id 
order by solicitud_fondo_id asc) cosa4
union all
SELECT * from(SELECT  solicitud_fondo.solicitud_fondo_id,detalle_gasto_administracion.detalle_gasto_administracion_id,detalle_gasto_administracion.monto as monto_administrativo,detalle_gasto_administracion.detalle as detalle_gasto_administrativo,item.codigo as cod_item,item.descripcion as nombre_item,programa.nombre as programa,centro_primario.nombre as centro_primario,tipo_solicitud_fondo.descripcion as tipo_sol_fondo,estado_solicitud.descripcion as estado,
solicitud_fondo.gastos_programaticos,solicitud_fondo.gastos_administracion,solicitud_fondo.gastos_inversion,solicitud_fondo.justificacion_gasto,users.name as usuario_solicitante,
solicitud_fondo.fecha_transferencia,month(solicitud_fondo.fecha_solicitud) as fecha_solicitud,solicitud_fondo.created_at as fecha_creacion_solicitud
FROM rendiciones_funfa.tipo_solicitud_fondo,rendiciones_funfa.users,rendiciones_funfa.programa,rendiciones_funfa.centro_primario,rendiciones_funfa.estado_solicitud,
rendiciones_funfa.item,rendiciones_funfa.detalle_gasto_administracion,rendiciones_funfa.solicitud_fondo 
where solicitud_fondo.tipo_solicitud_fondo_id=tipo_solicitud_fondo.tipo_solicitud_fondo_id and
users.id=solicitud_fondo.user_solicitante_id and
programa.programa_id=solicitud_fondo.programa_id and
centro_primario.centro_primario_id=solicitud_fondo.centro_primario_id and
detalle_gasto_administracion.solicitud_fondo_id = solicitud_fondo.solicitud_fondo_id and
item.item_id = detalle_gasto_administracion.item_id and
item.codigo!=34 and
solicitud_fondo.programa_id in (3,4,6)  and 
estado_solicitud.estado_solicitud_id=solicitud_fondo.estado_solicitud_id 
order by solicitud_fondo_id asc ) cosa2 )cosa
order by cosa.solicitud_fondo_id asc');

         foreach ($data3 as $data3)
        {  $wea7=$data3['cod_item'];
           $wea8=$data3['fecha_solicitud'];
           $wea9=$data3['monto_administrativo'];
           $connection->execute("SELECT soli('$wea7','$wea8','$wea9') ");

          }
   $data3 = $connection2->execute('SELECT  solicitud_fondo.solicitud_fondo_id,detalle_gasto_inversion.detalle_gasto_inversion_id as id_inv,detalle_gasto_inversion.monto as monto,detalle_gasto_inversion.detalle,item.codigo as codigo_item,item.descripcion as nombre_item,programa.nombre as programa,centro_primario.nombre as centro_primario,tipo_solicitud_fondo.descripcion as tipo_sol_fondo,estado_solicitud.descripcion as estado,
solicitud_fondo.gastos_programaticos,solicitud_fondo.gastos_administracion,solicitud_fondo.gastos_inversion,solicitud_fondo.justificacion_gasto,users.name as usuario_solicitante,
solicitud_fondo.fecha_transferencia,month(solicitud_fondo.fecha_solicitud) as fecha_solicitud,solicitud_fondo.created_at as fecha_creacion_solicitud
FROM rendiciones_funfa.tipo_solicitud_fondo,rendiciones_funfa.users,rendiciones_funfa.programa,rendiciones_funfa.centro_primario,rendiciones_funfa.estado_solicitud,
rendiciones_funfa.item ,rendiciones_funfa.detalle_gasto_inversion ,rendiciones_funfa.solicitud_fondo 
where solicitud_fondo.tipo_solicitud_fondo_id=tipo_solicitud_fondo.tipo_solicitud_fondo_id and
users.id=solicitud_fondo.user_solicitante_id and
programa.programa_id=solicitud_fondo.programa_id and
centro_primario.centro_primario_id =solicitud_fondo.centro_primario_id and
detalle_gasto_inversion.solicitud_fondo_id = solicitud_fondo.solicitud_fondo_id and
item.item_id =  detalle_gasto_inversion.item_id and
solicitud_fondo.programa_id in (3,4,6)  and 
estado_solicitud.estado_solicitud_id=solicitud_fondo.estado_solicitud_id 
order by solicitud_fondo_id asc ');

         foreach ($data3 as $data3)
        {  $wea7=$data3['codigo_item'];
           $wea8=$data3['fecha_solicitud'];
           $wea9=$data3['monto'];
           $connection->execute("SELECT soli('$wea7','$wea8','$wea9') ");

          }


         return $this->redirect(['action' => 'view2']);

         

    }

    public function index()
    {
        $programas = $this->paginate($this->Programas->find('all', [
    'order' => ['Programas.prog_id' => 'ASC']]));

        $this->set(compact('programas'));
    }
    public function index2()
    {    $programas =$this ->loadModel('ProgPres');
       
        $programas = $this->paginate($this->ProgPres);

        $this->set(compact('programas'));
    }

    
    /**
     * View method
     *
     * @param string|null $id Programa id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $programa = $this->Programas->get($id, [
            'contain' => [],
        ]);

        $this->set('programa', $programa);
    }
    public function view2()
    {   
        $data =$this ->loadModel('ProgPres');
   
         $data = $this->paginate($this->ProgPres);
        $this->set('data', $data);
    }

    public function view3()
    {
        $data =$this ->loadModel('SimPresProg');
   
         $data = $this->paginate($this->SimPresProg);
        $this->set('data', $data);
    }

    public function simu($id = null,$id2 = null,$id3 = null,$id4 = null,$id5 = null,$id6 = null,$id7 = null,$id8 = null,$id9 = null,$id10 = null,$id11 = null,
        $id12 = null,$id13 = null,$id14 = null,$id15 = null)
    {   
        $programa = $this->Items->get($id, [
            'contain' => [],
        ]);
        $programa->sim_total=$id2;
        $programa->sim_enero=$id4;
        $programa->sim_febrero=$id5;
        $programa->sim_marzo=$id6;
        $programa->sim_abril=$id7;
        $programa->sim_mayo=$id8;
        $programa->sim_junio=$id9;
        $programa->sim_julio=$id10;
        $programa->sim_agosto=$id11;
        $programa->sim_septiembre=$id12;
        $programa->sim_octubre=$id13;
        $programa->sim_noviembre=$id14;
        $programa->sim_diciembre=$id15;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $programa = $this->Items->patchEntity($programa, $this->request->getData());
            $suma=$programa->sim_enero+$programa->sim_febrero+$programa->sim_marzo+$programa->sim_abril+$programa->sim_mayo+$programa->sim_junio+
            $programa->sim_julio+$programa->sim_agosto+$programa->sim_septiembre+$programa->sim_octubre+$programa->sim_noviembre+$programa->sim_diciembre;
            if($programa->sim_total ==NULL)
                { $programa->sim_total=$suma;
                if ($this->Items->save($programa)) {
                $this->Flash->success(__('Los datos han sido enviados para simular.'));

                return $this->redirect(['action' => 'view3']);
              }
                }
            
            if($programa->sim_total==$suma )
            { if ($this->Items->save($programa)) {
                $this->Flash->success(__('Los datos han sido enviados para simular.'));

                return $this->redirect(['action' => 'view3']);
            }
              else{  $this->Flash->error(__('Hay erros con los datos entregados, intentelo denuevo'));   }
            }
            
            else{$this->Flash->error(__('La suma de los Presp. mensuales es distinto al Presp. Anual.'));     }
        }
        $this->set('id2',$id2);
        $this->set('id3',$id3);
        $this->set(compact('programa'));
    }
    public function detalle($id=null,$id2=null)
    {   
        $data =$this ->loadModel('ProgMesDet');
            
        $data = $this->paginate($this->ProgMesDet->find('all', array('conditions'=>array('prog_id'=> $id))));
 
       $this->set('id', $id);
        $this->set('id2', $id2);
        $this->set('data', $data);

   }
   public function detalle2($id=null,$id2=null)
    {   
        $data =$this ->loadModel('SimMesDet');
            
        $data = $this->paginate($this->SimMesDet->find('all', array('conditions'=>array('prog_id'=> $id))));
 
       $this->set('id', $id);
        $this->set('id2', $id2);
        $this->set('data', $data);

   }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $programa = $this->Programas->newEmptyEntity();
        if ($this->request->is('post')) {
            $programa = $this->Programas->patchEntity($programa, $this->request->getData());
            if ($this->Programas->save($programa)) {
                $this->Flash->success(__('El Programa ha sido creado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El programa no ha podido ser creado.'));
        }
        $this->set(compact('programa'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Programa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $programa = $this->Programas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $programa = $this->Programas->patchEntity($programa, $this->request->getData());
            if ($this->Programas->save($programa)) {
                $this->Flash->success(__('El Programa ha sido editado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El Programa no ha podido ser editado.'));
        }
        $this->set(compact('programa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Programa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $programa = $this->Programas->get($id);
        if ($this->Programas->delete($programa)) {
            $this->Flash->success(__('El Programa ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El Programa no ha podido ser eliminado.'));
        }

        return $this->redirect(['action' => 'index']);
    }



    public function export() {
       
        $data1 ='';
        $data1 ='<table cellspacing="2" cellpadding="5" style="border:2px;text-align:center;"border="1" width="60%">';
        $data1 .=utf8_decode('<tr>
                <th style:"text-align:center;"> Programa</th>  
                <th style:"text-align:center;"> Presupuesto</th>   
                <th style:"text-align:center;"> Gasto</th> 
                <th style:"text-align:center;"> Saldo</th> 
                <th style:"text-align:center;"> % Saldo </th> 
                <th style:"text-align:center;"> Estado </th> 
                <th style:"text-align:center;"> Pres. Enero</th> 
                <th style:"text-align:center;"> Gasto Enero </th> 
                <th style:"text-align:center;"> Saldo Enero</th> 
                <th style:"text-align:center;"> % Saldo Enero</th> 
                <th style:"text-align:center;"> Estado Enero </th> 
                 <th style:"text-align:center;"> Pres. Febrero</th> 
                <th style:"text-align:center;"> Gasto Febrero </th> 
                <th style:"text-align:center;"> Saldo Febrero</th> 
                <th style:"text-align:center;"> % Saldo Febrero</th> 
                <th style:"text-align:center;"> Estado Febrero </th> 
                 <th style:"text-align:center;"> Pres. Marzo</th> 
                <th style:"text-align:center;"> Gasto Marzo </th> 
                <th style:"text-align:center;"> Saldo Marzo</th> 
                <th style:"text-align:center;"> % Saldo Marzo</th> 
                <th style:"text-align:center;"> Estado Marzo </th> 
                 <th style:"text-align:center;"> Pres. Abril</th> 
                <th style:"text-align:center;"> Gasto Abril </th> 
                <th style:"text-align:center;"> Saldo Abril</th> 
                <th style:"text-align:center;"> % Saldo Abril</th> 
                <th style:"text-align:center;"> Estado Abril </th> 
                 <th style:"text-align:center;"> Pres. Mayo</th> 
                <th style:"text-align:center;"> Gasto Mayo </th> 
                <th style:"text-align:center;"> Saldo Mayo</th> 
                <th style:"text-align:center;"> % Saldo Mayo</th> 
                <th style:"text-align:center;"> Estado Mayo </th> 
                 <th style:"text-align:center;"> Pres. Junio</th> 
                <th style:"text-align:center;"> Gasto Junio </th> 
                <th style:"text-align:center;"> Saldo Junio</th> 
                <th style:"text-align:center;"> % Saldo Junio</th> 
                <th style:"text-align:center;"> Estado Junio </th> 
                 <th style:"text-align:center;"> Pres. Julio</th> 
                <th style:"text-align:center;"> Gasto Julio </th> 
                <th style:"text-align:center;"> Saldo Julio</th> 
                <th style:"text-align:center;"> % Saldo Julio</th> 
                <th style:"text-align:center;"> Estado Julio </th> 
                 <th style:"text-align:center;"> Pres. Agosto</th> 
                <th style:"text-align:center;"> Gasto Agosto </th> 
                <th style:"text-align:center;"> Saldo Agosto</th> 
                <th style:"text-align:center;"> % Saldo Agosto</th> 
                <th style:"text-align:center;"> Estado Agosto</th> 
                 <th style:"text-align:center;"> Pres. Septiembre</th> 
                <th style:"text-align:center;"> Gasto Septiembre </th> 
                <th style:"text-align:center;"> Saldo Septiembre</th> 
                <th style:"text-align:center;"> % Saldo Septiembre</th> 
                <th style:"text-align:center;"> Estado Septiembre</th> 
                 <th style:"text-align:center;"> Pres. Octubre</th> 
                <th style:"text-align:center;"> Gasto Octubre </th> 
                <th style:"text-align:center;"> Saldo Octubre</th> 
                <th style:"text-align:center;"> % Saldo Octubre</th> 
                <th style:"text-align:center;"> Estado Octubre </th> 
                 <th style:"text-align:center;"> Pres. Noviembre</th> 
                <th style:"text-align:center;"> Gasto Noviembre </th> 
                <th style:"text-align:center;"> Saldo Noviembre</th> 
                <th style:"text-align:center;"> % Saldo Noviembre</th> 
                <th style:"text-align:center;"> Estado Noviembre </th> 
                 <th style:"text-align:center;"> Pres. Diciembre</th> 
                <th style:"text-align:center;"> Gasto Diciembre </th> 
                <th style:"text-align:center;"> Saldo Diciembre</th> 
                <th style:"text-align:center;"> % Saldo Diciembre</th> 
                <th style:"text-align:center;"> Estado Diciembre </th> 
                </tr>');
        $result =$this ->loadModel('ProgPres');
        $data =$result->find();

           
       foreach ($data as $data) 
       {  $act=utf8_decode($data['prog_nombre']);
          $act2=$data['presupuesto_total'];
          $act3=$data['gasto_total'];
          $act4=$data['saldo_total'];
          $act5=round($data['porcentaje_total'],2);
          $act6=$data['estado_total'];
          $act7=$data['presupuesto_enero'];
          $act8=$data['gasto_enero'];
          $act9=$data['saldo_enero'];
          $act10=round($data['porcentaje_enero'],2);
          $act11=$data['estado_enero'];
          $act12=$data['presupuesto_febrero'];
          $act13=$data['gasto_febrero'];
          $act14=$data['saldo_febrero'];
          $act15=round($data['porcentaje_febrero'],2);
          $act16=$data['estado_febrero'];
          $act17=$data['presupuesto_marzo'];
          $act18=$data['gasto_marzo'];
          $act19=$data['saldo_marzo'];
          $act20=round($data['porcentaje_marzo'],2);
          $act21=$data['estado_marzo'];
          $act22=$data['presupuesto_abril'];
          $act23=$data['gasto_abril'];
          $act24=$data['saldo_abril'];
          $act25=round($data['porcentaje_abril'],2);
          $act26=$data['estado_abril'];
          $act27=$data['presupuesto_mayo'];
          $act28=$data['gasto_mayo'];
          $act29=$data['saldo_mayo'];
          $act30=round($data['porcentaje_mayo'],2);
          $act31=$data['estado_mayo'];
          $act32=$data['presupuesto_junio'];
          $act33=$data['gasto_junio'];
          $act34=$data['saldo_junio'];
          $act35=round($data['porcentaje_junio'],2);
          $act36=$data['estado_junio'];
          $act37=$data['presupuesto_julio'];
          $act38=$data['gasto_julio'];
          $act39=$data['saldo_julio'];
          $act40=round($data['porcentaje_julio'],2);
          $act41=$data['estado_julio'];
          $act42=$data['presupuesto_agosto'];
          $act43=$data['gasto_agosto'];
          $act44=$data['saldo_agosto'];
          $act45=round($data['porcentaje_agosto'],2);
          $act46=$data['estado_agosto'];
          $act47=$data['presupuesto_septiembre'];
          $act48=$data['gasto_septiembre'];
          $act49=$data['saldo_septiembre'];
          $act50=round($data['porcentaje_septiembre'],2);
          $act51=$data['estado_septiembre'];
          $act52=$data['presupuesto_octubre'];
          $act53=$data['gasto_octubre'];
          $act54=$data['saldo_octubre'];
          $act55=round($data['porcentaje_octubre'],2);
          $act56=$data['estado_octubre'];
          $act57=$data['presupuesto_noviembre'];
          $act58=$data['gasto_noviembre'];
          $act59=$data['saldo_noviembre'];
          $act60=round($data['porcentaje_noviembre'],2);
          $act61=$data['estado_noviembre'];
          $act62=$data['presupuesto_diciembre'];
          $act63=$data['gasto_diciembre'];
          $act64=$data['saldo_diciembre'];
          $act65=round($data['porcentaje_diciembre'],2);
          $act66=$data['estado_diciembre'];
          $data1.='<tr>
                <th style:"text-align:center;">'.$act.'</th>   
                <th style:"text-align:center;">'.$act2.'</th>   
                <th style:"text-align:center;">'.$act3.'</th>     
                <th style:"text-align:center;">'.$act4.'</th> 
                <th style:"text-align:center;">'.$act5.'%</th>
                <th style:"text-align:center;">'.$act6.'</th>
                <th style:"text-align:center;">'.$act7.'</th>     
                <th style:"text-align:center;">'.$act8.'</th>   
                <th style:"text-align:center;">'.$act9.'</th>     
                <th style:"text-align:center;">'.$act10.'%</th> 
                <th style:"text-align:center;">'.$act11.'</th> 
                <th style:"text-align:center;">'.$act12.'</th>     
                <th style:"text-align:center;">'.$act13.'</th> 
                <th style:"text-align:center;">'.$act14.'</th>    
                <th style:"text-align:center;">'.$act15.'%</th> 
                <th style:"text-align:center;">'.$act16.'</th>    
                <th style:"text-align:center;">'.$act17.'</th>
                <th style:"text-align:center;">'.$act18.'</th>     
                <th style:"text-align:center;">'.$act19.'</th>   
                <th style:"text-align:center;">'.$act20.'%</th>     
                <th style:"text-align:center;">'.$act21.'</th> 
                <th style:"text-align:center;">'.$act22.'</th>
                <th style:"text-align:center;">'.$act23.'</th>
                <th style:"text-align:center;">'.$act24.'</th>     
                <th style:"text-align:center;">'.$act25.'%</th>   
                <th style:"text-align:center;">'.$act26.'</th>     
                <th style:"text-align:center;">'.$act27.'</th> 
                <th style:"text-align:center;">'.$act28.'</th> 
                <th style:"text-align:center;">'.$act29.'</th>     
                <th style:"text-align:center;">'.$act30.'%</th> 
                <th style:"text-align:center;">'.$act31.'</th>    
                <th style:"text-align:center;">'.$act32.'</th> 
                <th style:"text-align:center;">'.$act33.'</th> 
                <th style:"text-align:center;">'.$act34.'</th>    
                <th style:"text-align:center;">'.$act35.'%</th> 
                <th style:"text-align:center;">'.$act36.'</th>    
                <th style:"text-align:center;">'.$act37.'</th>
                <th style:"text-align:center;">'.$act38.'</th>     
                <th style:"text-align:center;">'.$act39.'</th>   
                <th style:"text-align:center;">'.$act40.'%</th>     
                <th style:"text-align:center;">'.$act41.'</th> 
                <th style:"text-align:center;">'.$act42.'</th>
                <th style:"text-align:center;">'.$act43.'</th>
                <th style:"text-align:center;">'.$act44.'</th>     
                <th style:"text-align:center;">'.$act45.'%</th>   
                <th style:"text-align:center;">'.$act46.'</th>     
                <th style:"text-align:center;">'.$act47.'</th> 
                <th style:"text-align:center;">'.$act48.'</th> 
                <th style:"text-align:center;">'.$act49.'</th>     
                <th style:"text-align:center;">'.$act50.'%</th> 
                <th style:"text-align:center;">'.$act51.'</th>    
                <th style:"text-align:center;">'.$act52.'</th> 
                <th style:"text-align:center;">'.$act53.'</th> 
                <th style:"text-align:center;">'.$act54.'</th>    
                <th style:"text-align:center;">'.$act55.'%</th> 
                <th style:"text-align:center;">'.$act56.'</th>    
                <th style:"text-align:center;">'.$act57.'</th>
                <th style:"text-align:center;">'.$act58.'</th>     
                <th style:"text-align:center;">'.$act59.'</th>   
                <th style:"text-align:center;">'.$act60.'%</th>     
                <th style:"text-align:center;">'.$act61.'</th> 
                <th style:"text-align:center;">'.$act62.'</th>
                <th style:"text-align:center;">'.$act63.'</th>
                <th style:"text-align:center;">'.$act64.'</th>     
                <th style:"text-align:center;">'.$act65.'%</th>   
                <th style:"text-align:center;">'.$act66.'</th>                       
                </tr>';
           
       }

       


       $data1 .='</table>';

       //excel export
       $file = "Ejecucion_Presupuestaria_Programas.xls"; 
       header('Content-Encoding: UTF-8');
       header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
       header("Content-Disposition: attachment; filename=$file");
       echo $data1;
       die;

    }

    public function export2($id=null,$id2=null) {
       
        $data1 ='';
        $data1 ='<table cellspacing="2" cellpadding="5" style="border:2px;text-align:center;"border="1" width="60%">';
        $data1 .=utf8_decode('<tr>
                <th style:"text-align:center;"> Mes</th>  
                <th style:"text-align:center;"> Presupuesto</th>   
                <th style:"text-align:center;"> Gasto</th> 
                <th style:"text-align:center;"> Saldo</th> 
                <th style:"text-align:center;"> % Saldo </th> 
                <th style:"text-align:center;"> Estado </th> 
                
                </tr>');
        $result =$this ->loadModel('ProgMesDet');
        $data =$result->find('all', array('conditions'=>array('prog_id'=> $id2),));
        $result2 =$this ->loadModel('ProgPres');
        $data2 =$result2->find('all', array('conditions'=>array('prog_id'=> $id2),));
           
       foreach ($data as $data) 
       {  $act=utf8_decode($data['mes_nombre']);
          $act2=$data['presupuesto_mensual'];
          $act3=$data['gasto_mesnual'];
          $act4=$data['saldo_mensual'];
          $act5=round($data['porcentaje_mes'],2);
          $act6=$data['estado_mes'];
         
          $data1.='<tr>
                <th style:"text-align:center;">'.$act.'</th>   
                <th style:"text-align:center;">'.$act2.'</th>   
                <th style:"text-align:center;">'.$act3.'</th>     
                <th style:"text-align:center;">'.$act4.'</th> 
                <th style:"text-align:center;">'.$act5.'%</th>    
                <th style:"text-align:center;">'.$act6.'</th>                            
                </tr>';
           
       }
       foreach ($data2 as $data2) 
       { 
          $acp2=$data2['presupuesto_total'];
          $acp3=$data2['gasto_total'];
          $acp4=$data2['saldo_total'];
          $acp5=round($data2['porcentaje_total'],2);
          $acp6=$data2['estado_total'];
         
          $data1.='<tr>
                <th style:"text-align:center;">Total</th>   
                <th style:"text-align:center;">'.$acp2.'</th>   
                <th style:"text-align:center;">'.$acp3.'</th>     
                <th style:"text-align:center;">'.$acp4.'</th> 
                <th style:"text-align:center;">'.$acp5.'%</th>    
                <th style:"text-align:center;">'.$acp6.'</th>                            
                </tr>';
           
       }

       


       $data1 .='</table>';

       //excel export
       $file = "Ejecucion_Presupuestaria_Programa:".$id.".xls"; 
       header('Content-Encoding: UTF-8');
       header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
       header("Content-Disposition: attachment; filename=$file");
       echo $data1;
       die;

    }

     public function export3() {
       
        $data1 ='';
        $data1 ='<table cellspacing="2" cellpadding="5" style="border:2px;text-align:center;"border="1" width="60%">';
        $data1 .=utf8_decode('<tr>
                <th style:"text-align:center;"> Programa</th>  
                <th style:"text-align:center;"> Presupuesto</th>   
                <th style:"text-align:center;"> Gasto</th> 
                <th style:"text-align:center;"> Saldo</th> 
                <th style:"text-align:center;"> % Saldo </th> 
                <th style:"text-align:center;"> Estado </th> 
                <th style:"text-align:center;"> Pres. Enero</th> 
                <th style:"text-align:center;"> Gasto Enero </th> 
                <th style:"text-align:center;"> Saldo Enero</th> 
                <th style:"text-align:center;"> % Saldo Enero</th> 
                <th style:"text-align:center;"> Estado Enero </th> 
                 <th style:"text-align:center;"> Pres. Febrero</th> 
                <th style:"text-align:center;"> Gasto Febrero </th> 
                <th style:"text-align:center;"> Saldo Febrero</th> 
                <th style:"text-align:center;"> % Saldo Febrero</th> 
                <th style:"text-align:center;"> Estado Febrero </th> 
                 <th style:"text-align:center;"> Pres. Marzo</th> 
                <th style:"text-align:center;"> Gasto Marzo </th> 
                <th style:"text-align:center;"> Saldo Marzo</th> 
                <th style:"text-align:center;"> % Saldo Marzo</th> 
                <th style:"text-align:center;"> Estado Marzo </th> 
                 <th style:"text-align:center;"> Pres. Abril</th> 
                <th style:"text-align:center;"> Gasto Abril </th> 
                <th style:"text-align:center;"> Saldo Abril</th> 
                <th style:"text-align:center;"> % Saldo Abril</th> 
                <th style:"text-align:center;"> Estado Abril </th> 
                 <th style:"text-align:center;"> Pres. Mayo</th> 
                <th style:"text-align:center;"> Gasto Mayo </th> 
                <th style:"text-align:center;"> Saldo Mayo</th> 
                <th style:"text-align:center;"> % Saldo Mayo</th> 
                <th style:"text-align:center;"> Estado Mayo </th> 
                 <th style:"text-align:center;"> Pres. Junio</th> 
                <th style:"text-align:center;"> Gasto Junio </th> 
                <th style:"text-align:center;"> Saldo Junio</th> 
                <th style:"text-align:center;"> % Saldo Junio</th> 
                <th style:"text-align:center;"> Estado Junio </th> 
                 <th style:"text-align:center;"> Pres. Julio</th> 
                <th style:"text-align:center;"> Gasto Julio </th> 
                <th style:"text-align:center;"> Saldo Julio</th> 
                <th style:"text-align:center;"> % Saldo Julio</th> 
                <th style:"text-align:center;"> Estado Julio </th> 
                 <th style:"text-align:center;"> Pres. Agosto</th> 
                <th style:"text-align:center;"> Gasto Agosto </th> 
                <th style:"text-align:center;"> Saldo Agosto</th> 
                <th style:"text-align:center;"> % Saldo Agosto</th> 
                <th style:"text-align:center;"> Estado Agosto</th> 
                 <th style:"text-align:center;"> Pres. Septiembre</th> 
                <th style:"text-align:center;"> Gasto Septiembre </th> 
                <th style:"text-align:center;"> Saldo Septiembre</th> 
                <th style:"text-align:center;"> % Saldo Septiembre</th> 
                <th style:"text-align:center;"> Estado Septiembre</th> 
                 <th style:"text-align:center;"> Pres. Octubre</th> 
                <th style:"text-align:center;"> Gasto Octubre </th> 
                <th style:"text-align:center;"> Saldo Octubre</th> 
                <th style:"text-align:center;"> % Saldo Octubre</th> 
                <th style:"text-align:center;"> Estado Octubre </th> 
                 <th style:"text-align:center;"> Pres. Noviembre</th> 
                <th style:"text-align:center;"> Gasto Noviembre </th> 
                <th style:"text-align:center;"> Saldo Noviembre</th> 
                <th style:"text-align:center;"> % Saldo Noviembre</th> 
                <th style:"text-align:center;"> Estado Noviembre </th> 
                 <th style:"text-align:center;"> Pres. Diciembre</th> 
                <th style:"text-align:center;"> Gasto Diciembre </th> 
                <th style:"text-align:center;"> Saldo Diciembre</th> 
                <th style:"text-align:center;"> % Saldo Diciembre</th>               
                <th style:"text-align:center;"> Estado Diciembre </th> 
                </tr>');
        $result =$this ->loadModel('SimPresProg');
        $data =$result->find();

           
       foreach ($data as $data) 
       {  $act=utf8_decode($data['prog_nombre']);
          $act2=$data['presupuesto_total'];
          $act3=$data['gasto_total'];
          $act4=$data['saldo_total'];
          $act5=round($data['porcentaje_total'],2);
          $act6=$data['estado_total'];
          $act7=$data['presupuesto_enero'];
          $act8=$data['gasto_enero'];
          $act9=$data['saldo_enero'];
          $act10=round($data['porcentaje_enero'],2);
          $act11=$data['estado_enero'];
          $act12=$data['presupuesto_febrero'];
          $act13=$data['gasto_febrero'];
          $act14=$data['saldo_febrero'];
          $act15=round($data['porcentaje_febrero'],2);
          $act16=$data['estado_febrero'];
          $act17=$data['presupuesto_marzo'];
          $act18=$data['gasto_marzo'];
          $act19=$data['saldo_marzo'];
          $act20=round($data['porcentaje_marzo'],2);
          $act21=$data['estado_marzo'];
          $act22=$data['presupuesto_abril'];
          $act23=$data['gasto_abril'];
          $act24=$data['saldo_abril'];
          $act25=round($data['porcentaje_abril'],2);
          $act26=$data['estado_abril'];
          $act27=$data['presupuesto_mayo'];
          $act28=$data['gasto_mayo'];
          $act29=$data['saldo_mayo'];
          $act30=round($data['porcentaje_mayo'],2);
          $act31=$data['estado_mayo'];
          $act32=$data['presupuesto_junio'];
          $act33=$data['gasto_junio'];
          $act34=$data['saldo_junio'];
          $act35=round($data['porcentaje_junio'],2);
          $act36=$data['estado_junio'];
          $act37=$data['presupuesto_julio'];
          $act38=$data['gasto_julio'];
          $act39=$data['saldo_julio'];
          $act40=round($data['porcentaje_julio'],2);
          $act41=$data['estado_julio'];
          $act42=$data['presupuesto_agosto'];
          $act43=$data['gasto_agosto'];
          $act44=$data['saldo_agosto'];
          $act45=round($data['porcentaje_agosto'],2);
          $act46=$data['estado_agosto'];
          $act47=$data['presupuesto_septiembre'];
          $act48=$data['gasto_septiembre'];
          $act49=$data['saldo_septiembre'];
          $act50=round($data['porcentaje_septiembre'],2);
          $act51=$data['estado_septiembre'];
          $act52=$data['presupuesto_octubre'];
          $act53=$data['gasto_octubre'];
          $act54=$data['saldo_octubre'];
          $act55=round($data['porcentaje_octubre'],2);
          $act56=$data['estado_octubre'];
          $act57=$data['presupuesto_noviembre'];
          $act58=$data['gasto_noviembre'];
          $act59=$data['saldo_noviembre'];
          $act60=round($data['porcentaje_noviembre'],2);
          $act61=$data['estado_noviembre'];
          $act62=$data['presupuesto_diciembre'];
          $act63=$data['gasto_diciembre'];
          $act64=$data['saldo_diciembre'];
          $act65=round($data['porcentaje_diciembre'],2);
          $act66=$data['estado_diciembre'];
          $data1.='<tr>
                <th style:"text-align:center;">'.$act.'</th>   
                <th style:"text-align:center;">'.$act2.'</th>   
                <th style:"text-align:center;">'.$act3.'</th>     
                <th style:"text-align:center;">'.$act4.'</th> 
                <th style:"text-align:center;">'.$act5.'%</th>
                <th style:"text-align:center;">'.$act6.'</th>
                <th style:"text-align:center;">'.$act7.'</th>     
                <th style:"text-align:center;">'.$act8.'</th>   
                <th style:"text-align:center;">'.$act9.'</th>     
                <th style:"text-align:center;">'.$act10.'%</th> 
                <th style:"text-align:center;">'.$act11.'</th> 
                <th style:"text-align:center;">'.$act12.'</th>     
                <th style:"text-align:center;">'.$act13.'</th> 
                <th style:"text-align:center;">'.$act14.'</th>    
                <th style:"text-align:center;">'.$act15.'%</th> 
                <th style:"text-align:center;">'.$act16.'</th>    
                <th style:"text-align:center;">'.$act17.'</th>
                <th style:"text-align:center;">'.$act18.'</th>     
                <th style:"text-align:center;">'.$act19.'</th>   
                <th style:"text-align:center;">'.$act20.'%</th>     
                <th style:"text-align:center;">'.$act21.'</th> 
                <th style:"text-align:center;">'.$act22.'</th>
                <th style:"text-align:center;">'.$act23.'</th>
                <th style:"text-align:center;">'.$act24.'</th>     
                <th style:"text-align:center;">'.$act25.'%</th>   
                <th style:"text-align:center;">'.$act26.'</th>     
                <th style:"text-align:center;">'.$act27.'</th> 
                <th style:"text-align:center;">'.$act28.'</th> 
                <th style:"text-align:center;">'.$act29.'</th>     
                <th style:"text-align:center;">'.$act30.'%</th> 
                <th style:"text-align:center;">'.$act31.'</th>    
                <th style:"text-align:center;">'.$act32.'</th> 
                <th style:"text-align:center;">'.$act33.'</th> 
                <th style:"text-align:center;">'.$act34.'</th>    
                <th style:"text-align:center;">'.$act35.'%</th> 
                <th style:"text-align:center;">'.$act36.'</th>    
                <th style:"text-align:center;">'.$act37.'</th>
                <th style:"text-align:center;">'.$act38.'</th>     
                <th style:"text-align:center;">'.$act39.'</th>   
                <th style:"text-align:center;">'.$act40.'%</th>     
                <th style:"text-align:center;">'.$act41.'</th> 
                <th style:"text-align:center;">'.$act42.'</th>
                <th style:"text-align:center;">'.$act43.'</th>
                <th style:"text-align:center;">'.$act44.'</th>     
                <th style:"text-align:center;">'.$act45.'%</th>   
                <th style:"text-align:center;">'.$act46.'</th>     
                <th style:"text-align:center;">'.$act47.'</th> 
                <th style:"text-align:center;">'.$act48.'</th> 
                <th style:"text-align:center;">'.$act49.'</th>     
                <th style:"text-align:center;">'.$act50.'%</th> 
                <th style:"text-align:center;">'.$act51.'</th>    
                <th style:"text-align:center;">'.$act52.'</th> 
                <th style:"text-align:center;">'.$act53.'</th> 
                <th style:"text-align:center;">'.$act54.'</th>    
                <th style:"text-align:center;">'.$act55.'%</th> 
                <th style:"text-align:center;">'.$act56.'</th>    
                <th style:"text-align:center;">'.$act57.'</th>
                <th style:"text-align:center;">'.$act58.'</th>     
                <th style:"text-align:center;">'.$act59.'</th>   
                <th style:"text-align:center;">'.$act60.'%</th>     
                <th style:"text-align:center;">'.$act61.'</th> 
                <th style:"text-align:center;">'.$act62.'</th>
                <th style:"text-align:center;">'.$act63.'</th>
                <th style:"text-align:center;">'.$act64.'</th>     
                <th style:"text-align:center;">'.$act65.'%</th>   
                <th style:"text-align:center;">'.$act66.'</th>                       
                </tr>';
           
       }

       


       $data1 .='</table>';

       //excel export
       $file = "Simulación_Presupuestaria_Programas.xls"; 
       header('Content-Encoding: UTF-8');
       header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
       header("Content-Disposition: attachment; filename=$file");
       echo $data1;
       die;

    }
 public function export4($id=null,$id2=null) {
       
        $data1 ='';
        $data1 ='<table cellspacing="2" cellpadding="5" style="border:2px;text-align:center;"border="1" width="60%">';
        $data1 .=utf8_decode('<tr>
                <th style:"text-align:center;"> Mes</th>  
                <th style:"text-align:center;"> Presupuesto</th>   
                <th style:"text-align:center;"> Gasto</th> 
                <th style:"text-align:center;"> Saldo</th> 
                <th style:"text-align:center;"> % Saldo </th> 
                <th style:"text-align:center;"> Estado </th> 
                
                </tr>');
        $result =$this ->loadModel('SimMesDet');
        $data =$result->find('all', array('conditions'=>array('prog_id'=> $id2),));
        $result2 =$this ->loadModel('SimPresProg');
        $data2 =$result2->find('all', array('conditions'=>array('prog_id'=> $id2),));
           
       foreach ($data as $data) 
       {  $act=utf8_decode($data['mes_nombre']);
          $act2=$data['presupuesto_mensual'];
          $act3=$data['gasto_mesnual'];
          $act4=$data['saldo_mensual'];
          $act5=round($data['porcentaje_mes'],2);
          $act6=$data['estado_mes'];
         
          $data1.='<tr>
                <th style:"text-align:center;">'.$act.'</th>   
                <th style:"text-align:center;">'.$act2.'</th>   
                <th style:"text-align:center;">'.$act3.'</th>     
                <th style:"text-align:center;">'.$act4.'</th> 
                <th style:"text-align:center;">'.$act5.'%</th>    
                <th style:"text-align:center;">'.$act6.'</th>                            
                </tr>';
           
       }
       foreach ($data2 as $data2) 
       { 
          $acp2=$data2['presupuesto_total'];
          $acp3=$data2['gasto_total'];
          $acp4=$data2['saldo_total'];
          $acp5=round($data2['porcentaje_total'],2);
          $acp6=$data2['estado_total'];
         
          $data1.='<tr>
                <th style:"text-align:center;">Total</th>   
                <th style:"text-align:center;">'.$acp2.'</th>   
                <th style:"text-align:center;">'.$acp3.'</th>     
                <th style:"text-align:center;">'.$acp4.'</th> 
                <th style:"text-align:center;">'.$acp5.'%</th>    
                <th style:"text-align:center;">'.$acp6.'</th>                            
                </tr>';
           
       }

       


       $data1 .='</table>';

       //excel export
       $file = "Simulacion_Presupuestaria_Programa:".$id.".xls"; 
       header('Content-Encoding: UTF-8');
       header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
       header("Content-Disposition: attachment; filename=$file");
       echo $data1;
       die;

}
    
}
