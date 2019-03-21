<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Theloai Controller
 *
 * @property \App\Model\Table\TheloaiTable $Theloai
 *
 * @method \App\Model\Entity\Theloai[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TheloaiController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $theloai = $this->paginate($this->Theloai);

        $this->set(compact('theloai'));
    }

    /**
     * View method
     *
     * @param string|null $id Theloai id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $theloai = $this->Theloai->get($id, [
            'contain' => []
        ]);

        $this->set('theloai', $theloai);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $theloai = $this->Theloai->newEntity();
        if ($this->request->is('post')) {
            $theloai = $this->Theloai->patchEntity($theloai, $this->request->getData());
            if ($this->Theloai->save($theloai)) {
                $this->Flash->success(__('The theloai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The theloai could not be saved. Please, try again.'));
        }
        $this->set(compact('theloai'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Theloai id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $theloai = $this->Theloai->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $theloai = $this->Theloai->patchEntity($theloai, $this->request->getData());
            if ($this->Theloai->save($theloai)) {
                $this->Flash->success(__('The theloai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The theloai could not be saved. Please, try again.'));
        }
        $this->set(compact('theloai'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Theloai id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $theloai = $this->Theloai->get($id);
        if ($this->Theloai->delete($theloai)) {
            $this->Flash->success(__('The theloai has been deleted.'));
        } else {
            $this->Flash->error(__('The theloai could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
