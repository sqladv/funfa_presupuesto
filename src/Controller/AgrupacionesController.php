<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Agrupaciones Controller
 *
 * @property \App\Model\Table\AgrupacionesTable $Agrupaciones
 *
 * @method \App\Model\Entity\Agrupacione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AgrupacionesController extends AppController
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
        $agrupaciones = $this->paginate($this->Agrupaciones->find('all', [
    'order' => ['Agrupaciones.agru_id' => 'ASC']
      ]));

        $this->set(compact('agrupaciones'));
    }

    /**
     * View method
     *
     * @param string|null $id Agrupacione id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agrupacione = $this->Agrupaciones->get($id, [
            'contain' => ['Programas'],
        ]);

        $this->set('agrupacione', $agrupacione);
    }

    public function view2($id = null,$id2= null)
    {   
        
        $data = $this->paginate($this->Agrupaciones->find('all', array('conditions'=>array('agru_prog_id'=> $id))));

  
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
        $agrupacione = $this->Agrupaciones->newEmptyEntity();
        if ($this->request->is('post')) {
            $agrupacione = $this->Agrupaciones->patchEntity($agrupacione, $this->request->getData());
            if ($this->Agrupaciones->save($agrupacione)) {
                $this->Flash->success(__('La Agrupacion ha sido Creada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ha ocurrido un error y la Agrupacion no ha podido crearse.'));
        }
        $programas = $this->Agrupaciones->Programas->find('list', ['limit' => 200]);
        $this->set(compact('agrupacione', 'programas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Agrupacione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agrupacione = $this->Agrupaciones->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agrupacione = $this->Agrupaciones->patchEntity($agrupacione, $this->request->getData());
            if ($this->Agrupaciones->save($agrupacione)) {
                $this->Flash->success(__('La Agrupacion ha sido editada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La Agrupacion no ha podido editarse.'));
        }
        $programas = $this->Agrupaciones->Programas->find('list', ['limit' => 200]);
        $this->set(compact('agrupacione', 'programas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Agrupacione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agrupacione = $this->Agrupaciones->get($id);
        if ($this->Agrupaciones->delete($agrupacione)) {
            $this->Flash->success(__('La Agrupación ha sido eliminada.'));
        } else {
            $this->Flash->error(__('La Agrupación no ha podido ser eliminada .'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
