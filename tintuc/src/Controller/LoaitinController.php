<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Loaitin Controller
 *
 * @property \App\Model\Table\LoaitinTable $Loaitin
 *
 * @method \App\Model\Entity\Loaitin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoaitinController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $loaitin = $this->paginate($this->Loaitin);

        $this->set(compact('loaitin'));
    }

    /**
     * View method
     *
     * @param string|null $id Loaitin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loaitin = $this->Loaitin->get($id, [
            'contain' => []
        ]);

        $this->set('loaitin', $loaitin);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loaitin = $this->Loaitin->newEntity();
        if ($this->request->is('post')) {
            $loaitin = $this->Loaitin->patchEntity($loaitin, $this->request->getData());
            if ($this->Loaitin->save($loaitin)) {
                $this->Flash->success(__('The loaitin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loaitin could not be saved. Please, try again.'));
        }
        $this->set(compact('loaitin'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Loaitin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loaitin = $this->Loaitin->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loaitin = $this->Loaitin->patchEntity($loaitin, $this->request->getData());
            if ($this->Loaitin->save($loaitin)) {
                $this->Flash->success(__('The loaitin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loaitin could not be saved. Please, try again.'));
        }
        $this->set(compact('loaitin'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Loaitin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loaitin = $this->Loaitin->get($id);
        if ($this->Loaitin->delete($loaitin)) {
            $this->Flash->success(__('The loaitin has been deleted.'));
        } else {
            $this->Flash->error(__('The loaitin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
