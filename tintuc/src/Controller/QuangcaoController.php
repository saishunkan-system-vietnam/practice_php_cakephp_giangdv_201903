<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Quangcao Controller
 *
 * @property \App\Model\Table\QuangcaoTable $Quangcao
 *
 * @method \App\Model\Entity\Quangcao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuangcaoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $quangcao = $this->paginate($this->Quangcao);

        $this->set(compact('quangcao'));
    }

    /**
     * View method
     *
     * @param string|null $id Quangcao id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quangcao = $this->Quangcao->get($id, [
            'contain' => []
        ]);

        $this->set('quangcao', $quangcao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quangcao = $this->Quangcao->newEntity();
        if ($this->request->is('post')) {
            $quangcao = $this->Quangcao->patchEntity($quangcao, $this->request->getData());
            if ($this->Quangcao->save($quangcao)) {
                $this->Flash->success(__('The quangcao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quangcao could not be saved. Please, try again.'));
        }
        $this->set(compact('quangcao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quangcao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quangcao = $this->Quangcao->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quangcao = $this->Quangcao->patchEntity($quangcao, $this->request->getData());
            if ($this->Quangcao->save($quangcao)) {
                $this->Flash->success(__('The quangcao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quangcao could not be saved. Please, try again.'));
        }
        $this->set(compact('quangcao'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quangcao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quangcao = $this->Quangcao->get($id);
        if ($this->Quangcao->delete($quangcao)) {
            $this->Flash->success(__('The quangcao has been deleted.'));
        } else {
            $this->Flash->error(__('The quangcao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
