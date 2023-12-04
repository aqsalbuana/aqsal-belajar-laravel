</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
{{-- Datatable --}}
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/highcharts.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#data-produk').DataTable()
    });
    document.addEventListener('DOMContentLoaded', function() {
        var totalProducts = {!! isset($totalProducts) ? json_encode($totalProducts) : 0 !!};
        var totalCategories = {!! isset($totalCategories) ? json_encode($totalCategories) : 0 !!};
        var totalPrice = {!! isset($totalPrice) ? json_encode($totalPrice) : 0 !!};
        var totalStock = {!! isset($totalStock) ? json_encode($totalStock) : 0 !!};
        var categories = {!! isset($categories) ? json_encode($categories) : 0 !!};
        console.log(categories);
        Highcharts.chart('categories', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Kategori Statistik'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>'
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    return `<b>${this.point.name}</b><br>
                        Total Produk: ${this.point.y}<br>
                        Total Harga: Rp. ${this.point.harga}<br>
                        Total Stok: ${this.point.stok}`;
                }
            },
            series: [{
                name: 'Kategori Statistik',
                data: categories.map(function(category) {
                    return {
                        name: category.category_name,
                        y: category.product_count,
                        harga: category.total_price,
                        stok: category.total_stock
                    };
                })
            }]
        });
        Highcharts.chart('product', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Produk Statistik'
            },
            xAxis: {
                categories: ['Jumlah Semua Produk', 'Jumlah Kategori Produk',
                    'Jumlah Total Harga Semua Produk', 'Jumlah Stok Semua Produk'
                ]
            },
            yAxis: {
                type: 'logarithmic',
                title: {
                    text: 'Quantity/Value'
                }
            },
            series: [{
                name: 'Value',
                data: [totalProducts, totalCategories, parseFloat(totalPrice), parseInt(
                    totalStock)]
            }]
        });
    });
</script>
</body>

</html>
