<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comment Controller
 *
 * @property \App\Model\Table\CommentTable $Comment
 *
 * @method \App\Model\Entity\Comment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommentController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $comment = $this->paginate($this->Comment);

        $this->set(compact('comment'));
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comment = $this->Comment->get($id, [
            'contain' => []
        ]);

        $this->set('comment', $comment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comment = $this->Comment->newEntity();
        if ($this->request->is('post')) {
            $comment = $this->Comment->patchEntity($comment, $this->request->getData());
            if ($this->Comment->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        $this->set(compact('comment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comment = $this->Comment->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comment = $this->Comment->patchEntity($comment, $this->request->getData());
            if ($this->Comment->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        $this->set(compact('comment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comment->get($id);
        if ($this->Comment->delete($comment)) {
            $this->Flash->success(__('The comment has been deleted.'));
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
