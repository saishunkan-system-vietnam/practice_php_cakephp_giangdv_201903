<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lienhe Controller
 *
 * @property \App\Model\Table\LienheTable $Lienhe
 *
 * @method \App\Model\Entity\Lienhe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LienheController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $lienhe = $this->paginate($this->Lienhe);

        $this->set(compact('lienhe'));
    }

    /**
     * View method
     *
     * @param string|null $id Lienhe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lienhe = $this->Lienhe->get($id, [
            'contain' => []
        ]);

        $this->set('lienhe', $lienhe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lienhe = $this->Lienhe->newEntity();
        if ($this->request->is('post')) {
            $lienhe = $this->Lienhe->patchEntity($lienhe, $this->request->getData());
            if ($this->Lienhe->save($lienhe)) {
                $this->Flash->success(__('The lienhe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lienhe could not be saved. Please, try again.'));
        }
        $this->set(compact('lienhe'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lienhe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lienhe = $this->Lienhe->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lienhe = $this->Lienhe->patchEntity($lienhe, $this->request->getData());
            if ($this->Lienhe->save($lienhe)) {
                $this->Flash->success(__('The lienhe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lienhe could not be saved. Please, try again.'));
        }
        $this->set(compact('lienhe'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lienhe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lienhe = $this->Lienhe->get($id);
        if ($this->Lienhe->delete($lienhe)) {
            $this->Flash->success(__('The lienhe has been deleted.'));
        } else {
            $this->Flash->error(__('The lienhe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
