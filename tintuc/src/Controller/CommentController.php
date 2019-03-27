<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Comment Controller
 *
 * @property \App\Model\Table\CommentTable $Comment
 *
 * @method \App\Model\Entity\Comment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommentController extends AppController {

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
    public function index() {
        $this->loadModel('Tin');
        if ($this->request->is('post')) {
            $an_hien= $this->request->getData('anhien');
            if($an_hien){
              $result = $this->Comment->updateAll(
                    [  // fields
                        'an_hien' => 1
                    ],
                    [  // conditions
                        'id in' => $an_hien
                    ]
                );
              if($result){
                  $this->Flash->success(__('Duyệt thành công'));
              }
            }
            else{
               $this->Flash->error(__('Thất bại, hãy thử lại')); 
            }
        }
        $bai_v = $this->Tin->find()->limit(50)->select([
                    'idTin',
                    'TieuDe',
                    'TomTat'
                ])->all();
        foreach ($bai_v as $b_v) {
            $binh_luan = $this->Comment->find()
                    ->select([
                        'id',
                        'idTin',
                        'hoten',
                        'email',
                        'noidung',
                        'an_hien'
                    ])->where(
                            [
                                'idTin' => $b_v['idTin']
                            ]
                    )
                    ->all();
            $b_v['Comments'] = $binh_luan;
        }
        $this->set(compact('bai_v'));
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
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
                            'tieu_de' => 't.TieuDe'
                        ])->join([
                    't' => [
                        'table' => 'Tin',
                        'alias' => 't',
                        'type' => 'LEFT',
                        'conditions' => 't.idTin = Comment.idTin'
                    ]
                ])->first();

        $this->set(compact('binh_luan'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
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
    public function edit($id = null) {
        $binh_luan = $this->Comment->find()
                        ->select([
                            'id',
                            'idTin',
                            'hoten',
                            'email',
                            'noidung',
                            'tieu_de' => 't.TieuDe'
                        ])->join([
                    't' => [
                        'table' => 'Tin',
                        'alias' => 't',
                        'type' => 'LEFT',
                        'conditions' => 't.idTin = Comment.idTin'
                    ]
                ])->all();
        $option = [];
        foreach ($binh_luan as $bl) {
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
        $this->set(compact('comment', 'option'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
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
