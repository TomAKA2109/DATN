
    <tr>
        <td>
            <div class="form-group pl-3 pr-3 px-0">
                <label>Loại sách:</labe>
                <select name="loaisach" id="isloaisach" class="form-control" style="width: 200px;">
                @foreach($_loaisach as $loaisach)
                    <option value="{{ $loaisach->id }}">{{ $loaisach->tenloai }}</option>>
                @endforeach
                </select>
            </div>
        </td>
        <td>
            <div class="form-group pl-3 pr-3 px-0">
                <label>Nhà xuất bản:</labe>
                <select name="nxb" id="isnxb" class="form-control" style="width: 200px;">
                @foreach($_nhaxuatban as $nhaxuatban)
                    <option value="{{ $nhaxuatban->id }}">{{ $nhaxuatban->tennhaxuatban }}</option>>
                @endforeach
                </select>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div class="form-group pl-3 pr-3 px-0">
                <label>Tên sách:</label>
                <input type="text" class="form-control" name="tensach" id="istensach" placeholder="Tên sách" value="{{ $book->tensach }}"/>
                <div class="tensach invalid-feedback"></div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group pl-3 pr-3 px-0">
                <label>Tác giả:</label>
                <input type="text" class="form-control" name="tacgia" id="istacgia" placeholder="Tác giả" value="{{ $book->tacgia }}" />
                <div class="tacgia invalid-feedback"></div>
            </div>
        </td>
        <td>
            <div class="form-group pl-3 pr-3 px-0">
                <label>Số lượng:</label>
                <input type="text" class="form-control" name="soluong" id="issoluong" placeholder="Số lượng" value="{{ $book->soluong }}"/>
                <div class="soluong invalid-feedback"></div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group pl-3 pr-3 px-0">
                <label>Đơn giá:</label>
                <input type="number" class="form-control" name="dongia" id="isdongia" placeholder="Đơn giá" min="0" value="{{ $book->dongia }}"/>
                <div class="dongia invalid-feedback"></div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group pl-3 pr-3 px-0">
                <label>Ảnh bìa:</label>
                <img width="70px" height="120px" class="mb-2"/>
                <input type="file" id="myfiles" name="cover" class="form-control w-100">
                <input type="hidden" name="anhbia" value="">
                <div class="anhbia invalid-feedback"></div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group pl-3 pr-3 px-0">
                <label>Khuyến mãi:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="khuyenmai" id="inlineFormInputGroupUsername" value="{{ $book->khuyenmai }}" />
                    <div class="input-group-text">%</div>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group pl-3 pr-3 px-0">
                <label>Tập:</label>
                <input type="number" class="form-control" name="tap" id="istap" min="0" placeholder="tập số" value="{{ $book->tap }}" >
                <div class="tap invalid-feedback"></div>
            </div>
        </td>
        <td>
            <div class="form-group pl-3 pr-3">
                <label>Số tập:</label>
                <input type="number" class="form-control" name="sotap" id="issotap" min="0" placeholder="Số tập" >
                <div class="sotap invalid-feedback"></div>
            </div>
        </td>
    </tr>
