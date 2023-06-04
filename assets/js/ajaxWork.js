// **************************************************** //
// perutean halaman customers
// menampilkan semua customers
function showCustomers() {
    $.ajax({
        url: './adminView/viewCustomers.php',
        method: 'post',
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data)
        }
    })
}

// form modifikasi user
function userEditForm(id) {
    $.ajax({
        url: './adminView/editUserForm.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data)
        }
    })
}

// modifikasi user
function updateUser() {
    var user_id = $('#user_id').val()
    var first_name = $('#first_name').val()
    var last_name = $('#last_name').val()
    var email = $('#email').val()
    var contact_no = $('#contact_no').val()
    var registered_at = $('#registered_at').val()
    var fd = new FormData()
    fd.append('user_id', user_id)
    fd.append('first_name', first_name)
    fd.append('last_name', last_name)
    fd.append('email', email)
    fd.append('contact_no', contact_no)
    fd.append('registered_at', registered_at)

    $.ajax({
        url: './controller/updateUserController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Update Data Pelanggan Berhasil')
            $('form').trigger('reset')
            showCustomers()
        }
    })
}

// batalkan modifikasi user
function candelUpdateUser() {
    var user_id = $('#user_id').val()
    var first_name = $('#first_name').val()
    var last_name = $('#last_name').val()
    var email = $('#email').val()
    var contact_no = $('#contact_no').val()
    var registered_at = $('#registered_at').val()
    var fd = new FormData()
    fd.append('user_id', user_id)
    fd.append('first_name', first_name)
    fd.append('last_name', last_name)
    fd.append('email', email)
    fd.append('contact_no', contact_no)
    fd.append('registered_at', registered_at)

    $.ajax({
        url: './index.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Update Data Pelanggan Dibatalkan')
            $('form').trigger('reset')
            showCustomers()
        }
    })
}


//menghapus customer
function userDelete(id) {
    $.ajax({
        url: './controller/deleteUserController.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            alert('Penghapusan Pelanggan Berhasil')
            $('form').trigger('reset')
            showCustomers()
        }
    })
}

// **************************************************** //

// **************************************************** //
// perutean halaman category
// menampilkan semua category
function showCategory() {
    $.ajax({
        url: './adminView/viewCategories.php',
        method: 'post',
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data)
        }
    })
}

// form modifikasi product sizes
function categoryEditForm(id) {
    $.ajax({
        url: './adminView/editCategoryForm.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data)
        }
    })
}

// modifikasi product sizes
function updateCategory() {
    var category_id = $('#category_id').val()
    var category_name = $('#category_name').val()
    var fd = new FormData()
    fd.append('category_id', category_id)
    fd.append('category_name', category_name)

    $.ajax({
        url: './controller/updateCatController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Update Data Kategori Berhasil')
            $('form').trigger('reset')
            showCategory()
        }
    })
}

// batalkan modifikasi kategori
function cancelUpdateCategory() {
    var category_id = $('#category_id').val()
    var category_name = $('#category_name').val()
    var fd = new FormData()
    fd.append('category_name', category_name)
    $.ajax({
        url: './index.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function () {
            alert('Update Data Kategori Dibatalkan')
            $('form').trigger('reset')
            showCategory()
        }
    })
}

// menghapus category
function categoryDelete(id) {
    $.ajax({
        url: './controller/catDeleteController.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            alert('Penghapusan Kategori Berhasil')
            $('form').trigger('reset')
            showCategory()
        }
    })
}
// **************************************************** //

// **************************************************** //
// perutean halaman size
// menampilkan semua size
function showSizes() {
    $.ajax({
        url: './adminView/viewSizes.php',
        method: 'post',
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data)
        }
    })
}

// form modifikasi size
function sizeEditForm(id) {
    $.ajax({
        url: './adminView/editSizeForm.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data)
        }
    })
}

// modifikasi size
function updateSize() {
    var size_id = $('#size_id').val()
    var size_name = $('#size_name').val()
    var fd = new FormData()
    fd.append('size_id', size_id)
    fd.append('size_name', size_name)

    $.ajax({
        url: './controller/updateSizeController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Update Data Ukuran Berhasil')
            $('form').trigger('reset')
            showCategory()
        }
    })
}

// batalkan modifikasi size
function cancelUpdateSize() {
    var size_id = $('#size_id').val()
    var size_name = $('#size_name').val()
    var fd = new FormData()
    fd.append('size_id', size_id)
    fd.append('size_name', size_name)

    $.ajax({
        url: './index.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Update Data Ukuran Dibatalkan')
            $('form').trigger('reset')
            showCategory()
        }
    })
}

// menghapus size
function sizeDelete(id) {
    $.ajax({
        url: './controller/deleteSizeController.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            alert('Penghapusan Ukuran Berhasil')
            $('form').trigger('reset')
            showSizes()
        }
    })
}
// **************************************************** //

// **************************************************** //
// perutean halaman product sizes
// menampilkan semua product sizes
function showProductSizes() {
    $.ajax({
        url: './adminView/viewProductSizes.php',
        method: 'post',
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data)
        }
    })
}

// menghapus product sizes
function variationDelete(id) {
    $.ajax({
        url: './controller/deleteVariationController.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            alert('Penghapusan Variasi Berhasil')
            $('form').trigger('reset')
            showProductSizes()
        }
    })
}

// form modifikasi product sizes
function variationEditForm(id) {
    $.ajax({
        url: './adminView/editVariationForm.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data)
        }
    })
}

// modifikasi product sizes
function updateVariations() {
    var v_id = $('#v_id').val()
    var product = $('#product').val()
    var size = $('#size').val()
    var qty = $('#qty').val()
    var fd = new FormData()
    fd.append('v_id', v_id)
    fd.append('product', product)
    fd.append('size', size)
    fd.append('qty', qty)

    $.ajax({
        url: './controller/updateVariationController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Update Data Variasi Berhasil')
            $('form').trigger('reset')
            showProductSizes()
        }
    })
}

// batalkan modifikasi product sizes
function cancelUpdateVariations() {
    var v_id = $('#v_id').val()
    var product = $('#product').val()
    var size = $('#size').val()
    var qty = $('#qty').val()
    var fd = new FormData()
    fd.append('v_id', v_id)
    fd.append('product', product)
    fd.append('size', size)
    fd.append('qty', qty)

    $.ajax({
        url: './controller/updateVariationController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Update Data Variasi Dibatalkan')
            $('form').trigger('reset')
            showProductSizes()
        }
    })
}
// **************************************************** //

// **************************************************** //
// perutean halaman product
// menampilkan semua product
function showProductItems() {
    $.ajax({
        url: './adminView/viewAllProducts.php',
        method: 'post',
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data)
        }
    })
}

// menambahkan product
function addItems() {
    var p_name = $('#p_name').val()
    var p_desc = $('#p_desc').val()
    var p_price = $('#p_price').val()
    var category = $('#category').val()
    var upload = $('#upload').val()
    var file = $('#file')[0].files[0]

    var fd = new FormData()
    fd.append('p_name', p_name)
    fd.append('p_desc', p_desc)
    fd.append('p_price', p_price)
    fd.append('category', category)
    fd.append('file', file)
    fd.append('upload', upload)
    $.ajax({
        url: './controller/addItemController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Penambahan Data Produk Berhasil')
            $('form').trigger('reset')
            showProductItems()
        }
    })
}

// form modifikasi product
function itemEditForm(id) {
    $.ajax({
        url: './adminView/editItemForm.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data)
        }
    })
}

// modifikasi product
function updateItems() {
    var product_id = $('#product_id').val()
    var p_name = $('#p_name').val()
    var p_desc = $('#p_desc').val()
    var p_price = $('#p_price').val()
    var category = $('#category').val()
    var existingImage = $('#existingImage').val()
    var newImage = $('#newImage')[0].files[0]
    var fd = new FormData()
    fd.append('product_id', product_id)
    fd.append('p_name', p_name)
    fd.append('p_desc', p_desc)
    fd.append('p_price', p_price)
    fd.append('category', category)
    fd.append('existingImage', existingImage)
    fd.append('newImage', newImage)

    $.ajax({
        url: './controller/updateItemController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Update Data Produk Berhasil')
            $('form').trigger('reset')
            showProductItems()
        }
    })
}

// batalkan modifikasi
function cancelUpdateItems() {
    var product_id = $('#product_id').val()
    var p_name = $('#p_name').val()
    var p_desc = $('#p_desc').val()
    var p_price = $('#p_price').val()
    var category = $('#category').val()
    var existingImage = $('#existingImage').val()
    var newImage = $('#newImage')[0].files[0]
    var fd = new FormData()
    fd.append('product_id', product_id)
    fd.append('p_name', p_name)
    fd.append('p_desc', p_desc)
    fd.append('p_price', p_price)
    fd.append('category', category)
    fd.append('existingImage', existingImage)
    fd.append('newImage', newImage)

    $.ajax({
        url: './index.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Edit Data Produk Dibatalkan')
            $('form').trigger('reset')
            showProductItems()
        }
    })
}

// menghapus product
function itemDelete(id) {
    $.ajax({
        url: './controller/deleteItemController.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            alert('Penghapusan Data Produk Berhasil')
            $('form').trigger('reset')
            showProductItems()
        }
    })
}
// **************************************************** //

// **************************************************** //
// perutean di halaman orders
// menampilkan semua orders
function showOrders() {
    $.ajax({
        url: './adminView/viewAllOrders.php',
        method: 'post',
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data)
        }
    })
}

// mengubah status order
function ChangeOrderStatus(id) {
    $.ajax({
        url: './controller/updateOrderStatus.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            alert('Status Pemesanan Berhasil di Update')
            $('form').trigger('reset')
            showOrders()
        }
    })
}

// mengubah status pembayaran
function ChangePay(id) {
    $.ajax({
        url: './controller/updatePayStatus.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            alert('Status Pembayaran Berhasil di Update')
            $('form').trigger('reset')
            showOrders()
        }
    })
}

// melihat detail orders
function eachDetailsForm(id) {
    $.ajax({
        url: './view/viewEachDetails.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data)
        }
    })
}

// menghapus order
function orderDelete(id) {
    $.ajax({
        url: './controller/deleteOrderController.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            alert('Penghapusan Pesanan Berhasil')
            $('form').trigger('reset')
            showOrders()
        }
    })
}
// **************************************************** //

function search(id) {
    $.ajax({
        url: './controller/searchController.php',
        method: 'post',
        data: { record: id },
        success: function (data) {
            $('.eachCategoryProducts').html(data)
        }
    })
}
