<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<style>
    table {
        width: 100%;
    }

    table,
    th,
    td {
        text-align: center;
        border: 1px solid black;
        border-collapse: collapse;

    }

    th,
    td {
        padding: 10px;
    }

    th {
        background-color: #456fc8;
        color: white;
    }
</style>

<body>

    <h1><?php echo $title ?></h1>
    
    <div style="margin-bottom: 15px; text-align: left;">
        <a href="/QLSINHVIEN/public/sinhvien/create" style="padding: 10px 15px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;">+ Thêm sinh viên</a>
    </div>

    <table>
        <tr>
            <th>id</th>
            <th>Ho va ten</th>
            <th>Gioi tinh</th>
            <th>mssv</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach ($sinhvien as $sv) { ?>
            <tr>
                <td> <?php echo $sv['id']; ?> </td>
                <td> <?php echo $sv['sinhvien']; ?> </td>
                <td> <?php echo $sv['giotinh']; ?> </td>
                <td> <?php echo $sv['mssv']; ?> </td>
                <td>
                    <a href="/QLSINHVIEN/public/sinhvien/edit/<?php echo $sv['id']; ?>" style="color: blue; text-decoration: none;">Sửa</a> |
                    <a href="/QLSINHVIEN/public/sinhvien/delete/<?php echo $sv['id']; ?>" style="color: red; text-decoration: none;" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?');">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <!-- Khối Phân Trang -->
    <div style="margin-top: 20px; text-align: center;">
        <?php if (isset($totalPages) && $totalPages > 1): ?>
            <?php 
                // Xây dựng URL gốc để giữ lại các tham số hiện có
                $urlParts = parse_url($_SERVER['REQUEST_URI']);
                $queryArr = [];
                if(isset($urlParts['query'])) {
                    parse_str($urlParts['query'], $queryArr);
                }
            ?>
            
            <?php if ($currentPage > 1): ?>
                <?php $queryArr['page'] = $currentPage - 1; ?>
                <a href="?<?php echo http_build_query($queryArr); ?>" style="padding: 8px 12px; border: 1px solid #ccc; text-decoration: none; color: #333; margin: 0 5px;">&laquo; Trước</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <?php $queryArr['page'] = $i; ?>
                <a href="?<?php echo http_build_query($queryArr); ?>" style="padding: 8px 12px; border: 1px solid #ccc; text-decoration: none; margin: 0 5px; <?php echo ($i == $currentPage) ? 'background-color: #456fc8; color: white;' : 'color: #333;'; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
                <?php $queryArr['page'] = $currentPage + 1; ?>
                <a href="?<?php echo http_build_query($queryArr); ?>" style="padding: 8px 12px; border: 1px solid #ccc; text-decoration: none; color: #333; margin: 0 5px;">Sau &raquo;</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html>