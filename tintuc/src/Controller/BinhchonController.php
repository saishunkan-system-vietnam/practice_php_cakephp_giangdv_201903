<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Binhchon Controller
 *
 * @property \App\Model\Table\BinhchonTable $Binhchon
 *
 * @method \App\Model\Entity\Binhchon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BinhchonController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $binhchon = $this->paginate($this->Binhchon);

        $this->set(compact('binhchon'));
    }

    /**
     * View method
     *
     * @param string|null $id Binhchon id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $binhchon = $this->Binhchon->get($id, [
            'contain' => []
        ]);

        $this->set('binhchon', $binhchon);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $binhchon = $this->Binhchon->newEntity();
        if ($this->request->is('post')) {
            $binhchon = $this->Binhchon->patchEntity($binhchon, $this->request->getData());
            if ($this->Binhchon->save($binhchon)) {
                $this->Flash->success(__('The binhchon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The binhchon could not be saved. Please, try again.'));
        }
        $this->set(compact('binhchon'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Binhchon id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $binhchon = $this->Binhchon->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $binhchon = $this->Binhchon->patchEntity($binhchon, $this->request->getData());
            if ($this->Binhchon->save($binhchon)) {
                $this->Flash->success(__('The binhchon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The binhchon could not be saved. Please, try again.'));
        }
        $this->set(compact('binhchon'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Binhchon id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $binhchon = $this->Binhchon->get($id);
        if ($this->Binhchon->delete($binhchon)) {
            $this->Flash->success(__('The binhchon has been deleted.'));
        } else {
            $this->Flash->error(__('The binhchon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
