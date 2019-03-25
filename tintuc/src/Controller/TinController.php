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
//        if(!empty($q['so_lan'] && $q['den_lan'] )){
//            $sl = $q['so_lan'];
//            $dl = $q['den_lan'];
//            $tin->where(array(
//                        'Tin.SoLanXem BETWEEN ' . $sl . ' AND ' . $dl
//                        ));
//        }
        if(!empty($q['so_lan'])){
           $sl = $q['so_lan'];
           $tin->where(array(
                        'Tin.SoLanXem >= ' => $sl 
                        ));
        }
        if(!empty($q['den_lan'])){
           $dl = $q['den_lan'];
           $tin->where(array(
                        'Tin.SoLanXem <= ' => $dl
                        )); 
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
