<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Phuongan Controller
 *
 * @property \App\Model\Table\PhuonganTable $Phuongan
 *
 * @method \App\Model\Entity\Phuongan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhuonganController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $phuongan = $this->paginate($this->Phuongan);

        $this->set(compact('phuongan'));
    }

    /**
     * View method
     *
     * @param string|null $id Phuongan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phuongan = $this->Phuongan->get($id, [
            'contain' => []
        ]);

        $this->set('phuongan', $phuongan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phuongan = $this->Phuongan->newEntity();
        if ($this->request->is('post')) {
            $phuongan = $this->Phuongan->patchEntity($phuongan, $this->request->getData());
            if ($this->Phuongan->save($phuongan)) {
                $this->Flash->success(__('The phuongan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phuongan could not be saved. Please, try again.'));
        }
        $this->set(compact('phuongan'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Phuongan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phuongan = $this->Phuongan->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phuongan = $this->Phuongan->patchEntity($phuongan, $this->request->getData());
            if ($this->Phuongan->save($phuongan)) {
                $this->Flash->success(__('The phuongan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phuongan could not be saved. Please, try again.'));
        }
        $this->set(compact('phuongan'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Phuongan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phuongan = $this->Phuongan->get($id);
        if ($this->Phuongan->delete($phuongan)) {
            $this->Flash->success(__('The phuongan has been deleted.'));
        } else {
            $this->Flash->error(__('The phuongan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
