<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
        
        $sotin1trang = 10;
        $from = 0;
        $trang = $this->request->getQuery('trang');
        if(isset($trang)){
           echo $from = ($trang - 1 ) * $sotin1trang; 
        }else{
            $trang = 1;
        }
        $tin = $this->Tin->find()->select([
            'idTin',
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
        ])
        ->join([
            'u'=>[
                'table'=>'Users',
                'alias'=>'u',
                'type'=>'LEFT',
                'conditions'=>'Tin.idUser = u.idUser'
            ]
        ]);

        $l_t= $this->Tin->find()->select(['count' => 'count(1)'])
        ->join([
            'u'=>[
                'table'=>'Users',
                'alias'=>'u',
                'type'=>'LEFT',
                'conditions'=>'Tin.idUser = u.idUser'
            ]
        ]);
        $conditions = [];
        $url_query = '';
        $q = $this->request->getQuery();
        if(!empty($q['TieuDe'])){
            $url_query .= '&TieuDe=' . $q['TieuDe'];
            $conditions = array_merge($conditions,[
                'Tin.TieuDe LIKE' => "%".$q['TieuDe']."%"
            ]);
        }
        if(!empty($q['TomTat'])){
            $url_query .= '&TomTat=' . $q['TomTat'];
            $conditions = array_merge($conditions,[
                'Tin.TomTat LIKE' => "%".$q['TomTat']."%"
            ]);
        }
        if(!empty($q['so_lan'])){
           $url_query .= '&so_lan=' . $q['so_lan'];
           $conditions = array_merge($conditions,['Tin.SoLanXem >= ' => $q['so_lan']]);
        }
        if(!empty($q['den_lan'])){
           $url_query .= '&den_lan=' . $q['den_lan'];
           $conditions = array_merge($conditions,['Tin.SoLanXem <= ' => $q['den_lan']]);
        }
        if(!empty($q['TacGia'])){
            $url_query .= '&TacGia=' . $q['TacGia'];
            $conditions = array_merge($conditions,[
                'u.HoTen LIKE' => "%".$q['TacGia']."%"
            ]);
        }
        if(!empty($q['AnHien'])){
            $url_anhien = '';
            foreach ($q['AnHien'] as $anhien) {
                    $url_anhien .= '&AnHien[]=' . $anhien;    
            }
            $url_query .= $url_anhien;
            $conditions = array_merge($conditions,[
                'Tin.AnHien IN' => $q['AnHien']
            ]);
        }
//        if (empty($url_query)) {
//            $url_query = '';
//        }
        $tin = $tin->where($conditions)
            ->order(['idTin' => 'DESC'])
            ->limit($sotin1trang)->offset($from);
        //pr($tin); die;
        $list_all = $l_t->where($conditions)->first();
        //pr($list_all); die;
        $tongsotin = $list_all['count'];
        $sotrang = ceil($tongsotin/$sotin1trang);
            $this->set(compact('tin','sotrang','url_query'));
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
        //get data Users table
        $username = TableRegistry::get('Users');
        $username = $username->find()->select([
            'idUser',
            'HoTen'
        ]);
        $option = [];
        foreach ($username as $user_name){
            $option[$user_name->idUser] = $user_name->HoTen;
        }
        //get data Theloai table
//        $cate = TableRegistry::get('theloai');
//        $cate = $cate->find()->select([
//            'idTL',
//            'TenTL'
//        ])
//                ->join([
//                    'table' => 'TheLoai',
//                    'alias' => 'tl',
//                    'type' => 'LEFT',
//                    'conditions'=>'TheLoai.TenTL = TheLoai.idTL',
//                    'order' => 'TheLoai.idTL DESC'
//                ]);
//        $option_tl = array();
//        foreach ($cate as $tl){
//            $option_tl[$tl->idTL] = $tl->TenTL;
//        }
        //get data danhmuc table
        $danhmuc = TableRegistry::get('Danhmuc');
        $danhmuc = $danhmuc->find()->select([
            'id_danhmuc',
            'ten_danhmuc'
        ]);
        $option_d_muc = array();
        foreach ($danhmuc as $dmuc){
            $option_d_muc[$dmuc->id_danhmuc] = $dmuc->ten_danhmuc;
        }
        
        
        
        $tin = $this->Tin->newEntity();

        if($this->request->is('post')){
          $input['TieuDe'] = trim($this->request->getData('TieuDe'));
          $input['TieuDe_KhongDau'] = trim($this->request->getData('TieuDe_KhongDau'));
          $input['TomTat'] = trim($this->request->getData('TomTat'));
          $input['urlHinh'] = trim($this->request->getData('urlHinh'));
          $input['idUser'] = $this->request->getData('idUser');
          $input['Content'] = trim($this->request->getData('Content'));
//          $input['idLT'] = trim($this->request->getData('idLT'));
          $input['id_danhmuc'] = $this->request->getData('id_danhmuc');
          $input['TinNoiBat'] = trim($this->request->getData('TinNoiBat'));
          $input['AnHien'] = $this->request->getData('AnHien');
          //pr($input['id_danhmuc']); die;
           $tin = $this->Tin->patchEntity($tin, $input);
//           pr($tin); die;
           if ($this->Tin->save($tin)) {
               $this->Flash->success(__('ok'));
            }
           
        }
        $this->set(compact('tin','option','option_d_muc'));
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
        $username = TableRegistry::get('Users');
        $username = $username->find()->select([
            'idUser',
            'HoTen'
        ]);
        $option = [];
        foreach ($username as $user_name){
            $option[$user_name->idUser] = $user_name->HoTen;
        }
        $danhmuc = TableRegistry::get('Danhmuc');
        $danhmuc = $danhmuc->find()->select([
            'id_danhmuc',
            'ten_danhmuc'
        ]);
        $option_d_muc = array();
        foreach ($danhmuc as $dmuc){
            $option_d_muc[$dmuc->id_danhmuc] = $dmuc->ten_danhmuc;
        }
        $tin = $this->Tin->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
          $input['TieuDe'] = trim($this->request->getData('TieuDe'));
          $input['TieuDe_KhongDau'] = trim($this->request->getData('TieuDe_KhongDau'));
          $input['TomTat'] = trim($this->request->getData('TomTat'));
          $input['urlHinh'] = trim($this->request->getData('urlHinh'));
          $input['idUser'] = $this->request->getData('idUser');
          $input['Content'] = trim($this->request->getData('Content'));
//          $input['idLT'] = trim($this->request->getData('idLT'));
          $input['id_danhmuc'] = $this->request->getData('id_danhmuc');
          $input['TinNoiBat'] = trim($this->request->getData('TinNoiBat'));
          $input['AnHien'] = $this->request->getData('AnHien');
            $tin = $this->Tin->patchEntity($tin, $input);
            if ($this->Tin->save($tin)) {
                $this->Flash->success(__('Cập nhật thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Thất bại. Hãy thử lại'));
        }
        $this->set(compact('tin','option','option_d_muc'));
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
