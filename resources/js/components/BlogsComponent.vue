<template>
    <div>
        <div class="row">
            <div class="col-sm-4">
                <span class="bmd-form-group">
                    <div class="input-group no-border" style="margin-left: 5px;">
                        <input v-model="search" type="text" value="" class="form-control" placeholder="Search...">
                    </div>
                </span>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Creation date</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in items" v-bind:key="item.id">
                    <td> {{item.title}}</td>
                    <td> {{item.category.title}}</td>
                    <td> {{item.content}}</td>
                    <td> {{item.user.username}}</td>
                    <td> {{item.created_at}}</td>
                    <td class="td-actions text-right">
                        <a rel="tooltip" class="btn btn-success btn-link"  v-bind:href="'/admin/users/'+item.id">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                        </a>
                        <form method="POST" :action="'/admin/users/'+item.id" accept-charset="UTF-8"
                              style="display: inline;">
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="_token" type="hidden" :value="csrfToken">
                            <button type="button" class="btn btn-danger btn-link" data-original-title="" title=""
                                    onclick="if (confirm(&quot;Are you sure you want to delete this user?&quot;) == false) {  return false;  }">                                    <i class="material-icons">close</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <pagination :pagination="pagination" :callback="loadData" :options="paginationOptions"></pagination>
    </div>
</template>

<script>
    import pagination from 'vue-bootstrap-pagination';
    import axios from 'axios';

    export default {
        components: {
            pagination
        },
        data: () => ({
        items: [],
        token: window.csrfToken,
        search: '',
        mounted: false,
        filters: [],
        csrfToken: window.csrfToken,
        pagination: {
            total: 0,
            per_page: 15,    // required
            current_page: 1, // required
            last_page: 0,    // required
            from: 1,
            to: 12
        },
        paginationOptions: {
            offset: 4,
            previousText: 'Prethodna',
            nextText: 'Sljedeća',
            alwaysShowPrevNext: true
        },
    }),
    watch: {
        search: function (e) {
            this.addFilter('term', e)
            this.loadPageDebounce(this.pagination.current_page);
        },
    },
    mounted() {
        var $this = this;
        setTimeout(function () {
            $this.mounted = true;
        }, 500);
        this.loadPage(this.pagination.current_page);
    },
    methods: {
        loadPageDebounce: _.debounce(function (page, parameters) {
            this.loadPage(page);
        }, 500),
            loadPage(page) {
            var $this = this;
            var parameters = '';
            this.filters.forEach(function (obj, index) {
                parameters = parameters + '&' + obj.key + '=' + obj.value;
            });
            axios({
                method: 'GET',
                url: '/api/blogs?page=' + page + parameters,
                headers: {'X-CSRF-TOKEN': window.csrfToken, 'X-Requested-With': 'XMLHttpRequest'},
            })
                .then(function (response) {
                    console.log(response);
                    console.log(response.data.data.user);
                    $this.items = response.data.data
                    $this.pagination.total = response.data.total;
                    $this.pagination.last_page = response.data.last_page;
                    $this.pagination.current_page = response.data.current_page;
                    $this.pagination.from = response.data.from;
                    $this.pagination.to = response.data.to;
                    $this.pagination.next_page_url = response.data.next_page_url;
                    $this.pagination.prev_page_url = response.data.prev_page_url;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        loadData() {
            this.loadPage(this.pagination.current_page);
        },
        addFilter(key, value) {
            this.filters = this.filters.filter(function (obj) {
                return obj.key !== key;
            });
            if (this.mounted == true) {
                this.pagination.current_page = 1;
            }
            this.filters.push({key: key, value: value});
        },
    }

    }
</script>
