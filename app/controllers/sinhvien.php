<?php
require_once '../app/models/sinhvienModel.php';
require_once '../app/core/Controller.php';
class sinhvien extends Controller
{
    public function index()
    {
        $sinhvienModel = $this->model('sinhvienModel');

        // 1. Khai báo số lượng trên mỗi trang
        $limit = 10;

        // 2. Lấy trang hiện tại từ URL (mặc định là trang 1)
        $currentPage = 1;
        if (isset($_GET['page'])) {
            $currentPage = (int) $_GET['page'];
        } else {
            // Dự phòng: Tự bóc tách tham số page từ REQUEST_URI (trường hợp .htaccess nuốt mất $_GET)
            $queryStr = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
            if ($queryStr) {
                parse_str($queryStr, $params);
                if (isset($params['page'])) {
                    $currentPage = (int) $params['page'];
                }
            }
        }
        if ($currentPage < 1)
            $currentPage = 1;

        // 3. Tính toán offset
        $offset = ($currentPage - 1) * $limit;

        // 4. Lấy dữ liệu sinh viên có phân trang
        $sinhvien = $sinhvienModel->paging($limit, $offset);

        // 5. Lấy tổng số sinh viên để tính tổng số trang
        $totalRecords = $sinhvienModel->getTotalSinhVien();
        $totalPages = ceil($totalRecords / $limit);

        // 6. Trả dữ liệu sang view
        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/index",
            "sinhvien" => $sinhvien,
            "title" => "Danh sach sinh vien",
            "currentPage" => $currentPage,
            "totalPages" => $totalPages
        ]);
    }
    public function create()
    {
        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/create",
            "title" => "Thêm thông tin sinh viên"
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sinhvien = $_POST['sinhvien'] ?? '';
            $giotinh = $_POST['giotinh'] ?? '';
            $mssv = $_POST['mssv'] ?? '';

            $sinhvienModel = $this->model('sinhvienModel');
            $sinhvienModel->insertSinhVien($sinhvien, $giotinh, $mssv);
        }
        header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien');
        exit;
    }

    public function edit($id = null)
    {
        if (!$id) {
            header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien');
            exit;
        }
        $sinhvienModel = $this->model('sinhvienModel');
        $student = $sinhvienModel->getSinhVienById($id);

        if (!$student) {
            header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien');
            exit;
        }

        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/edit",
            "student" => $student,
            "title" => "Sửa thông tin sinh viên"
        ]);
    }

    public function update($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $id) {
            $sinhvien = $_POST['sinhvien'] ?? '';
            $giotinh = $_POST['giotinh'] ?? '';
            $mssv = $_POST['mssv'] ?? '';

            $sinhvienModel = $this->model('sinhvienModel');
            $sinhvienModel->updateSinhVien($id, $sinhvien, $giotinh, $mssv);
        }
        header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien');
        exit;
    }

    public function delete($id = null)
    {
        if ($id) {
            $sinhvienModel = $this->model('sinhvienModel');
            $sinhvienModel->deleteSinhVien($id);
        }
        header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien');
        exit;
    }
}
?>