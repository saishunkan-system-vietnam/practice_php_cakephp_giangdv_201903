<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Danhmuc Controller
 *
 *
 * @method \App\Model\Entity\Danhmuc[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DanhmucController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    
//    private function dequydanhmuc($danh_muc, $parent_id = 0, $char = ''){
//        $var = '';
//        foreach($danh_muc as $key => $dmuc){
//            if($dmuc['parent_id'] == $parent_id) {
//                $var .= $char . $dmuc['ten_danhmuc'] .'<br>';
//                unset($danh_muc[$key]);
//                $var .= $this->dequydanhmuc($danh_muc,$dmuc['id_danhmuc'] ,$char.'|--');    
//            }
//        }
//        return $var;
//    }
    
    public function index()
    {
        //$danhmuc = $this->paginate($this->Danhmuc);
        $danh_muc = $this->Danhmuc->find('all')
                ->select([
                    'id_danhmuc',
                    'ten_danhmuc_cha'=>'pr.ten_danhmuc',
                    'ten_danhmuc',
                    'an_hien',
                    'thu_tu'
                ])
                ->join([
                    'pr'=>[
                        'table' => 'Danhmuc',
                        'alias' => 'pr',
                        'type' => 'LEFT',
                        'conditions' => 'pr.id_danhmuc = Danhmuc.parent_id'
                    ]
                ]);
        $q = $this->request->getQuery();
        $inputData = $q;
        if(!empty($q['id_danhmuc'])){
            $danh_muc->where([
                'Danhmuc.id_danhmuc' => $q['id_danhmuc']
            ]);
        }
        if(!empty($q['ten_danhmuc'])){
            $danh_muc->where([
                'Danhmuc.ten_danhmuc LIKE' => "%".$q['ten_danhmuc']."%"
            ]);
        }
        if(!empty($q['thu_tu'])){
            $danh_muc->where([
                'Danhmuc.thu_tu' => $q['thu_tu']
            ]);
        }
        if(!empty($q['an_hien'])){
            $danh_muc->where([
                'Danhmuc.an_hien IN' => $q['an_hien']
            ]);
        }
        if(!empty($q['ten_danhmuc_cha'])){
            $danh_muc->where([
                'pr.ten_danhmuc LIKE' => "%".$q['ten_danhmuc_cha']."%"
            ]);
        }
        $this->paginate($danh_muc);
        $this->set(compact('danh_muc'));
    }
    
    

    /**
     * View method
     *
     * @param string|null $id Danhmuc id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $danhmuc = $this->Danhmuc->get($id, [
            'contain' => []
        ]);

        $this->set('danhmuc', $danhmuc);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    private function getParentID (){
        // Start a new query.
        $query = $this->Danhmuc->find()->select([
            'ten_danhmuc',
            'id_danhmuc'
        ])->all();
        //var_dump($query);
        foreach($query as $key => $q){
            $dmuc[$q->id_danhmuc] = $q->ten_danhmuc;
        }
        return $dmuc;
    }
    public function add()
    {
        $danhmuc = $this->Danhmuc->newEntity($this->request->getData());

        if ($this->request->is('post')) {
            
            $input['ten_danhmuc'] = trim($this->request->getData('ten_danhmuc'));
            $input['thu_tu'] = trim($this->request->getData('thu_tu'));
            $input['an_hien'] = trim($this->request->getData('an_hien'));
            $input['parent_id'] = trim($this->request->getData('parent_id'));
            
            $danhmuc = $this->Danhmuc->patchEntity($danhmuc, $input);
            if ($this->Danhmuc->save($danhmuc)) {
                $this->Flash->success(__('Thêm danh mục thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Thất bại. Hãy thử lại'));
        }
        $dmuc = $this->getParentID();
        //var_dump($dmuc);
        $this->set(compact('danhmuc','dmuc'));
    }
    

    /**
     * Edit method
     *
     * @param string|null $id Danhmuc id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $danhmuc = $this->Danhmuc->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $input['ten_danhmuc'] = trim($this->request->getData('ten_danhmuc'));
            $input['thu_tu'] = trim($this->request->getData('thu_tu'));
            $input['an_hien'] = trim($this->request->getData('an_hien'));
            $input['parent_id'] = trim($this->request->getData('parent_id'));
            
            $danhmuc = $this->Danhmuc->patchEntity($danhmuc, $input);
            
            if ($this->Danhmuc->save($danhmuc)) {
                
                $this->Flash->success(__('Cập nhật thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Thất bại, hãy thử lại'));
        }
        $dmuc = $this->getParentID();
        $this->set(compact('danhmuc','dmuc'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Danhmuc id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $danhmuc = $this->Danhmuc->get($id);
        if ($this->Danhmuc->delete($danhmuc)) {
            $this->Flash->success(__('The danhmuc has been deleted.'));
        } else {
            $this->Flash->error(__('The danhmuc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
