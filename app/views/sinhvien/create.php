<h1><?php echo $title ?></h1>

<div style="margin-top: 20px; text-align: left; max-width: 500px;">
    <form action="/PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien/store" method="POST" style="padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Họ và tên:</label>
            <input type="text" name="sinhvien" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Giới tính:</label>
            <input type="text" name="giotinh" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">MSSV:</label>
            <input type="text" name="mssv" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div>
            <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer;">Thêm mới</button>
            <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien" style="margin-left: 10px; text-decoration: none; color: #333; padding: 10px 20px; border: 1px solid #ccc; background-color: #f2f2f2;">Hủy</a>
        </div>
    </form>
</div>