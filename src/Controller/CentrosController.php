<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Centros Controller
 *
 * @property \App\Model\Table\CentrosTable $Centros
 *
 * @method \App\Model\Entity\Centro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CentrosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Programas'],
        ];
        $centros = $this->paginate($this->Centros);

        $this->set(compact('centros'));
    }

    /**
     * View method
     *
     * @param string|null $id Centro id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $centro = $this->Centros->get($id, [
            'contain' => ['Programas'],
        ]);

        $this->set('centro', $centro);
    }

    public function view2($id = null,$id2= null)
    {   
        
        
        $data = $this->Centros->find('all', array('conditions'=>array('cent_prog_id'=> $id)));

  
        $this->set('data', $data);
        $this->set('id2', $id2);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $centro = $this->Centros->newEmptyEntity();
        if ($this->request->is('post')) {
            $centro = $this->Centros->patchEntity($centro, $this->request->getData());
            if ($this->Centros->save($centro)) {
                $this->Flash->success(__('El Centro ha sido creado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El Centro no ha podido ser creado.'));
        }
        $programas = $this->Centros->Programas->find('list', ['limit' => 200]);
        $this->set(compact('centro', 'programas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Centro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $centro = $this->Centros->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $centro = $this->Centros->patchEntity($centro, $this->request->getData());
            if ($this->Centros->save($centro)) {
                $this->Flash->success(__('El Centro ha sido editado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El Centro no ha podido ser editado.'));
        }
        $programas = $this->Centros->Programas->find('list', ['limit' => 200]);
        $this->set(compact('centro', 'programas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Centro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $centro = $this->Centros->get($id);
        if ($this->Centros->delete($centro)) {
            $this->Flash->success(__('El Centro ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El Centro no se ha podido eliminar.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
