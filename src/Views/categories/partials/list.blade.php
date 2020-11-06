<table class="table datatable table-flush table-striped table-hover" id="posts-categories-table">
    <thead class="thead-light">
        <tr>
            <th>Nome</th>
            <th>Slug</th>
            <th>Status</th>
            <th>N° Seções</th>
            <th>N° Postagens</th>
            <th>Criado por</th>
            <th></th>
        </tr>
    </thead>
</table>

@push('scripts')
    <script>
        $(document).ready(function($) {
            $('#posts-categories-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('dashboard.posts.categories.datatables') }}',
                keys: !0,
                select: {
                    style: "multi"
                },
                lengthChange: !1,
                dom: "Bfrtip",
                buttons: ["copy", "print"],
                language: {
                    paginate: {
                        previous: "<i class='fas fa-angle-left'>",
                        next: "<i class='fas fa-angle-right'>"
                    }
                },
                columns: [
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'sections',
                        name: 'sections'
                    },
                    {
                        data: 'posts',
                        name: 'posts'
                    },
                    {
                        data: 'user',
                        name: 'user'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            $("div.dataTables_length select").removeClass("custom-select custom-select-sm");
            $(".dt-buttons .btn").removeClass("btn-secondary").addClass("btn-sm btn-default");
        });
    </script>
@endpush
