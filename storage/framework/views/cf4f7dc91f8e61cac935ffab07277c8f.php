<?php $__env->startSection('title', 'Kelola User'); ?>
<?php $__env->startSection('desc', ' Dihalaman ini anda bisa kelola user. '); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h4>List User</h4>
        <div class="card-header-action">
            <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Tambah
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped w-100" id="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(function() {
        var datatable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: "<?php echo url()->current(); ?>"
            },
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            order: [
                [0, 'desc'],
            ],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'avatar', name: 'avatar'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'username'},
                {data: 'username', name: 'username'},
                {data: 'role', name: 'role'},
                {data: 'email_verified_at', name: 'email_verified_at'},
                {data: 'aksi', name: 'aksi'},
            ],
            columnDefs: [{
                "targets": 1,
                "render": function(data, type, row, meta) {
                    let img = `assets/img/avatar/avatar-1.jpg`;
                    if(data) {
                        img = `storage/${data}`;
                    }

                    return `<img alt="avatar" src="<?php echo e(asset('/')); ?>${img}" class="rounded-circle" width="35">`;
                }
            },{
                "targets": -1,
                "render": function(data, type, row, meta) {
                    return `
                        <form action="<?php echo e(url('/user')); ?>/${row.id}" method="POST" class="d-flex">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                            <a
                                href="<?php echo e(url('/user')); ?>/${row.id}/edit"
                                class="btn btn-sm btn-warning mr-2"
                            >
                                Edit
                            </a>
                            <button
                                type="submit"
                                class="btn-delete btn btn-sm btn-danger"
                            >
                                Delete
                            </button>
                        </form>
                    `;
                }
            },{
                "targets": -2,
                "render": function(data, type, row, meta) {
                    if(data){
                        return `<div class="badge badge-success">verifikasi</div>`;
                    } else {
                        return `<div class="badge badge-danger">Belum verifikasi</div>`;
                    }
                }
            }],
            rowId: function(a) {
                return a;
            },
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            },
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\website\ufounds\resources\views/pages/user/index.blade.php ENDPATH**/ ?>