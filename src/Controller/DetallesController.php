<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Detalles Controller
 *
 * @property \App\Model\Table\DetallesTable $Detalles
 *
 * @method \App\Model\Entity\Detalle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DetallesController extends AppController
{   



    public function detalle($id,$id2,$id3)
    {
        $detalles = $this->paginate($this->Detalles->find('all', array('conditions'=>array('det_item'=> $id, 'det_mes'=> $id2))));
 
        $this->set('id', $id);
        $this->set('id2', $id2);
        $this->set('id3', $id3);
        $this->set(compact('detalles'));
    }

    public function edit2($id,$id2,$id3,$id4)
    {
        $detalle = $this->Detalles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detalle = $this->Detalles->patchEntity($detalle, $this->request->getData());
            if ($this->Detalles->save($detalle)) {
                $this->Flash->success(__('Se ha Editado Correctamente'));

                return $this->redirect(['action' => 'detalle',$id2,$id3,$id4]);
            }
            $this->Flash->error(__('No se Pudo editar'));
        }
    


        $this->set('id2', $id2);
        $this->set('id3', $id3);
        $this->set('id4', $id4);
        $this->set(compact('detalle'));

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $detalles = $this->paginate($this->Detalles);

        $this->set(compact('detalles'));
    }

    /**
     * View method
     *
     * @param string|null $id Detalle id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detalle = $this->Detalles->get($id, [
            'contain' => [],
        ]);

        $this->set('detalle', $detalle);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detalle = $this->Detalles->newEmptyEntity();
        if ($this->request->is('post')) {
            $detalle = $this->Detalles->patchEntity($detalle, $this->request->getData());
            if ($this->Detalles->save($detalle)) {
                $this->Flash->success(__('The detalle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalle could not be saved. Please, try again.'));
        }
        $this->set(compact('detalle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Detalle id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detalle = $this->Detalles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detalle = $this->Detalles->patchEntity($detalle, $this->request->getData());
            if ($this->Detalles->save($detalle)) {
                $this->Flash->success(__('The detalle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalle could not be saved. Please, try again.'));
        }
        $this->set(compact('detalle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Detalle id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detalle = $this->Detalles->get($id);
        if ($this->Detalles->delete($detalle)) {
            $this->Flash->success(__('The detalle has been deleted.'));
        } else {
            $this->Flash->error(__('The detalle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
