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
//    private function getReaderName(){
//        $query = $this->Comment->find()->select([
//                'id',
//                'hoten'
//            ])->all();
//            $readerName = [];
//            foreach($query as $q){
//                $readerName[$q->id] = $q->hoten;
//            }
//    }
    public function index()
    {
        $binh_luan = $this->Comment->find()
                ->select([
                    'id',
                    'idTin',
                    'hoten',
                    'email',
                    'noidung',
                    'an_hien',
                    'tieu_de'=>'t.TieuDe'
                        
        ])->join([
            't'=>[
                'table'=> 'Tin',
                'alias'=> 't',
                'type'=>'LEFT',
                'conditions' =>'t.idTin = Comment.idTin'
            ]
        ])->all();
        
         $query = $this->Comment->find()->select([
                'id',
                'hoten'
            ])->where();
//            ->join([
//                't' =>[
//                    'table' => 'Tin',
//                    'alias' => 't',
//                    'type' => 'LEFT',
//                    'conditions' => 't.idTin = Comment.idTin'
//                ]
//            ])->all();
            $readerName = [];
            foreach($query as $q){
                $readerName[$q->id] = $q->hoten;
            }  
        //pr($binh_luan); die;
        $comment = $this->paginate($this->Comment);
        
        
        $this->set(compact('comment','binh_luan'));
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
        $binh_luan = $this->Comment->find()
                ->where([
                    'id' => $id
                        ])
                ->select([
                    'id',
                    'idTin',
                    'hoten',
                    'email',
                    'noidung',
                    'an_hien',
                    'tieu_de'=>'t.TieuDe'
                        
        ])->join([
            't'=>[
                'table'=> 'Tin',
                'alias'=> 't',
                'type'=>'LEFT',
                'conditions' =>'t.idTin = Comment.idTin'
            ]
        ])->first();
        //$comment = $this->Comment->get($id);
        
        $this->set(compact('binh_luan'));
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
        $binh_luan = $this->Comment->find()
                ->select([
                    'id',
                    'idTin',
                    'hoten',
                    'email',
                    'noidung',
                    'tieu_de'=>'t.TieuDe'
                        
        ])->join([
            't'=>[
                'table'=> 'Tin',
                'alias'=> 't',
                'type'=>'LEFT',
                'conditions' =>'t.idTin = Comment.idTin'
            ]
        ])->all();
        $option = [];
        foreach ($binh_luan as $bl){
            $option[] = $bl->tieu_de;
        }
        $comment = $this->Comment->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comment = $this->Comment->patchEntity($comment, $this->request->getData());
            if ($this->Comment->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        $this->set(compact('comment','option'));
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
