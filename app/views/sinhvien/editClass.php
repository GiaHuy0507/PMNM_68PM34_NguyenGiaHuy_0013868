<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Sinh Viên</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #28a745;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            font-size: 15px;
        }

        .btn-save {
            background: #28a745;
            color: white;
        }

        .btn-save:hover {
            background: #218838;
        }

        .btn-cancel {
            background: #dc3545;
            color: white;
        }

        .btn-cancel:hover {
            background: #c82333;
        }

        .error-box {
            text-align: center;
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container">

<style>
    .form-container {
        width: 100%;
        max-width: 550px;
        margin: 30px auto;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }
</style>

<div class="form-container">
<h1>Sửa Thông Tin Sinh Viên</h1>

<?php if (!empty($sinhvien)): ?>

<form action="/QLSINHVIEN/public/sinhvien/update/<?php echo $sinhvien['id']; ?>" method="POST">
                <input type="hidden"
                    name="id"
                    value="<?php echo $sinhvien['id']; ?>">

                <input type="hidden" name="id" value="<?php echo $sinhvien['id']; ?>">
                <div class="mb-3">
                    <label for="hoten" class="form-label fw-bold">Họ tên</label>

                <div class="form-group">
                    <label for="hoten">Họ tên sinh viên</label>
<input
type="text"
                        class="form-control"
id="hoten"
name="hoten"
value="<?php echo htmlspecialchars($sinhvien['sinhvien']); ?>"
                        required>
                        required pattern=".*\S+.*" title="Họ tên không được để trống">
</div>

                <div class="form-group">
                    <label for="gioitinh">Giới tính</label>
                    <select id="gioitinh" name="gioitinh" required>
                <div class="mb-3">
                    <label for="gioitinh" class="form-label fw-bold">Giới tính</label>

                    <select class="form-select" id="gioitinh" name="gioitinh" required>
<option value="Nam"
                            <?php echo ($sinhvien['giotinh'] === 'Nam') ? 'selected' : ''; ?>>
                            <?php echo ($sinhvien['gioitinh'] == 'Nam') ? 'selected' : ''; ?>>
Nam
</option>

                        <option value="Nữ"
                            <?php echo ($sinhvien['giotinh'] === 'Nữ') ? 'selected' : ''; ?>>
                        <option value="Nu"
                            <?php echo ($sinhvien['gioitinh'] == 'Nu') ? 'selected' : ''; ?>>
Nữ
</option>

                        <option value="Khac"
                            <?php echo ($sinhvien['gioitinh'] == 'Khac') ? 'selected' : ''; ?>>
                            Khác
                        </option>
</select>
</div>

                <div class="form-group">
                    <label for="mssv">Mã số sinh viên</label>
                <div class="mb-3">
                    <label for="mssv" class="form-label fw-bold">Mã số sinh viên</label>

<input
type="text"
                        class="form-control"
id="mssv"
name="mssv"
value="<?php echo htmlspecialchars($sinhvien['mssv']); ?>"
                        required>
                        required pattern=".*\S+.*" title="MSSV không được để trống">
                </div>

                <div class="mb-4">
                    <label for="lop_id" class="form-label fw-bold">Lớp học</label>
                    <select class="form-select" name="lop_id" id="lop_id" required>
                        <?php foreach ($lophocs as $lop): ?>
                            <option value="<?= $lop['id'] ?>" <?php echo ($sinhvien['lop_id'] == $lop['id']) ? 'selected' : ''; ?>>
                                    <?= $lop['malop'] ?> - <?= $lop['tenlop'] ?>
                                </option>
                        <?php endforeach; ?>

                    </select>
</div>

                <div class="form-actions">
                    <a href="/QLSINHVIEN/public/sinhvien/index" class="btn btn-cancel">
                <div class="d-flex gap-2 mt-4">

                    <a href="/QLSINHVIEN/public/sinhvien/index"
                        class="btn btn-secondary w-50 py-2">
Hủy
</a>

                    <button type="submit" class="btn btn-save">
                    <button type="submit"
                        class="btn btn-primary w-50 py-2">
Lưu thay đổi
</button>

</div>

</form>

<?php else: ?>

<div class="error-box">

<p class="error-message">
Không tìm thấy sinh viên.
</p>

                <a href="/QLSINHVIEN/public/sinhvien/index" class="btn btn-save">
                    Quay lại
                <a href="/QLSINHVIEN/public/sinhvien/index"
                    class="btn-back">
                    Quay lại danh sách
</a>
</div>

<?php endif; ?>

    </div>

</body>

</html>
</div>