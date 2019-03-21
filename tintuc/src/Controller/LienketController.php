<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lienket Controller
 *
 * @property \App\Model\Table\LienketTable $Lienket
 *
 * @method \App\Model\Entity\Lienket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LienketController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $lienket = $this->paginate($this->Lienket);

        $this->set(compact('lienket'));
    }

    /**
     * View method
     *
     * @param string|null $id Lienket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lienket = $this->Lienket->get($id, [
            'contain' => []
        ]);

        $this->set('lienket', $lienket);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lienket = $this->Lienket->newEntity();
        if ($this->request->is('post')) {
            $lienket = $this->Lienket->patchEntity($lienket, $this->request->getData());
            if ($this->Lienket->save($lienket)) {
                $this->Flash->success(__('The lienket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lienket could not be saved. Please, try again.'));
        }
        $this->set(compact('lienket'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lienket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lienket = $this->Lienket->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lienket = $this->Lienket->patchEntity($lienket, $this->request->getData());
            if ($this->Lienket->save($lienket)) {
                $this->Flash->success(__('The lienket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lienket could not be saved. Please, try again.'));
        }
        $this->set(compact('lienket'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lienket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lienket = $this->Lienket->get($id);
        if ($this->Lienket->delete($lienket)) {
            $this->Flash->success(__('The lienket has been deleted.'));
        } else {
            $this->Flash->error(__('The lienket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
