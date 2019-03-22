<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tin Controller
 *
 * @property \App\Model\Table\TinTable $Tin
 *
 * @method \App\Model\Entity\Tin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TinController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tin = $this->Tin->find()->select([
            'TieuDe',
            'TieuDe_KhongDau',
            'TomTat',
            'urlHinh',
            'Ngay',
            'Content',
            'SoLanXem',
            'TinNoiBat',
            'AnHien',
            'user_name'=>'u.Username'
        ])->join([
            'u'=>[
                'table'=>'Users',
                'alias'=>'u',
                'type'=>'LEFT',
                'conditions'=>'Tin.idUser = u.idUser'
            ]
        ]);
        $q = $this->request->getQuery();
//        if(!empty($q['idTin'])){
//            $danh_muc->where([
//                'Tin.idTin' => $q['idTin']
//            ]);
//        }
        if(!empty($q['TieuDe'])){
            $tin->where([
                'Tin.TieuDe LIKE' => "%".$q['TieuDe']."%"
            ]);
        }
        if(!empty($q['TomTat'])){
            $tin->where([
                'Tin.TomTat LIKE' => "%".$q['TomTat']."%"
            ]);
        }
        if(!empty($q['SoLanXem'])){
            $tin->where([
                'Tin.SoLanXem' => $q['SoLanXem']
            ]);
        }
        if(!empty($q['TacGia'])){
            $tin->where([
                'u.HoTen LIKE' => "%".$q['TacGia']."%"
            ]);
        }
        if(!empty($q['AnHien'])){
            $tin->where([
                'Tin.AnHien IN' => $q['AnHien']
            ]);
        }
            $this->paginate($tin);

            $this->set(compact('tin'));
        }

    /**
     * View method
     *
     * @param string|null $id Tin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tin = $this->Tin->get($id, [
            'contain' => []
        ]);
        
        $this->set('tin', $tin);
    }
    public $paginate = [
        'limit' => 5,
        'order' => [
            'Tin.idTin' => 'desc'
        ]
    ];
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $tin = $this->Tin->newEntity();
        if ($this->request->is('post')) {
            $tin = $this->Tin->patchEntity($tin, $this->request->getData());
            if ($this->Tin->save($tin)) {
                $this->Flash->success(__('The tin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tin could not be saved. Please, try again.'));
        }
        $this->set(compact('tin'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tin = $this->Tin->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tin = $this->Tin->patchEntity($tin, $this->request->getData());
            if ($this->Tin->save($tin)) {
                $this->Flash->success(__('The tin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tin could not be saved. Please, try again.'));
        }
        $this->set(compact('tin'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tin = $this->Tin->get($id);
        if ($this->Tin->delete($tin)) {
            $this->Flash->success(__('The tin has been deleted.'));
        } else {
            $this->Flash->error(__('The tin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
