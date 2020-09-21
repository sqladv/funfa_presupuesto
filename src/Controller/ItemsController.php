<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 *
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

     public function cone()
    {
        $connection = ConnectionManager::get('test');
       $data = $connection->execute('SELECT auxiliar.razon_social as auxiliar,auxiliar.nombres as nombres,solicitud_pago.solicitud_pago_id,programa.nombre as programa,tipo_agrupacion.descripcion as tipo_agru,agrupacion_item.descripcion as agrupacion,
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
where estado_solicitud.estado_solicitud_id=solicitud_pago.estado_solicitud_id AND
programa.programa_id=solicitud_pago.programa_id AND
forma_pago.forma_pago_id=solicitud_pago.forma_pago_id AND
solicitud_pago.tipo_solicitud_pago_id=tipo_solicitud_pago.tipo_solicitud_pago_id AND
auxiliar.auxiliar_id=solicitud_pago.auxiliar_id AND
users.id=solicitud_pago.user_solicitante_id 
order by users.name asc,solicitud_pago.solicitud_pago_id asc');
        
    $this->set('data',$data);
    }

    public function cone2()
    {
        $connection = ConnectionManager::get('test');
       $data = $connection->execute('SELECT  detalle_rendicion_fondo.descripcion_labor,detalle_rendicion_fondo.detalle_rendicion_fondo_id,item.codigo,item.descripcion,detalle_rendicion_fondo.monto,solicitud_fondo.solicitud_fondo_id,programa.nombre as programa,centro_primario.nombre as centro_primario,tipo_solicitud_fondo.descripcion as tipo_sol_fondo,estado_solicitud.descripcion as estado,
solicitud_fondo.gastos_programaticos,solicitud_fondo.gastos_administracion,solicitud_fondo.gastos_inversion,solicitud_fondo.justificacion_gasto,users.name as usuario_solicitante,
month(solicitud_fondo.fecha_transferencia) as fecha_trans,solicitud_fondo.fecha_solicitud as fecha_solicitud,solicitud_fondo.created_at as fecha_creacion_solicitud
FROM rendiciones_funfa.tipo_solicitud_fondo,rendiciones_funfa.users,rendiciones_funfa.programa,rendiciones_funfa.centro_primario,rendiciones_funfa.estado_solicitud,rendiciones_funfa.rendicion_fondo,rendiciones_funfa.detalle_rendicion_fondo,
rendiciones_funfa.solicitud_fondo, rendiciones_funfa.item 
where solicitud_fondo.tipo_solicitud_fondo_id=tipo_solicitud_fondo.tipo_solicitud_fondo_id and
users.id=solicitud_fondo.user_solicitante_id and
programa.programa_id=solicitud_fondo.programa_id and
centro_primario.centro_primario_id=solicitud_fondo.centro_primario_id and
solicitud_fondo.solicitud_fondo_id = rendicion_fondo.solicitud_fondo_id and
rendicion_fondo.rendicion_fondo_id = detalle_rendicion_fondo.rendicion_fondo_id and
item.item_id = detalle_rendicion_fondo.item_id and
estado_solicitud.estado_solicitud_id=solicitud_fondo.estado_solicitud_id 
order by  solicitud_fondo.solicitud_fondo_id asc');
        
    $this->set('data',$data);
    }

    public function centros($id=null,$id2=null,$id3=null,$id4=null)
    {
        $connection = ConnectionManager::get('default');
        
    
    $data = $connection->execute(" SELECT * FROM(SELECT items.item_nombre,items.item_cod,case when '$id2'=1 then items.gasto_enero when '$id2'=2 then items.gasto_febrero when '$id2'=3 then items.gasto_marzo when '$id2'=4 then items.gasto_abril when '$id2'=5 then items.gasto_mayo when '$id2'=6 then items.gasto_junio when '$id2'=7 then items.gasto_julio when '$id2'=8 then items.gasto_agosto when '$id2'=9 then items.gasto_septiembre when '$id2'=10 then items.gasto_octubre when '$id2'=11 then items.gasto_noviembre else items.gasto_diciembre end as monto from programas,agrupaciones,items
      where items.item_agru_id=agrupaciones.agru_id and
      programas.prog_id=agrupaciones.agru_prog_id and
      programas.prog_id='$id') cosa
      where cosa.monto!=0
      order by cosa.item_cod asc");
    
     $this->set('id2',$id2);
     $this->set('id3',$id3);
    $this->set('id4',$id4);   
    $this->set('data',$data);
    }

    public function rendicion($id=null,$id2=null,$id3=null,$id4=null)
    {
        $connection = ConnectionManager::get('default');
        
    
    $data = $connection->execute(" SELECT * FROM(SELECT items.item_nombre,items.item_cod,case when '$id2'=1 then items.gasto_ren_enero when '$id2'=2 then items.gasto_ren_febrero when '$id2'=3 then items.gasto_ren_marzo when '$id2'=4 then items.gasto_ren_abril when '$id2'=5 then items.gasto_ren_mayo when '$id2'=6 then items.gasto_ren_junio when '$id2'=7 then items.gasto_ren_julio when '$id2'=8 then items.gasto_ren_agosto when '$id2'=9 then items.gasto_ren_septiembre when '$id2'=10 then items.gasto_ren_octubre when '$id2'=11 then items.gasto_ren_noviembre else items.gasto_ren_diciembre end as monto from programas,agrupaciones,items
      where items.item_agru_id=agrupaciones.agru_id and
      programas.prog_id=agrupaciones.agru_prog_id and
      programas.prog_id='$id') cosa
      where cosa.monto!=0
      order by cosa.item_cod asc");
    
     $this->set('id2',$id2);
     $this->set('id3',$id3);
    $this->set('id4',$id4);   
    $this->set('data',$data);
    }

public function centros2($id=null,$id2=null,$id3=null,$id4=null)
    {
        $connection = ConnectionManager::get('test');
        
      $data = $connection->execute("SELECT cosa3.programa,sum(cosa3.monto) as monto,cosa3.cod_item,cosa3.item,cosa3.centro_primario,cosa3.fecha_pago from(select * from(SELECT programa.nombre as programa,
item.descripcion as item,item.codigo as cod_item,sum(detalle_solicitud_pago.monto) as monto,centro_primario.nombre as centro_primario,month(solicitud_pago.fecha_solicitud) as fecha_pago
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
where estado_solicitud.estado_solicitud_id=solicitud_pago.estado_solicitud_id AND
programa.programa_id=solicitud_pago.programa_id AND
estado_solicitud.estado_solicitud_id in (5,7,8,9)  and 
solicitud_pago.programa_id in(3,4,6) and
month(solicitud_pago.fecha_solicitud)= '$id2' and
item.codigo='$id' and
forma_pago.forma_pago_id=solicitud_pago.forma_pago_id AND
solicitud_pago.tipo_solicitud_pago_id=tipo_solicitud_pago.tipo_solicitud_pago_id AND
auxiliar.auxiliar_id=solicitud_pago.auxiliar_id AND
users.id=solicitud_pago.user_solicitante_id 
group by centro_primario.nombre,item.codigo)cosa
union all 
select * from (SELECT  programa.nombre as programa,item.descripcion as item,item.codigo as cod_item,SUM(detalle_rendicion_fondo.monto) as monto,centro_primario.nombre as centro_primario,
month(solicitud_fondo.fecha_transferencia) as fecha_pago
FROM rendiciones_funfa.tipo_solicitud_fondo,rendiciones_funfa.users,rendiciones_funfa.programa,rendiciones_funfa.centro_primario,rendiciones_funfa.estado_solicitud,rendiciones_funfa.rendicion_fondo,rendiciones_funfa.detalle_rendicion_fondo,
rendiciones_funfa.solicitud_fondo, rendiciones_funfa.item 
where solicitud_fondo.tipo_solicitud_fondo_id=tipo_solicitud_fondo.tipo_solicitud_fondo_id and
users.id=solicitud_fondo.user_solicitante_id and
programa.programa_id=solicitud_fondo.programa_id and
centro_primario.centro_primario_id=solicitud_fondo.centro_primario_id and
solicitud_fondo.solicitud_fondo_id = rendicion_fondo.solicitud_fondo_id and
solicitud_fondo.programa_id in (3,4,6) and 
item.codigo!=34 and
item.codigo!=44 and
item.codigo!='1.4.1.13' and
month(solicitud_fondo.fecha_transferencia)= '$id2' and
item.codigo='$id' and
estado_solicitud.descripcion='Transferida' and
rendicion_fondo.rendicion_fondo_id = detalle_rendicion_fondo.rendicion_fondo_id and
item.item_id = detalle_rendicion_fondo.item_id and
estado_solicitud.estado_solicitud_id=solicitud_fondo.estado_solicitud_id 
group by item.codigo,programa.nombre,centro_primario.nombre,month(solicitud_fondo.fecha_transferencia)
union all
SELECT  programa.nombre as programa,item.descripcion as item,item.codigo as cod_item,SUM(detalle_rendicion_fondo.monto) as monto,centro_primario.nombre as centro_primario,
month(solicitud_fondo.fecha_transferencia) as fecha_pago
FROM rendiciones_funfa.tipo_solicitud_fondo,rendiciones_funfa.users,rendiciones_funfa.programa,rendiciones_funfa.centro_primario,rendiciones_funfa.estado_solicitud,rendiciones_funfa.rendicion_fondo,rendiciones_funfa.detalle_rendicion_fondo,
rendiciones_funfa.solicitud_fondo, rendiciones_funfa.item 
where solicitud_fondo.tipo_solicitud_fondo_id=tipo_solicitud_fondo.tipo_solicitud_fondo_id and
users.id=solicitud_fondo.user_solicitante_id and
programa.programa_id=solicitud_fondo.programa_id and
centro_primario.centro_primario_id=solicitud_fondo.centro_primario_id and
solicitud_fondo.solicitud_fondo_id = rendicion_fondo.solicitud_fondo_id and
solicitud_fondo.programa_id in (3,4,6) and 
month(solicitud_fondo.fecha_transferencia)= '$id2' and
item.codigo='$id' and
centro_primario.nombre not LIKE 'Control de Gestión & TI'and
centro_primario.nombre not LIKE 'Casa Central' and
estado_solicitud.descripcion='Transferida' and
rendicion_fondo.rendicion_fondo_id = detalle_rendicion_fondo.rendicion_fondo_id and
item.item_id = detalle_rendicion_fondo.item_id and
estado_solicitud.estado_solicitud_id=solicitud_fondo.estado_solicitud_id 
group by item.codigo,programa.nombre,centro_primario.nombre,month(solicitud_fondo.fecha_transferencia))cosa2
group by cosa2.cod_item,cosa2.programa,cosa2.centro_primario,cosa2.fecha_pago) cosa3
group by cosa3.centro_primario,cosa3.cod_item 
order by centro_primario asc");
  
     
     $this->set('id3',$id3);
    $this->set('id4',$id4);   
    $this->set('data',$data);
    }

public function centros3($id=null,$id2=null,$id3=null,$id4=null,$id5=null)
    {
        $connection = ConnectionManager::get('test');
        
      $data = $connection->execute("SELECT cosa3.programa,cosa3.monto as monto,cosa3.cod_item,cosa3.item,cosa3.centro_primario,cosa3.t,cosa3.tipo,cosa3.name,cosa3.descripcion,cosa3.justificacion,cosa3.fecha_pago from(select * from
(SELECT programa.nombre as programa,
item.descripcion as item,item.codigo as cod_item,detalle_solicitud_pago.monto as monto,centro_primario.nombre as centro_primario,month(solicitud_pago.fecha_solicitud) as fecha_pago,
solicitud_pago.solicitud_pago_id as t,case when tipo_solicitud_pago.tipo_solicitud_pago_id=1 then 'Sol. Pago Proveedor' else 'Sol. Pago Honorario'end as tipo,users.name,forma_pago.descripcion,solicitud_pago.justificacion_pago as justificacion
FROM rendiciones_funfa.programa,rendiciones_funfa.forma_pago,rendiciones_funfa.tipo_solicitud_pago,
rendiciones_funfa.users,rendiciones_funfa.auxiliar,
rendiciones_funfa.estado_solicitud,rendiciones_funfa.solicitud_pago
LEFT JOIN rendiciones_funfa.centro_primario ON centro_primario.centro_primario_id = solicitud_pago.centro_primario_id
LEFT JOIN rendiciones_funfa.detalle_solicitud_pago ON solicitud_pago.solicitud_pago_id=detalle_solicitud_pago.solicitud_pago_id 
LEFT JOIN rendiciones_funfa.item ON item.item_id=detalle_solicitud_pago.item_id 
LEFT JOIN rendiciones_funfa.agrupacion_item ON item
.agrupacion_item_id=agrupacion_item.agrupacion_item_id
LEFT JOIN rendiciones_funfa.tipo_agrupacion ON tipo_agrupacion.tipo_agrupacion_id=agrupacion_item.tipo_agrupacion_id
LEFT JOIN rendiciones_funfa.tipo_documento_pago ON tipo_documento_pago.tipo_documento_pago_id=detalle_solicitud_pago.tipo_documento_pago_id
where estado_solicitud.estado_solicitud_id=solicitud_pago.estado_solicitud_id AND
programa.programa_id=solicitud_pago.programa_id AND
estado_solicitud.estado_solicitud_id in (5,7,8,9)  and 
solicitud_pago.programa_id in(3,4,6) and
month(solicitud_pago.fecha_solicitud)= '$id2' and
item.codigo='$id3' and
centro_primario.nombre='$id' and
forma_pago.forma_pago_id=solicitud_pago.forma_pago_id AND
solicitud_pago.tipo_solicitud_pago_id=tipo_solicitud_pago.tipo_solicitud_pago_id AND
auxiliar.auxiliar_id=solicitud_pago.auxiliar_id AND
users.id=solicitud_pago.user_solicitante_id )cosa
union all 
select * from (select cosa4.programa,cosa4.item,cosa4.cod_item,cosa4.monto,cosa4.centro_primario,cosa4.fecha_pago,cosa4.t,cosa4.tipo,cosa4.name,cosa4.descripcion,cosa4.justificacion from 
(SELECT  forma_pago.descripcion,detalle_rendicion_fondo.descripcion_labor as justificacion,users.name,'Sol. Fondo Rendida' as tipo,rendicion_fondo.solicitud_fondo_id as t,programa.nombre as programa,item.descripcion as item,item.codigo as cod_item,detalle_rendicion_fondo.monto as monto,centro_primario.nombre as centro_primario,
month(solicitud_fondo.fecha_transferencia) as fecha_pago
FROM rendiciones_funfa.forma_pago,rendiciones_funfa.tipo_solicitud_fondo,rendiciones_funfa.users,rendiciones_funfa.programa,rendiciones_funfa.centro_primario,rendiciones_funfa.estado_solicitud,rendiciones_funfa.rendicion_fondo,rendiciones_funfa.detalle_rendicion_fondo,rendiciones_funfa.solicitud_fondo,rendiciones_funfa.item 
where solicitud_fondo.tipo_solicitud_fondo_id=tipo_solicitud_fondo.tipo_solicitud_fondo_id and
users.id=solicitud_fondo.user_solicitante_id and
programa.programa_id=solicitud_fondo.programa_id and
centro_primario.centro_primario_id=solicitud_fondo.centro_primario_id and
solicitud_fondo.solicitud_fondo_id = rendicion_fondo.solicitud_fondo_id and
solicitud_fondo.programa_id in (3,4,6) and 
item.codigo!=34 and
item.codigo!=44 and
item.codigo!='1.4.1.13' and
month(solicitud_fondo.fecha_transferencia)= '$id2' and
item.codigo='$id3' and
centro_primario.nombre='$id' and
estado_solicitud.descripcion='Transferida' and
forma_pago.forma_pago_id =detalle_rendicion_fondo.forma_pago_id and
rendicion_fondo.rendicion_fondo_id = detalle_rendicion_fondo.rendicion_fondo_id and
item.item_id = detalle_rendicion_fondo.item_id and
estado_solicitud.estado_solicitud_id=solicitud_fondo.estado_solicitud_id 
union all
SELECT  forma_pago.descripcion,detalle_rendicion_fondo.descripcion_labor as justificacion,users.name,'Sol. Fondo Rendida' as tipo,rendicion_fondo.solicitud_fondo_id as t,programa.nombre as programa,item.descripcion as item,item.codigo as cod_item,detalle_rendicion_fondo.monto as monto,centro_primario.nombre as centro_primario,
month(solicitud_fondo.fecha_transferencia) as fecha_pago
FROM rendiciones_funfa.forma_pago,rendiciones_funfa.tipo_solicitud_fondo,rendiciones_funfa.users,rendiciones_funfa.programa,rendiciones_funfa.centro_primario,rendiciones_funfa.estado_solicitud,rendiciones_funfa.rendicion_fondo,rendiciones_funfa.detalle_rendicion_fondo,
rendiciones_funfa.solicitud_fondo, rendiciones_funfa.item 
where solicitud_fondo.tipo_solicitud_fondo_id=tipo_solicitud_fondo.tipo_solicitud_fondo_id and
users.id=solicitud_fondo.user_solicitante_id and
programa.programa_id=solicitud_fondo.programa_id and
centro_primario.centro_primario_id=solicitud_fondo.centro_primario_id and
solicitud_fondo.solicitud_fondo_id = rendicion_fondo.solicitud_fondo_id and
solicitud_fondo.programa_id in (3,4,6) and 
month(solicitud_fondo.fecha_transferencia)= '$id2' and
item.codigo='$id3' and
centro_primario.nombre='$id' and
estado_solicitud.descripcion='Transferida' and
centro_primario.nombre not LIKE 'Control de Gestión & TI'and
centro_primario.nombre not LIKE 'Casa Central' and
rendicion_fondo.rendicion_fondo_id = detalle_rendicion_fondo.rendicion_fondo_id and
forma_pago.forma_pago_id =detalle_rendicion_fondo.forma_pago_id and
item.item_id = detalle_rendicion_fondo.item_id and
estado_solicitud.estado_solicitud_id=solicitud_fondo.estado_solicitud_id ) cosa4
group by cosa4.monto,cosa4.justificacion)cosa2) cosa3
order by centro_primario asc");
  
     
     $this->set('id',$id);
     $this->set('id5',$id5);
    $this->set('id4',$id4);   
    $this->set('data',$data);
    }


public function solicitud($id=null,$id2=null,$id3=null,$id4=null)
    {
        $connection = ConnectionManager::get('test');
        
      $data = $connection->execute("SELECT final.* from
(select * from
(select *from(SELECT  solicitud_fondo.solicitud_fondo_id as id ,detalle_centro_secundario_item.monto as monto,
detalle_centro_secundario_item.detalle as detalle,
item.codigo as cod_item,item.descripcion as item,programa.nombre as programa,centro_primario.nombre as centro_primario,estado_solicitud.descripcion as estado,
users.name as usuario_solicitante,
solicitud_fondo.fecha_transferencia as trans,month(solicitud_fondo.fecha_solicitud) as fecha_solicitud,solicitud_fondo.created_at as fecha_creacion_solicitud
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
order by solicitud_fondo.solicitud_fondo_id asc)test
union all
select test2.* from
(SELECT cosa.* from
(select * from (SELECT solicitud_fondo.solicitud_fondo_id as id,detalle_gasto_administracion.monto as monto,detalle_gasto_administracion.detalle as detalle,item.codigo as cod_item,item.descripcion as item,programa.nombre as programa,centro_primario.nombre as centro_primario,estado_solicitud.descripcion as estado,
users.name as usuario_solicitante,
solicitud_fondo.fecha_transferencia as trans,month(solicitud_fondo.fecha_solicitud) as fecha_solicitud,solicitud_fondo.created_at as fecha_creacion_solicitud
FROM rendiciones_funfa.tipo_solicitud_fondo,rendiciones_funfa.users,rendiciones_funfa.programa,rendiciones_funfa.centro_primario,rendiciones_funfa.estado_solicitud,
rendiciones_funfa.item,rendiciones_funfa.detalle_gasto_administracion,rendiciones_funfa.solicitud_fondo 
where solicitud_fondo.tipo_solicitud_fondo_id=tipo_solicitud_fondo.tipo_solicitud_fondo_id and
users.id=solicitud_fondo.user_solicitante_id and
programa.programa_id=solicitud_fondo.programa_id and
centro_primario.centro_primario_id=solicitud_fondo.centro_primario_id and
detalle_gasto_administracion.solicitud_fondo_id = solicitud_fondo.solicitud_fondo_id and
item.item_id = detalle_gasto_administracion.item_id and
item.codigo=34 and
centro_primario.nombre not LIKE 'Control de Gestión & TI' and
centro_primario.nombre not LIKE 'Casa Central' and
solicitud_fondo.programa_id in (3,4,6)  and 
estado_solicitud.estado_solicitud_id=solicitud_fondo.estado_solicitud_id 
order by solicitud_fondo.solicitud_fondo_id asc) cosa4
union all
SELECT * from(SELECT solicitud_fondo.solicitud_fondo_id as id,detalle_gasto_administracion.monto as monto,detalle_gasto_administracion.detalle as detalle,item.codigo as cod_item,item.descripcion as nombre_item,programa.nombre as programa,centro_primario.nombre as centro_primario,estado_solicitud.descripcion as estado,
users.name as usuario_solicitante,
solicitud_fondo.fecha_transferencia as trans,month(solicitud_fondo.fecha_solicitud) as fecha_solicitud,solicitud_fondo.created_at as fecha_creacion_solicitud 
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
order by solicitud_fondo.solicitud_fondo_id asc ) cosa2 )cosa
order by cosa.id asc)test2)test3
union all
select cosa2.* from
(SELECT  solicitud_fondo.solicitud_fondo_id as id,detalle_gasto_inversion.monto as monto,detalle_gasto_inversion.detalle as detalle,item.codigo as cod_item,item.descripcion as item,programa.nombre as programa,centro_primario.nombre as centro_primario,estado_solicitud.descripcion as estado,
users.name as usuario_solicitante,
solicitud_fondo.fecha_transferencia as trans,month(solicitud_fondo.fecha_solicitud) as fecha_solicitud,solicitud_fondo.created_at as fecha_creacion_solicitud
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
order by solicitud_fondo.solicitud_fondo_id asc)cosa2)final
WHERE final.fecha_solicitud= '$id2' and
final.cod_item='$id'  ");
  
     
   $this->set('id3',$id3);
    $this->set('id4',$id4);
    $this->set('data',$data);
    }    
    public function index()
    {
        $this->paginate = [
            'contain' => ['Agrupaciones'],
        ];
        $items = $this->paginate($this->Items->find('all', ['order' => ['item_cod' => 'ASC' ]
      ]));

        $this->set(compact('items'));
    }
public function simu($id = null,$id2 = null,$id3 = null,$id4 = null,$id5 = null,$id6 = null,$id7 = null,$id8 = null,$id9 = null,$id10 = null,$id11 = null,
        $id12 = null,$id13 = null,$id14 = null,$id15 = null,$id16 = null,$id17 = null)
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

                return $this->redirect(['action' => 'view6',$id17,$id16]);
              }
                }
            
            if($programa->sim_total==$suma )
            { if ($this->Items->save($programa)) {
                $this->Flash->success(__('Los datos han sido enviados para simular.'));

                return $this->redirect(['action' => 'view6',$id17,$id16]);
            }
              else{  $this->Flash->error(__('Hay erros con los datos entregados, intentelo denuevo'));   }
            }
            
            else{$this->Flash->error(__('La suma de los Presp. mensuales es distinto al Presp. Anual.'));     }
        }
        $this->set('id2',$id2);
        $this->set('id3',$id3);
        $this->set('id16',$id16);
        $this->set('id17',$id17);
        $this->set(compact('programa'));
    }
    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Agrupaciones'],
        ]);

        $this->set('item', $item);
    }

    public function view2($id = null,$id2= null)
    {   
        
        
        $data = $this->paginate($this->Items->find('all', array('order' => ['item_cod' => 'ASC','Items.item_id' => 'ASC'],'conditions'=>array('item_agru_id'=> $id))));
 
        $this->set('data', $data);
        $this->set('id2', $id2);
        $this->set('id', $id);
    }
     public function view3($id=null,$id2=null)
    {   
        
        $this->paginate = [
            'contain' => ['Agrupaciones'],
        ];
        $items = $this->paginate($this->Items->find('all', [
    'order' => ['Items.item_cod' => 'ASC' ,'Items.item_id' => 'ASC'],'conditions'=>array('agru_prog_id'=> $id)
      ]));
        $this->set('id2', $id2);
        $this->set('id', $id);
        $this->set(compact('items'));
    }

    public function view4($id=null,$id2=null)
    {   
        
        $this->paginate = [
            'contain' => ['Agrupaciones'],
        ];
        $items = $this->paginate($this->Items->find('all', ['order' => ['item_cod' => 'ASC' ,'agru_cod' => 'ASC'],'conditions'=>array('agru_prog_id'=> $id) ]));
        $this->set('id2', $id2);
        $this->set('id', $id);
        $this->set(compact('items'));
    }

    public function view5($id=null,$id2=null,$id3=null)
    {   
        $data =$this ->loadModel('EjecPres');
   
         $data = $this->paginate($this->EjecPres->find('all', ['order' => ['item_cod' => 'ASC' ,'agru_cod' => 'ASC'], 'conditions'=>array('agru_cod'=> $id)]));
         $this->set('id', $id);
        $this->set('data', $data);
        $this->set('id2', $id2);
        $this->set('id3', $id3);

   }
   public function view6($id=null,$id2=null,$id3=null)
    {   
        $data =$this ->loadModel('SimEjecPres');

         $data = $this->paginate($this->SimEjecPres->find('all',  ['order' => ['item_cod' => 'ASC' ,'agru_cod' => 'ASC'], 'conditions'=>array('agru_cod'=> $id)]));

         $this->set('id', $id);
        $this->set('data', $data);
        $this->set('id2', $id2);
        $this->set('id3', $id3);


   }

   public function view7($id=null,$id2=null)
    {   
        $data =$this ->loadModel('AgruPres');
   
         $data = $this->paginate($this->AgruPres->find('all', ['order' => ['agru_cod' => 'ASC'], 'conditions'=>array('prog_id'=> $id)]));
         $this->set('id', $id);
        $this->set('data', $data);
        $this->set('id2', $id2);

   }

   public function view8($id=null,$id2=null)
    {   
        $data =$this ->loadModel('SimAgruPres');
   
         $data = $this->paginate($this->SimAgruPres->find('all', ['order' => ['agru_cod' => 'ASC'], 'conditions'=>array('prog_id'=> $id)]));
         $this->set('id', $id);
        $this->set('data', $data);
        $this->set('id2', $id2);

   }

   public function pro($id=null,$id2=null)
    {   
  
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('call act()');

         return $this->redirect(['action' => 'view6',$id,$id2]);
     

   }

   public function detalle($id=null,$id2=null,$id3=null)
    {   
        $data =$this ->loadModel('MesDet');
            
        $data = $this->paginate($this->MesDet->find('all', array('conditions'=>array('item_id'=> $id))));
 
        $this->set('id', $id);
        $this->set('id2', $id2);
        $this->set('id3', $id3);
        $this->set('data', $data);

   }
   public function detalle2($id=null,$id2=null)
    {   
        $data =$this ->loadModel('SimEjecPresDet');
            
        $data = $this->paginate($this->SimEjecPresDet->find('all', array('conditions'=>array('item_id'=> $id))));
 
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
        $item = $this->Items->newEmptyEntity();
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            if(!empty($item->item_pres_total))
            {
            $item->item_pres_enero = $item->item_pres_total/12;
            $item->item_pres_febrero = $item->item_pres_total/12;
            $item->item_pres_marzo = $item->item_pres_total/12;
            $item->item_pres_abril = $item->item_pres_total/12;
            $item->item_pres_mayo = $item->item_pres_total/12;
            $item->item_pres_junio = $item->item_pres_total/12;
            $item->item_pres_julio = $item->item_pres_total/12;
            $item->item_pres_agosto = $item->item_pres_total/12;
            $item->item_pres_septiembre = $item->item_pres_total/12;
            $item->item_pres_octubre = $item->item_pres_total/12;
            $item->item_pres_noviembre = $item->item_pres_total/12;
            $item->item_pres_diciembre = $item->item_pres_total/12;
            }
            if ($this->Items->save($item)) {
                $this->Flash->success(__('El Item ha sido creado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El Item no ha podido ser creado.'));
        }
        $agrupaciones = $this->Items->Agrupaciones->find('list', ['limit' => 200]);
        $año = array('2019'=>'2019','2020'=>'2020');
        $this->set(compact('item', 'agrupaciones','año'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function edit($id = null,$id2=null,$id3=null)
    {
        $item = $this->Items->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            if(!empty($item->item_pres_total))
            {
            $item->item_pres_enero = $item->item_pres_total/12;
            $item->item_pres_febrero = $item->item_pres_total/12;
            $item->item_pres_marzo = $item->item_pres_total/12;
            $item->item_pres_abril = $item->item_pres_total/12;
            $item->item_pres_mayo = $item->item_pres_total/12;
            $item->item_pres_junio = $item->item_pres_total/12;
            $item->item_pres_julio = $item->item_pres_total/12;
            $item->item_pres_agosto = $item->item_pres_total/12;
            $item->item_pres_septiembre = $item->item_pres_total/12;
            $item->item_pres_octubre = $item->item_pres_total/12;
            $item->item_pres_noviembre = $item->item_pres_total/12;
            $item->item_pres_diciembre = $item->item_pres_total/12;
            }
            if ($this->Items->save($item)) {
                $this->Flash->success(__('El Item ha sido editado.'));

                return $this->redirect(['action' => 'view2',$id3,$id2]);
            }
            $this->Flash->error(__('El Item no ha podido ser editado.'));
        }
        $agrupaciones = $this->Items->Agrupaciones->find('list', ['limit' => 200]);
        $this->set('id3', $id3);
        $this->set('id2', $id2);
        $this->set(compact('item', 'agrupaciones'));

    }
    public function editv($id = null,$id2=null,$id3=null)
    {
        $item = $this->Items->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            if(!empty($item->item_pres_total))
            {
            $item->item_pres_enero = $item->item_pres_total/12;
            $item->item_pres_febrero = $item->item_pres_total/12;
            $item->item_pres_marzo = $item->item_pres_total/12;
            $item->item_pres_abril = $item->item_pres_total/12;
            $item->item_pres_mayo = $item->item_pres_total/12;
            $item->item_pres_junio = $item->item_pres_total/12;
            $item->item_pres_julio = $item->item_pres_total/12;
            $item->item_pres_agosto = $item->item_pres_total/12;
            $item->item_pres_septiembre = $item->item_pres_total/12;
            $item->item_pres_octubre = $item->item_pres_total/12;
            $item->item_pres_noviembre = $item->item_pres_total/12;
            $item->item_pres_diciembre = $item->item_pres_total/12;
            }
            if ($this->Items->save($item)) {
                $this->Flash->success(__('El Item ha sido editado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El Item no ha podido ser editado.'));
        }
        $agrupaciones = $this->Items->Agrupaciones->find('list', ['limit' => 200]);
        $this->set(compact('item', 'agrupaciones'));
    }

    public function edit2($id = null,$id3 =null,$id4=null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Agrupaciones'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            $suma=$item->item_pres_enero+$item->item_pres_febrero+$item->item_pres_marzo+$item->item_pres_abril+ $item->item_pres_mayo+$item->item_pres_junio+
            $item->item_pres_julio+$item->item_pres_agosto+$item->item_pres_septiembre+$item->item_pres_octubre+$item->item_pres_noviembre+
            $item->item_pres_diciembre;
            if($item->item_pres_total ==NULL)
                { $item->item_pres_total=$suma;
                if ($this->Items->save($item)) {
                $this->Flash->success(__('El Item ha sido editado.'));

                return $this->redirect(['action' => 'view3',$id3,$id4]);
              }
                }
            
            if($item->item_pres_total==$suma )
            { if ($this->Items->save($item)) {
                $this->Flash->success(__('El Item ha sido editado.'));

                return $this->redirect(['action' => 'view3',$id3,$id4]);
            }
              else{  $this->Flash->error(__('El Item no ha podido ser editado.'));   }
            }
            
            else{$this->Flash->error(__('La suma de los Presp. mensuales es distinto al Presp. Anual.'));     }
            
        }
        
        $this->set('id3', $id3);
        $this->set('id4', $id4);
        $this->set(compact('item'));

    }

    public function edit3($id = null,$id3 =null,$id4=null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Agrupaciones'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            $suma=$item->gasto_enero+$item->gasto_febrero+$item->gasto_marzo+$item->gasto_abril+ $item->gasto_mayo+$item->gasto_junio+
            $item->gasto_julio+$item->gasto_agosto+$item->gasto_septiembre+$item->gasto_octubre+$item->gasto_noviembre+
            $item->gasto_diciembre;
            if($item->item_pres_gasto ==NULL)
                { $item->item_pres_gasto=$suma;
                if ($this->Items->save($item)) {
                $this->Flash->success(__('El Item ha sido editado.'));

                return $this->redirect(['action' => 'view4',$id3,$id4]);
              }
                }
            
            if($item->item_pres_gasto==$suma )
            { if ($this->Items->save($item)) {
                $this->Flash->success(__('El Item ha sido editado.'));

                return $this->redirect(['action' => 'view4',$id3,$id4]);
            }
              else{  $this->Flash->error(__('El Item no ha podido ser editado.'));   }
            }
            
            else{$this->Flash->error(__('La suma de los Gastos mensuales es distinto al Gasto Anual.'));     }
            
        }

        
        $this->set('id3', $id3);
        $this->set('id4', $id4);
        $this->set(compact('item'));

    }

     public function edit4($id = null,$id2 =null,$id3=null,$id4=null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Agrupaciones'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            $suma=$item->item_pres_enero+$item->item_pres_febrero+$item->item_pres_marzo+$item->item_pres_abril+ $item->item_pres_mayo+$item->item_pres_junio+
            $item->item_pres_julio+$item->item_pres_agosto+$item->item_pres_septiembre+$item->item_pres_octubre+$item->item_pres_noviembre+
            $item->item_pres_diciembre;
            if($item->item_pres_total ==NULL)
                { $item->item_pres_total=$suma;
                if ($this->Items->save($item)) {
                $this->Flash->success(__('El Item ha sido editado.'));

                return $this->redirect(['action' => 'view5',$id4,$id2,$id3]);
              }
                }
            
            if($item->item_pres_total==$suma )
            { if ($this->Items->save($item)) {
                $this->Flash->success(__('El Item ha sido editado.'));

                return $this->redirect(['action' => 'view5',$id4,$id2,$id3]);
            }
              else{  $this->Flash->error(__('El Item no ha podido ser editado.'));   }
            }
            
            else{$this->Flash->error(__('La suma de los Presp. mensuales es distinto al Presp. Anual.'));     }
            
        }
        $this->set('id2', $id2);
        $this->set('id3', $id3);
        $this->set('id4', $id4);
        $this->set(compact('item'));

    }
    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('El Item ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El Item no ha podido ser eliminado.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function agru($id=null,$id2=null,$id3=null)
    {   
        $data =$this ->loadModel('AgruMesDet');
            
        $data = $this->paginate($this->AgruMesDet->find('all', array('conditions'=>array('agru_cod'=> $id))));
 
       $this->set('id', $id);
        $this->set('id2', $id2);
        $this->set('id3', $id3);
        $this->set('data', $data);

   }
   public function simagru($id=null,$id2=null,$id3=null)
    {   
        $data =$this ->loadModel('SimAgruMesDet');
            
        $data = $this->paginate($this->SimAgruMesDet->find('all', array('conditions'=>array('agru_cod'=> $id))));
 
       $this->set('id', $id);
        $this->set('id2', $id2);
        $this->set('id3', $id3);
        $this->set('data', $data);

   }

    public function export($id=null,$id2=null) {
       
        $data1 ='';
        $data1 ='<table cellspacing="2" cellpadding="5" style="border:2px;text-align:center;"border="1" width="60%">';
        $data1 .=utf8_decode('<tr>
                <th style:"text-align:center;"> Agrupacion</th>  
                <th style:"text-align:center;"> Cod. Agrupacion</th>   
                <th style:"text-align:center;"> Item</th> 
                <th style:"text-align:center;"> Cod. Item</th> 
                <th style:"text-align:center;"> Presupuesto Acumulado</th>   
                <th style:"text-align:center;"> Gasto Acumulado</th> 
                <th style:"text-align:center;"> Saldo Acumulado</th> 
                <th style:"text-align:center;"> % Saldo Acumulado</th> 
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
        $result =$this ->loadModel('EjecPres');
        $data =$result->find('all',  ['order' => ['item_cod' => 'ASC' ,'agru_cod' => 'ASC'], 'conditions'=>array('prog_id'=> $id)]);

           
       foreach ($data as $data) 
       {  $act=utf8_decode($data['agrupacion']);
          $act67=$data['agru_cod'];
          $act68=utf8_decode($data['item']);
          $act69=utf8_decode($data['item_cod']);
          $act70=$data['presupuesto_acumulado'];
          $act71=$data['gasto_acumulado'];
          $act72=$data['saldo_acumulado'];
          $act73=round($data['porcentaje_acumulado'],2);
          $act2=$data['pres_anual'];
          $act3=$data['gasto_real'];
          $act4=$data['saldo_anual'];
          $act5=round($data['porcentaje_anual'],2);
          $act6=$data['estado_anual'];
          $act7=$data['item_pres_enero'];
          $act8=$data['gasto_enero'];
          $act9=$data['saldo_enero'];
          $act10=round($data['porcentaje_enero'],2);
          $act11=$data['estado_enero'];
          $act12=$data['item_pres_febrero'];
          $act13=$data['gasto_febrero'];
          $act14=$data['saldo_febrero'];
          $act15=round($data['porcentaje_febrero'],2);
          $act16=$data['estado_febrero'];
          $act17=$data['item_pres_marzo'];
          $act18=$data['gasto_marzo'];
          $act19=$data['saldo_marzo'];
          $act20=round($data['porcentaje_marzo'],2);
          $act21=$data['estado_marzo'];
          $act22=$data['item_pres_abril'];
          $act23=$data['gasto_abril'];
          $act24=$data['saldo_abril'];
          $act25=round($data['porcentaje_abril'],2);
          $act26=$data['estado_abril'];
          $act27=$data['item_pres_mayo'];
          $act28=$data['gasto_mayo'];
          $act29=$data['saldo_mayo'];
          $act30=round($data['porcentaje_mayo'],2);
          $act31=$data['estado_mayo'];
          $act32=$data['item_pres_junio'];
          $act33=$data['gasto_junio'];
          $act34=$data['saldo_junio'];
          $act35=round($data['porcentaje_junio'],2);
          $act36=$data['estado_junio'];
          $act37=$data['item_pres_julio'];
          $act38=$data['gasto_julio'];
          $act39=$data['saldo_julio'];
          $act40=round($data['porcentaje_julio'],2);
          $act41=$data['estado_julio'];
          $act42=$data['item_pres_agosto'];
          $act43=$data['gasto_agosto'];
          $act44=$data['saldo_agosto'];
          $act45=round($data['porcentaje_agosto'],2);
          $act46=$data['estado_agosto'];
          $act47=$data['item_pres_septiembre'];
          $act48=$data['gasto_septiembre'];
          $act49=$data['saldo_septiembre'];
          $act50=round($data['porcentaje_septiembre'],2);
          $act51=$data['estado_septiembre'];
          $act52=$data['item_pres_octubre'];
          $act53=$data['gasto_octubre'];
          $act54=$data['saldo_octubre'];
          $act55=round($data['porcentaje_octubre'],2);
          $act56=$data['estado_octubre'];
          $act57=$data['item_pres_noviembre'];
          $act58=$data['gasto_noviembre'];
          $act59=$data['saldo_noviembre'];
          $act60=round($data['porcentaje_noviembre'],2);
          $act61=$data['estado_noviembre'];
          $act62=$data['item_pres_diciembre'];
          $act63=$data['gasto_diciembre'];
          $act64=$data['saldo_diciembre'];
          $act65=round($data['porcentaje_diciembre'],2);
          $act66=$data['estado_diciembre'];
          
          $data1.='<tr>
                <th style:"text-align:center;">'.$act.'</th>  
                <th style:"text-align:center;">'.$act67.'</th>   
                <th style:"text-align:center;">'.$act68.'</th>     
                <th style:"text-align:center;">'.$act69.'</th>  
                <th style:"text-align:center;">'.$act70.'</th>   
                <th style:"text-align:center;">'.$act71.'</th>     
                <th style:"text-align:center;">'.$act72.'</th> 
                <th style:"text-align:center;">'.$act73.'%</th>
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
       $mes=date('m');
       $dia=date('d');
       //excel export
       $file = "Ejecucion_Presupuestaria_Detalle_Programa_".$id2."_".$mes."_".$dia.".xls"; 
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
        $result =$this ->loadModel('MesDet');
        $data =$result->find('all', array('conditions'=>array('item_id'=> $id2)));
        $result2 =$this ->loadModel('EjecPres');
        $data2 =$result2->find('all', array('conditions'=>array('item_id'=> $id2)));

           
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
          $acp2=$data2['pres_anual'];
          $acp3=$data2['gasto_real'];
          $acp4=$data2['saldo_anual'];
          $acp5=round($data2['porcentaje_anual'],2);
          $acp6=$data2['estado_anual'];
         
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
       $file = "Ejecucion_Presupuestaria_Item:".$id.".xls"; 
       header('Content-Encoding: UTF-8');
       header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
       header("Content-Disposition: attachment; filename=$file");
       echo $data1;
       die;

    }
    public function export3($id=null,$id2=null) {
        $data1 ='';
        $data1 ='<table cellspacing="2" cellpadding="5" style="border:2px;text-align:center;"border="1" width="60%">';
        $data1 .=utf8_decode('<tr>
                <th style:"text-align:center;"> Agrupacion</th>  
                <th style:"text-align:center;"> Cod. Agrupacion</th>   
                <th style:"text-align:center;"> Item</th> 
                <th style:"text-align:center;"> Cod. Item</th> 
                <th style:"text-align:center;"> Presupuesto Total</th>   
                <th style:"text-align:center;"> Enero</th> 
                 <th style:"text-align:center;"> Febrero</th>  
                 <th style:"text-align:center;"> Marzo</th>  
                 <th style:"text-align:center;"> Abril</th> 
                 <th style:"text-align:center;"> Mayo</th>  
                 <th style:"text-align:center;"> Junio</th> 
                 <th style:"text-align:center;"> Julio</th> 
                 <th style:"text-align:center;"> Agosto</th> 
                 <th style:"text-align:center;"> Septiembre</th> 
                 <th style:"text-align:center;"> Octubre</th> 
                 <th style:"text-align:center;"> Noviembre</th> 
                 <th style:"text-align:center;"> Diciembre</th> 
                </tr>');
        
        $data = $this->Items->find('all', [
        'order' => ['Items.item_id' => 'ASC'],'contain' => ['Agrupaciones'],'conditions'=>array('agru_prog_id'=> $id)
         ]);

           
       foreach ($data as $data) 
       {  $act=utf8_decode($data['agrupacione']['agru_nombre']);
          $act67=$data['agrupacione']['agru_cod'];
          $act68=utf8_decode($data['item_nombre']);
          $act69=utf8_decode($data['item_cod']);
          $act2=$data['item_pres_total'];
          $act3=$data['item_pres_enero'];
          $act4=$data['item_pres_febrero'];
          $act5=$data['item_pres_marzo'];
          $act6=$data['item_pres_abril'];
          $act7=$data['item_pres_mayo'];
          $act8=$data['item_pres_junio'];
          $act9=$data['item_pres_julio'];
          $act10=$data['item_pres_agosto'];
          $act11=$data['item_pres_septiembre'];
          $act12=$data['item_pres_octubre'];
          $act13=$data['item_pres_noviembre'];
          $act14=$data['item_pres_diciembre'];
          
          $data1.='<tr>
                <th style:"text-align:center;">'.$act.'</th>  
                <th style:"text-align:center;">'.$act67.'</th>   
                <th style:"text-align:center;">'.$act68.'</th>     
                <th style:"text-align:center;">'.$act69.'</th>  
                <th style:"text-align:center;">'.$act2.'</th>   
                <th style:"text-align:center;">'.$act3.'</th>     
                <th style:"text-align:center;">'.$act4.'</th> 
                <th style:"text-align:center;">'.$act5.'</th>
                <th style:"text-align:center;">'.$act6.'</th>
                <th style:"text-align:center;">'.$act7.'</th>     
                <th style:"text-align:center;">'.$act8.'</th>   
                <th style:"text-align:center;">'.$act9.'</th>     
                <th style:"text-align:center;">'.$act10.'</th> 
                <th style:"text-align:center;">'.$act11.'</th> 
                <th style:"text-align:center;">'.$act12.'</th>     
                <th style:"text-align:center;">'.$act13.'</th> 
                <th style:"text-align:center;">'.$act14.'</th>                        
                </tr>';
           
       }

       


       $data1 .='</table>';

       //excel export
       $file = "Presupuesto_Anual_Programa_".$id2.".xls"; 
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
                <th style:"text-align:center;"> Agrupacion</th>  
                <th style:"text-align:center;"> Cod. Agrupacion</th>   
                <th style:"text-align:center;"> Item</th> 
                <th style:"text-align:center;"> Cod. Item</th> 
                <th style:"text-align:center;"> Gasto Total</th>   
                <th style:"text-align:center;"> Enero</th> 
                 <th style:"text-align:center;"> Febrero</th>  
                 <th style:"text-align:center;"> Marzo</th>  
                 <th style:"text-align:center;"> Abril</th> 
                 <th style:"text-align:center;"> Mayo</th>  
                 <th style:"text-align:center;"> Junio</th> 
                 <th style:"text-align:center;"> Julio</th> 
                 <th style:"text-align:center;"> Agosto</th> 
                 <th style:"text-align:center;"> Septiembre</th> 
                 <th style:"text-align:center;"> Octubre</th> 
                 <th style:"text-align:center;"> Noviembre</th> 
                 <th style:"text-align:center;"> Diciembre</th> 
                </tr>');
 
        $data = $this->Items->find('all', [
        'order' => ['Items.item_id' => 'ASC'],'contain' => ['Agrupaciones'],'conditions'=>array('agru_prog_id'=> $id)
         ]);

           
       foreach ($data as $data) 
       {  $act=utf8_decode($data['agrupacione']['agru_nombre']);
          $act67=$data['agrupacione']['agru_cod'];
          $act68=utf8_decode($data['item_nombre']);
          $act69=utf8_decode($data['item_cod']);
          $act2=$data['item_pres_gasto'];
          $act3=$data['gasto_enero'];
          $act4=$data['gasto_febrero'];
          $act5=$data['gasto_marzo'];
          $act6=$data['gasto_abril'];
          $act7=$data['gasto_mayo'];
          $act8=$data['gasto_junio'];
          $act9=$data['gasto_julio'];
          $act10=$data['gasto_agosto'];
          $act11=$data['gasto_septiembre'];
          $act12=$data['gasto_octubre'];
          $act13=$data['gasto_noviembre'];
          $act14=$data['gasto_diciembre'];
          
          $data1.='<tr>
                <th style:"text-align:center;">'.$act.'</th>  
                <th style:"text-align:center;">'.$act67.'</th>   
                <th style:"text-align:center;">'.$act68.'</th>     
                <th style:"text-align:center;">'.$act69.'</th>  
                <th style:"text-align:center;">'.$act2.'</th>   
                <th style:"text-align:center;">'.$act3.'</th>     
                <th style:"text-align:center;">'.$act4.'</th> 
                <th style:"text-align:center;">'.$act5.'</th>
                <th style:"text-align:center;">'.$act6.'</th>
                <th style:"text-align:center;">'.$act7.'</th>     
                <th style:"text-align:center;">'.$act8.'</th>   
                <th style:"text-align:center;">'.$act9.'</th>     
                <th style:"text-align:center;">'.$act10.'</th> 
                <th style:"text-align:center;">'.$act11.'</th> 
                <th style:"text-align:center;">'.$act12.'</th>     
                <th style:"text-align:center;">'.$act13.'</th> 
                <th style:"text-align:center;">'.$act14.'</th>                        
                </tr>';
           
       }

       


       $data1 .='</table>';

       //excel export
       $file = "Gasto_Anual_Programa_".$id2.".xls"; 
       header('Content-Encoding: UTF-8');
       header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
       header("Content-Disposition: attachment; filename=$file");
       echo $data1;
       die;

    }

    public function export5($id=null,$id2=null) {
       
        $data1 ='';
        $data1 ='<table cellspacing="2" cellpadding="5" style="border:2px;text-align:center;"border="1" width="60%">';
        $data1 .=utf8_decode('<tr>
                <th style:"text-align:center;"> Agrupacion</th>  
                <th style:"text-align:center;"> Cod. Agrupacion</th>   
                <th style:"text-align:center;"> Item</th> 
                <th style:"text-align:center;"> Cod. Item</th> 
                <th style:"text-align:center;"> Presupuesto Acumulado</th>   
                <th style:"text-align:center;"> Gasto Acumulado</th> 
                <th style:"text-align:center;"> Saldo Acumulado</th> 
                <th style:"text-align:center;"> % Saldo Acumulado</th> 
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
        $result =$this ->loadModel('SimEjecPres');
        $data =$result->find('all',  ['order' => ['item_cod' => 'ASC' ,'agru_cod' => 'ASC'], 'conditions'=>array('prog_id'=> $id)]);

           
       foreach ($data as $data) 
       {  $act=utf8_decode($data['agrupacion']);
          $act67=$data['agru_cod'];
          $act68=utf8_decode($data['item']);
          $act69=utf8_decode($data['item_cod']);
          $act70=$data['presupuesto_acumulado'];
          $act71=$data['gasto_acumulado'];
          $act72=$data['saldo_acumulado'];
          $act73=round($data['porcentaje_acumulado'],2);
          $act2=$data['pres_anual'];
          $act3=$data['gasto_real'];
          $act4=$data['saldo_anual'];
          $act5=round($data['porcentaje_anual'],2);
          $act6=$data['estado_anual'];
          $act7=$data['sim_enero'];
          $act8=$data['gasto_enero'];
          $act9=$data['saldo_enero'];
          $act10=round($data['porcentaje_enero'],2);
          $act11=$data['estado_enero'];
          $act12=$data['sim_febrero'];
          $act13=$data['gasto_febrero'];
          $act14=$data['saldo_febrero'];
          $act15=round($data['porcentaje_febrero'],2);
          $act16=$data['estado_febrero'];
          $act17=$data['sim_marzo'];
          $act18=$data['gasto_marzo'];
          $act19=$data['saldo_marzo'];
          $act20=round($data['porcentaje_marzo'],2);
          $act21=$data['estado_marzo'];
          $act22=$data['sim_abril'];
          $act23=$data['gasto_abril'];
          $act24=$data['saldo_abril'];
          $act25=round($data['porcentaje_abril'],2);
          $act26=$data['estado_abril'];
          $act27=$data['sim_mayo'];
          $act28=$data['gasto_mayo'];
          $act29=$data['saldo_mayo'];
          $act30=round($data['porcentaje_mayo'],2);
          $act31=$data['estado_mayo'];
          $act32=$data['sim_junio'];
          $act33=$data['gasto_junio'];
          $act34=$data['saldo_junio'];
          $act35=round($data['porcentaje_junio'],2);
          $act36=$data['estado_junio'];
          $act37=$data['sim_julio'];
          $act38=$data['gasto_julio'];
          $act39=$data['saldo_julio'];
          $act40=round($data['porcentaje_julio'],2);
          $act41=$data['estado_julio'];
          $act42=$data['sim_agosto'];
          $act43=$data['gasto_agosto'];
          $act44=$data['saldo_agosto'];
          $act45=round($data['porcentaje_agosto'],2);
          $act46=$data['estado_agosto'];
          $act47=$data['sim_septiembre'];
          $act48=$data['gasto_septiembre'];
          $act49=$data['saldo_septiembre'];
          $act50=round($data['porcentaje_septiembre'],2);
          $act51=$data['estado_septiembre'];
          $act52=$data['sim_octubre'];
          $act53=$data['gasto_octubre'];
          $act54=$data['saldo_octubre'];
          $act55=round($data['porcentaje_octubre'],2);
          $act56=$data['estado_octubre'];
          $act57=$data['sim_noviembre'];
          $act58=$data['gasto_noviembre'];
          $act59=$data['saldo_noviembre'];
          $act60=round($data['porcentaje_noviembre'],2);
          $act61=$data['estado_noviembre'];
          $act62=$data['sim_diciembre'];
          $act63=$data['gasto_diciembre'];
          $act64=$data['saldo_diciembre'];
          $act65=round($data['porcentaje_diciembre'],2);
          $act66=$data['estado_diciembre'];
          $data1.='<tr>
                <th style:"text-align:center;">'.$act.'</th>  
                <th style:"text-align:center;">'.$act67.'</th>   
                <th style:"text-align:center;">'.$act68.'</th>     
                <th style:"text-align:center;">'.$act69.'</th>  
                <th style:"text-align:center;">'.$act70.'</th>   
                <th style:"text-align:center;">'.$act71.'</th>     
                <th style:"text-align:center;">'.$act72.'</th> 
                <th style:"text-align:center;">'.$act73.'%</th> 
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
       $file = "Simulación_Presupuestaria_Detalle_Programa_".$id2.".xls"; 
       header('Content-Encoding: UTF-8');
       header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
       header("Content-Disposition: attachment; filename=$file");
       echo $data1;
       die;

    }

    public function export6($id=null,$id2=null) {
       
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
        $result =$this ->loadModel('SimEjecPresDet');
        $data =$result->find('all', array('conditions'=>array('item_id'=> $id2)));
        $result2 =$this ->loadModel('SimEjecPres');
        $data2 =$result2->find('all', array('conditions'=>array('item_id'=> $id2)));

           
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
          $acp2=$data2['pres_anual'];
          $acp3=$data2['gasto_real'];
          $acp4=$data2['saldo_anual'];
          $acp5=round($data2['porcentaje_anual'],2);
          $acp6=$data2['estado_anual'];
         
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
       $file = "Simulación_Presupuestaria_Item:".$id.".xls"; 
       header('Content-Encoding: UTF-8');
       header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
       header("Content-Disposition: attachment; filename=$file");
       echo $data1;
       die;

    }

     public function export7($id) {
       
        $data1 ='';
        $data1 ='<table cellspacing="2" cellpadding="5" style="border:2px;text-align:center;"border="1" width="60%">';
        $data1 .=utf8_decode('<tr>
                <th style:"text-align:center;"> Agrupacion</th> 
                <th style:"text-align:center;"> Codigo</th>   
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
        $result =$this ->loadModel('AgruPres');
        $data =$result->find('all', ['order' => ['agru_cod' => 'ASC'], 'conditions'=>array('prog_id'=> $id)]);

           
       foreach ($data as $data) 
       {  $act=utf8_decode($data['agru_nombre']);
          $act67=$data['agru_cod'];
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
                <th style:"text-align:center;">'.$act67.'</th>   
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
       $file = "Agrupacion_Presupuestaria.xls"; 
       header('Content-Encoding: UTF-8');
       header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
       header("Content-Disposition: attachment; filename=$file");
       echo $data1;
       die;

    }

    public function export8($id=null,$id2=null,$id3=null) {
       
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
        $result =$this ->loadModel('AgruMesDet');
        $data = $this->paginate($this->AgruMesDet->find('all', array('conditions'=>array('agru_cod'=> $id))));
        $result2 =$this ->loadModel('AgruPres');
        $data2 = $this->paginate($this->AgruPres->find('all', ['order' => ['agru_cod' => 'ASC'], 'conditions'=>array('prog_id'=> $id3,'agru_cod'=> $id)]));

           
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
       $file = "Ejecucion_Presupuestaria_Agrupacion:".$id."_Programa_".$id2.".xls"; 
       header('Content-Encoding: UTF-8');
       header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
       header("Content-Disposition: attachment; filename=$file");
       echo $data1;
       die;

    }

    public function export9($id) {
       
        $data1 ='';
        $data1 ='<table cellspacing="2" cellpadding="5" style="border:2px;text-align:center;"border="1" width="60%">';
        $data1 .=utf8_decode('<tr>
                <th style:"text-align:center;"> Agrupacion</th> 
                <th style:"text-align:center;"> Codigo</th>   
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
        $result =$this ->loadModel('SimAgruPres');
        $data =$result->find('all', ['order' => ['agru_cod' => 'ASC'], 'conditions'=>array('prog_id'=> $id)]);

           
       foreach ($data as $data) 
       {  $act=utf8_decode($data['agru_nombre']);
          $act67=$data['agru_cod'];
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
                <th style:"text-align:center;">'.$act67.'</th>   
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
       $file = "Simulacion_Agrupacion_Presupuestaria.xls"; 
       header('Content-Encoding: UTF-8');
       header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
       header("Content-Disposition: attachment; filename=$file");
       echo $data1;
       die;

    }

    public function export10($id=null,$id2=null,$id3=null) {
       
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
        $result =$this ->loadModel('SimAgruMesDet');
        $data = $this->paginate($this->SimAgruMesDet->find('all', array('conditions'=>array('agru_cod'=> $id))));
        $result2 =$this ->loadModel('SimAgruPres');
        $data2 = $this->paginate($this->SimAgruPres->find('all', ['order' => ['agru_cod' => 'ASC'], 'conditions'=>array('prog_id'=> $id3,'agru_cod'=> $id)]));

           
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
       $file = "Simulacion_Presupuestaria_Agrupacion:".$id."_Programa_".$id2.".xls"; 
       header('Content-Encoding: UTF-8');
       header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
       header("Content-Disposition: attachment; filename=$file");
       echo $data1;
       die;

    }

}
