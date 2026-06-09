<?php
// Gọi model sinhvienModel để test (model này đã require DB.php bên trong)
require_once '../app/models/sinhvienModel.php';

echo "<h2>Kiểm tra kết nối và lấy dữ liệu Database</h2>";

try {
    // Khởi tạo model sinh viên
    $model = new sinhvienModel();
    
    // Gọi hàm lấy tất cả sinh viên
    $sinhvienList = $model->getALLSinhVien();

    if ($sinhvienList && count($sinhvienList) > 0) {
        echo "<p style='color: green;'>✅ Kết nối Database thành công! Tìm thấy <strong>" . count($sinhvienList) . "</strong> sinh viên trong bảng <code>tbl_sinhvien</code>.</p>";
        
        echo "<table border='1' cellpadding='10' style='border-collapse: collapse; width: 100%; text-align: left;'>";
        
        // In header của bảng dựa trên các cột trong CSDL
        echo "<tr style='background-color: #f2f2f2;'>";
        foreach ($sinhvienList[0] as $key => $value) {
            echo "<th>" . htmlspecialchars($key) . "</th>";
        }
        echo "</tr>";

        // In ra từng dòng dữ liệu
        foreach ($sinhvienList as $sv) {
            echo "<tr>";
            foreach ($sv as $value) {
                echo "<td>" . htmlspecialchars($value ?? '') . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: orange;'>⚠️ Kết nối Database thành công, nhưng bảng <code>tbl_sinhvien</code> hiện tại chưa có dữ liệu nào!</p>";
    }
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Lỗi kết nối Database: " . $e->getMessage() . "</p>";
    echo "<p>Vui lòng kiểm tra lại thông tin cấu hình trong <code>app/core/DB.php</code> và chắc chắn rằng MySQL đang chạy.</p>";
}
?>