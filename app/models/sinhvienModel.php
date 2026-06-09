<?php
require_once '../app/core/DB.php';
class sinhvienModel
{
    private $conn;
    public function __construct()
    {
        $db = new ConnectDB();
        $this->conn = $db->connect();
    }
    public function getALLSinhVien()
    {
        $query = "SELECT * FROM tbl_sinhvien";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTotalSinhVien()
    {
        $query = "SELECT COUNT(*) as total FROM tbl_sinhvien";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function paging($limit = 10, $offset = 0, $search = '')
    {
        // Có thể nâng cấp để hỗ trợ $search nếu cần
        $query = 'SELECT * FROM tbl_sinhvien LIMIT :limit OFFSET :offset';
        $stmt = $this->conn->prepare($query);
        // Bắt buộc phải ép kiểu INT cho LIMIT và OFFSET trong PDO
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getSinhVienById($id)
    {
        $query = "SELECT * FROM tbl_sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateSinhVien($id, $sinhvien, $giotinh, $mssv)
    {
        $query = "UPDATE tbl_sinhvien SET sinhvien = :sinhvien, giotinh = :giotinh, mssv = :mssv WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':sinhvien', $sinhvien);
        $stmt->bindParam(':giotinh', $giotinh);
        $stmt->bindParam(':mssv', $mssv);
        return $stmt->execute();
    }

    public function deleteSinhVien($id)
    {
        $query = "DELETE FROM tbl_sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function insertSinhVien($sinhvien, $giotinh, $mssv)
    {
        $query = "INSERT INTO tbl_sinhvien (sinhvien, giotinh, mssv) VALUES (:sinhvien, :giotinh, :mssv)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':sinhvien', $sinhvien);
        $stmt->bindParam(':giotinh', $giotinh);
        $stmt->bindParam(':mssv', $mssv);
        return $stmt->execute();
    }
}
?>