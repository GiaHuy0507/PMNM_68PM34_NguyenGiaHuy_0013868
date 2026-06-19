public function index($page = 1) {
// lấy dữ liệu phân trang từ model
$currentpage = max(1, (int)$page);
        $limit = 3;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 3;
$offset = ($currentpage - 1) * $limit;

        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        $filter_lop = isset($_GET['filter_lop']) ? (string)trim($_GET['filter_lop']) : '';
        $sort_order = isset($_GET['sort_order']) ? (string)trim($_GET['sort_order']) : 'ASC';

$sinhvienModel = $this->model('sinhvienModel');
        // $sinhvien = $sinhvienModel->getALLSinhVien();

        $result = $sinhvienModel->paging($limit, $offset);
        $lophocs = $sinhvienModel->getAllLop();
        
        $result = $sinhvienModel->paging($limit, $offset, $search, $filter_lop, $sort_order);
$sinhviens = $result['sinhviens'];
$totalpage = $result['totalpage'];
        $totalrecord = $result['totalrecord'];

        $start_record = ($totalrecord > 0) ? $offset + 1 : 0;
        $end_record = min($offset + $limit, $totalrecord);

$this->view("layout/masterlayout", 
[
"viewname" => "sinhvien/index",
            "sinhvien" => $sinhviens, 
            "title" => "Danh sach sinh vien", 
            "sinhvien" => $sinhviens,
            "lophocs" => $lophocs, 
            "title" => "Danh sách sinh viên", 
"currentpage" => $currentpage, 
            "totalpage" => $totalpage
            "totalpage" => $totalpage,
            "search" => $search,
            "filter_lop" => $filter_lop,
            "sort_order" => $sort_order,
            "limit" => $limit,
            "totalrecord" => $totalrecord,
            "start_record" => $start_record,
            "end_record" => $end_record
]);
}


public function create() {
        // trả về view
        require_once '../app/views/sinhvien/create.php';
        $sinhvienModel = $this->model('sinhvienModel');
        $lophocs = $sinhvienModel->getAllLop();
        $this->view("layout/masterlayout", 
        [
            "viewname" => "sinhvien/create",
            "lophocs" => $lophocs, 
            "title" => "Thêm mới sinh viên"
        ]);
}
public function store(){
$hoten = $_POST['hoten'];
$gioitinh = $_POST['gioitinh'];
$mssv = $_POST['mssv'];
        $lop_id = $_POST['malop'];
$sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->create($hoten, $gioitinh, $mssv);

        if ($sinhvienModel->checkMssvExist($mssv)) {
            $lophocs = $sinhvienModel->getAllLop();
            $this->view("layout/masterlayout", 
            [
                "viewname" => "sinhvien/create",
                "lophocs" => $lophocs, 
                "title" => "Thêm mới sinh viên",
                "error" => "Sinh viên đã tồn tại!"
            ]);
            return;
        }

        $result = $sinhvienModel->create($hoten, $gioitinh, $mssv, $lop_id);
if($result) {
header("Location: /QLSINHVIEN/public/sinhvien/index");
} else {
@@ -45,10 +82,12 @@ public function store(){
public function edit($id) {
$sinhvienModel = $this->model('sinhvienModel');
$sinhvien = $sinhvienModel->getById($id);
        $lophocs = $sinhvienModel->getAllLop();
$this->view("layout/masterlayout", 
[
"viewname" => "sinhvien/edit",
            "sinhvien" => $sinhvien, 
            "sinhvien" => $sinhvien,
            "lophocs" => $lophocs, 
"title" => "Sửa thông tin sinh viên"
]);
}
@@ -57,8 +96,9 @@ public function update($id) {
$hoten = $_POST['hoten'];
$gioitinh = $_POST['gioitinh'];
$mssv = $_POST['mssv'];
        $lop_id = $_POST['lop_id'];
$sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->update($id, $hoten, $gioitinh, $mssv);
        $result = $sinhvienModel->update($id, $hoten, $gioitinh, $mssv, $lop_id);
if($result) {
header("Location: /QLSINHVIEN/public/sinhvien/index");
} else {