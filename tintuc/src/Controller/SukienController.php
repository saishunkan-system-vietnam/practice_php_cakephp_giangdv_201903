<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sukien Controller
 *
 * @property \App\Model\Table\SukienTable $Sukien
 *
 * @method \App\Model\Entity\Sukien[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SukienController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sukien = $this->paginate($this->Sukien);

        $this->set(compact('sukien'));
    }
    /**
     * View method
     *
     * @param string|null $id Sukien id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sukien = $this->Sukien->get($id, [
            'contain' => []
        ]);

        $this->set('sukien', $sukien);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sukien = $this->Sukien->newEntity();
        if ($this->request->is('post')) {
            $sukien = $this->Sukien->patchEntity($sukien, $this->request->getData());
            if ($this->Sukien->save($sukien)) {
                $this->Flash->success(__('The sukien has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sukien could not be saved. Please, try again.'));
        }
        $this->set(compact('sukien'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sukien id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sukien = $this->Sukien->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sukien = $this->Sukien->patchEntity($sukien, $this->request->getData());
            if ($this->Sukien->save($sukien)) {
                $this->Flash->success(__('The sukien has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sukien could not be saved. Please, try again.'));
        }
        $this->set(compact('sukien'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sukien id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sukien = $this->Sukien->get($id);
        if ($this->Sukien->delete($sukien)) {
            $this->Flash->success(__('The sukien has been deleted.'));
        } else {
            $this->Flash->error(__('The sukien could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
